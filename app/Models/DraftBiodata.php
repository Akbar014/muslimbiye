<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftBiodata extends Model
{
    protected $table = 'draft_biodatas';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','bride_groom','language','person_name','name','fatherName','fatherOccupation','motherName','motherOccupation','permanentVillage','permanentPostoffice','permanentThana','permanentDistrict','presentVillage','presentPostoffice','presentThana','presentDistrict','majhabDetails','dateOfBirth','heightFt','heightInch','weight','complexion','blood_groop','majhab','educationalQualification','occupation','maritualStatus','politicalView','aboutYourself','brotherNumber','sisterNumber','brotherName','brotherEduQualification','brotherOccupation','brotherMarritalStatus','sisterName','sisterEduQualification','sisterOccupation','sisterMarritalStatus','financialStatus','socialStatus','paternalUncleNumber','maternalUncleNumber','paternalUncleName','paternalUncleEduQualification','paternalUncleOccupation','paternalUncleMarritalStatus','maternalUncleName','maternalUncleEduQualification','maternalUncleOccupation','maternalUncleMarritalStatus','concept_about','vail','job_permission','job_join','beards','tv_watch','music_listen','physical_disability','salat','want_age','want_height','want_weight','want_complexion','want_maritualStatus','want_education','want_district','want_location','want_special_qualities','marage_plan','allow_post_blog','phone_no_1','phone_no_2','name_1','relation_1','name_2','relation_2','email','status','occupationWant','maritualStatusWant','code','image'
];
}
