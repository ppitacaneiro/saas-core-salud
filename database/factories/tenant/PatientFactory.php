<?php

namespace Database\Factories\tenant;

use App\Models\Province;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'document_type' => $this->faker->randomElement(['DNI', 'NIE', 'PAS']),
            'document_number' => $this->faker->unique()->bothify('########?'),
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['H', 'M', 'O']),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'province_id' => Province::inRandomOrder()->first()->id,
            'municipality_id' => Municipality::inRandomOrder()->first()->id,
            'postal_code' => $this->faker->postcode(),
            'notes' => $this->faker->text(200),
        ];
    }
}
