<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $sql = file_get_contents(database_path('sql/spain_provincias.sql'));
            DB::unprepared($sql);
        } catch (\Exception $e) {
            $this->command->error('Error seeding Provinces table: ' . $e->getMessage());
        }
    }
}
