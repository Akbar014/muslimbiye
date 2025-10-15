<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = ['about_us', 'terms', 'mission', 'vision', 'admin_info', 'privacy_policy'];}
