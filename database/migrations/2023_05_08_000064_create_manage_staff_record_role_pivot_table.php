<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageStaffRecordRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('manage_staff_record_role', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_staff_record_id');
            $table->foreign('manage_staff_record_id', 'manage_staff_record_id_fk_8291772')->references('id')->on('manage_staff_records')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_8291772')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
