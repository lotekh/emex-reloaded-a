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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->string('last_name');
            $table->string('role', 12)->default('user');
            $table->string('phone', 20)->nullable();
            $table->boolean('billing_type')->nullable();
            $table->string('person_first_name')->nullable();
            $table->string('person_last_name')->nullable();
            $table->foreignId('person_county_id')->nullable()->constrained('counties', 'id');
            $table->string('person_city')->nullable();
            $table->string('person_address')->nullable();
            $table->string('person_phone', 20)->nullable();
            $table->string('person_email')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_vat_code')->nullable();
            $table->string('organization_bank')->nullable();
            $table->string('organization_bank_account')->nullable();
            $table->foreignId('organization_county_id')->nullable()->constrained('counties', 'id');
            $table->string('organization_city')->nullable();
            $table->string('organization_address')->nullable();
            $table->string('organization_phone')->nullable();
            $table->string('organization_email')->nullable();
            $table->boolean('delivery_type');
            $table->string('delivery_last_name')->nullable();
            $table->string('delivery_first_name')->nullable();
            $table->string('delivery_phone', 20)->nullable();
            $table->foreignId('delivery_county_id')->nullable()->constrained('counties', 'id');
            $table->string('delivery_city')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name', 'name');
            $table->dropColumn('last_name');
            $table->dropColumn('role');
            $table->dropColumn('phone');
            $table->dropColumn('billing_type');
        });
    }
};
