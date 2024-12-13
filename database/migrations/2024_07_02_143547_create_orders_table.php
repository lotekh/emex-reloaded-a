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
            $table->foreignId('delivery_city_id')->nullable()->constrained('cities', 'id');
            $table->foreignId('person_city_id')->nullable()->constrained('cities', 'id');
            $table->foreignId('company_city_id')->nullable()->constrained('cities', 'id');
            $table->foreignId('discount_code_id')->nullable()->constrained('discount_codes', 'id');

            $table->uuid('guid');
            $table->string('identifier');
            $table->string('payment_method');


            $table->decimal('transport_price', 6, 2)->default(0);
            $table->decimal('transport_price_no_tva', 6, 2)->default(0);
            $table->decimal('total_no_tva', 16, 2)->default(0);
            $table->decimal('total', 16, 2);

            $table->boolean('delivery_type');
            $table->boolean('billing_type');
            $table->boolean('is_paid')->default(0);

            $table->json('contact_information')->nullable();
            $table->json('delivery_information')->nullable();
            $table->json('company_information')->nullable();
//            $table->string('delivery_last_name')->nullable();
//            $table->string('delivery_first_name')->nullable();
//            $table->string('delivery_phone')->nullable();
//            $table->string('delivery_city')->nullable();
//            $table->string('delivery_address')->nullable();
//            $table->string('delivery_email')->nullable();

//            $table->string('person_last_name')->nullable();
//            $table->string('person_first_name')->nullable();
//            $table->string('person_phone')->nullable();
//            $table->string('person_city')->nullable();
//            $table->string('person_address')->nullable();
//            $table->string('person_email')->nullable();

//            $table->string('organization_name')->nullable();
//            $table->string('organization_vat_code')->nullable();
//            $table->string('organization_bank')->nullable();
//            $table->string('organization_bank_account')->nullable();
//            $table->string('organization_city')->nullable();
//            $table->string('organization_address')->nullable();
//            $table->string('organization_phone')->nullable();
//            $table->string('organization_email')->nullable();

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
