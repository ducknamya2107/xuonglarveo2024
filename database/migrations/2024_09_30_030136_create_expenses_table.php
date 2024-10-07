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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Tạo cột id kiểu BIGINT và tự động tăng (Primary Key)
            $table->string('description', 255); // Cột mô tả chi phí kiểu VARCHAR với độ dài tối đa 255 ký tự
            $table->decimal('amount', 10, 2); // Cột số tiền chi phí kiểu DECIMAL với 10 chữ số, 2 chữ số sau dấu thập phân
            $table->date('expense_date'); // Cột ngày phát sinh chi phí kiểu DATE
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
