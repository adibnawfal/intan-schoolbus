<x-app-layout>
  <x-slot name="title">
    {{ __('Request Status') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Request Bus Service Status</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 text-left rounded-tl rounded-bl">No.</th>
              <th class="px-4 py-3">Student Name</th>
              <th class="px-4 py-3">Start Date</th>
              <th class="px-4 py-3">End Date</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3 text-right rounded-tr rounded-br"></th>
            </tr>
          </thead>
          <tbody>
            @php
              $count = 1;
            @endphp
            @foreach ($busService as $busServiceData)
              @if ($busServiceData->student->user_id === $user->id)
                <tr class="border-b-2 border-gray-200">
                  <td class="px-4 py-3 text-left">{{ $count++ }}.</td>
                  <td class="px-4 py-3">
                    {{ $busServiceData->student->first_name }} {{ $busServiceData->student->last_name }}
                  </td>
                  <td class="px-4 py-3">{{ Carbon\Carbon::parse($busServiceData->start_date)->format('d/m/Y') }}</td>
                  <td class="px-4 py-3">{{ Carbon\Carbon::parse($busServiceData->end_date)->format('d/m/Y') }}</td>
                  <td class="px-4 py-3">
                    @if ($busServiceData->status === 'Pending')
                      <span class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                        {{ $busServiceData->status }}
                      </span>
                    @elseif ($busServiceData->status === 'Success')
                      <span class="px-3 py-1 text-xs font-medium text-teal-800 bg-teal-100 rounded-full">
                        {{ $busServiceData->status }}
                      </span>
                    @elseif ($busServiceData->status === 'Rejected')
                      <span class="px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                        {{ $busServiceData->status }}
                      </span>
                    @endif
                  </td>
                  <td class="flex justify-end px-4 py-3 text-right">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-ellipsis-vertical">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="5" r="1" />
                      <circle cx="12" cy="19" r="1" />
                    </svg>
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        <p class="mt-8 text-sm leading-relaxed">
          Student’s record for successful registration will appear on Dashboard.
          <a class="font-semibold underline" href="{{ route('dashboard') }}">
            Go to Dashboard.
          </a>
        </p>
      </div>
    </div>
  </div>
</x-app-layout>
