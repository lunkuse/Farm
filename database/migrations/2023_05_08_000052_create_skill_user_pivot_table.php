<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('skill_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8354844')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id', 'skill_id_fk_8354844')->references('id')->on('skills')->onDelete('cascade');
        });
    }
}
