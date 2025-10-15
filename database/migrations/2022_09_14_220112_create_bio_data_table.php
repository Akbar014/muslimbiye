<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBioDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('bride_groom')->nullable();
            $table->string('language')->default('Bangla');
            $table->string('person_name')->nullable();
            $table->string('name')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('fatherOccupation')->nullable();
            $table->string('motherName')->nullable();
            $table->string('motherOccupation')->nullable();
            $table->string('fatherOccupationCustom')->nullable();
            $table->string('motherOccupationCustom')->nullable();
            $table->string('fatherOccupationInfo')->nullable();
            $table->string('motherOccupationInfo')->nullable();
            $table->string('permanentVillage')->nullable();
            $table->string('permanentPostoffice')->nullable();
            $table->string('permanentThana')->nullable();
            $table->string('permanentDistrict')->nullable();
            $table->string('presentVillage')->nullable();
            $table->string('presentPostoffice')->nullable();
            $table->string('presentThana')->nullable();
            $table->string('presentDistrict')->nullable();
            $table->string('majhabDetails')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->integer('heightFt')->nullable();
            $table->float('heightInch')->nullable();
            $table->integer('weight')->nullable();
            $table->String('complexion')->nullable();
            $table->enum('blood_groop', ['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+', 'AB-'])->nullable();
            $table->enum('majhab', ['Hanafi', 'Shafeyi', 'Maleki', 'Hamboli', 'Others']);
            $table->text('educationalQualification')->nullable();
            $table->String('occupationWant')->nullable();
            $table->String('occupation')->nullable();
            $table->string('maritualStatusWant')->nullable();
            $table->string('maritualStatus')->nullable();
            $table->longText('divorceReason')->nullable();
            $table->text('politicalView')->nullable();
            $table->longText('aboutYourself')->nullable();
            $table->text('brotherNumber')->nullable();
            $table->text('sisterNumber')->nullable();
            $table->text('brotherName')->nullable();
            $table->text('brotherEduQualification')->nullable();
            $table->text('brotherOccupation')->nullable();
            $table->text('brotherMarritalStatus')->nullable();
            $table->text('sisterName')->nullable();
            $table->text('sisterEduQualification')->nullable();
            $table->text('sisterOccupation')->nullable();
            $table->text('sisterMarritalStatus')->nullable();
            $table->text('brotherInLawStatus')->nullable();
            $table->text('financialStatus')->nullable();
            $table->text('socialStatus')->nullable();
            $table->text('paternalUncleNumber')->nullable();
            $table->text('maternalUncleNumber')->nullable();
            $table->text('paternalUncleName')->nullable();
            $table->text('paternalUncleEduQualification')->nullable();
            $table->text('paternalUncleOccupation')->nullable();
            $table->text('paternalUncleMarritalStatus')->nullable();
            $table->text('maternalUncleName')->nullable();
            $table->text('maternalUncleEduQualification')->nullable();
            $table->text('maternalUncleOccupation')->nullable();
            $table->text('maternalUncleMarritalStatus')->nullable();
            $table->longText('concept_about')->nullable();
            $table->string('vail')->nullable();
            $table->string('job_permission')->nullable();
            $table->string('job_join')->nullable();
            $table->string('beards')->nullable();
            $table->string('tv_watch')->nullable();
            $table->string('music_listen')->nullable();
            $table->string('physical_disability')->nullable();
            $table->string('salat')->nullable();
            $table->string('dini_mehonot')->nullable();
            $table->string('want_age')->nullable();
            $table->string('want_height')->nullable();
            $table->string('want_weight')->nullable();
            $table->string('want_complexion')->nullable();
            $table->string('want_occupation')->nullable();
            $table->string('want_maritualStatus')->nullable();
            $table->string('want_education')->nullable();
            $table->string('want_district')->nullable();
            $table->string('want_location')->nullable();
            $table->longText('want_special_qualities')->nullable();
            $table->string('marage_plan')->nullable();
            $table->string('allow_post_blog')->nullable();
            $table->string('phone_no_1')->nullable();
            $table->string('phone_no_2')->nullable();
            $table->string('name_1')->nullable();
            $table->string('relation_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('relation_2')->nullable();
            $table->string('email')->nullable();
            $table->string('code')->nullable();
            $table->string('image')->nullable();
            $table->integer('featured')->default(0);
            $table->integer('status')->default(0);
            $table->integer('verify')->default(0);
            $table->unsignedBigInteger('verify_by')->nullable();
            $table->unsignedBigInteger('approve_by')->nullable();
            $table->timestamp('approval_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('note')->nullable();
            $table->string('delete_note')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('verify_by')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('approve_by')->references('id')->on('admins')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bio_data');
    }
}
