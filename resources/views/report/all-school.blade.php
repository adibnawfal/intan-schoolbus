<x-app-layout>
  <x-slot name="title">
    {{ __('All School') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">All School</h1>
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
                    <td class="px-4 py-3 align-top">{{ $standardData }}
                    @elseif ($loop->last)
                      to {{ $standardData }}
                    </td>
                  @endif
                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="flex items-center p-2 mt-2 gap-x-4">
        <a class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]"
          href="{{ route('report.export-all-school') }}">
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
