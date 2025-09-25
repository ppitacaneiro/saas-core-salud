<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedicationFactory extends Factory
{
    protected $model = \App\Models\Tenant\Medication::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => \App\Models\Tenant\Patient::factory(),
            'medication_name' => $this->faker->word(),
            'dosage' => $this->faker->randomElement(['5mg', '10mg', '20mg', '50mg']),
            'frequency' => $this->faker->randomElement(['Once a day', 'Twice a day', 'Every 8 hours']),
        ];
    }
}
