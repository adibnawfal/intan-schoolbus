<x-app-layout>
  <x-slot name="title">
    {{ __('Schedule Information') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Schedule Information</h1>
        <p class="text-sm leading-relaxed lg:w-2/3">Manage or add bus schedule details here.</p>
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

@if (session('status') === 'schedule-deleted')
  <div id="dismiss-alert"
    class="fixed bottom-0 m-8 transition duration-300 max-w-[550px] end-0 hs-removing:translate-x-5 hs-removing:opacity-0">
    <div>
      <div class="p-4 rounded border-green-500 bg-green-50 border-s-4 role="alert">
        <div class="flex text-green-500">
          <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
              fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="ms-3">
            <p class="text-sm">Schedule session has been successfully deleted.</p>
          </div>
          <div class="flex ms-8">
            <button type="button"
              class="inline-flex items-center justify-center flex-shrink-0 rounded-lg size-5 hover:text-green-600 focus:outline-none"
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
@endif
