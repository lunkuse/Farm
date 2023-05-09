<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpiritialAffiliationUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('spiritial_affiliation_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8353022')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('spiritial_affiliation_id');
            $table->foreign('spiritial_affiliation_id', 'spiritial_affiliation_id_fk_8353022')->references('id')->on('spiritial_affiliations')->onDelete('cascade');
        });
    }
}
