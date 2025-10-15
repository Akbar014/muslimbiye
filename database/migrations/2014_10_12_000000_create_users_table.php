<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('verified_by', ['phone','email'])->nullable();
            $table->string('otp')->nullable();
            $table->integer('connection')->default(0);
            $table->string('password')->nullable();
            $table->string('file_path')->nullable()->default('assets/images/users/default.png');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('can_login')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
