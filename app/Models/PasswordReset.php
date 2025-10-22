<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
   protected $table = 'password_resets';

    // use email as the primary key
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    // if you created both timestamps, keep true; otherwise false
    public $timestamps = true; // or false if you only have created_at

    protected $fillable = ['email', 'token', 'created_at', 'updated_at'];
}
