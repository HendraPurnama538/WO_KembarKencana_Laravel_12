<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\DecorationPackage;
use App\Models\InstagramPost;
use App\Models\Order;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Vendor;
use App\Models\Venue;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Tampilkan halaman landing page utama.
     */
    public function index()
    {
        // Portofolio terbaru beserta gambar-gambarnya
        $portfolios = Portfolio::with('images')->latest()->get();

        // Paket pernikahan aktif, urutkan per batch kemudian per harga
        $packages = Package::with('venue')
            ->active()
            ->orderBy('batch', 'asc')
            ->orderBy('price', 'asc')
            ->get();

        // Paket dekorasi aktif untuk kalkulator custom
        $dekorasiPackages = DecorationPackage::active()
            ->orderBy('category')
            ->orderBy('name')
            ->get();

        // Add-on aktif untuk kalkulator
        $addons = Addon::active()
            ->orderBy('category')
            ->orderBy('name')
            ->get();

        // Vendor aktif untuk section Vendor & Partner
        $categoryOrder = "'" . implode("','", Vendor::CATEGORIES) . "'";
        $vendors = Vendor::active()
            ->orderByRaw("FIELD(category, $categoryOrder)")
            ->orderBy('name')
            ->get();

        // Venue aktif untuk kalkulator dan form order
        $venues = Venue::active()->orderBy('name')->get();

        // Postingan Instagram terbaru (visible saja, maks 9)
        $instagramPosts = InstagramPost::visible()->latestPosted()->take(9)->get();

        // Nomor WhatsApp: ambil dari config jika ada, fallback ke default
        $waNumber = config('app.wa_number', '6281312901284');

        return view('landing', compact(
            'portfolios',
            'packages',
            'dekorasiPackages',
            'addons',
            'vendors',
            'venues',
            'instagramPosts',
            'waNumber'
        ));
    }

    /**
     * Simpan order dari landing page ke database.
     * Pengunjung tidak perlu login — data nama, HP, dan alamat disimpan langsung.
     */
    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'visitor_name'           => 'required|string|max:255',
            'visitor_phone'          => 'required|string|max:20',
            'visitor_address'        => 'nullable|string|max:500',
            'execution_date'         => 'required|date|after:today',
            'package_id'             => 'nullable|exists:packages,id',
            'decoration_package_id'  => 'nullable|exists:decoration_packages,id',
            'venue_id'               => 'nullable|exists:venues,id',
            'total_estimate'         => 'required|numeric|min:0',
            'notes'                  => 'nullable|string|max:1000',
            // Add-ons: addon_id[] dan qty[]
            'addon_ids'              => 'nullable|array',
            'addon_ids.*'            => 'exists:addons,id',
            'addon_qtys'             => 'nullable|array',
            'addon_qtys.*'           => 'integer|min:1',
        ]);

        // Buat order
        $order = Order::create([
            'visitor_name'          => $validated['visitor_name'],
            'visitor_phone'         => $validated['visitor_phone'],
            'visitor_address'       => $validated['visitor_address'] ?? null,
            'execution_date'        => $validated['execution_date'],
            'package_id'            => $validated['package_id'] ?? null,
            'decoration_package_id' => $validated['decoration_package_id'] ?? null,
            'venue_id'              => $validated['venue_id'] ?? null,
            'total_estimate'        => $validated['total_estimate'],
            'notes'                 => $validated['notes'] ?? null,
            'status'                => 'menunggu',
        ]);

        // Simpan add-on ke pivot table dengan qty dan harga snapshot
        if (!empty($validated['addon_ids'])) {
            $addonData = [];
            $addons    = Addon::whereIn('id', $validated['addon_ids'])->get()->keyBy('id');

            foreach ($validated['addon_ids'] as $index => $addonId) {
                if ($addons->has($addonId)) {
                    $qty = (int) ($validated['addon_qtys'][$index] ?? 1);
                    $addonData[$addonId] = [
                        'qty'            => $qty,
                        'price_snapshot' => $addons[$addonId]->price,
                    ];
                }
            }
            $order->addons()->sync($addonData);
        }

        // Buat pesan WhatsApp otomatis
        $waMessage = $this->buildWhatsAppMessage($order);
        $waNumber  = config('app.wa_number', '6281312901284');
        $waUrl     = 'https://wa.me/' . $waNumber . '?text=' . urlencode($waMessage);

        // Redirect ke WhatsApp dengan pesan otomatis
        return redirect($waUrl);
    }

    /**
     * Buat pesan WhatsApp otomatis berdasarkan data order.
     */
    private function buildWhatsAppMessage(Order $order): string
    {
        $order->load(['package', 'decorationPackage', 'venue', 'addons']);

        $lines = [];
        $lines[] = '🌸 *KONSULTASI ORDER — KEMBAR KENCANA WO*';
        $lines[] = '━━━━━━━━━━━━━━━━━━━━━';
        $lines[] = '👤 *Data Pemesan*';
        $lines[] = 'Nama     : ' . $order->visitor_name;
        $lines[] = 'No. HP   : ' . $order->visitor_phone;
        if ($order->visitor_address) {
            $lines[] = 'Alamat   : ' . $order->visitor_address;
        }
        $lines[] = 'Tgl Acara: ' . $order->execution_date->format('d/m/Y');
        $lines[] = '';
        $lines[] = '💍 *Paket yang Dipilih*';

        if ($order->package) {
            $lines[] = 'Paket     : ' . $order->package->name;
            $lines[] = 'Harga     : Rp ' . number_format((float) $order->package->price, 0, ',', '.');
        } else {
            $lines[] = 'Paket     : Belum dipilih';
        }

        if ($order->decorationPackage) {
            $lines[] = 'Dekorasi  : ' . $order->decorationPackage->name;
            $lines[] = '  Harga   : Rp ' . number_format((float) $order->decorationPackage->price, 0, ',', '.');
        }

        if ($order->venue) {
            $lines[] = 'Venue     : ' . $order->venue->name;
        }

        if ($order->addons->isNotEmpty()) {
            $lines[] = '';
            $lines[] = '➕ *Add-on Tambahan*';
            foreach ($order->addons as $addon) {
                $qty   = $addon->pivot->qty;
                $price = (float) $addon->pivot->price_snapshot;
                $lines[] = '• ' . $addon->name . ' (x' . $qty . ') — Rp ' . number_format($price * $qty, 0, ',', '.');
            }
        }

        $lines[] = '';
        $lines[] = '💰 *Total Estimasi: Rp ' . number_format((float) $order->total_estimate, 0, ',', '.') . '*';
        $lines[] = '';
        $lines[] = '📝 Order ID: #' . $order->id;
        if ($order->notes) {
            $lines[] = 'Catatan: ' . $order->notes;
        }
        $lines[] = '━━━━━━━━━━━━━━━━━━━━━';
        $lines[] = 'Mohon dikonfirmasi. Terima kasih! 🙏';

        return implode("\n", $lines);
    }
}
