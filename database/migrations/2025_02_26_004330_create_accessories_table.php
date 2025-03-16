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
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('color_id')->constrained('colors');
            $table->string('type');
            $table->decimal('original_price', 8, 0)->nullable();
            $table->integer('discount')->default(0);
            $table->decimal('promotional_price', 8, 0)->nullable();
            $table->integer('quantity')->default(1);
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories');
    }
};
