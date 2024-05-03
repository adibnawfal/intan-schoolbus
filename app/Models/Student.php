<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
    'school',
    'standard',
    'gender',
    'date_of_birth',
    'parent_guardian_id',
    'pickup_address_id',
    'dropoff_address_id',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function parent_guardian()
  {
    return $this->belongsTo('App\Models\UserDetails', 'parent_guardian_id');
  }

  public function pickup_address()
  {
    return $this->belongsTo('App\Models\Address', 'pickup_address_id');
  }

  public function dropoff_address()
  {
    return $this->belongsTo('App\Models\Address', 'dropoff_address_id');
  }
}