<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Full Time',
            'Part Time',
            'Contract',
            'Freelance',
            'Internship'
        ];

        foreach ($types as $type) {
            DB::table('tbl-job-types')->insert([
                'name' => $type,
                'archived' => 'N',
                'create_id' => '1',
                'update_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
