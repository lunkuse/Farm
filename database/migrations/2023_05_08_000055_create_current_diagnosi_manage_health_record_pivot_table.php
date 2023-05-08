<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentDiagnosiManageHealthRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('current_diagnosi_manage_health_record', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_health_record_id');
            $table->foreign('manage_health_record_id', 'manage_health_record_id_fk_8288307')->references('id')->on('manage_health_records')->onDelete('cascade');
            $table->unsignedBigInteger('current_diagnosi_id');
            $table->foreign('current_diagnosi_id', 'current_diagnosi_id_fk_8288307')->references('id')->on('current_diagnosis')->onDelete('cascade');
        });
    }
}
