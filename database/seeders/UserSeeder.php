<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Password default: 'password' (dan sistem login juga menerima 'Password123#')
        $defaultPassword = Hash::make('password');

        $users = [
            [
                'email' => 'superadmin@pesantren.test',
                'name' => 'Super Administrator',
                'phone' => '081234567890',
                'role' => UserRole::SUPER_ADMIN,
                'is_active' => true,
                'email_verified_at' => now(),
                'password' => $defaultPassword,
            ],
            [
                'email' => 'editor@pesantren.test',
                'name' => 'Editor Humas Pesantren',
                'phone' => '081234567891',
                'role' => UserRole::EDITOR,
                'is_active' => true,
                'email_verified_at' => now(),
                'password' => $defaultPassword,
            ],
            [
                'email' => 'petugas@pesantren.test',
                'name' => 'Petugas Panitia PSB',
                'phone' => '081234567892',
                'role' => UserRole::PSB_OFFICER,
                'is_active' => true,
                'email_verified_at' => now(),
                'password' => $defaultPassword,
            ],
            [
                'email' => 'santri1@example.com',
                'name' => 'Ahmad Fulan (Wali Santri 1)',
                'phone' => '081234567893',
                'role' => UserRole::APPLICANT,
                'is_active' => true,
                'email_verified_at' => now(),
                'password' => $defaultPassword,
            ],
            [
                'email' => 'santri2@example.com',
                'name' => 'Muhammad Budi (Wali Santri 2)',
                'phone' => '081234567894',
                'role' => UserRole::APPLICANT,
                'is_active' => true,
                'email_verified_at' => now(),
                'password' => $defaultPassword,
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }
    }
}
