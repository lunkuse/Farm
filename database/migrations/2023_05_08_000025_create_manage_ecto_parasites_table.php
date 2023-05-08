<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageEctoParasitesTable extends Migration
{
    public function up()
    {
        Schema::create('manage_ecto_parasites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('other_acaricide')->nullable();
            $table->time('time_of_spray')->nullable();
            $table->date('next_spray_date')->nullable();
            $table->longText('comments')->nullable();
            $table->string('attending_officer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
