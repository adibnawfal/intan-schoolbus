<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\Student;

class TestRequestBus extends Component
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
    return <<<'HTML'
        <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
          <div class="flex flex-col w-full">
            <h1 class="text-xl font-bold">Select Student Profile</h1>
            <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="flex flex-wrap -m-2">
            @php
              $count = 1;
            @endphp
            @foreach ($this->student as $studentData)
              <div class="w-full p-2 lg:w-1/3 md:w-1/2">
                <label for="student{{ $studentData->id }}"
                  class="flex items-center p-6 border border-gray-300 rounded gap-x-4 hover:shadow has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                  <p class="self-start font-medium">{{ $count++ }}.</p>
                  <div class="flex-grow">
                    <h2 class="font-medium line-clamp-1">
                      {{ $studentData->first_name }} {{ $studentData->last_name }}
                    </h2>
                    <p class="text-xs text-gray-500 uppercase">
                      Standard {{ $studentData->standard }}
                    </p>
                  </div>
                  <input type="checkbox" name="student" id="student{{ $studentData->id }}" value="{{ $studentData->id }}"
                    class="text-blue-600 mt-0.5 border-gray-300 rounded shrink-0 ms-auto focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    wire:model.live="selectedStudent">
                </label>
              </div>
            @endforeach
          </div>

          Selected Student: {{var_export($selectedStudent)}}

          <div class="flex flex-col w-full mt-4">
            <h1 class="text-xl font-bold">Monthly Fee Summary</h1>
            <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>

          <div class="w-full mt-2 overflow-auto">
            <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
              <thead>
                <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
                  <th class="px-4 py-3 text-left rounded-tl rounded-bl">No.</th>
                  <th class="px-4 py-3">Student Name</th>
                  <th class="px-4 py-3">Area</th>
                  <th class="px-4 py-3 text-right rounded-tr rounded-br">Fee (RM)</th>
                </tr>
              </thead>
              <tbody>
              {{-- @foreach ($student->where('id', $selectedStudent) as $studentData)
                  <tr class="border-b-2 border-gray-200">
                    <td class="px-4 py-3 text-left">1.</td>
                    <td class="px-4 py-3">Nur Reyna</td>
                    <td class="px-4 py-3">Taman Keramat AU1</td>
                    <td class="px-4 py-3 text-right">50.00</td>
                  </tr>
                @endforeach --}}
              </tbody>
            </table>
          </div>

          <div class="flex items-center mt-4 gap-x-4">
            <a class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700"
              href="{{ route('transportation.request-submitted') }}">
              Confirm
            </a>
            <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
              href="{{ route('transportation.view') }}">
              Cancel
            </a>
          </div>
        </div>
        HTML;
  }
}