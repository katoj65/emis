<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentByNationality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_by_nationality', function (Blueprint $table) {
            $table->id();
            $table->integer('intNationalityId');
            $table->integer('intEducationGradeId');
            $table->integer('intSchoolId');
            $table->integer('intEnrolByNationMaleStuCount')->nullable();
            $table->integer('intEnrolByNationFeMaleStuCount')->nullable();
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
        Schema::dropIfExists('enrolment_by_nationality');
    }
}
