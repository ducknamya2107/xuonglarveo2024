<?php

namespace Database\Seeders;

use App\Models\Student_subject;
use App\Models\StudentSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student_subject::factory()->count(10)->create(); // Tạo 10 môn học
    }
}
