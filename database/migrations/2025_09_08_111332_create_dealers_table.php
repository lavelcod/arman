<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->json('name');       // نام نمایندگی چندزبانه
            $table->json('address');    // آدرس چندزبانه
            $table->json('city');       // شهر چندزبانه
            $table->string('seller_name'); // نام فروشنده
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dealers');
    }
};
