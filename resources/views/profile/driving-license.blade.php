@php
  $isMyProfile = false;
  $isDriverProfile = false;
  $isEmergencyContact = false;
  $isDrivingLicense = true;
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
      <form method="post" action="{{ route('profile.patch-driving-license', $driverDetailsData->user_id) }}"
        class="flex flex-col gap-y-4">
        @csrf
        @method('patch')

        <div class="flex flex-col w-full">
          <h1 class="text-xl font-bold">Driving License</h1>
          <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap -m-2">
          <div class="w-1/2 p-2">
            <label for="type" class="text-sm leading-7">Type</label>
            <div class="relative">
              <select id="type" name="type"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                <option @selected(old('type', $drivingLicenseData->type) == '') value="" disabled>Select your license type</option>
                <option @selected(old('type', $drivingLicenseData->type) == 'Vocational Driving License (VDL)') value="Vocational Driving License (VDL)" selected disabled>
                  Vocational Driving License (VDL)
                </option>
              </select>
            </div>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="class" class="text-sm leading-7">Class</label>
            <input type="text" id="class" name="class" value="{{ old('class', $drivingLicenseData->class) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('class')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="expiry_date" class="text-sm leading-7">Expiry Date</label>
            <input type="date" id="expiry_date" name="expiry_date"
              value="{{ old('expiry_date', $drivingLicenseData->expiry_date) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error :messages="$errors->get('expiry_date')" class="mt-2" />
          </div>
        </div>
        <button type="submit"
          class="px-8 py-2 text-sm mt-2 text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
          Update Driving License
        </button>
      </form>
    </div>
    <!-- End About Me -->
  </div>
</x-app-layout>
