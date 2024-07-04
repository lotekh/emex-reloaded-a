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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');
            $table->string('title');
            $table->string('meta_keywords');
            $table->longText('meta_description');
            $table->string('og_title');
            $table->string('og_image');
            $table->string('og_image_secure_url');
            $table->string('og_image_image_width');
            $table->string('og_image_image_height');
            $table->string('og_image_image_alt');
            $table->string('og_description');
            $table->string('twitter_image');
            $table->string('twitter_image_alt');
            $table->string('twitter_title');
            $table->string('twitter_description');
            $table->timestamps();

            //We'll set as settings (they do not change at all)
            // $table->string('og_site_name');
            // $table->string('fb_app_id');
            // $table->string('twitter_card');
            // $table->string('twitter_site');
            // $table->string('og_type');
            // $table->string('og_locale');

            //Can be obtained from slugs
            // $table->string('twitter_url');
            // $table->string('og_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
