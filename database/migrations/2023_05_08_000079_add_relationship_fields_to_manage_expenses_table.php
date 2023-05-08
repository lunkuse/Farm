<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManageExpensesTable extends Migration
{
    public function up()
    {
        Schema::table('manage_expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('expenditure_type_id')->nullable();
            $table->foreign('expenditure_type_id', 'expenditure_type_fk_8291832')->references('id')->on('expenditure_types');
            $table->unsignedBigInteger('attendant_id')->nullable();
            $table->foreign('attendant_id', 'attendant_fk_8291836')->references('id')->on('users');
        });
    }
}
