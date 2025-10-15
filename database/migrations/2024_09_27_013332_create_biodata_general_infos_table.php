<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataGeneralInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_general_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('biodata_id');
            $table->integer('user_id');
            $table->enum('biodata_type', ['general', 'deen'])->nullable();
            $table->enum('bride_groom', ['groom', 'bride'])->nullable();
            $table->enum('marital_status', ['unmarried', 'married', 'divorced', 'widow', 'widower'])->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->string('height')->nullable();
            $table->enum('complexion', ['black', 'mediam', 'light_mediam', 'fair', 'bright_fair',])->nullable();
            $table->string('weight')->nullable();
            $table->enum('blood_group', ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-", "N/A"])->nullable();
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
        Schema::dropIfExists('biodata_general_infos');
    }
}
