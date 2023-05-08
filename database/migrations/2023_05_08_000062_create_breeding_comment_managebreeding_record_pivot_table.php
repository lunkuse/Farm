<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreedingCommentManagebreedingRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('breeding_comment_managebreeding_record', function (Blueprint $table) {
            $table->unsignedBigInteger('managebreeding_record_id');
            $table->foreign('managebreeding_record_id', 'managebreeding_record_id_fk_8291229')->references('id')->on('managebreeding_records')->onDelete('cascade');
            $table->unsignedBigInteger('breeding_comment_id');
            $table->foreign('breeding_comment_id', 'breeding_comment_id_fk_8291229')->references('id')->on('breeding_comments')->onDelete('cascade');
        });
    }
}
