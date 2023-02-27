<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AcademicInstitutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('primary_telephone',20);
            $table->string('secondary_telephone',20);
            $table->string('email_address',50);
            $table->enum('academic_level',['pre-primary','pre-primary and primary','primary','O-level','A-level','post-primary institution']);
            $table->enum('registration_status',['registered','license valid','license expired','not registered']);
            $table->string('license_number',15);
            $table->string('region',30);
            $table->string('district',30);
            $table->string('country',30);
            $table->string('sub_county',30);
            $table->string('parish',30);
            $table->string('village');
            $table->string('center_number',15);
            $table->enum('ownership',['private','government','NGO','religious','organization']);
            $table->enum('boarding_status',['day','boarding','day and boarding']);
            $table->enum('gender_status',['single','mixed']);
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
        Schema::dropIfExists('academic_institutions');
    }
}
