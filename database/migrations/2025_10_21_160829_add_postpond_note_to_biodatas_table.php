<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostpondNoteToBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->longText('postponed_note')->nullable()->after('note');
            $table->timestamp('postponed_at')->nullable()->after('postponed_note');
            $table->unsignedBigInteger('postponed_by')->nullable()->after('postponed_at');

            $table->index('status');
            $table->index('postponed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['postponed_at']);
            $table->dropColumn(['postponed_note', 'postponed_at', 'postponed_by']);
        });
    }
}
