<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePurposesTable extends Migration
{
    public function up()
    {
        Schema::create('sale_purposes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purpose');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
