<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaricideUsedManageEctoParasitePivotTable extends Migration
{
    public function up()
    {
        Schema::create('acaricide_used_manage_ecto_parasite', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_ecto_parasite_id');
            $table->foreign('manage_ecto_parasite_id', 'manage_ecto_parasite_id_fk_8288496')->references('id')->on('manage_ecto_parasites')->onDelete('cascade');
            $table->unsignedBigInteger('acaricide_used_id');
            $table->foreign('acaricide_used_id', 'acaricide_used_id_fk_8288496')->references('id')->on('acaricide_useds')->onDelete('cascade');
        });
    }
}
