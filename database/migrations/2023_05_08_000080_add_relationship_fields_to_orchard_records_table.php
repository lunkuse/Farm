<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrchardRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('orchard_records', function (Blueprint $table) {
            $table->unsignedBigInteger('fruit_type_id')->nullable();
            $table->foreign('fruit_type_id', 'fruit_type_fk_8441825')->references('id')->on('fruit_types');
            $table->unsignedBigInteger('recording_officer_id')->nullable();
            $table->foreign('recording_officer_id', 'recording_officer_fk_8441840')->references('id')->on('users');
        });
    }
}
