<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_reason')->nullable();
            $table->string('user_id')->nullable();
            $table->string('biodata_id')->nullable();
            $table->enum('read', [0, 1])->default(0);
            $table->enum('deleted', [0, 1])->default(0);
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
        Schema::dropIfExists('biodata_reports');
    }
}
