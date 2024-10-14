<?php

namespace Database\Seeders;

use App\Models\Student_subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Student_subjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student_subject::factory()->count(10)->create();
    }
}
