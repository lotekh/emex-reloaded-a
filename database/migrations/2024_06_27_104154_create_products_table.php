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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('plain_name')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('category_page_description')->nullable();
            $table->string('category_page_link_title')->nullable();
            $table->string('category_page_title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('usage_details')->nullable();
            $table->longText('technical_details')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('has_palette')->default(1);
            $table->boolean('has_instructions')->default(1);
            $table->boolean('has_calculus')->default(1);
            $table->boolean('has_technical_file')->default(1);
            $table->boolean('has_hardener')->default(1);
            $table->string('h2_contact_title')->nullable();
            $table->string('h3_contact_title')->nullable();
            $table->string('price_disclaimer')->nullable();
            $table->date('available_since')->nullable();
            $table->boolean('is_package')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
