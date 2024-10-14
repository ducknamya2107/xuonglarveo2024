<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tableuser>
 */
class TableuserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Tên ngẫu nhiên
            'email' => fake()->unique()->safeEmail(), // Email ngẫu nhiên và duy nhất
            'email_verified_at' => now(), // Thời gian xác thực email là thời gian hiện tại
            'password' => bcrypt('password'), // Mã hóa một mật khẩu giả định
            'role' => fake()->randomElement(['admin', 'employee', 'customer']), // Chọn ngẫu nhiên một vai trò
            'is_active' => fake()->boolean(80),
        ];
    }
}
