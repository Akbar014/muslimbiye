<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataConnection extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "biodata_id",
    ];
}
