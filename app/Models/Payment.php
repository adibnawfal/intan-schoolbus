<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'bus_service_id',
    'year',
    'month',
    'status',
    'date',
    'method',
    'fee',
  ];

  public function bus_service()
  {
    return $this->belongsTo('App\Models\BusService', 'bus_service_id');
  }
}