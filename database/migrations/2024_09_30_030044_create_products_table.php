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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Tạo cột id kiểu BIGINT và tự tăng (Primary Key)
            $table->string('name', 255); // Cột name kiểu VARCHAR với độ dài tối đa 255 ký tự
            $table->decimal('price', 10, 2); // Cột price kiểu DECIMAL với độ chính xác 10,2 (10 tổng số chữ số, 2 chữ số thập phân)
            $table->timestamps(); // Tạo 2 cột created_at và updated_at kiểu TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
