<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">New Address Information</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<form method="post" action="{{ route('profile.post-new-address') }}" class="flex flex-wrap -m-2">
  @csrf

  <div class="w-1/2 p-2">
    <label for="address_1" class="text-sm leading-7">Address Line 1</label>
    <input type="text" id="address_1" name="address_1" value="{{ old('address_1') }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('address_1')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="address_2" class="text-sm leading-7">Address Line 2 (Optional)</label>
    <input type="text" id="address_2" name="address_2" value="{{ old('address_2') }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('address_2')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="postal_code" class="text-sm leading-7">Postal Code</label>
    <input type="number" id="postal_code" name="postal_code" value="{{ old('postal_code') }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="city" class="text-sm leading-7">City</label>
    <input type="text" id="city" name="city" value="{{ old('city') }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('city')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="state" class="text-sm leading-7">State</label>
    <div class="relative">
      <select id="state" name="state"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('state') == '') value="" disabled>Select your state</option>
        <option @selected(old('state') == 'Selangor') value="Selangor">Selangor</option>
        <option @selected(old('state') == 'W.P. Kuala Lumpur') value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('state')" class="mt-2" />
  </div>
  <div class="w-1/2 p-2">
    <label for="area" class="text-sm leading-7">Area</label>
    <div class="relative">
      <select id="area" name="area"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('area') == '') value="" disabled>Select your area</option>
        <option @selected(old('area') == 'Taman Keramat AU1') value="Taman Keramat AU1">Taman Keramat AU1</option>
        <option @selected(old('area') == 'Taman Keramat AU2') value="Taman Keramat AU2">Taman Keramat AU2</option>
        <option @selected(old('area') == 'Taman Keramat AU3') value="Taman Keramat AU3">Taman Keramat AU3</option>
        <option @selected(old('area') == 'Taman Keramat AU4') value="Taman Keramat AU4">Taman Keramat AU4</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('area')" class="mt-2" />
  </div>
  <div class="flex items-center p-2 mt-2 gap-x-4">
    <button type="submit"
      class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
      Add Address
    </button>
    <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
      href="{{ route('profile.my-profile') }}">
      Cancel
    </a>
  </div>
</form>
