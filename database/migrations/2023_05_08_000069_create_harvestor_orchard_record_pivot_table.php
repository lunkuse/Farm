<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarvestorOrchardRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('harvestor_orchard_record', function (Blueprint $table) {
            $table->unsignedBigInteger('orchard_record_id');
            $table->foreign('orchard_record_id', 'orchard_record_id_fk_8441833')->references('id')->on('orchard_records')->onDelete('cascade');
            $table->unsignedBigInteger('harvestor_id');
            $table->foreign('harvestor_id', 'harvestor_id_fk_8441833')->references('id')->on('harvestors')->onDelete('cascade');
        });
    }
}
