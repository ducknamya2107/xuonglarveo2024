<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passport>
 */
class PassportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'passport_number' => $this->faker->unique()->numerify('P#######'),
            'issued_date' => $this->faker->date(),
            'expiry_date' => $this->faker->date('+5 years'), // Ngày hết hạn sau 5 năm
        ];
    }
}
