<x-app-layout>
  <x-slot name="title">
    {{ __('Payment') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Select Payment Record</h1>
        <p class="text-sm leading-relaxed">Please select to view student's payment details.</p>
      </div>

      <div class="flex flex-wrap -m-2">
        @php
          $count = 1;
        @endphp
        @foreach ($busService as $busServiceData)
          @php
            $studentData = App\Models\Student::findOrFail($busServiceData->student_id);
          @endphp
          <a class="relative w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('payment.get-record', $busServiceData->id) }}">
            <span
              class="absolute px-3 py-1 text-xs tracking-widest border border-gray-300 rounded-tr rounded-bl top-2 right-2">Standard
              {{ $busServiceData->student->standard }}</span>
            <div class="flex items-center justify-between p-6 border border-gray-300 rounded gap-x-4 hover:shadow">
              <div class="flex gap-x-4">
                <p class="font-medium">{{ $count++ }}.</p>
                <div class="flex flex-col items-start">
                  <button type="button" onclick="event.preventDefault()"
                    class="font-medium line-clamp-1 hover:underline"
                    data-hs-overlay="#hs-student-{{ $studentData->id }}-modal">
                    {{ $studentData->first_name }} {{ $studentData->last_name }}
                  </button>
                  <p class="text-xs text-gray-500">
                    {{ $busServiceData->student->school }}
                  </p>
                </div>
              </div>
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-chevron-right">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </div>
          </a>
          @include('payment.partials.modal.hs-student-modal')
        @endforeach
      </div>

      <p class="text-sm leading-relaxed">
        Did not see student’s name?
        <a class="font-semibold underline" href="{{ route('transportation.view') }}">
          Request for bus service
        </a>
        and wait for admin approval.
      </p>
    </div>
  </div>
</x-app-layout>
