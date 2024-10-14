<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->id(); // Tạo trường id tự động
            $table->unsignedBigInteger('student_id'); // Khóa ngoại cho student
            $table->unsignedBigInteger('subject_id'); // Khóa ngoại cho subject
            $table->timestamps(); // Timestamps cho created_at và updated_at

            // Định nghĩa khóa ngoại
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_subjects');
    }
};
