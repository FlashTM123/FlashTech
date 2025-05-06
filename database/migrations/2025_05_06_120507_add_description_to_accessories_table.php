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
        Schema::table('accessories', function (Blueprint $table) {
            $table->text('description')->nullable()->after('image');
            // Thêm cột description vào bảng accessories
            // Sử dụng nullable() nếu bạn muốn cột này có thể chứa giá trị null
            // Hoặc bỏ nullable() nếu bạn muốn cột này là bắt buộc
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accessories', function (Blueprint $table) {
            //
        });
    }
};
