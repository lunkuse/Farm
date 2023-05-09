<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageVaccinationRecordVaccineAgainstPivotTable extends Migration
{
    public function up()
    {
        Schema::create('manage_vaccination_record_vaccine_against', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_vaccination_record_id');
            $table->foreign('manage_vaccination_record_id', 'manage_vaccination_record_id_fk_8288487')->references('id')->on('manage_vaccination_records')->onDelete('cascade');
            $table->unsignedBigInteger('vaccine_against_id');
            $table->foreign('vaccine_against_id', 'vaccine_against_id_fk_8288487')->references('id')->on('vaccine_againsts')->onDelete('cascade');
        });
    }
}
