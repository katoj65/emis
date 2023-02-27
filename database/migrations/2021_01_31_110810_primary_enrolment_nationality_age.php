<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryEnrolmentNationalityAge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_enrolment_nationality_age', function (Blueprint $table) {
            $table->id();
            $table->integer('nationality');
            $table->string('age','20');
            $table->integer('males');
            $table->integer('females');
            $table->year('enrolment_year');
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
        Schema::dropIfExists('primary_enrolment_nationality_age');
    }
}
