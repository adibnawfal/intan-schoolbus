<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">About Parent/Guardian</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<form method="post" action="{{ route('profile.patch-update-parent-guardian', $parentGuardianData->id) }}"
  class="flex flex-wrap -m-2">
  @csrf
  @method('patch')

  <div class="w-1/2 p-2">
    <label for="first_name" class="text-sm leading-7">First Name</label>
    <input type="text" id="first_name" name="first_name"
      value="{{ old('first_name', $parentGuardianData->first_name) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="last_name" class="text-sm leading-7">Last Name (Optional)</label>
    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $parentGuardianData->last_name) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="status" class="text-sm leading-7">Role</label>
    <div class="relative">
      <select id="status" name="status"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('status', $parentGuardianData->status) == '') value="" disabled>Select your role</option>
        <option @selected(old('status', $parentGuardianData->status) == 'Parent') value="Parent">Parent</option>
        <option @selected(old('status', $parentGuardianData->status) == 'Guardian') value="Guardian">Guardian</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('status')" class="mt-2" />
  </div>
  <div class="w-1/2 p-2">
    <label for="phone_no" class="text-sm leading-7">Phone Number</label>
    <div class="flex w-full rounded-lg shadow-sm">
      <span
        class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">+60</span>
      <input type="text" id="phone_no" name="phone_no" value="{{ old('phone_no', $parentGuardianData->phone_no) }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    </div>
    <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
  </div>
  <div class="w-1/2 p-2">
    <label for="gender" class="text-sm leading-7">Gender</label>
    <div class="relative">
      <select id="gender" name="gender"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('gender', $parentGuardianData->gender) == '') value="" disabled>Select your gender</option>
        <option @selected(old('gender', $parentGuardianData->gender) == 'Male') value="Male">Male</option>
        <option @selected(old('gender', $parentGuardianData->gender) == 'Female') value="Female">Female</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
  </div>
  <div class="w-full p-2">
    <label for="bio" class="text-sm leading-7">Bio (Optional)</label>
    <textarea id="bio" name="bio"
      class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">{{ old('bio', $parentGuardianData->bio) }}</textarea>
    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
  </div>
  <div class="flex items-center p-2 mt-2 gap-x-4">
    <button type="submit"
      class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
      Update Parent/Guardian
    </button>
    <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
      href="{{ route('profile.my-profile') }}">
      Cancel
    </a>
  </div>
</form>
