<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'user_id',
    'first_name',
    'last_name',
    'status',
    'phone_no',
    'gender',
    'bio',
    'profile_img',
    'default',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }
}