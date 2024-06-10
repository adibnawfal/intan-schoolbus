@php
  $isMyProfile = false;
  $isDriverProfile = false;
  $isEmergencyContact = true;
  $isDrivingLicense = false;
  $isStudentProfile = false;
  $isChangePassword = false;
  $isDeleteProfile = false;
@endphp

<x-app-layout>
  <x-slot name="title">
    {{ __('My Profile') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Profile Header -->
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.profile-header')
    </div>
    <!-- End Profile Header -->

    <!-- Emergency Contact -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <form method="post" action="{{ route('profile.patch-emergency-contact', $driverDetailsData->user_id) }}"
        class="flex flex-col gap-y-4">
        @csrf
        @method('patch')

        <div class="flex flex-col w-full">
          <h1 class="text-xl font-bold">Emergency Contact</h1>
          <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap -m-2">
          <div class="w-1/2 p-2">
            <label for="ec_first_name" class="text-sm leading-7">First Name</label>
            <input type="text" id="ec_first_name" name="ec_first_name"
              value="{{ old('ec_first_name', $ecDetailsData->first_name) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('ec_first_name')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="ec_last_name" class="text-sm leading-7">Last Name (Optional)</label>
            <input type="text" id="ec_last_name" name="ec_last_name"
              value="{{ old('ec_last_name', $ecDetailsData->last_name) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('ec_last_name')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="ec_address_1" class="text-sm leading-7">Address Line 1</label>
            <input type="text" id="ec_address_1" name="ec_address_1"
              value="{{ old('ec_address_1', $ecAddressData->address_1) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('ec_address_1')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="ec_address_2" class="text-sm leading-7">Address Line 2 (Optional)</label>
            <input type="text" id="ec_address_2" name="ec_address_2"
              value="{{ old('ec_address_2', $ecAddressData->address_2) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('ec_address_2')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="ec_postal_code" class="text-sm leading-7">Postal Code</label>
            <input type="number" id="ec_postal_code" name="ec_postal_code"
              value="{{ old('ec_postal_code', $ecAddressData->postal_code) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('ec_postal_code')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="ec_city" class="text-sm leading-7">City</label>
            <input type="text" id="ec_city" name="ec_city" value="{{ old('ec_city', $ecAddressData->city) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('ec_city')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="ec_state" class="text-sm leading-7">State</label>
            <div class="relative">
              <select id="ec_state" name="ec_state"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                <option @selected(old('ec_state', $ecAddressData->state) == '') value="" disabled>Select your state</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Perak') value="Perak">Perak</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Selangor') value="Selangor">Selangor</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Pahang') value="Pahang">Pahang</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Kelantan') value="Kelantan">Kelantan</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Johor') value="Johor">Johor</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Kedah') value="Kedah">Kedah</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Melaka') value="Melaka">Melaka</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Negeri Sembilan') value="Negeri Sembilan">Negeri Sembilan</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Pulau Pinang') value="Pulau Pinang">Pulau Pinang</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Sarawak') value="Sarawak">Sarawak</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Perlis') value="Perlis">Perlis</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Sabah') value="Sabah">Sabah</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'Terengganu') value="Terengganu">Terengganu</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'W.P. Labuan') value="W.P. Labuan">W.P. Labuan</option>
                <option @selected(old('ec_state', $ecAddressData->state) == 'W.P. Kuala Lumpur') value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
              </select>
            </div>
            <x-input-error :messages="$errors->get('ec_state')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="ec_phone_no" class="text-sm leading-7">Phone Number</label>
            <div class="flex w-full rounded-lg shadow-sm">
              <span
                class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">+60</span>
              <input type="text" id="ec_phone_no" name="ec_phone_no"
                value="{{ old('ec_phone_no', $ecDetailsData->phone_no) }}"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            </div>
            <x-input-error :messages="$errors->get('ec_phone_no')" class="mt-2" />
          </div>
        </div>
        <button type="submit"
          class="px-8 py-2 text-sm mt-2 text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
          Update Emergency Contact
        </button>
      </form>
    </div>
    <!-- End About Me -->
  </div>
</x-app-layout>
