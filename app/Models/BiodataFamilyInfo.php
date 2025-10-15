<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataFamilyInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
        "fathers_name",
        "father_status",
        "father_profession",
        "mothers_name",
        "mother_status",
        "mother_profession",
        "total_brother",
        "brothers",
        "total_sister",
        "sisters",
        "total_paternal_uncle",
        "paternal_uncles",
        "total_maternal_uncle",
        "maternal_uncles",
        "family_status",
        "financial_status",
        "family_environment",
        "brother_names",
        "brother_educations",
        "brother_jobs",
        "brother_merital_status",
        "sister_names",
        "sister_educations",
        "sister_jobs",
        "sister_merital_status",
        "paternal_uncle_names",
        "paternal_uncle_educations",
        "paternal_uncle_jobs",
        "paternal_uncle_merital_status",
        "maternal_uncle_names",
        "maternal_uncle_educations",
        "maternal_uncle_jobs",
        "maternal_uncle_merital_status"
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
