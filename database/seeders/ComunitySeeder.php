<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $sql = file_get_contents(database_path('sql/spain_comunidades_autonomas.sql'));
            DB::unprepared($sql);

            $this->command->info('Comunities seeded!');
        } catch (\Exception $e) {
            $this->command->error('Error seeding comunities: ' . $e->getMessage());
        }
    }
}
