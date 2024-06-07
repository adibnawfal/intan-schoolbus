<div id="hs-schedule-{{ $busScheduleData->id }}-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div
    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div
      class="flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="relative flex flex-col h-full p-6 overflow-hidden rounded">
        <h1 class="flex items-center pb-4 mb-4 text-4xl leading-none text-gray-900 border-b border-gray-200">
          <span>{{ $busScheduleData->session }}</span>
        </h1>
        <div class="w-full">
          <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-blue-500 rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>Standard
              @foreach ($standard as $standardData)
                {{ $standardData }}
                @if (!$loop->last)
                  ,
                @endif
              @endforeach
            </p>
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-blue-500 rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>Pick-Up Time:
              {{ Carbon\Carbon::parse($busScheduleData->pickup_from)->format('h.i a') }} -
              {{ Carbon\Carbon::parse($busScheduleData->pickup_to)->format('h.i a') }}
            </p>
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-blue-500 rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>Drop-Off Time:
              {{ Carbon\Carbon::parse($busScheduleData->dropoff_from)->format('h.i a') }} -
              {{ Carbon\Carbon::parse($busScheduleData->dropoff_to)->format('h.i a') }}
            </p>
          </nav>
        </div>
        <a class="flex items-center w-full px-4 py-2 mt-6 text-white bg-blue-500 border-0 rounded focus:outline-none hover:bg-blue-600"
          href="{{ route('transportation.get-update-schedule', $busScheduleData->id) }}">
          Update
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>
