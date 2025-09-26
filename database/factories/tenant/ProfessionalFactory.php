<?php

namespace Database\Factories\Tenant;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant\Professional>
 */
class ProfessionalFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'speciality_id' => \App\Models\Tenant\Speciality::inRandomOrder()->first()->id,
            'license_number' => strtoupper($this->faker->bothify('??######')),
            'address' => $this->faker->address(),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
