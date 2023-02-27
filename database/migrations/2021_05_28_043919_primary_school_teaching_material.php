<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolTeachingMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_school_teaching_material', function (Blueprint $table) {
            $table->id();
            $table->integer('subject')->index();
            $table->integer('founder')->index();
            $table->integer('item');
            $table->enum('type',['textbook','guide','module','reader'])->index();
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
        Schema::dropIfExists('primary_school_teaching_material');
    }
}
