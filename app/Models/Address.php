<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'user_id',
    'address_1',
    'address_2',
    'postal_code',
    'city',
    'state',
    'area',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }
}