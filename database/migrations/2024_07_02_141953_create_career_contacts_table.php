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
        Schema::create('career_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code', 6)->nullable();
            $table->string('city')->nullable();
            $table->string('ip')->nullable();

            $table->text('message')->nullable();

            $table->date('date_of_birth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_contacts');
    }
};
