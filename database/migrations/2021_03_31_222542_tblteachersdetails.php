<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tblteachersdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblteachersdetails', function (Blueprint $table) {


            $table->integer('intTeachersDetailsID')->index();
            $table->integer('intHighestLevelofEducationId')->nullable();
            $table->integer('intHighestTeachingQualificationId')->nullable();
            $table->string('intAditionalSchoolResponsibilityId')->nullable();
            $table->integer('intMPSSalaryScaleId')->nullable();
            $table->integer('intTypeofTrainingLastyearId')->nullable();
            $table->integer('intTraininginPhysicalEducationId')->nullable();
            $table->integer('intSchoolId')->nullable();
            $table->string('txtSurName')->nullable();
            $table->string('txtFirstName')->nullable();
            $table->string('txtMPSPayrollComputerNumber')->nullable();
            $table->string('txtSex')->nullable();
            $table->integer('intYearofBirth')->nullable();
            $table->string('dtDateofFirstPosting')->nullable();
            $table->string('dtDateofFirstAppointment')->nullable();
            $table->string('txtPreviousPosts')->nullable();
            $table->string('txtMainSubSpecialization')->nullable();
            $table->string('intSecTeachingSubtypeid')->nullable();
            $table->string('charTraininginSNE')->nullable();
            $table->string('txtMainclassattach')->nullable();
            $table->string('txtSecMainSubjectTaught')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblteachersdetails');
    }
}
