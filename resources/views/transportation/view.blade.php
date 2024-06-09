<x-app-layout>
  <x-slot name="title">
    {{ __('Transportation') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Announcement -->
    <div class="relative flex flex-wrap w-full px-10 py-24 bg-black shadow sm:rounded">
      <img class="absolute inset-0 block object-cover object-center w-full h-full opacity-25"
        src="https://images.unsplash.com/photo-1556504505-2ebcc8edf84a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="announcement">
      <div class="relative z-10 w-full text-center text-white">
        <h2 class="mb-2 text-5xl font-bold title-font">Welcome Back To School</h2>
        <p class="mx-auto leading-relaxed">
          We are open for student registration for Intan School Bus Service for 2024 School Session!
        </p>
      </div>
    </div>
    <!-- End Announcement -->

    <!-- Information -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">School Name, Pickup and Dropoff Area Covered, and Fee Range</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 rounded-tl rounded-bl">School Name</th>
              <th class="px-4 py-3">Service Period</th>
              <th class="px-4 py-3">Start - End Date</th>
              <th class="px-4 py-3">Area Covered</th>
              <th class="px-4 py-3">Monthly Fee (Per Person)</th>
              <th class="px-4 py-3 rounded-tr rounded-br">Standard</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($school as $schoolData)
              @php
                $details = json_decode($schoolData->details);
                $standard = json_decode($schoolData->standard);
              @endphp
              <tr class="border-b-2 border-gray-200">
                <td class="px-4 py-3 align-top">{{ $schoolData->name }}</td>
                <td class="px-4 py-3 align-top">{{ $schoolData->service_period }} Months</td>
                <td class="px-4 py-3 align-top">
                  {{ Carbon\Carbon::parse($schoolData->start_date)->format('d/m/Y') }} -
                  {{ Carbon\Carbon::parse($schoolData->end_date)->format('d/m/Y') }}
                </td>
                <td class="px-4 py-3 align-top">
                  @foreach ($details as $key => $detailsData)
                    <span class="block">{{ $key }}</span>
                  @endforeach
                </td>
                <td class="px-4 py-3 align-top">
                  @foreach ($details as $key => $detailsData)
                    <span class="block">RM{{ number_format($detailsData, 0) }}</span>
                  @endforeach
                </td>
                @foreach ($standard as $standardData)
                  @if ($loop->first)
                    <td class="px-4 py-3 align-top">{{ $standardData }} to
                    @elseif ($loop->last)
                      {{ $standardData }}
                    </td>
                  @endif
                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="flex flex-col w-full mt-4">
        <h1 class="text-xl font-bold">Intan School Bus Operation Hour</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-fixed">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 rounded-tl rounded-bl">Session</th>
              <th class="px-4 py-3">Standard</th>
              <th class="px-4 py-3">Pick-Up Time (From Home to School)</th>
              <th class="px-4 py-3 rounded-tr rounded-br">Drop-Off Time (From School to Home)</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($busSchedule as $busScheduleData)
              @php
                $standard = json_decode($busScheduleData->standard);
              @endphp
              <tr class="border-b-2 border-gray-200">
                <td class="px-4 py-3">{{ $busScheduleData->session }}</td>
                <td class="px-4 py-3">
                  @foreach ($standard as $standardData)
                    {{ $standardData }}
                    @if (!$loop->last)
                      ,
                    @endif
                  @endforeach
                </td>
                <td class="px-4 py-3">
                  {{ Carbon\Carbon::parse($busScheduleData->pickup_from)->format('h.i a') }} -
                  {{ Carbon\Carbon::parse($busScheduleData->pickup_to)->format('h.i a') }}
                </td>
                <td class="px-4 py-3">
                  {{ Carbon\Carbon::parse($busScheduleData->dropoff_from)->format('h.i a') }} -
                  {{ Carbon\Carbon::parse($busScheduleData->dropoff_to)->format('h.i a') }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @if (Auth::user()->role === 'customer')
        <div class="flex items-center mt-4 gap-x-4">
          <a class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]"
            href="{{ route('transportation.get-request-bus') }}">
            Request Bus Service
          </a>
        </div>
      @endif
    </div>
    <!-- End Information -->
  </div>
</x-app-layout>
