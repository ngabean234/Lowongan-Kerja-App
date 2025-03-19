<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run()
    {
        Country::create([
            'name' => 'Indonesia',
            'archived' => 'N',
            'create_id' => '1',
            'update_id' => '1'
        ]);
    }
}