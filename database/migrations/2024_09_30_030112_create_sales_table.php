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
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Tạo cột id kiểu BIGINT và tự động tăng (Primary Key)
            $table->foreignId('product_id')->constrained('products'); // Tạo khóa ngoại tham chiếu đến bảng products(id)
            $table->integer('quantity'); // Cột số lượng kiểu INT
            $table->decimal('price', 10, 2); // Cột giá bán đơn vị kiểu DECIMAL với 10 chữ số, 2 chữ số sau dấu thập phân
            $table->decimal('tax', 10, 2); // Cột thuế VAT kiểu DECIMAL với 10 chữ số, 2 chữ số sau dấu thập phân
            $table->decimal('total', 10, 2); // Cột tổng giá trị giao dịch kiểu DECIMAL
            $table->date('sale_date'); // Cột ngày thực hiện giao dịch kiểu DATE
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
