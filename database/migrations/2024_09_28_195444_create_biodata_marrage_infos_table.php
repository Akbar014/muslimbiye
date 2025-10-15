<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataMarrageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_marrage_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer('user_id');
            $table->longText("wife_died_reason")->nullable();
            $table->longText("why_marry_after_marrage")->nullable();
            $table->longText("wife_and_childrens")->nullable();
            $table->longText("wife_cover")->nullable();
            $table->longText("wife_study")->nullable();
            $table->longText("wife_job")->nullable();
            $table->longText("where_live")->nullable();
            $table->longText("expectetions_from_wife")->nullable();
            $table->longText("husband_died_reason")->nullable();
            $table->longText("job_interested")->nullable();
            $table->longText("continue_study")->nullable();
            $table->longText("continue_job")->nullable();
            $table->longText("marrage_divorce_date_reason")->nullable();
            $table->longText("guardian_accept")->nullable();
            $table->longText("marrage_concept")->nullable();
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
        Schema::dropIfExists('biodata_marrage_infos');
    }
}
