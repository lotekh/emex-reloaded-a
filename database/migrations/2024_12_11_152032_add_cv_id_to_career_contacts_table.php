<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('career_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('cv_id')->nullable()->after('message');
            $table->foreign('cv_id')->references('id')->on('media')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('career_contacts', function (Blueprint $table) {
            $table->dropForeign(['cv_id']);
            $table->dropColumn('cv_id');
        });
    }

};
