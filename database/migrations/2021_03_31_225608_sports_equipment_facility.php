<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SportsEquipmentFacility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports_equipment_facility', function (Blueprint $table) {
            $table->integer('intSportsEquipmentandFacilitiesId');
            $table->integer('intSchoolId')->index();
            $table->integer('intFecilityTypeid')->index();
            $table->integer('intNoofAvailableEquipment')->nullable();
            $table->integer('intNoEquipmentNeeded')->nullable();
            $table->integer('intNoofFacilities')->nullable();
            $table->string('txtFacilityCondition')->nullable();
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
        Schema::dropIfExists('sports_equipment_facility');
    }
}
