<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'user_id', 'title', 'story', 'status',
      ];
      public function admins()
      {
          return $this->hasMany('App\Models\Admin','id','user_id');
      }

}
