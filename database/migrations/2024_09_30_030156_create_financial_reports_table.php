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
        Schema::create('financial_reports', function (Blueprint $table) {
            $table->id(); // Tạo cột id kiểu BIGINT và tự tăng (Primary Key)
            $table->integer('month'); // Cột tháng kiểu INT
            $table->integer('year'); // Cột năm kiểu INT
            $table->decimal('total_sales', 10, 2); // Cột tổng doanh thu kiểu DECIMAL(10,2)
            $table->decimal('total_expenses', 10, 2); // Cột tổng chi phí kiểu DECIMAL(10,2)
            $table->decimal('profit_before_tax', 10, 2); // Cột lợi nhuận trước thuế kiểu DECIMAL(10,2)
            $table->decimal('tax_amount', 10, 2); // Cột số tiền thuế phải nộp kiểu DECIMAL(10,2)
            $table->decimal('profit_after_tax', 10, 2); // Cột lợi nhuận sau thuế kiểu DECIMAL(10,2)
            $table->timestamps(); // Tạo cột created_at và updated_at kiểu TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_reports');
    }
};
