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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id(); // Tạo cột id là khóa chính kiểu BIGINT và tự động tăng
            $table->string('tax_name', 100); // Cột tên loại thuế kiểu VARCHAR với độ dài tối đa 100 ký tự
            $table->decimal('rate', 5, 2); // Cột mức thuế suất kiểu DECIMAL(5,2)
            $table->timestamps(); // Tạo cột created_at và updated_at kiểu TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
