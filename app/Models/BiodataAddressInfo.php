<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataAddressInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "biodata_id",
        "parmanent_zella",
        "parmanent_address",
        "present_address_same",
        "present_zella",
        "present_address",
        "where_raised",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
