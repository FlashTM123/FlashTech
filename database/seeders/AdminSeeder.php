<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Admin123',
                'email' => 'admin@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'phone' => '0123456789',
                'profile_image' => null,

            ],
        ];
        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
