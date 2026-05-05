<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Buat akun admin default.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@wo.com'],
            [
                'name'     => 'Admin WO',
                'email'    => 'admin@wo.com',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );

        $this->command->info('✅ Admin user berhasil dibuat!');
        $this->command->info('   Email   : admin@wo.com');
        $this->command->info('   Password: password');
    }
}
