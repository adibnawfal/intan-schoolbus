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
    'parent_guardian',
    'pickup_address',
    'dropoff_address',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}