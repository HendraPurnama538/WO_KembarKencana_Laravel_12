<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $query = Order::with(['package', 'decorationPackage', 'venue'])
                      ->latest('ordered_at');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by visitor name or phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('visitor_name', 'like', "%{$search}%")
                  ->orWhere('visitor_phone', 'like', "%{$search}%");
            });
        }

        $orders = $query->paginate(15)->withQueryString();

        $statusCounts = [
            'all'          => Order::count(),
            'menunggu'     => Order::where('status', 'menunggu')->count(),
            'dikonfirmasi' => Order::where('status', 'dikonfirmasi')->count(),
            'diproses'     => Order::where('status', 'diproses')->count(),
            'selesai'      => Order::where('status', 'selesai')->count(),
            'dibatalkan'   => Order::where('status', 'dibatalkan')->count(),
        ];

        return view('admin.orders.index', compact('orders', 'statusCounts'));
    }

    public function show(Order $order): View
    {
        $order->load(['package.venue', 'decorationPackage', 'venue', 'addons', 'vendors']);
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order): View
    {
        $order->load(['package', 'decorationPackage', 'venue', 'addons', 'vendors']);
        $vendors = Vendor::active()->orderBy('name')->get();
        $addons  = Addon::active()->orderBy('category')->orderBy('name')->get();
        return view('admin.orders.edit', compact('order', 'vendors', 'addons'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,dikonfirmasi,diproses,selesai,dibatalkan',
            'notes'  => 'nullable|string|max:1000',
            'vendor_ids' => 'nullable|array',
            'vendor_ids.*' => 'exists:vendors,id',
        ]);

        $order->update([
            'status' => $validated['status'],
            'notes'  => $validated['notes'] ?? $order->notes,
        ]);

        // Sync vendors
        if ($request->has('vendor_ids')) {
            $order->vendors()->sync($request->vendor_ids ?? []);
        }

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Order berhasil diperbarui!');
    }

    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,dikonfirmasi,diproses,selesai,dibatalkan',
        ]);

        $order->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Status Order #' . $order->id . ' berhasil diubah menjadi ' . $order->status_label);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->addons()->detach();
        $order->vendors()->detach();
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order berhasil dihapus!');
    }
}
