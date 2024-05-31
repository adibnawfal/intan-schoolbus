<form method="post" action="{{ route('profile.patch-update-driver', $driverDetailsData->user_id) }}"
  class="flex flex-col gap-y-4">
  @csrf
  @method('patch')

  <div class="flex flex-col w-full">
    <h1 class="text-xl font-bold">About Driver</h1>
    <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
  <div class="flex flex-wrap -m-2">
    <div class="w-1/2 p-2">
      <label for="first_name" class="text-sm leading-7">First Name</label>
      <input type="text" id="first_name" name="first_name"
        value="{{ old('first_name', $driverDetailsData->first_name) }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="last_name" class="text-sm leading-7">Last Name (Optional)</label>
      <input type="text" id="last_name" name="last_name"
        value="{{ old('last_name', $driverDetailsData->last_name) }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="phone_no" class="text-sm leading-7">Phone Number</label>
      <div class="flex w-full rounded-lg shadow-sm">
        <span
          class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">+60</span>
        <input type="text" id="phone_no" name="phone_no" value="{{ old('phone_no', $driverDetailsData->phone_no) }}"
          class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      </div>
      <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="gender" class="text-sm leading-7">Gender</label>
      <div class="relative">
        <select id="gender" name="gender"
          class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
          <option @selected(old('gender', $driverDetailsData->gender) == '') value="" disabled>Select your gender</option>
          <option @selected(old('gender', $driverDetailsData->gender) == 'Male') value="Male">Male</option>
          <option @selected(old('gender', $driverDetailsData->gender) == 'Female') value="Female">Female</option>
        </select>
      </div>
      <x-input-error :messages="$errors->get('gender')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="date_of_birth" class="text-sm leading-7">Date of Birth</label>
      <input type="date" id="date_of_birth" name="date_of_birth"
        value="{{ old('date_of_birth', $driverDetailsData->date_of_birth) }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
    </div>
  </div>
  <div class="flex flex-col w-full mt-8">
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
  <div class="flex flex-col w-full mt-8">
    <h1 class="text-xl font-bold">Driving License Details</h1>
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
  <div class="flex flex-col w-full mt-8">
    <h1 class="text-xl font-bold">Driver Login Credentials</h1>
    <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
  <div class="flex flex-wrap -m-2">
    <div class="w-full p-2">
      <label for="email" class="text-sm leading-7">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email', $driverData->email) }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
  </div>
  <div class="flex items-center justify-between mt-8">
    <div class="flex items-center gap-x-4">
      <button type="submit"
        class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
        Update Driver
      </button>
      <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
        href="{{ route('profile.driver-profile') }}">
        Cancel
      </a>
    </div>
    <a class="flex items-center gap-x-2 focus:outline-none hover:text-blue-600 hover:underline"
      href="{{ route('profile.change-driver-password', $driverDetailsData->user_id) }}">
      Change Driver Password
      <svg class="w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" class="lucide lucide-move-right">
        <path d="M18 8L22 12L18 16" />
        <path d="M2 12H22" />
      </svg>
    </a>
  </div>
</form>
