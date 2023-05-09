<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageStaffRecordStaffRecommendationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('manage_staff_record_staff_recommendation', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_staff_record_id');
            $table->foreign('manage_staff_record_id', 'manage_staff_record_id_fk_8291777')->references('id')->on('manage_staff_records')->onDelete('cascade');
            $table->unsignedBigInteger('staff_recommendation_id');
            $table->foreign('staff_recommendation_id', 'staff_recommendation_id_fk_8291777')->references('id')->on('staff_recommendations')->onDelete('cascade');
        });
    }
}
