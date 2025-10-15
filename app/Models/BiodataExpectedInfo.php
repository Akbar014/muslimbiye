<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataExpectedInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
        "expected_age",
        "expected_complexion",
        "expected_height",
        "expected_education",
        "expect_district",
        "groom_expected_marital_status",
        "bride_expected_marital_status",
        "expected_profession",
        "expected_financial_status",
        "expected_features",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
