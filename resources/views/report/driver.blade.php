<x-app-layout>
  <x-slot name="title">
    {{ __('Driver') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Driver</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 text-left rounded-tl rounded-bl">No.</th>
              <th class="px-4 py-3">Full Name</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Role</th>
              <th class="px-4 py-3">Phone Number</th>
              <th class="px-4 py-3">Gender</th>
              <th class="px-4 py-3 text-right rounded-tr rounded-br">Created</th>
            </tr>
          </thead>
          <tbody>
            @php
              $count = 1;
            @endphp
            @foreach ($allUserDetails as $allUserDetailsData)
              @if ($allUserDetailsData->user->role === 'driver')
                <tr class="border-b-2 border-gray-200">
                  <td class="px-4 py-3 text-left">{{ $count++ }}.</td>
                  <td class="px-4 py-3">
                    {{ $allUserDetailsData->first_name }}
                    @if ($allUserDetailsData->last_name)
                      {{ $allUserDetailsData->last_name }}
                    @endif
                  </td>
                  <td class="px-4 py-3">{{ $allUserDetailsData->user->email }}</td>
                  <td class="px-4 py-3">{{ $allUserDetailsData->user->role }}</td>
                  <td class="px-4 py-3">
                    @if ($allUserDetailsData->phone_no)
                      +60{{ $allUserDetailsData->phone_no }}
                    @else
                      -
                    @endif
                  </td>
                  <td class="px-4 py-3">
                    @if ($allUserDetailsData->gender)
                      {{ $allUserDetailsData->gender }}
                    @else
                      -
                    @endif
                  </td>
                  <td class="px-4 py-3 text-right">
                    {{ Carbon\Carbon::parse($allUserDetailsData->created_at)->format('d/m/Y') }}
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="flex items-center p-2 mt-2 gap-x-4">
        <a class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]"
          href="{{ route('report.export-driver') }}">
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
