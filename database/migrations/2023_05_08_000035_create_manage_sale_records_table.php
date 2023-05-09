<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageSaleRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('manage_sale_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('quantity');
            $table->decimal('amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
