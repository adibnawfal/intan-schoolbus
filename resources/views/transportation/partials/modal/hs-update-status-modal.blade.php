<div id="hs-update-status-{{ $busServiceData->id }}-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div
    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div
      class="flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <form method="post" action="{{ route('transportation.update-status', $busServiceData->id) }}">
        @csrf
        @method('patch')

        <div class="relative flex flex-col h-full p-6 overflow-hidden rounded">
          <h1 class="flex items-center pb-4 mb-4 text-4xl leading-none text-gray-900 border-b border-gray-200">
            <span>Update Status</span>
          </h1>
          <div class="w-full">
            <div class="relative">
              <select id="status" name="status"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                <option @selected(old('status', $busServiceData->status) == null) value=null disabled>Select status</option>
                <option @selected(old('status', $busServiceData->status) == 'Pending') value="Pending">Pending</option>
                <option @selected(old('status', $busServiceData->status) == 'Success') value="Success">Success</option>
                <option @selected(old('status', $busServiceData->status) == 'Rejected') value="Rejected">Rejected</option>
              </select>
            </div>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
          </div>
          <button type="submit"
            class="flex items-center w-full px-4 py-2 mt-4 text-white bg-blue-500 border-0 rounded focus:outline-none hover:bg-blue-600">
            Update
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
