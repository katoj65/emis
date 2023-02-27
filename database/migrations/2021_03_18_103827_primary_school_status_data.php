<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolStatusData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_school_status_data', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id')->index();
            $table->integer('school_status')->index();
            $table->integer('district')->index();
            $table->integer('region')->index();
            $table->integer('education_level');
            $table->year('year')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('primary_school_status_data');
    }
}
