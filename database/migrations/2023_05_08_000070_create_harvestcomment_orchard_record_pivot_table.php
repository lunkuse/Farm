<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarvestcommentOrchardRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('harvestcomment_orchard_record', function (Blueprint $table) {
            $table->unsignedBigInteger('orchard_record_id');
            $table->foreign('orchard_record_id', 'orchard_record_id_fk_8441839')->references('id')->on('orchard_records')->onDelete('cascade');
            $table->unsignedBigInteger('harvestcomment_id');
            $table->foreign('harvestcomment_id', 'harvestcomment_id_fk_8441839')->references('id')->on('harvestcomments')->onDelete('cascade');
        });
    }
}
