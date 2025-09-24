php artisan make:migration create_categories_table
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // کلید اصلی
            $table->json('name');   // نام دسته‌بندی برای چند زبان
            $table->string('image')->nullable(); // تصویر دسته‌بندی
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

