<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('general_id')->nullable();
            $table->integer('address_id')->nullable();
            $table->integer('education_id')->nullable();
            $table->integer('family_id')->nullable();
            $table->integer('personal_id')->nullable();
            $table->integer('professional_id')->nullable();
            $table->integer('marrage_id')->nullable();
            $table->integer('expected_id')->nullable();
            $table->integer('commitment_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->integer('visit_count')->default(0);
            $table->string('code')->nullable();
            $table->longText('delete_note')->nullable();
            $table->string('completed')->default("[]");
            $table->longText('note')->nullable();
            $table->enum('admin_created', [0, 1])->default(0);
            $table->enum('deleted', [0, 1])->default(0);
            $table->enum('married_by_muslimbie', [0, 1])->default(0);
            $table->integer('status')->default(0);
            // 0 = incomplete
            // 1 = Pending
            // 2 = Approved
            // 3 = Suspected
            // 4 = Married
            // 5 = Postponed
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
        Schema::dropIfExists('biodatas');
    }
}
