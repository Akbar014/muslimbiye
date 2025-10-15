<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataProfessionalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
        "profession",
        "profession_details",
        "monthly_income",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
