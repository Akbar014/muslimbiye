<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataFamilyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_family_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer('user_id');
            $table->string("fathers_name")->nullable();
            $table->string("father_status")->nullable();
            $table->string("father_profession")->nullable();
            $table->string("mothers_name")->nullable();
            $table->string("mother_status")->nullable();
            $table->string("mother_profession")->nullable();
            $table->string("total_brother")->nullable();
            $table->string("total_sister")->nullable();
            $table->string("total_paternal_uncle")->nullable();
            $table->string("total_maternal_uncle")->nullable();
            $table->longText("brothers")->nullable();
            $table->longText("sisters")->nullable();
            $table->longText("paternal_uncles")->nullable();
            $table->longText("maternal_uncles")->nullable();
            $table->string("family_status")->nullable();
            $table->longText("financial_status")->nullable();
            $table->longText("family_environment")->nullable();
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
        Schema::dropIfExists('biodata_family_infos');
    }
}
