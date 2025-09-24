<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // کلید اصلی
            $table->json('name');
            $table->json('description')->nullable();
            $table->json('price');
            $table->unsignedTinyInteger('discount')->default(0); // تخفیف درصدی (۰ تا ۱۰۰)

            // کلید خارجی به دسته‌بندی‌ها
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
