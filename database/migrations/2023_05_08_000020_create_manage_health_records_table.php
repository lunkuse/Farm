<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageHealthRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('manage_health_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('other_clinical_history')->nullable();
            $table->string('other_current_diagnosis')->nullable();
            $table->string('other_treatment_administered')->nullable();
            $table->string('attending_officer')->nullable();
            $table->longText('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
