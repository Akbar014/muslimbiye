<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('settings', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->string('email')->unique();
         $table->string('contact')->nullable();
         $table->string('address')->nullable();
         $table->string('logo')->nullable();
         $table->string('footer_logo')->nullable();
         $table->string('favicon')->nullable();
         $table->string('social_facebook')->nullable();
         $table->string('social_linkedin')->nullable();
         $table->string('social_insta')->nullable();
         $table->string('social_youtube')->nullable();
         $table->string('ytLink')->nullable();
         $table->enum('show_statistics', [0, 1])->default(1);
         $table->string('description')->default(1);
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
      Schema::dropIfExists('settings');
   }
}
