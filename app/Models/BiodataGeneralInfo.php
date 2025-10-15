<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataGeneralInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "biodata_id",
        "biodata_type",
        "bride_groom",
        "marital_status",
        "birthdate",
        "height",
        "complexion",
        "weight",
        "blood_group",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
