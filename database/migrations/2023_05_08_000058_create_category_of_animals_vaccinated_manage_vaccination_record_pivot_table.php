<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryOfAnimalsVaccinatedManageVaccinationRecordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_of_animals_vaccinated_manage_vaccination_record', function (Blueprint $table) {
            $table->unsignedBigInteger('manage_vaccination_record_id');
            $table->foreign('manage_vaccination_record_id', 'manage_vaccination_record_id_fk_8288488')->references('id')->on('manage_vaccination_records')->onDelete('cascade');
            $table->unsignedBigInteger('category_of_animals_vaccinated_id');
            $table->foreign('category_of_animals_vaccinated_id', 'category_of_animals_vaccinated_id_fk_8288488')->references('id')->on('category_of_animals_vaccinateds')->onDelete('cascade');
        });
    }
}
