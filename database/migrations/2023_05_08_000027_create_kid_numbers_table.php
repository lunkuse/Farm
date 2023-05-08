<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKidNumbersTable extends Migration
{
    public function up()
    {
        Schema::create('kid_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('number')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
