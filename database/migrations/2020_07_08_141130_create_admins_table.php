<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('gender', ['0', '1'])->nullable(); // 0 = Male, 1 = Female
            $table->string('user_type')->default('2');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role_id')->default(10);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('can_login')->default(1);
            $table->string('google_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
