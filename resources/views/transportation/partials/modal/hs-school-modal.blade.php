<div id="hs-school-{{ $schoolData->id }}-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div
    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div
      class="flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="relative flex flex-col h-full p-6 overflow-hidden rounded">
        <h1 class="flex items-center pb-4 mb-4 text-4xl leading-none text-gray-900 border-b border-gray-200">
          <span>{{ $schoolData->name }}</span>
        </h1>
        <div class="w-full mb-8">
          <h2 class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 title-font sm:text-left">
            SCHOOL INFORMATION</h2>
          <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>Service Period: {{ $schoolData->service_period }} Months
            </p>
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>{{ Carbon\Carbon::parse($schoolData->start_date)->format('d/m/Y') }} -
              {{ Carbon\Carbon::parse($schoolData->end_date)->format('d/m/Y') }}
            </p>
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>
              @foreach ($standard as $standardData)
                @if ($loop->first)
                  Standard {{ $standardData }}
                @elseif ($loop->last)
                  to {{ $standardData }}
                @endif
              @endforeach
            </p>
          </nav>
        </div>
        <div class="w-full mb-8">
          <h2 class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 title-font sm:text-left">
            AREA COVERED</h2>
          <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
            @foreach ($details as $key => $detailsData)
              <p class="flex items-center justify-between">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>{{ $key }} - RM{{ number_format($detailsData, 0) }}
              </p>
            @endforeach
          </nav>
        </div>
        <div class="flex items-center -mt-2 gap-x-2">
          <a class="flex items-center w-full px-4 py-2 text-white bg-[#08183A] border-0 rounded focus:outline-none hover:bg-[#08183A]/[.8]"
            href="{{ route('transportation.get-update-school', $schoolData->id) }}">
            Update
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
          <button type="button"
            class="px-4 py-3 text-white bg-red-600 border-0 rounded focus:outline-none hover:bg-red-700"
            data-hs-overlay="#hs-delete-school-{{ $schoolData->id }}-modal">
            <svg class="w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-trash-2">
              <path d="M3 6h18" />
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
              <line x1="10" x2="10" y1="11" y2="17" />
              <line x1="14" x2="14" y1="11" y2="17" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@include('transportation.partials.modal.hs-delete-school-modal')
