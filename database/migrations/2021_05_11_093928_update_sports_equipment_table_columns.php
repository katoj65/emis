<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSportsEquipmentTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sports_equipment_facility', function (Blueprint $table) {
            $table->integer('intNoofAvailableEquipment')->nullable()->change();
            $table->integer('intNoEquipmentNeeded')->nullable()->change();
            $table->integer('intNoofFacilities')->nullable()->change();
            $table->string('txtFacilityCondition')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('sports_equipment_facility');

    }
}
