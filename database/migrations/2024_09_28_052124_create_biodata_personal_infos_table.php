<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer('user_id');
            $table->string("dressup")->nullable();
            $table->string("niqab_info")->nullable();
            $table->string("beard_info")->nullable();
            $table->string("above_ankle_info")->nullable();
            $table->string("namaz_info")->nullable();
            $table->string("namaz_waqt_info")->nullable();
            $table->string("mahram_info")->nullable();
            $table->string("quran_info")->nullable();
            $table->string("fiqh_info")->nullable();
            $table->string("enternainment_info")->nullable();
            $table->string("disablity_info")->nullable();
            $table->string("deen_mehnot_info")->nullable();
            $table->string("mazar_concept_info")->nullable();
            $table->string("islami_books")->nullable();
            $table->string("favourite_alem")->nullable();
            $table->string("person_category")->nullable();
            $table->string("become_muslim")->nullable();
            $table->string("hobby")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("photo")->nullable();
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
        Schema::dropIfExists('biodata_personal_infos');
    }
}
