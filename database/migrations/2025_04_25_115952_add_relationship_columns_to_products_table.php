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
        Schema::table('products', function (Blueprint $table) {
            // $table->Integer('laptop_id')->nullable()->after('id');
            // $table->Integer('component_id')->nullable()->after('laptop_id');
            $table->Integer('accessories_id')->nullable()->after('component_id');

            $table->foreign('laptop_id')->references('id')->on('laptops')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            $table->foreign('accessories_id')->references('id')->on('accessories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['laptop_id']);
            $table->dropForeign(['component_id']);
            $table->dropForeign(['accessories_id']);
            $table->dropColumn(['laptop_id', 'component_id', 'accessories_id']);
        });
    }
};
