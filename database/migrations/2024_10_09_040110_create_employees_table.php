<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 150)->unique();
            $table->string('phone', 20);
            $table->date('date_of_birth');
            $table->dateTime('hire_date');
            $table->decimal('salary', 10, 2);
            $table->tinyInteger('is_active')->default(1);
            $table->integer('department_id')->nullable();  // Mã phòng ban (cho phép rỗng)
            $table->integer('manager_id')->nullable();  // Mã quản lý (cho phép rỗng)
            $table->text('address')->nullable();  // Địa chỉ (cho phép rỗng)
            $table->string('profile_picture')->nullable();  // Ảnh đại diện (cho phép rỗng)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
