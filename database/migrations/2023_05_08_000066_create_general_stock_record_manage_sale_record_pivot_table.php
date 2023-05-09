<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralStockRecordManageSaleRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('general_stock_record_manage_sale_record', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_sale_record_id');
            $table->foreign('manage_sale_record_id', 'manage_sale_record_id_fk_8291810')->references('id')->on('manage_sale_records')->onDelete('cascade');
            $table->unsignedBigInteger('general_stock_record_id');
            $table->foreign('general_stock_record_id', 'general_stock_record_id_fk_8291810')->references('id')->on('general_stock_records')->onDelete('cascade');
        });
    }
}
