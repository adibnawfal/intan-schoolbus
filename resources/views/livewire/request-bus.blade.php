<form method="post" action="{{ route('transportation.post-request-bus') }}">
  @csrf

  <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
    <div class="flex flex-col w-full">
      <h1 class="text-xl font-bold">Select Student Profile</h1>
      <p class="text-sm leading-relaxed">Please select which student to be registered for school bus service.</p>
    </div>
    <div class="flex flex-wrap -m-2">
      @php
        $count = 1;
      @endphp
      @foreach ($this->student as $studentData)
        <div class="relative w-full p-2 lg:w-1/3 md:w-1/2">
          <span
            class="absolute px-3 py-1 text-xs tracking-widest border border-gray-300 rounded-tr rounded-bl top-2 right-2">Standard
            {{ $studentData->standard }}</span>
          <label for="student{{ $studentData->id }}"
            class="flex items-center p-6 border border-gray-300 rounded gap-x-4 hover:shadow has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-200">
            <p class="self-start font-medium">{{ $count++ }}.</p>
            <div class="flex-grow">
              <button type="button" class="font-medium line-clamp-1 hover:underline"
                data-hs-overlay="#hs-student-{{ $studentData->id }}-modal">
                {{ $studentData->first_name }} {{ $studentData->last_name }}
              </button>
              <p class="text-xs text-gray-500">
                {{ $studentData->school }}
              </p>
            </div>
            <input type="checkbox" name="student[]" id="student{{ $studentData->id }}" value="{{ $studentData->id }}"
              class="text-indigo-600 mt-0.5 border-gray-300 rounded shrink-0 ms-auto focus:ring-indigo-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-indigo-500 dark:checked:border-indigo-500 dark:focus:ring-offset-gray-800"
              wire:model.live="selectedStudent">
          </label>
        </div>
        @include('transportation.partials.modal.hs-student-modal')
      @endforeach
    </div>

    <div class="flex flex-col w-full mt-4">
      <h1 class="text-xl font-bold">Monthly Fee Summary</h1>
      <p class="text-sm leading-relaxed">Below are the summary of corresponding student's monthly school bus service
        fee.</p>
    </div>

    <div class="w-full mt-2 overflow-auto">
      <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
        <thead>
          <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
            <th class="px-4 py-3 text-left rounded-tl rounded-bl">No.</th>
            <th class="px-4 py-3">Student Name</th>
            <th class="px-4 py-3">Pick-Up Area</th>
            <th class="px-4 py-3">Drop-Off Area</th>
            <th class="px-4 py-3 text-right rounded-tr rounded-br">Fee (RM)</th>
          </tr>
        </thead>
        <tbody>
          @php
            $count = 1;
          @endphp
          @foreach ($this->student as $studentData)
            @foreach ($selectedStudent as $selectedStudentKey)
              @if ($studentData->id == $selectedStudentKey)
                @php
                  $fee = 0;
                  $feePickUp = 0;
                  $feeDropOff = 0;

                  if ($studentData->pickup_address_id) {
                      switch ($studentData->pickup_address->area) {
                          case 'Taman Keramat AU1':
                              $feePickUp = 50;
                              break;
                          case 'Taman Keramat AU2':
                              $feePickUp = 60;
                              break;
                          case 'Taman Keramat AU3':
                              $feePickUp = 70;
                              break;
                          case 'Taman Keramat AU4':
                              $feePickUp = 80;
                              break;
                      }
                  }

                  if ($studentData->dropoff_address_id) {
                      switch ($studentData->dropoff_address->area) {
                          case 'Taman Keramat AU1':
                              $feeDropOff = 50;
                              break;
                          case 'Taman Keramat AU2':
                              $feeDropOff = 60;
                              break;
                          case 'Taman Keramat AU3':
                              $feeDropOff = 70;
                              break;
                          case 'Taman Keramat AU4':
                              $feeDropOff = 80;
                              break;
                      }
                  }

                  if ($studentData->pickup_address_id && $studentData->dropoff_address_id) {
                      if ($feePickUp > $feeDropOff) {
                          $fee = $feePickUp;
                      } else {
                          $fee = $feeDropOff;
                      }
                  }
                @endphp
                <tr class="border-b-2 border-gray-200">
                  <td class="px-4 py-3 text-left">{{ $count++ }}.</td>
                  <td class="px-4 py-3">{{ $studentData->first_name }} {{ $studentData->last_name }}</td>
                  <td class="px-4 py-3">
                    @if ($studentData->pickup_address_id)
                      {{ $studentData->pickup_address->area }}
                    @else
                      -
                    @endif
                  </td>
                  <td class="px-4 py-3">
                    @if ($studentData->dropoff_address_id)
                      {{ $studentData->dropoff_address->area }}
                    @else
                      -
                    @endif
                  </td>
                  <td class="px-4 py-3 text-right">{{ number_format($fee, 2) }}</td>
                </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="flex items-center mt-4 gap-x-4">
      <button type="submit"
        class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
        Confirm
      </button>
      <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
        href="{{ route('transportation.view') }}">
        Cancel
      </a>
    </div>

    <p class="mt-4 text-sm leading-relaxed">
      Did not see student’s profile?
      <a class="font-semibold underline" href="{{ route('profile.student-profile') }}">
        Create student profile's
      </a>
      first.
    </p>

    @if (session('status') === 'request-failure')
      <div id="dismiss-alert"
        class="fixed bottom-0 m-8 transition duration-300 max-w-[550px] end-0 hs-removing:translate-x-5 hs-removing:opacity-0">
        <div>
          <div class="p-4 rounded border-red-500 bg-red-50 border-s-4 role="alert">
            <div class="flex text-red-500">
              <div class="flex-shrink-0">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm">The selected student already request for bus service.</p>
              </div>
              <div class="flex ms-8">
                <button type="button"
                  class="inline-flex items-center justify-center flex-shrink-0 rounded-lg size-5 hover:text-red-600 focus:outline-none"
                  data-hs-remove-element="#dismiss-alert">
                  <span class="sr-only">Close</span>
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @elseif (session('status') === 'student-not-completed')
      <div id="dismiss-alert"
        class="fixed bottom-0 m-8 transition duration-300 max-w-[550px] end-0 hs-removing:translate-x-5 hs-removing:opacity-0">
        <div>
          <div class="p-4 rounded border-red-500 bg-red-50 border-s-4 role="alert">
            <div class="flex text-red-500">
              <div class="flex-shrink-0">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-sm">Please update your student profile before continue.</p>
              </div>
              <div class="flex ms-8">
                <button type="button"
                  class="inline-flex items-center justify-center flex-shrink-0 rounded-lg size-5 hover:text-red-600 focus:outline-none"
                  data-hs-remove-element="#dismiss-alert">
                  <span class="sr-only">Close</span>
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</form>
