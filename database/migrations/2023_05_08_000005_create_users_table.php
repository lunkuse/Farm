<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('locale')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('identification')->nullable();
            $table->string('emergency_contact_1')->nullable();
            $table->string('emergency_contact_2')->nullable();
            $table->string('emergency_contact_3')->nullable();
            $table->string('district')->nullable();
            $table->string('parish')->nullable();
            $table->string('village')->nullable();
            $table->string('sub_county')->nullable();
            $table->string('other_health_condition')->nullable();
            $table->string('other_spiritual_affiliation')->nullable();
            $table->string('other_skill')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('is_approved')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
