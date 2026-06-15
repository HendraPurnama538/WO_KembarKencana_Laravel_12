<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kembarkencana.com'],
            [
                'name'     => 'Admin Kembar Kencana',
                'email'    => 'admin@kembarkencana.com',
                'password' => Hash::make('kembarkencana2008'),
                'role'     => 'admin',
            ]
        );

        $this->command->info('✅ Admin user berhasil dibuat!');
        $this->command->info('   Email   : admin@kembarkencana.com');
        $this->command->info('   Password: kembarkencana2008');
    }
}
