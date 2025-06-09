<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'World of Warcraft (WoW)',
            'description' => 'test@example.com',
            'image' => 'categories/1.webp',
        ]);

        DB::table('categories')->insert([
            'name' => 'گیفت کارت‌ها',
            'description' => 'test@example.com',
            'image' => 'categories/2.webp',
        ]);
        DB::table('categories')->insert([
            'name' => 'فروش بازی',
            'description' => 'test@example.com',
            'image' => 'categories/3.webp',
        ]);
        DB::table('categories')->insert([
            'name' => 'فروش اکانت بازی',
            'description' => 'test@example.com',
            'image' => 'categories/4.webp',
        ]);
        DB::table('categories')->insert([
            'name' => 'اشتراک‌های ویژه',
            'description' => 'test@example.com',
            'image' => 'categories/5.webp',
        ]);
        DB::table('categories')->insert([
            'name' => 'New World',
            'description' => 'test@example.com',
            'image' => 'categories/6.webp',
        ]);
        DB::table('categories')->insert([
            'name' => 'درخواست آیتم بازی',
            'description' => 'test@example.com',
            'image' => 'categories/7.webp',
        ]);
        DB::table('categories')->insert([
            'name' => 'Throne and Liberty',
            'description' => 'test@example.com',
            'image' => 'categories/8.webp',
        ]);
    }
}
