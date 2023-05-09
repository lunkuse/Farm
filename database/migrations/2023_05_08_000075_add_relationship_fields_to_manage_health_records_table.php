<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManageHealthRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('manage_health_records', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_no_id')->nullable();
            $table->foreign('tag_no_id', 'tag_no_fk_8288304')->references('id')->on('general_stock_records');
            $table->unsignedBigInteger('stock_attendant_id')->nullable();
            $table->foreign('stock_attendant_id', 'stock_attendant_fk_8288311')->references('id')->on('users');
        });
    }
}
