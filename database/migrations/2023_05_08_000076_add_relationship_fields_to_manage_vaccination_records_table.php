<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManageVaccinationRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('manage_vaccination_records', function (Blueprint $table) {
            $table->unsignedBigInteger('shelter_id')->nullable();
            $table->foreign('shelter_id', 'shelter_fk_8436435')->references('id')->on('shelters');
        });
    }
}
