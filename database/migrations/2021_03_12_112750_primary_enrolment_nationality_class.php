<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryEnrolmentNationalityClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_enrolment_nationality_class', function (Blueprint $table) {
            $table->id();
            $table->integer('nationality')->index();
            $table->integer('class')->index();
            $table->integer('males');
            $table->integer('females');
            $table->year('enrolment_year')->index();
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
        Schema::dropIfExists('primary_enrolment_nationality_class');
    }
}
