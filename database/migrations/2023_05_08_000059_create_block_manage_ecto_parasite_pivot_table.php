<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockManageEctoParasitePivotTable extends Migration
{
    public function up()
    {
        Schema::create('block_manage_ecto_parasite', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_ecto_parasite_id');
            $table->foreign('manage_ecto_parasite_id', 'manage_ecto_parasite_id_fk_8417110')->references('id')->on('manage_ecto_parasites')->onDelete('cascade');
            $table->unsignedBigInteger('block_id');
            $table->foreign('block_id', 'block_id_fk_8417110')->references('id')->on('blocks')->onDelete('cascade');
        });
    }
}
