<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            ['key' => 'site_name', 'value' => 'فروشگاه من'],
            ['key' => 'currency', 'value' => 'تومان'],
            ['key' => 'tax_rate', 'value' => '9'],
            ['key' => 'shipping_cost', 'value' => '25000'],
            ['key' => 'default_language', 'value' => 'fa'],
            ['key' => 'payment_methods', 'value' => 'paypal, stripe, cod'],
            ['key' => 'admin_email', 'value' => 'admin@example.com'],
        ]);
    }
}
