<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataEducationInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "biodata_id",
        "education_medium",
        "general_highest_education",
        "general_highest_school_study",
        "ssc_year",
        "ssc_dept",
        "ssc_result",
        "hsc_study_running",
        "study_after_ssc",
        "hsc_pass_year",
        "hsc_dept",
        "hsc_result",
        "diploma_subject",
        "diploma_institution",
        "diploma_current_year",
        "diploma_passing_year",
        "honors_subject",
        "honors_instutution",
        "honors_passing_year",
        "honors_study_year",
        "masters_subject",
        "masters_institution",
        "masters_passing_year",
        "doctorate_subject",
        "doctorate_institution",
        "doctorate_passing_year",
        "qawmi_education_qualification",
        "ibtedai_madrasa",
        "mutawassitah_madrasa",
        "sanabia_ulya_madrasa",
        "fazilat_madrasa",
        "takmil_madrasa",
        "takhassus_madrasa",
        "qawmi_result",
        "qawmi_passing_year",
        "takhassus_subject",
        "takhassus_result",
        "takhassus_passing_year",
        "others_educational_qualifications",
        "deen_designations",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
