<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataExpectedInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_expected_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer('user_id');
            $table->string("expected_age")->nullable();
            $table->string("expected_complexion")->nullable();
            $table->string("expected_height")->nullable();
            $table->longText("expected_education")->nullable();
            $table->longText("expect_district")->nullable();
            $table->string("groom_expected_marital_status")->nullable();
            $table->string("bride_expected_marital_status")->nullable();
            $table->longText("expected_profession")->nullable();
            $table->longText("expected_financial_status")->nullable();
            $table->longText("expected_features")->nullable();
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
        Schema::dropIfExists('biodata_expected_infos');
    }
}
