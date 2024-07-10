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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id');
            $table->boolean('delivery_type');
            $table->string('delivery_last_name')->nullable();
            $table->string('delivery_first_name')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->foreignId('delivery_county_id')->nullable()->constrained('counties', 'id');
            $table->string('delivery_city')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_email')->nullable();
            $table->boolean('billing_type');
            $table->string('person_last_name')->nullable();
            $table->string('person_first_name')->nullable();
            $table->string('person_phone')->nullable();
            $table->foreignId('person_county_id')->nullable()->constrained('counties', 'id');
            $table->string('person_city')->nullable();
            $table->string('person_address')->nullable();
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
            $table->uuid('guid');
            $table->string('payment_method');
            $table->double('total');
            $table->string('identifier');
            $table->boolean('is_paid')->default(0);
            $table->double('transport_price')->default(0);
            $table->double('transport_price_no_tva')->default(0);
            $table->double('total_no_tva')->default(0);
            $table->foreignId('discount_code_id')->nullable()->constrained('discount_codes', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
