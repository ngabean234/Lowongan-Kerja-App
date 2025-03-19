<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['name' => 'DKI Jakarta', 'country_id' => 1],
            ['name' => 'Jawa Timur', 'country_id' => 1],
            ['name' => 'Jawa Barat', 'country_id' => 1],
            ['name' => 'Sumatera Utara', 'country_id' => 1],
            ['name' => 'Jawa Tengah', 'country_id' => 1],
            ['name' => 'DI Yogyakarta', 'country_id' => 1],
            ['name' => 'Bali', 'country_id' => 1],
            ['name' => 'Sulawesi Selatan', 'country_id' => 1],
            ['name' => 'Sumatera Selatan', 'country_id' => 1],
        ];

        foreach ($provinces as $province) {
            Province::create([
                'name' => $province['name'],
                'country_id' => $province['country_id'],
                'archived' => 'N',
                'create_id' => '1',
                'update_id' => '1'
            ]);
        }
    }
}