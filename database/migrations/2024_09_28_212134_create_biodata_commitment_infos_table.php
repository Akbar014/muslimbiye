<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataCommitmentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_commitment_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer('user_id');
            $table->string("gurdian_aknowledgement")->nullable();
            $table->string("all_data_valid")->nullable();
            $table->string("responsibility")->nullable();
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
        Schema::dropIfExists('biodata_commitment_infos');
    }
}
