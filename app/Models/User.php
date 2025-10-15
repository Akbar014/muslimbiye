<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
  use HasApiTokens, Notifiable, HasRoles;

  /**
   * The attributes that are mass assignable.
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];


  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function biodata()
  {
    return Biodata::where(['user_id' => $this->id, 'deleted' => '0', 'admin_created' => '0'])->first();
  }

  // biodatas that user has added to favorite list.
  public function favorite_list()
  {
    return Favorite::where(['user_id' => $this->id])->get();
  }

  public function purchase_list()
  {
    return SubscriptionHistory::where(['users_id' => $this->id, 'status' => 'success', 'status_code' => '0000'])->get();
  }

  public function checkIfBiodataContactAvailable($id)
  {
    $connection = BiodataConnection::where(['biodata_id' => $id, 'user_id' => $this->id])->first();
    return $connection ? true : false;
  }
}
