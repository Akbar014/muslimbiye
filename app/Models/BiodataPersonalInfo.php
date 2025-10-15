<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataPersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
        "dressup",
        "niqab_info",
        "beard_info",
        "above_ankle_info",
        "namaz_info",
        "namaz_waqt_info",
        "mahram_info",
        "quran_info",
        "fiqh_info",
        "enternainment_info",
        "disablity_info",
        "deen_mehnot_info",
        "mazar_concept_info",
        "islami_books",
        "favourite_alem",
        "person_category",
        "become_muslim",
        "hobby",
        "phone_number",
        "photo",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
