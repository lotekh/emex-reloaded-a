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
            $table->foreignId('og_image_id')->nullable()->constrained('media');
            $table->foreignId('consumption_og_image_id')->nullable()->constrained('media');
            $table->foreignId('twitter_image_id')->nullable()->constrained('media');
            $table->foreignId('consumption_twitter_image_id')->nullable()->constrained('media');
            $table->foreignId('featured_image_id')->nullable()->constrained('media');

            $table->string('slug')->unique();
            $table->string('name');
            $table->string('plain_name')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('category_page_title')->nullable();
            $table->string('category_page_link_title')->nullable();
            $table->string('h2_contact_title')->nullable();
            $table->string('h3_contact_title')->nullable();
            $table->string('price_disclaimer')->nullable();

            $table->text('category_page_description')->nullable();
            $table->text('description')->nullable();
            $table->text('usage_details')->nullable();
            $table->text('technical_details')->nullable();

            $table->boolean('active')->default(0);
            $table->boolean('has_palette')->default(1);
            $table->boolean('has_instructions')->default(1);
            $table->boolean('has_calculus')->default(1);
            $table->boolean('has_technical_file')->default(1);
            $table->boolean('has_hardener')->default(1);
            $table->boolean('is_package')->nullable();

            $table->json('seo')->nullable();
            $table->json('jsonld')->nullable();
            $table->json('consumption')->nullable();
            $table->json('consumption_seo')->nullable();
            $table->json('consumption_jsonld')->nullable();

            $table->string('consumption_slug')->nullable();
            $table->string('application_slug')->nullable();

            $table->date('available_since')->nullable();
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
