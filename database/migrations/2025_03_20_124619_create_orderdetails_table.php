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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->unsignedInteger('order_id'); // Define order_id column
            $table->unsignedInteger('product_id'); // Define product_id column
            $table->enum('product_type', ['laptop', 'component', 'accessories']);
            $table->integer('quantity');
            $table->decimal('price', 8, 0);
            $table->primary(['order_id', 'product_id']); // Composite primary key

            // Add foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
