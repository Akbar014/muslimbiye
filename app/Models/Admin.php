<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
  use HasApiTokens, Notifiable, HasRoles;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'user_type',
    'phone',
    'phone',
    'can_login',
    'role_id',
    'google_id',
    'fb_id',
    'gender'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];


  protected $casts = [
    'email_verified_at' => 'datetime',
  ];


  public static function getPermissionGroups()
  {
    $permission_groups = DB::table('permissions')->select('group_name as name')->groupBy('group_name')->get();
    return $permission_groups;
  }

  //    public static function getPermissionByGroupName($group_name)
  //    {
  //        $permissions = DB::table('permissions')
  //            ->select('name', 'id')
  //            ->where('group_name', $group_name)
  //            ->get();

  //    }
}
