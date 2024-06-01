<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusService extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'user_id',
    'student_id',
    'start_date',
    'end_date',
    'status',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function student()
  {
    return $this->belongsTo('App\Models\Student', 'student_id');
  }
}