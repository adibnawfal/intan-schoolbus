<?php

namespace App\Livewire;

use Livewire\Component;

class Record extends Component
{
  public $busServiceData;
  public $payment;
  public $selectedMonth = [];

  public function render()
  {
    return view('livewire.record');
  }
}