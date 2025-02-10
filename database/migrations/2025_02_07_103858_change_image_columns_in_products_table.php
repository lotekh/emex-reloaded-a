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
            $table->foreignId('png_small_image_id')->nullable()->constrained('media')->onDelete('set null');
            $table->foreignId('png_large_image_id')->nullable()->constrained('media')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('png_small_image_id');
            $table->dropColumn('png_large_image_id');
        });
    }
};
