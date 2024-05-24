<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Student;

#[Layout('layouts.app')]
class RequestBus extends Component
{
  public $selectedStudent = [];

  #[Computed]
  public function student()
  {
    return Student::where('user_id', auth()->user()->id)
      ->get();
  }

  public function render()
  {
    return view('livewire.request-bus');
  }
}