<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataEducationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_education_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer("user_id")->nullable();
            $table->string("education_medium")->nullable();
            $table->string("general_highest_education")->nullable();
            $table->string("general_highest_school_study")->nullable();
            $table->string("ssc_year")->nullable();
            $table->string("ssc_dept")->nullable();
            $table->string("ssc_result")->nullable();
            $table->string("hsc_study_running")->nullable();
            $table->string("study_after_ssc")->nullable();
            $table->string("hsc_pass_year")->nullable();
            $table->string("hsc_dept")->nullable();
            $table->string("hsc_result")->nullable();
            $table->string("diploma_subject")->nullable();
            $table->string("diploma_institution")->nullable();
            $table->string("diploma_current_year")->nullable();
            $table->string("diploma_passing_year")->nullable();
            $table->string("honors_subject")->nullable();
            $table->string("honors_instutution")->nullable();
            $table->string("honors_passing_year")->nullable();
            $table->string("honors_study_year")->nullable();
            $table->string("masters_subject")->nullable();
            $table->string("masters_institution")->nullable();
            $table->string("masters_passing_year")->nullable();
            $table->string("doctorate_subject")->nullable();
            $table->string("doctorate_institution")->nullable();
            $table->string("doctorate_passing_year")->nullable();
            $table->string("qawmi_education_qualification")->nullable();
            $table->string("ibtedai_madrasa")->nullable();
            $table->string("mutawassitah_madrasa")->nullable();
            $table->string("sanabia_ulya_madrasa")->nullable();
            $table->string("fazilat_madrasa")->nullable();
            $table->string("takmil_madrasa")->nullable();
            $table->string("takhassus_madrasa")->nullable();
            $table->string("qawmi_result")->nullable();
            $table->string("qawmi_passing_year")->nullable();
            $table->string("takhassus_subject")->nullable();
            $table->string("takhassus_result")->nullable();
            $table->string("takhassus_passing_year")->nullable();
            $table->string("others_educational_qualifications")->nullable();
            $table->string("deen_designations")->nullable();
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
        Schema::dropIfExists('biodata_education_infos');
    }
}
