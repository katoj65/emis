<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryTeachingMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_teaching_material', function (Blueprint $table) {
            $table->id()->index();
            $table->integer('intSchoolId')->index();
            $table->integer('intSubjectId')->index();
            $table->integer('intTextbooks');
            $table->integer('intModules');
            $table->integer('intGuides');
            $table->integer('intClassReaders');
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
        Schema::dropIfExists('primary_teaching_material');
    }
}
