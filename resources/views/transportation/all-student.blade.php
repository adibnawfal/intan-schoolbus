<x-app-layout>
  <x-slot name="title">
    {{ __('All Student') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">All Student</h1>
        <p class="text-sm leading-relaxed">Below are the details of all students using the school bus service.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 text-left rounded-tl rounded-bl">No.</th>
              <th class="px-4 py-3">Student Name</th>
              <th class="px-4 py-3">Session</th>
              <th class="px-4 py-3">Standard</th>
              <th class="px-4 py-3">School</th>
              <th class="px-4 py-3">Monthly Fee (RM)</th>
              <th class="px-4 py-3 text-left">Pick-Up Address (From Home to School)</th>
              <th class="px-4 py-3 text-left">Drop-Off Address (From School to Home)</th>
              <th class="px-4 py-3 text-right rounded-tr rounded-br"></th>
            </tr>
          </thead>
          <tbody>
            @php
              $count = 1;
            @endphp
            @foreach ($busService as $busServiceData)
              @php
                $studentData = App\Models\Student::findOrFail($busServiceData->student_id);
                $paymentData = App\Models\Payment::where('bus_service_id', $busServiceData->id)->first();
                $busSchedule = App\Models\BusSchedule::all();
                foreach ($busSchedule as $busScheduleData) {
                    foreach (json_decode($busScheduleData->standard) as $busScheduleStandard) {
                        if ($busScheduleStandard == $busServiceData->student->standard) {
                            $session = $busScheduleData->session;
                        }
                    }
                }
              @endphp
              <tr class="border-b-2 border-gray-200">
                <td class="px-4 py-3 text-left">{{ $count++ }}.</td>
                <td class="px-4 py-3">
                  <button type="button" class="hover:underline"
                    data-hs-overlay="#hs-student-{{ $studentData->id }}-modal">
                    {{ $busServiceData->student->first_name }} {{ $busServiceData->student->last_name }}
                  </button>
                </td>
                <td class="px-4 py-3">{{ $session }}</td>
                <td class="px-4 py-3">{{ $busServiceData->student->standard }}</td>
                <td class="px-4 py-3">{{ $busServiceData->student->school }}</td>
                <td class="px-4 py-3">{{ number_format($paymentData->fee, 2, '.') }}</td>
                <td class="px-4 py-3 text-left">
                  {{ $busServiceData->student->pickup_address->address_1 }},
                  {{ $busServiceData->student->pickup_address->address_2 }},
                  {{ $busServiceData->student->pickup_address->postal_code }}
                  {{ $busServiceData->student->pickup_address->city }},
                  {{ $busServiceData->student->pickup_address->state }}
                  <div>({{ $busServiceData->student->pickup_address->area }})</div>
                </td>
                <td class="px-4 py-3 text-left">
                  {{ $busServiceData->student->dropoff_address->address_1 }},
                  {{ $busServiceData->student->dropoff_address->address_2 }},
                  {{ $busServiceData->student->dropoff_address->postal_code }}
                  {{ $busServiceData->student->dropoff_address->city }},
                  {{ $busServiceData->student->dropoff_address->state }}
                  <div>({{ $busServiceData->student->dropoff_address->area }})</div>
                </td>
                <td class="px-4 py-3 text-right hs-dropdown">
                  <button id="hs-dropdown-custom-icon-trigger">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-ellipsis-vertical">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="5" r="1" />
                      <circle cx="12" cy="19" r="1" />
                    </svg>
                  </button>
                  <div type="button"
                    class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded p-2 mt-2"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <button type="button" class="flex items-center w-full px-3 py-2 text-sm rounded hover:bg-gray-100"
                      data-hs-overlay="#hs-student-{{ $studentData->id }}-modal">
                      Student Details
                    </button>
                  </div>
                </td>
              </tr>
              @include('transportation.partials.modal.hs-student-modal')
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="flex items-center mt-2">
        <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
          href="{{ route('transportation.student-details') }}">
          Back
        </a>
      </div>
    </div>
  </div>
</x-app-layout>
