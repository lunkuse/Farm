<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalHistoryManageHealthRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('clinical_history_manage_health_record', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_health_record_id');
            $table->foreign('manage_health_record_id', 'manage_health_record_id_fk_8288306')->references('id')->on('manage_health_records')->onDelete('cascade');
            $table->unsignedBigInteger('clinical_history_id');
            $table->foreign('clinical_history_id', 'clinical_history_id_fk_8288306')->references('id')->on('clinical_histories')->onDelete('cascade');
        });
    }
}
