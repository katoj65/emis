<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSchool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
            $table->id();
            $table->integer('intWaterDistanceID')->index()->nullable();
            $table->integer('intStatusOfSchoolID')->index()->nullable();
            $table->integer('intFoundingBodyID')->index()->nullable();
            $table->integer('intFundingSourceID')->index()->nullable();
            $table->integer('intSchoolGenderID')->index()->nullable();
            $table->integer('intSchoolTypeID')->index()->nullable();
            $table->integer('intSchRegistryStatusID')->index()->nullable();
            $table->integer('intSchoolDistanceID')->index()->nullable();
            $table->integer('intDEODistanceID')->index()->nullable();
            $table->integer('intSchoolRegionID')->index()->nullable();
            $table->integer('intSchoolYearID')->index();
            $table->integer('intCountyId')->index();
            $table->integer('intDistrictId')->index();
            $table->integer('intRegionId')->index();
            $table->integer('intEduLevelId')->index();
            $table->integer('intUserId')->index();

            $table->string('txtSchoolName', 100)->index()->nullable();
            $table->string('txtSchoolCode', 25)->index()->nullable();

            $table->integer('intSubCountyId')->index()->nullable();
            $table->integer('intParishWardId')->index()->nullable();
            $table->integer('intVillageId')->index()->nullable();

            $table->string('txtWaterSourceid', 25)->index()->nullable();
            $table->string('txtEnergySourceId', 25)->index()->nullable();
            $table->string('txtPhysicalAddress', 200)->index()->nullable();
            $table->string('txtPOBoxTown', 25)->index()->nullable();
            $table->string('txtEmailAddress', 100)->index()->nullable();
            $table->string('txtWebsiteAddress', 100)->index()->nullable();
            $table->string('txtTelephone', 25)->index()->nullable();
            $table->string('txtFaxNumber', 25)->index()->nullable();
            $table->string('txtMinPublicServiceCode', 25)->index()->nullable();
            $table->string('txtLicenseNum', 25)->index()->nullable();
            $table->string('txtUNEBCenterNum', 25)->index()->nullable();
            $table->string('txtFoundingYear', 25)->index()->nullable();

            $table->integer('intHighestClassInSch')->index()->nullable();
            $table->tinyInteger('blnSchDataentryStatus')->index()->nullable();
            $table->integer('intInspectionDEOLastYear')->index()->nullable();
            $table->tinyInteger('blnPPAttachedPrimary')->index()->nullable();

            $table->string('txtPPAttachedPrimarySchName', 50)->index()->nullable();
            $table->string('txtPPAttachedPrimarySchAdd', 300)->index()->nullable();
            $table->string('txtPPAttachedPrimarySchTel', 50)->index()->nullable();
            $table->string('txtExaminationBody', 100)->index()->nullable();
            $table->string('txtNameOfProgramme', 250)->index()->nullable();
            $table->string('txtNFMonths', 25)->index()->nullable();
            $table->string('txtNFYears', 50)->index()->nullable();
            $table->string('txtNFInspections', 50)->index()->nullable();
            $table->string('txtNFGovSupportTypeid', 50)->index()->nullable();
            $table->string('txtNFNGOSupportTpeid', 50)->index()->nullable();

            $table->tinyInteger('blnSNESportsEquipment')->index()->nullable();
            $table->string('txtSNESportsEquNames', 200)->index()->nullable();
            $table->integer('intInstitutionTypeId')->index()->nullable();
            $table->string('dtDateTime', 25)->index()->nullable();
            $table->string('blnStatus', 25)->index()->nullable();
            $table->integer('intUseStatusId')->index()->nullable();
            $table->string('charElectricity', 3)->index()->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school');
    }
}
