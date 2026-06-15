<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Seed data vendor dari data hardcoded landing page.
     */
    public function run(): void
    {
        $vendors = [
            [
                'name'          => 'Kembar Kencana Planner',
                'handle'        => '@kembarkencanaplanner',
                'category'      => 'Wedding Planning',
                'icon'          => 'bi-heart-fill',
                'image'         => 'images/logo.JPG',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/kembarkencanaplanner?igsh=MTU2eWVjdTVjYm8zaQ==',
            ],
            [
                'name'          => 'Rin Kencana',
                'handle'        => '@rin_kencana',
                'category'      => 'MUA',
                'icon'          => 'bi-stars',
                'image'         => 'images/rinmua.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/rin_kencana?igsh=MTB4YW4yNTRrdnp3Yg==',
            ],
            [
                'name'          => 'Fajar Make Up',
                'handle'        => '@fajar_makeupp',
                'category'      => 'MUA',
                'icon'          => 'bi-stars',
                'image'         => 'images/fajarmua.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/fajar_makeupp?igsh=MWk5MTNrYXd3d3Vsdg==',
            ],
            [
                'name'          => 'Cindy Prof Make Up',
                'handle'        => '@cindyprof_makeup',
                'category'      => 'MUA',
                'icon'          => 'bi-stars',
                'image'         => 'images/cindymua.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/cindyprof_makeup?igsh=MTlla3I0dG42NG00cQ==',
            ],
            [
                'name'          => 'Kencana Decor',
                'handle'        => '@kencanadecor_',
                'category'      => 'Dekorasi',
                'icon'          => 'bi-flower1',
                'image'         => 'images/kd.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/kencanadecor_?igsh=eDJ5N3E0aGRxdDho',
            ],
            [
                'name'          => 'Hafiz Decoration',
                'handle'        => '@hafiz.decoration',
                'category'      => 'Dekorasi',
                'icon'          => 'bi-flower1',
                'image'         => 'images/hafizde.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/hafiz.decoration/',
            ],
            [
                'name'          => 'Sejiwa Fotografi',
                'handle'        => '@sejiwa.fotografi',
                'category'      => 'Dokumentasi',
                'icon'          => 'bi-camera-fill',
                'image'         => 'images/sejiwa.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/sejiwa.fotografi?igsh=MWdlM3R5ZnlwMHJwbg==',
            ],
            [
                'name'          => 'Ini Kisahku Photography',
                'handle'        => '@inikisahkuphotography',
                'category'      => 'Dokumentasi',
                'icon'          => 'bi-camera-fill',
                'image'         => 'images/inikisah.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/inikisahkuphotography?igsh=N2ZhbWEwa28wdG9i',
            ],
            [
                'name'          => 'Miko Photography',
                'handle'        => '@mikopho',
                'category'      => 'Dokumentasi',
                'icon'          => 'bi-camera-fill',
                'image'         => 'images/miko.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/mikopho?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
            [
                'name'          => 'Dapur Mainay Catering',
                'handle'        => '@dapur_mainaycatering',
                'category'      => 'Catering',
                'icon'          => 'bi-cup-hot-fill',
                'image'         => 'images/mainay.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/dapur_mainaycatering?igsh=andpamhlaGw3M3d3',
            ],
            [
                'name'          => 'Pratama Catering Decor',
                'handle'        => '@pratama_cateringdecor',
                'category'      => 'Catering',
                'icon'          => 'bi-cup-hot-fill',
                'image'         => 'images/pratama.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/pratama_cateringdecor?igsh=MTFvNHVhZWp1M3F5aw==',
            ],
            [
                'name'          => 'Karina Catering Decoration',
                'handle'        => '@karina_catering_decoration',
                'category'      => 'Catering',
                'icon'          => 'bi-cup-hot-fill',
                'image'         => 'images/karina.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/karina_catering_decoration?igsh=MXFpMnU0MDk5ank1YQ==',
            ],
            [
                'name'          => 'De Maniz Entertainment',
                'handle'        => '@de_maniz_entertainment',
                'category'      => 'Entertainment',
                'icon'          => 'bi-music-note-beamed',
                'image'         => 'images/demaniz.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/de_maniz_entertainment?igsh=cjB0MXdrOTlpb3Bp',
            ],
            [
                'name'          => 'Adinda Music Entertainment',
                'handle'        => '@adindamusicent',
                'category'      => 'Music',
                'icon'          => 'bi-music-note-beamed',
                'image'         => 'images/adinda.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/adindamusicent?igsh=MXF4MG9ocjRkcTV0cQ==',
            ],
            [
                'name'          => 'Paranada Music',
                'handle'        => '@paranadamusic',
                'category'      => 'Music',
                'icon'          => 'bi-music-note-beamed',
                'image'         => 'images/paranada.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/paranadamusic?igsh=czV5eXlpZmU5MnVv',
            ],
            [
                'name'          => 'Yogaindrajuniara',
                'handle'        => '@yogaindrajuniara',
                'category'      => 'MC',
                'icon'          => 'bi-mic-fill',
                'image'         => 'images/yogamc.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/yogaindrajuniara?igsh=Mjl5bjBna3M4cjBq',
            ],
            [
                'name'          => 'Maul Arian',
                'handle'        => '@maul_arian',
                'category'      => 'MC',
                'icon'          => 'bi-mic-fill',
                'image'         => 'images/maulmc.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/maul_arian?igsh=c2o4NTFzdWkxZDdm',
            ],
            [
                'name'          => 'Jang Asep MC',
                'handle'        => '@jangasep.mc',
                'category'      => 'MC',
                'icon'          => 'bi-mic-fill',
                'image'         => 'images/jangmc.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/jangasep.mc?igsh=bTBweTA1ZG5ndG1u',
            ],
            [
                'name'          => 'Dandi Jaelani',
                'handle'        => '@danjae.mc',
                'category'      => 'MC',
                'icon'          => 'bi-mic-fill',
                'image'         => 'images/dandimc.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/danjae.mc?igsh=eTVjYTZycWJlejVh',
            ],
            [
                'name'          => 'Whendy Arrarem',
                'handle'        => '@whendyarrarem.mc',
                'category'      => 'MC',
                'icon'          => 'bi-mic-fill',
                'image'         => 'images/whendymc.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/whendyarrarem.mc?igsh=czR5bWtvYzUyN3Jl',
            ],
            [
                'name'          => 'ACE Production',
                'handle'        => '@ace.production__',
                'category'      => 'Upacara Adat',
                'icon'          => 'bi-award-fill',
                'image'         => 'images/ace.jpg',
                'description'   => '',
                'instagram_url' => 'https://www.instagram.com/ace.production__?igsh=MXFlM3JtMnd6NTJ2YQ==',
            ],
        ];

        foreach ($vendors as $index => $vendor) {
            Vendor::create(array_merge($vendor, [
                'status'     => 'active',
                'sort_order' => $index,
            ]));
        }
    }
}
