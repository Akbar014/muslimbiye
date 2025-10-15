<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
        "bride_name",
        "groom_name",
        "gurdian_phone",
        "gurdian_name",
        "gurdian_whatsapp",
        "gurdian_relation",
        "biodata_email",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
}
