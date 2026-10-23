<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

/**
 * PackageSeeder — Mengisi 16 Paket Pernikahan Kembar Kencana dengan rincian fasilitas lengkap per kategori
 */
class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // ── Definisi Template Rincian Fasilitas per Kategori ─────────────────
        $detailFacilities = [
            'MUA_Basic' => [
                'category' => 'MUA & Busana',
                'items' => [
                    'Makeup Pengantin Akad & Resepsi (1x rias)',
                    'Retouch Makeup saat Resepsi',
                    'Busana Pengantin Akad & Resepsi (1 pasang)',
                    'Makeup & Busana Ibu 2 Orang',
                    'Busana Bapak 2 Orang',
                    'Aksesoris & Rangkaian Melati Pengantin',
                ]
            ],
            'MUA_Full' => [
                'category' => 'MUA & Busana',
                'items' => [
                    'Makeup Pengantin Akad & Resepsi (Eksklusif)',
                    'Retouch Makeup Standby selama Acara',
                    'Busana Pengantin Akad & Resepsi (2 pasang ganti)',
                    'Makeup & Busana Ibu 2 Orang',
                    'Busana Bapak 2 Orang',
                    'Makeup & Busana Pagar Ayu / Bridesmaids (4 orang)',
                    'Aksesoris, Siger/Mahkota & Melati Segar Pengantin',
                ]
            ],
            'MUA_Luxury' => [
                'category' => 'MUA & Busana',
                'items' => [
                    'Makeup Pengantin by Senior MUA Kembar Kencana',
                    'Retouch Unlimited Standby selama Acara',
                    'Busana Pengantin Akad & Resepsi Custom / Premium',
                    'Makeup & Busana Ibu 2 Orang (Kebaya Modern)',
                    'Busana Bapak 2 Orang (Beskap Lengkap)',
                    'Makeup & Busana Pagar Ayu / Keluarga (6 orang)',
                    'Aksesoris Mewah, Siger Kencana & Melati Premium',
                    'Free Softlens & Nails Art Pengantin',
                ]
            ],

            'Dekorasi_Indoor' => [
                'category' => 'Dekorasi',
                'items' => [
                    'Pelaminan Indoor Modern / Rustic / Minimalis (4–6 Meter)',
                    'Mini Garden & Panggung Pelaminan',
                    'Karpet Jalan Pelaminan',
                    'Standing Flower 4 Titik',
                    'Backdrop Akad & Meja Kursi Akad',
                    'Kotak Angpao 2 Buah (Dipinjamkan)',
                    'Janur Kuning / Welcome Gate',
                ]
            ],
            'Dekorasi_Outdoor' => [
                'category' => 'Dekorasi',
                'items' => [
                    'Pelaminan Outdoor / Semi-Outdoor (6–8 Meter)',
                    'Fresh Flower Arrangement & Mini Garden',
                    'Pergola / Gate Masuk Eksklusif',
                    'Karpet Jalan & Standing Flower 6 Titik',
                    'Area Photobooth / Photo Gallery',
                    'Backdrop Akad Nikah Cantik',
                    'Kotak Angpao 2 Buah + Gembok',
                    'Janur Kuning Penanda Lokasi',
                ]
            ],
            'Dekorasi_Luxury' => [
                'category' => 'Dekorasi',
                'items' => [
                    'Pelaminan Gedung / Luxury Theme (8–12 Meter)',
                    'Full Fresh Flowers & Lighting Pelaminan Megah',
                    'Gazebo Masuk / Grand Entrance Gate',
                    'Karpet Merah / Rose Petal Pathway',
                    'Standing Flower 8 Titik Sepanjang Karpet',
                    'Photobooth 3D Eksklusif + Ring Light',
                    'Dekorasi Area Penerima Tamu & Meja VIP',
                    'Kotak Angpao Akrilik Mewah 2 Buah',
                    'Backdrop Akad Nikah Premium + Kursi Tiffany',
                ]
            ],

            'Dokumentasi_Standard' => [
                'category' => 'Dokumentasi',
                'items' => [
                    '1 Photographer & 1 Videographer Profesional',
                    'Liputan Acara Akad & Resepsi',
                    'Unlimited Photoshoot',
                    '1 Album Kolase Cetak (10 Sheet / 20 Halaman)',
                    'Video Cinematic Teaser (1 Menit untuk Medsos)',
                    'Flashdisk Berisi Seluruh File Master Foto & Video',
                ]
            ],
            'Dokumentasi_Premium' => [
                'category' => 'Dokumentasi',
                'items' => [
                    '2 Photographer & 2 Videographer Profesional',
                    'Liputan Lengkap Persiapan, Akad hingga Resepsi',
                    'Unlimited Photoshoot + High-Res Editing',
                    '1 Album Kolase Magnetic Exclusive (Box Kayu)',
                    '1 Frame Foto Pembesar 40x60 cm + Frame Minimalis',
                    'Video Cinematic Teaser (1 Menit) + Highlight (3-5 Menit)',
                    'Flashdisk Eksklusif All Master Files (Raw & Edited)',
                ]
            ],

            'Music_MC' => [
                'category' => 'Music & MC',
                'items' => [
                    'Master of Ceremony (MC) Profesional Akad & Resepsi',
                    'Sound System Standard Indoor / Outdoor (3.000 Watt)',
                    'Solo Keyboardist / Akustik + 1 Singer',
                    'Daftar Lagu Romantis Pilihan Pengantin',
                ]
            ],
            'Music_MC_Premium' => [
                'category' => 'Music & MC',
                'items' => [
                    'MC Senior Wedding Profesional & Komunikatif',
                    'Sound System High Quality (5.000 Watt)',
                    'Full Acoustic Band (Keyboard, Gitar, Bass, Cajon) + 2 Singer',
                    'Mic Wireless & Alat Musik Lengkap',
                ]
            ],

            'WO' => [
                'category' => 'Wedding Organizer',
                'items' => [
                    'Tim Wedding Organizer Hari H (4–6 Personil)',
                    'Pembuatan Rundown & Time Schedule Acara',
                    '1x Technical Meeting dengan Seluruh Vendor',
                    'Koordinasi & Timekeeper Selama Acara Berlangsung',
                    'Pendamping Pengantin & Keluarga Inti',
                ]
            ],
            'WO_Full' => [
                'category' => 'Wedding Organizer',
                'items' => [
                    'Tim Wedding Organizer Lengkap (6–8 Personil)',
                    'Konsultasi Konsep, Anggaran & Pemilihan Vendor',
                    'Penyusunan Rundown, Buku Panduan Acara & Teks Sambutan',
                    'Technical Meeting Vendor & Gladi Bersih Keluarga',
                    'Koordinator Akad, Resepsi, Catering & Tamu VIP',
                    'Pendamping Khusus Pengantin (Liaison Officer)',
                ]
            ],

            'Adat' => [
                'category' => 'Upacara Adat',
                'items' => [
                    'Prosesi Upacara Adat Sunda Lengser / Nasional',
                    'Pemandu / MC Khusus Adat Berpengalaman',
                    'Aktor Ki Lengser, Ambu & Penari Merak / Payung Agung',
                    'Perlengkapan Adat: Sawer, Huap Lingkup, Bakakak Ayam & Pabetot Bakakak',
                    'Sound Effect & Musik Pengiring Adat Tradisional',
                ]
            ],

            'Tenda_Catering_B2' => [
                'category' => 'Tenda & Catering',
                'items' => [
                    'Tenda Plafon / Semi-Dekorasi (50–100 m²)',
                    'Kursi Tamu Futura + Cover (50–100 Unit)',
                    'Meja Prasmanan + Pemanas Roll Top',
                    'Peralatan Makan & Minum Lengkap',
                    'Menu Catering Prasmanan Pilihan',
                ]
            ],
            'Tenda_Catering_B3' => [
                'category' => 'Tenda & Catering',
                'items' => [
                    'Tenda Dekorasi VIP / Full Plafon Drapery (100–200 m²)',
                    'Kursi Tamu Futura + Cover & Pita (100–200 Unit)',
                    'Meja Prasmanan VIP & Meja Gubukan / Stall',
                    'Menu Catering Prasmanan Lengkap + Dessert & Aneka Buah',
                    'Peralatan Makan Keramik & Waiter/Pramusaji Standby',
                ]
            ],

            'Venue' => [
                'category' => 'Venue (Gedung)',
                'items' => [
                    'Sewa Venue / Ballroom Gedung Pernikahan',
                    'Ruang Rias Pengantin & Keluarga ber-AC',
                    'Kursi & Meja Standard Gedung',
                    'Kapasitas Listrik & Sound System Gedung',
                    'Petugas Kebersihan & Keamanan Gedung',
                ]
            ],

            'Bonus' => [
                'category' => 'Bonus',
                'items' => [
                    'Hand Bouquet Bunga Segar Pengantin',
                    'Rangkaian Bunga Melati Asli untuk Akad',
                    '2 Buku Tamu Cantik + Spidol Khusus',
                    'Free Konsultasi & Planning Pra-Nikah',
                ]
            ],
        ];

        // ── Data 16 Paket dengan Penggabungan Kategori Fasilitas ─────────────
        $packages = [

            // ══════════════════════════════════════════════════════════════════════
            // BATCH 1 — Indoor Tanpa Tenda
            // ══════════════════════════════════════════════════════════════════════
            [
                'batch'       => 1,
                'name'        => 'Simple Start',
                'price'       => 21000000,
                'pax'         => 200,
                'description' => 'Paket pernikahan simpel namun berkesan untuk acara indoor. Sudah termasuk MUA, dekorasi, dokumentasi, musik, MC, dan bonus menarik.',
                'categories'  => [
                    $detailFacilities['MUA_Basic'],
                    $detailFacilities['Dekorasi_Indoor'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 1,
                'name'        => 'Sweet Basic',
                'price'       => 26000000,
                'pax'         => 300,
                'description' => 'Paket pernikahan indoor dengan tambahan Wedding Organizer untuk mengkoordinasikan seluruh jalannya acara hari bahagia Anda.',
                'categories'  => [
                    $detailFacilities['MUA_Basic'],
                    $detailFacilities['Dekorasi_Indoor'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['WO'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 1,
                'name'        => 'Lovely Moment',
                'price'       => 35000000,
                'pax'         => 400,
                'description' => 'Paket indoor dengan prosesi upacara adat yang khidmat, lengkap dengan MUA premium, dokumentasi, musik, MC, dan WO profesional.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dekorasi_Indoor'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['WO'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 1,
                'name'        => 'Intimate Dream',
                'price'       => 40000000,
                'pax'         => 500,
                'description' => 'Paket premium indoor dengan nuansa intim dan elegan, disertai upacara adat lengkap, MUA eksklusif, dokumentasi sinematik, dan WO.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dekorasi_Indoor'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Music_MC_Premium'],
                    $detailFacilities['WO_Full'],
                    $detailFacilities['Bonus'],
                ],
            ],

            // ══════════════════════════════════════════════════════════════════════
            // BATCH 2 — Outdoor / Tenda & Catering
            // ══════════════════════════════════════════════════════════════════════
            [
                'batch'       => 2,
                'name'        => 'Sweet Start',
                'price'       => 26000000,
                'pax'         => 300,
                'description' => 'Paket outdoor dengan tenda dan perlengkapan catering, cocok untuk acara di halaman rumah atau area semi-outdoor.',
                'categories'  => [
                    $detailFacilities['MUA_Basic'],
                    $detailFacilities['Dekorasi_Outdoor'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Tenda_Catering_B2'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 2,
                'name'        => 'Favorit Moment',
                'price'       => 29000000,
                'pax'         => 350,
                'description' => 'Paket outdoor favorit dengan tenda, catering, MC, musik, dan pendampingan Wedding Organizer profesional.',
                'categories'  => [
                    $detailFacilities['MUA_Basic'],
                    $detailFacilities['Dekorasi_Outdoor'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Tenda_Catering_B2'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['WO'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 2,
                'name'        => 'Sweet Elegant',
                'price'       => 38000000,
                'pax'         => 450,
                'description' => 'Paket outdoor elegan dengan nuansa adat yang kental, tenda semi-dekorasi, catering, MC, musik, dan WO berpengalaman.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dekorasi_Outdoor'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['WO'],
                    $detailFacilities['Tenda_Catering_B2'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 2,
                'name'        => 'Sweet Premium',
                'price'       => 48000000,
                'pax'         => 500,
                'description' => 'Paket outdoor premium lengkap dengan adat, tenda luas, catering, WO penuh, dokumentasi, dan seluruh kebutuhan pesta impian Anda.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dekorasi_Outdoor'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Tenda_Catering_B2'],
                    $detailFacilities['Music_MC_Premium'],
                    $detailFacilities['WO_Full'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Bonus'],
                ],
            ],

            // ══════════════════════════════════════════════════════════════════════
            // BATCH 3 — Outdoor Tenda & Catering (Elegant)
            // ══════════════════════════════════════════════════════════════════════
            [
                'batch'       => 3,
                'name'        => 'Elegant Start',
                'price'       => 38000000,
                'pax'         => 400,
                'description' => 'Paket outdoor elegant dengan tenda VIP dan catering berkualitas prima untuk kesan pernikahan yang berkelas.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dekorasi_Outdoor'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Tenda_Catering_B3'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 3,
                'name'        => 'Elegant Favorit',
                'price'       => 56000000,
                'pax'         => 500,
                'description' => 'Paket outdoor favorit berkelas dengan MC, live music akustik, WO profesional, dekorasi megah, tenda VIP, dan catering.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['WO'],
                    $detailFacilities['Dekorasi_Outdoor'],
                    $detailFacilities['Tenda_Catering_B3'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 3,
                'name'        => 'Signature Day',
                'price'       => 89000000,
                'pax'         => 700,
                'description' => 'Paket signature untuk hari istimewa dengan upacara adat mewah, WO full team, live band, tenda full dekorasi, dan catering prasmanan.',
                'categories'  => [
                    $detailFacilities['MUA_Luxury'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Music_MC_Premium'],
                    $detailFacilities['Dekorasi_Outdoor'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Tenda_Catering_B3'],
                    $detailFacilities['WO_Full'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 3,
                'name'        => 'Elegant Luxury',
                'price'       => 110000000,
                'pax'         => 1000,
                'description' => 'Paket luxury outdoor terlengkap dengan adat, WO full team, tenda istimewa, catering melimpah, dan semua fasilitas bintang lima.',
                'categories'  => [
                    $detailFacilities['MUA_Luxury'],
                    $detailFacilities['Dekorasi_Luxury'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Music_MC_Premium'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Tenda_Catering_B3'],
                    $detailFacilities['WO_Full'],
                    $detailFacilities['Bonus'],
                ],
            ],

            // ══════════════════════════════════════════════════════════════════════
            // BATCH 4 — Venue (Gedung)
            // ══════════════════════════════════════════════════════════════════════
            [
                'batch'       => 4,
                'name'        => 'Luxury Start',
                'price'       => 42000000,
                'pax'         => 400,
                'description' => 'Paket luxury di venue gedung mewah dengan catering eksklusif, dekorasi gedung menawan, dan dokumentasi lengkap.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dokumentasi_Standard'],
                    $detailFacilities['Music_MC'],
                    $detailFacilities['Dekorasi_Luxury'],
                    $detailFacilities['Venue'],
                    $detailFacilities['Tenda_Catering_B2'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 4,
                'name'        => 'Luxury Favorit',
                'price'       => 76000000,
                'pax'         => 600,
                'description' => 'Paket luxury favorit di gedung dengan WO profesional, dekorasi pelaminan megah, live band, catering pilihan, dan dokumentasi.',
                'categories'  => [
                    $detailFacilities['MUA_Full'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Music_MC_Premium'],
                    $detailFacilities['Dekorasi_Luxury'],
                    $detailFacilities['Venue'],
                    $detailFacilities['Tenda_Catering_B3'],
                    $detailFacilities['WO'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 4,
                'name'        => 'Luxury Signature',
                'price'       => 99000000,
                'pax'         => 800,
                'description' => 'Paket signature di gedung mewah dengan prosesi adat agung, WO penuh, dokumentasi sinematik, live music, dan catering VIP.',
                'categories'  => [
                    $detailFacilities['MUA_Luxury'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Music_MC_Premium'],
                    $detailFacilities['Dekorasi_Luxury'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Venue'],
                    $detailFacilities['Tenda_Catering_B3'],
                    $detailFacilities['WO_Full'],
                    $detailFacilities['Bonus'],
                ],
            ],
            [
                'batch'       => 4,
                'name'        => 'Ultimate Dream',
                'price'       => 130000000,
                'pax'         => 1000,
                'description' => 'Paket pernikahan terlengkap dan termewah di gedung ballroom — seluruh fasilitas MUA senior, Dekorasi Ultra Luxury, Adat, Venue, Catering VIP, WO Full Team, Foto & Video Cinema, Live Band, MC dan Bonus Istimewa.',
                'categories'  => [
                    $detailFacilities['MUA_Luxury'],
                    $detailFacilities['Dokumentasi_Premium'],
                    $detailFacilities['Music_MC_Premium'],
                    $detailFacilities['Dekorasi_Luxury'],
                    $detailFacilities['Adat'],
                    $detailFacilities['Venue'],
                    $detailFacilities['Tenda_Catering_B3'],
                    $detailFacilities['WO_Full'],
                    $detailFacilities['Bonus'],
                ],
            ],
        ];

        foreach ($packages as $data) {
            $categories = $data['categories'];
            unset($data['categories']);

            $facilitiesText = $this->buildFacilitiesText($categories);

            Package::updateOrCreate(
                ['name' => $data['name'], 'batch' => $data['batch']],
                array_merge($data, [
                    'facilities_json' => $categories,
                    'facilities'      => $facilitiesText,
                    'status'          => 'active',
                ])
            );
        }

        $this->command->info('✅ 16 Paket Pernikahan berhasil di-seed dengan detail fasilitas lengkap!');
    }

    private function buildFacilitiesText(array $facilitiesJson): string
    {
        $lines = [];
        foreach ($facilitiesJson as $group) {
            $lines[] = '== ' . ($group['category'] ?? '') . ' ==';
            foreach ($group['items'] ?? [] as $item) {
                $lines[] = '- ' . $item;
            }
        }
        return implode("\n", $lines);
    }
}
