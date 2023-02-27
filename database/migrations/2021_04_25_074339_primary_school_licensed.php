<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolLicensed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primarySchoolLicensed', function (Blueprint $table) {
            $table->id();
            $table->integer('school')->index();
            $table->integer('reg_status')->index();
            $table->integer('founder')->index();
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
        Schema::dropIfExists('primarySchoolLicensed');
    }
}
