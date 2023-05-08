<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralStockRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('general_stock_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('other_animal_type')->nullable();
            $table->string('tag_no')->nullable();
            $table->string('other_breed')->nullable();
            $table->date('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('other_color')->nullable();
            $table->string('other_source')->nullable();
            $table->longText('comments')->nullable();
            $table->string('availability')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
