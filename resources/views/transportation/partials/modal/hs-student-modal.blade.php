<div id="hs-student-{{ $studentData->id }}-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div
    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div
      class="flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="relative flex flex-col h-full p-6 overflow-hidden rounded">
        <span
          class="absolute top-0 right-0 px-3 py-1 text-xs tracking-widest text-white bg-[#08183A] rounded-bl">Standard
          {{ $studentData->standard }}</span>
        <h1 class="flex items-center pb-4 mb-4 text-4xl leading-none text-gray-900 border-b border-gray-200">
          <span>{{ $studentData->first_name }} {{ $studentData->last_name }}</span>
        </h1>
        <div class="w-full mb-8">
          <h2 class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 title-font sm:text-left">
            ABOUT STUDENT</h2>
          <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>{{ $studentData->school }}
            </p>
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>{{ $studentData->gender }}
            </p>
            <p class="flex items-center">
              <span
                class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </span>Date of Birth: {{ Carbon\Carbon::parse($studentData->date_of_birth)->format('d M Y') }}
            </p>
          </nav>
        </div>

        @if ($studentData->parent_guardian_id)
          <div class="w-full mb-8">
            <h2
              class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 uppercase title-font sm:text-left">
              {{ $studentData->parent_guardian->status }} INFORMATION</h2>
            <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
              <p class="flex items-center">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>{{ $studentData->parent_guardian->first_name }} {{ $studentData->parent_guardian->last_name }}
              </p>
              <p class="flex items-center">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>{{ $studentData->parent_guardian->gender }}
              </p>
              <p class="flex items-center">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>+60{{ $studentData->parent_guardian->phone_no }}
              </p>
            </nav>
          </div>
        @endif

        @if ($studentData->pickup_address_id)
          <div class="w-full mb-8">
            <h2 class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 title-font sm:text-left">
              PICK-UP ADDRESS</h2>
            <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
              <p class="flex">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mt-1 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>{{ $studentData->pickup_address->address_1 }}, {{ $studentData->pickup_address->address_2 }},
                {{ $studentData->pickup_address->postal_code }} {{ $studentData->pickup_address->city }},
                {{ $studentData->pickup_address->state }}
              </p>
              <p class="flex items-center">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>{{ $studentData->pickup_address->area }}
              </p>
            </nav>
          </div>
        @endif

        @if ($studentData->dropoff_address_id)
          <div class="w-full mb-8">
            <h2 class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 title-font sm:text-left">
              DROP-OFF ADDRESS</h2>
            <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
              <p class="flex">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mt-1 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>{{ $studentData->dropoff_address->address_1 }}, {{ $studentData->dropoff_address->address_2 }},
                {{ $studentData->dropoff_address->postal_code }} {{ $studentData->dropoff_address->city }},
                {{ $studentData->dropoff_address->state }}
              </p>
              <p class="flex items-center">
                <span
                  class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-[#08183A] rounded-full">
                  <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </span>{{ $studentData->dropoff_address->area }}
              </p>
            </nav>
          </div>
        @endif

        <button type="button"
          class="flex items-center w-full px-4 py-2 -mt-2 text-white bg-[#08183A] border-0 rounded focus:outline-none hover:bg-[#08183A]/[.8]"
          data-hs-overlay="#hs-student-{{ $studentData->id }}-modal">
          Close
          <svg class="w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-x">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
