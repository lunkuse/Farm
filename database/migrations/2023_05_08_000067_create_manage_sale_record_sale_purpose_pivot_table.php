<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageSaleRecordSalePurposePivotTable extends Migration
{
    public function up()
    {
        Schema::create('manage_sale_record_sale_purpose', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_sale_record_id');
            $table->foreign('manage_sale_record_id', 'manage_sale_record_id_fk_8291813')->references('id')->on('manage_sale_records')->onDelete('cascade');
            $table->unsignedBigInteger('sale_purpose_id');
            $table->foreign('sale_purpose_id', 'sale_purpose_id_fk_8291813')->references('id')->on('sale_purposes')->onDelete('cascade');
        });
    }
}
