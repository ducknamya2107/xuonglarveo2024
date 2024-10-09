<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->date(),
            'hire_date' => $this->faker->dateTime(),
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'is_active' => $this->faker->boolean,
            'department_id' => $this->faker->numberBetween(1, 10), // Giả sử bạn có từ 1-10 phòng ban
            'manager_id' => $this->faker->numberBetween(1, 10), // Giả sử bạn có từ 1-10 quản lý
            'address' => $this->faker->address,
            // 'profile_picture' => null, // Để null hoặc lưu đường dẫn giả định nếu cần
        ];
    }
}
