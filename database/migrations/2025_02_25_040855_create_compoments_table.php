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
        Schema::create('compoments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->string('type');
            $table->string('capacity');
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
        Schema::dropIfExists('compoments');
    }
};
