<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Instagram Access Token (Basic Display API)
    |--------------------------------------------------------------------------
    |
    | Token untuk mengakses postingan akun Instagram utama Kembar Kencana.
    | Dapatkan dari: https://developers.facebook.com → Instagram Basic Display
    |
    | PENTING: Long-Lived Token berlaku 60 hari. Jalankan perintah berikut
    | setiap bulan untuk memperpanjang:
    |
    |   php artisan instagram:sync --refresh-token
    |
    */
    'access_token' => env('INSTAGRAM_ACCESS_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | Instagram App ID & App Secret
    |--------------------------------------------------------------------------
    |
    | Dari Meta Developer Dashboard → Your App → Settings → Basic.
    | App Secret digunakan untuk memverifikasi webhook (opsional).
    |
    */
    'app_id'     => env('INSTAGRAM_APP_ID', ''),
    'app_secret' => env('INSTAGRAM_APP_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | Facebook Page Token (Opsional — untuk foto profil vendor via Graph API)
    |--------------------------------------------------------------------------
    |
    | Diperlukan jika menggunakan Instagram Graph API dengan akun Business.
    | Dapatkan: https://developers.facebook.com → Graph API Explorer
    |
    */
    'page_token' => env('INSTAGRAM_PAGE_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | Jumlah Postingan yang Diambil per Sinkronisasi
    |--------------------------------------------------------------------------
    */
    'fetch_limit' => env('INSTAGRAM_FETCH_LIMIT', 12),

];
