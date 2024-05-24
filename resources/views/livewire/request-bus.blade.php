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

                if ($feePickUp > $feeDropOff) {
                    $fee = $feePickUp;
                } else {
                    $fee = $feeDropOff;
                }
              @endphp
              <tr class="border-b-2 border-gray-200">
                <td class="px-4 py-3 text-left">{{ $count++ }}.</td>
                <td class="px-4 py-3">{{ $studentData->first_name }} {{ $studentData->last_name }}</td>
                <td class="px-4 py-3">{{ $studentData->pickup_address->area }}</td>
                <td class="px-4 py-3">{{ $studentData->dropoff_address->area }}</td>
                <td class="px-4 py-3 text-right">{{ number_format($fee, 2) }}</td>
              </tr>
            @endif
          @endforeach
        @endforeach
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
