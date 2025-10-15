<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataCommitmentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
        "gurdian_aknowledgement",
        "all_data_valid",
        "responsibility",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
