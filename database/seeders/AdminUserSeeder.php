<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['user_name' => 'admin'],
            [
                'name' => 'مدیر سیستم',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'p_num' => '09123456789',
            ]
        );
    }
}
