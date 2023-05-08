<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthConditionUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('health_condition_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8352994')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('health_condition_id');
            $table->foreign('health_condition_id', 'health_condition_id_fk_8352994')->references('id')->on('health_conditions')->onDelete('cascade');
        });
    }
}
