<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManageStaffRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('manage_staff_records', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_name_id')->nullable();
            $table->foreign('staff_name_id', 'staff_name_fk_8291771')->references('id')->on('users');
            $table->unsignedBigInteger('payment_record_id')->nullable();
            $table->foreign('payment_record_id', 'payment_record_fk_8291774')->references('id')->on('staff_payment_records');
            $table->unsignedBigInteger('staff_perfomance_id')->nullable();
            $table->foreign('staff_perfomance_id', 'staff_perfomance_fk_8291776')->references('id')->on('staff_perfomances');
        });
    }
}
