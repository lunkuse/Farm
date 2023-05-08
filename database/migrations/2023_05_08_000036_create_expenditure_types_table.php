<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenditureTypesTable extends Migration
{
    public function up()
    {
        Schema::create('expenditure_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
