<?php

namespace Database\Factories\Tenant;

use App\Models\Tenant\Allergy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AllergyFactory extends Factory
{
    protected $model = Allergy::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => \App\Models\Tenant\Patient::factory(),
            'allergy_name' => $this->faker->word(),
        ];
    }
}
