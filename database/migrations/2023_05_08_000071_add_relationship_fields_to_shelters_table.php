<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSheltersTable extends Migration
{
    public function up()
    {
        Schema::table('shelters', function (Blueprint $table) {
            $table->unsignedBigInteger('block_id')->nullable();
            $table->foreign('block_id', 'block_fk_8436819')->references('id')->on('blocks');
        });
    }
}
