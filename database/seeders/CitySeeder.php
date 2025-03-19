<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['name' => 'Jakarta', 'province_id' => 1],
            ['name' => 'Surabaya', 'province_id' => 2],
            ['name' => 'Bandung', 'province_id' => 3],
            ['name' => 'Medan', 'province_id' => 4],
            ['name' => 'Semarang', 'province_id' => 5],
            ['name' => 'Yogyakarta', 'province_id' => 6],
            ['name' => 'Malang', 'province_id' => 2],
            ['name' => 'Denpasar', 'province_id' => 7],
            ['name' => 'Makassar', 'province_id' => 8],
            ['name' => 'Palembang', 'province_id' => 9],
        ];

        foreach ($cities as $city) {
            City::create([
                'name' => $city['name'],
                'province_id' => $city['province_id'],
                'archived' => 'N',
                'create_id' => '1',
                'update_id' => '1'
            ]);
        }
    }
}