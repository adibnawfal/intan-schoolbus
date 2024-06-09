<x-app-layout>
  <x-slot name="title">
    {{ __('Taman Keramat AU2') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Taman Keramat AU2</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 text-left rounded-tl rounded-bl">No.</th>
              <th class="px-4 py-3">Full Name</th>
              <th class="px-4 py-3">School</th>
              <th class="px-4 py-3">Standard</th>
              <th class="px-4 py-3">Gender</th>
              <th class="px-4 py-3">Date of Birth</th>
              <th class="px-4 py-3 text-left">Parent/Guardian</th>
              <th class="px-4 py-3 text-left">Pick-Up Address</th>
              <th class="px-4 py-3 text-left">Drop-Off Address</th>
              <th class="px-4 py-3 text-right rounded-tr rounded-br">Created</th>
            </tr>
          </thead>
          <tbody>
            @php
              $count = 1;
            @endphp
            @foreach ($allStudent as $allStudentData)
              @if (
                  $allStudentData->pickup_address->area === 'Taman Keramat AU2' ||
                      $allStudentData->dropoff_address->area === 'Taman Keramat AU2')
                <tr class="border-b-2 border-gray-200">
                  <td class="px-4 py-3 text-left">{{ $count++ }}.</td>
                  <td class="px-4 py-3">
                    {{ $allStudentData->first_name }}
                    @if ($allStudentData->last_name)
                      {{ $allStudentData->last_name }}
                    @endif
                  </td>
                  <td class="px-4 py-3">{{ $allStudentData->school }}</td>
                  <td class="px-4 py-3">{{ $allStudentData->standard }}</td>
                  <td class="px-4 py-3">{{ $allStudentData->gender }}</td>
                  <td class="px-4 py-3">{{ Carbon\Carbon::parse($allStudentData->date_of_birth)->format('d/m/Y') }}</td>
                  <td class="px-4 py-3">
                    <div class="flex flex-col text-left">
                      <span>{{ $allStudentData->parent_guardian->first_name }}
                        {{ $allStudentData->parent_guardian->last_name }}</span>
                      <span>{{ $allStudentData->parent_guardian->status }}</span>
                      <span>
                        @if ($allStudentData->parent_guardian->phone_no)
                          +60{{ $allStudentData->parent_guardian->phone_no }}
                        @endif
                      </span>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-left">
                    {{ $allStudentData->pickup_address->address_1 }},
                    {{ $allStudentData->pickup_address->address_2 }},
                    {{ $allStudentData->pickup_address->postal_code }} {{ $allStudentData->pickup_address->city }},
                    {{ $allStudentData->pickup_address->state }} ({{ $allStudentData->pickup_address->area }})
                  </td>
                  <td class="px-4 py-3 text-left">
                    {{ $allStudentData->dropoff_address->address_1 }},
                    {{ $allStudentData->dropoff_address->address_2 }},
                    {{ $allStudentData->dropoff_address->postal_code }} {{ $allStudentData->dropoff_address->city }},
                    {{ $allStudentData->dropoff_address->state }} ({{ $allStudentData->dropoff_address->area }})
                  </td>
                  <td class="px-4 py-3 text-right">
                    {{ Carbon\Carbon::parse($allStudentData->created_at)->format('d/m/Y') }}
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="flex items-center p-2 mt-2 gap-x-4">
        <a class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]"
          href="{{ route('report.export-taman-keramat-au2') }}">
          Export to Excel
        </a>
        <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
          href="{{ route('report.view') }}">
          Back
        </a>
      </div>
    </div>
  </div>
</x-app-layout>
