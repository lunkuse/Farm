<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrchardRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('orchard_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->integer('fruits_harvested')->nullable();
            $table->integer('fruits_cleaned')->nullable();
            $table->integer('fruits_sorted_out')->nullable();
            $table->integer('fruits_eaten')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
