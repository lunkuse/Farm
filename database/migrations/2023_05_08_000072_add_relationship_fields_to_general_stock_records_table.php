<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGeneralStockRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('general_stock_records', function (Blueprint $table) {
            $table->unsignedBigInteger('shelter_id')->nullable();
            $table->foreign('shelter_id', 'shelter_fk_8288036')->references('id')->on('shelters');
            $table->unsignedBigInteger('animal_type_id')->nullable();
            $table->foreign('animal_type_id', 'animal_type_fk_8346479')->references('id')->on('stock_types');
            $table->unsignedBigInteger('breed_id')->nullable();
            $table->foreign('breed_id', 'breed_fk_8288033')->references('id')->on('breeds');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id', 'gender_fk_8438759')->references('id')->on('genders');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id', 'color_fk_8288035')->references('id')->on('colors');
            $table->unsignedBigInteger('source_id')->nullable();
            $table->foreign('source_id', 'source_fk_8288037')->references('id')->on('sources');
        });
    }
}
