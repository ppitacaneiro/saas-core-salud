<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $sql = file_get_contents(database_path('sql/spain_municipios_INE.sql'));
            DB::unprepared($sql);
        } catch (\Exception $e) {
            $this->command->error('Error seeding municipalities: ' . $e->getMessage());
        }
    }
}
