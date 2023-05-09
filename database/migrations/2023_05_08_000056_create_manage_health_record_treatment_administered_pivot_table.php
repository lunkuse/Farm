<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageHealthRecordTreatmentAdministeredPivotTable extends Migration
{
    public function up()
    {
        Schema::create('manage_health_record_treatment_administered', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_health_record_id');
            $table->foreign('manage_health_record_id', 'manage_health_record_id_fk_8288308')->references('id')->on('manage_health_records')->onDelete('cascade');
            $table->unsignedBigInteger('treatment_administered_id');
            $table->foreign('treatment_administered_id', 'treatment_administered_id_fk_8288308')->references('id')->on('treatment_administereds')->onDelete('cascade');
        });
    }
}
