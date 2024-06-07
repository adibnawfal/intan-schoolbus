<x-app-layout>
  <x-slot name="title">
    {{ __('New Schedule') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <form method="post" action="{{ route('transportation.post-new-schedule') }}">
      @csrf

      <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
        <div class="flex flex-col w-full">
          <h1 class="text-xl font-bold">New Schedule Information</h1>
          <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap -m-2">
          <div class="w-full p-2">
            <label for="session" class="text-sm leading-7">Session</label>
            <input type="text" id="session" name="session" value="{{ old('session') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('session')" />
          </div>
          <div class="w-full p-2">
            <label for="standard" class="text-sm leading-7">Standard</label>
            <div class="flex w-full gap-x-4">
              <label for="standard1"
                class="flex items-center w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                Standard 1
                <input type="checkbox" name="standard[]" id="standard1" value=1
                  class="text-blue-600 border-gray-300 rounded shrink-0 ms-auto focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                  @if (is_array(old('standard')) && in_array(1, old('standard'))) checked @endif>
              </label>
              <label for="standard2"
                class="flex items-center w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                Standard 2
                <input type="checkbox" name="standard[]" id="standard2" value=2 @selected(old('standard') == 2)
                  class="text-blue-600 border-gray-300 rounded shrink-0 ms-auto focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                  @if (is_array(old('standard')) && in_array(2, old('standard'))) checked @endif>
              </label>
              <label for="standard3"
                class="flex items-center w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                Standard 3
                <input type="checkbox" name="standard[]" id="standard3" value=3 @selected(old('standard') == 3)
                  class="text-blue-600 border-gray-300 rounded shrink-0 ms-auto focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                  @if (is_array(old('standard')) && in_array(3, old('standard'))) checked @endif>
              </label>
              <label for="standard4"
                class="flex items-center w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                Standard 4
                <input type="checkbox" name="standard[]" id="standard4" value=4 @selected(old('standard') == 4)
                  class="text-blue-600 border-gray-300 rounded shrink-0 ms-auto focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                  @if (is_array(old('standard')) && in_array(4, old('standard'))) checked @endif>
              </label>
              <label for="standard5"
                class="flex items-center w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                Standard 5
                <input type="checkbox" name="standard[]" id="standard5" value=5 @selected(old('standard') == 5)
                  class="text-blue-600 border-gray-300 rounded shrink-0 ms-auto focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                  @if (is_array(old('standard')) && in_array(5, old('standard'))) checked @endif>
              </label>
              <label for="standard6"
                class="flex items-center w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                Standard 6
                <input type="checkbox" name="standard[]" id="standard6" value=6 @selected(old('standard') == 6)
                  class="text-blue-600 border-gray-300 rounded shrink-0 ms-auto focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                  @if (is_array(old('standard')) && in_array(6, old('standard'))) checked @endif>
              </label>
            </div>
            <x-input-error :messages="$errors->get('standard')" class="mt-2" />
          </div>
        </div>
        <div class="flex flex-col w-full mt-4">
          <h1 class="text-xl font-bold">Pick-Up Time</h1>
          <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap -m-2">
          <div class="w-1/2 p-2">
            <label for="pickup_from" class="text-sm leading-7">From</label>
            <input type="time" id="pickup_from" name="pickup_from" value="{{ old('pickup_from') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('pickup_from')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="pickup_to" class="text-sm leading-7">To</label>
            <input type="time" id="pickup_to" name="pickup_to" value="{{ old('pickup_to') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('pickup_to')" />
          </div>
        </div>
        <div class="flex flex-col w-full mt-4">
          <h1 class="text-xl font-bold">Drop-Off Time</h1>
          <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap -m-2">
          <div class="w-1/2 p-2">
            <label for="dropoff_from" class="text-sm leading-7">From</label>
            <input type="time" id="dropoff_from" name="dropoff_from" value="{{ old('dropoff_from') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('dropoff_from')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="dropoff_to" class="text-sm leading-7">To</label>
            <input type="time" id="dropoff_to" name="dropoff_to" value="{{ old('dropoff_to') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('dropoff_to')" />
          </div>
          <div class="flex items-center p-2 mt-4 gap-x-4">
            <button type="submit"
              class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
              Add Schedule
            </button>
            <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
              href="{{ route('transportation.schedule-information') }}">
              Cancel
            </a>
          </div>
        </div>
      </div>
    </form>
  </div>
</x-app-layout>
