<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TenantDatabaseSeeder extends Seeder
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminSeeder = new AdminTenantSeeder($this->data['email'], $this->data['password']);
        $adminSeeder->run();

        // faker data seeders
        $this->call([
            PatientSeeder::class,
            AllergySeeder::class,
            MedicationSeeder::class,
            SpecialitySeeder::class,
            // Add other tenant-specific seeders here
        ]);
    }
}
