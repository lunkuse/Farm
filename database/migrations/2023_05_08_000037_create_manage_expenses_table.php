<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('manage_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('quantity')->nullable();
            $table->decimal('amount', 15, 2);
            $table->longText('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
