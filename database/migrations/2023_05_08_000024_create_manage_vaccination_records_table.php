<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageVaccinationRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('manage_vaccination_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('other_vaccination_against')->nullable();
            $table->string('other_category')->nullable();
            $table->date('next_vac_date_month_yea_r')->nullable();
            $table->string('attending_officer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
