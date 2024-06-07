<x-app-layout>
  <x-slot name="title">
    {{ __('Schedule Information') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Schedule Information</h1>
        <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="flex flex-wrap -m-2">
        @php
          $count = 1;
        @endphp
        @foreach ($busSchedule as $busScheduleData)
          @php
            $standard = json_decode($busScheduleData->standard);
          @endphp
          <button type="button" data-hs-overlay="#hs-schedule-{{ $busScheduleData->id }}-modal"
            class="relative w-full p-2 lg:w-1/3 md:w-1/2">
            <div class="flex items-center justify-between p-6 border border-gray-300 rounded gap-x-4 hover:shadow">
              <div class="flex gap-x-4">
                <p class="font-medium">{{ $count++ }}.</p>
                <div class="flex flex-col items-start">
                  <h2 class="font-medium line-clamp-1">
                    {{ $busScheduleData->session }}
                  </h2>
                  <p class="text-xs text-gray-500 line-clamp-1">
                    Standard
                    @foreach ($standard as $standardData)
                      {{ $standardData }}
                      @if (!$loop->last)
                        ,
                      @endif
                    @endforeach
                  </p>
                </div>
              </div>
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-chevron-right">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </div>
          </button>
          @include('transportation.partials.modal.hs-schedule-modal')
        @endforeach
      </div>
      <a class="flex items-center justify-between px-6 py-3 mt-2 font-semibold border border-gray-300 rounded hover:shadow"
        href="{{ route('transportation.get-new-schedule') }}">
        Add New Schedule Information
        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="lucide lucide-circle-plus">
          <circle cx="12" cy="12" r="10" />
          <path d="M8 12h8" />
          <path d="M12 8v8" />
        </svg>
      </a>
    </div>
  </div>
</x-app-layout>
