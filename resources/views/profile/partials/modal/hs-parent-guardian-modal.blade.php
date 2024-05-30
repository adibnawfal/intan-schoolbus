<div id="hs-parent-guardian-{{ $parentGuardianData->id }}-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div
    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div
      class="flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="relative flex flex-col h-full p-6 overflow-hidden rounded">
        <span
          class="absolute top-0 right-0 px-3 py-1 text-xs tracking-widest text-white bg-blue-500 rounded-bl">{{ $parentGuardianData->status }}</span>
        <h1 class="flex items-center pb-4 mb-4 text-4xl leading-none text-gray-900 border-b border-gray-200">
          <span>{{ $parentGuardianData->first_name }} {{ $parentGuardianData->last_name }}</span>
        </h1>
        <p class="flex items-center mb-2 text-gray-600">
          <span
            class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-blue-500 rounded-full">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
              class="w-3 h-3" viewBox="0 0 24 24">
              <path d="M20 6L9 17l-5-5"></path>
            </svg>
          </span>{{ $parentGuardianData->gender }}
        </p>
        <p class="flex items-center mb-2 text-gray-600">
          <span
            class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 text-white bg-blue-500 rounded-full">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
              class="w-3 h-3" viewBox="0 0 24 24">
              <path d="M20 6L9 17l-5-5"></path>
            </svg>
          </span>+60{{ $parentGuardianData->phone_no }}
        </p>
        @if ($parentGuardianData->bio)
          <p class="flex text-gray-600">
            <span
              class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 mt-1 mr-2 text-white bg-blue-500 rounded-full">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5"></path>
              </svg>
            </span>{{ $parentGuardianData->bio }}
          </p>
        @endif
        <a class="flex items-center w-full px-4 py-2 mt-6 text-white bg-blue-500 border-0 rounded focus:outline-none hover:bg-blue-600"
          href="{{ route('profile.update-parent-guardian', $parentGuardianData->id) }}">
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
