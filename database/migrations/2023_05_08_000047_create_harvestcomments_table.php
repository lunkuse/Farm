<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarvestcommentsTable extends Migration
{
    public function up()
    {
        Schema::create('harvestcomments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
