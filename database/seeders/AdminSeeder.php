<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan role admin sudah ada (dibuat via seeder ini jika belum ada)
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Buat akun admin
        $admin = User::firstOrCreate([
            'email' => 'admin@glucowise.com',
        ], [
            'name' => 'Administrator',
            'password' => bcrypt('password123'),
        ]);

        $admin->assignRole($role);
    }
}
