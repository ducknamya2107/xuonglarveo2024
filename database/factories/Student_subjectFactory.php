<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student_subject>
 */
class Student_subjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(), // Tạo sinh viên giả
            'subject_id' => Subject::factory(), // Tạo môn học giả
        ];
    }
}
