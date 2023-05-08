<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenderManagebreedingRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('gender_managebreeding_record', function (Blueprint $table) {
            $table->unsignedBigInteger('managebreeding_record_id');
            $table->foreign('managebreeding_record_id', 'managebreeding_record_id_fk_8291228')->references('id')->on('managebreeding_records')->onDelete('cascade');
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id', 'gender_id_fk_8291228')->references('id')->on('genders')->onDelete('cascade');
        });
    }
}
