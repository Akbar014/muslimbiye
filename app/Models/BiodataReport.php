<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataReport extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
    ];

    public function biodata()
    {
        return Biodata::find($this->biodata_id);
    }
    public function user()
    {
        return User::find($this->user_id);
    }
}
