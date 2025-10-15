<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_contact_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer('user_id');
            $table->string("bride_name")->nullable();
            $table->string("groom_name")->nullable();
            $table->string("gurdian_name")->nullable();
            $table->string("gurdian_whatsapp")->nullable();
            $table->string("gurdian_phone")->nullable();
            $table->string("gurdian_relation")->nullable();
            $table->string("biodata_email")->nullable();
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
        Schema::dropIfExists('biodata_contact_infos');
    }
}
