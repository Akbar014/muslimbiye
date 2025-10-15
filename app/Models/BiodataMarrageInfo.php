<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataMarrageInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
        "wife_died_reason",
        "why_marry_after_marrage",
        "wife_and_childrens",
        "wife_cover",
        "wife_study",
        "wife_job",
        "where_live",
        "expectetions_from_wife",
        "husband_died_reason",
        "job_interested",
        "continue_study",
        "continue_job",
        "marrage_divorce_date_reason",
        "guardian_accept",
        "marrage_concept",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
