<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralStockRecordManagebreedingRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('general_stock_record_managebreeding_record', function (Blueprint $table) {
            $table->unsignedBigInteger('managebreeding_record_id');
            $table->foreign('managebreeding_record_id', 'managebreeding_record_id_fk_8440358')->references('id')->on('managebreeding_records')->onDelete('cascade');
            $table->unsignedBigInteger('general_stock_record_id');
            $table->foreign('general_stock_record_id', 'general_stock_record_id_fk_8440358')->references('id')->on('general_stock_records')->onDelete('cascade');
        });
    }
}
