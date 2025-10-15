<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_histories', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('type_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('pay_id')->nullable();
            $table->string('day')->nullable()->default(0);
            $table->string('payment_id')->nullable();
            $table->longText('payment_details')->nullable();
            $table->string('status_code')->nullable();
            $table->string('message')->nullable();
            $table->string('trxID')->nullable();
            $table->string('apiVersion')->nullable();
            $table->string('users_id')->nullable();
            $table->longText('users')->nullable();
            $table->double('amount')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('subscription_histories');
    }
}
