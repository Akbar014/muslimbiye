<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   protected $fillable = ['name','email','contact','address','social_facebook','social_linkedin','social_insta','social_youtube','description',
];
}
