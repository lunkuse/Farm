<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManagebreedingRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('managebreeding_records', function (Blueprint $table) {
            $table->unsignedBigInteger('nanny_tag_no_id')->nullable();
            $table->foreign('nanny_tag_no_id', 'nanny_tag_no_fk_8291223')->references('id')->on('general_stock_records');
            $table->unsignedBigInteger('buck_tag_no_id')->nullable();
            $table->foreign('buck_tag_no_id', 'buck_tag_no_fk_8291224')->references('id')->on('general_stock_records');
            $table->unsignedBigInteger('animal_type_id')->nullable();
            $table->foreign('animal_type_id', 'animal_type_fk_8438836')->references('id')->on('stock_types');
            $table->unsignedBigInteger('delivery_nature_id')->nullable();
            $table->foreign('delivery_nature_id', 'delivery_nature_fk_8291226')->references('id')->on('delivery_natures');
            $table->unsignedBigInteger('kids_number_id')->nullable();
            $table->foreign('kids_number_id', 'kids_number_fk_8291227')->references('id')->on('kid_numbers');
        });
    }
}
