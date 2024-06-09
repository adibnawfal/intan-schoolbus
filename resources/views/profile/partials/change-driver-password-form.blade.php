<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">Change Driver ({{ $driverDetailsData->first_name }} {{ $driverDetailsData->last_name }})
    Password
  </h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Ensure your account is using a long, random password to stay secure.</p>
</div>

<form method="post" action="{{ route('profile.put-change-driver-password', $driverDetailsData->user_id) }}"
  class="flex flex-wrap -m-2">
  @csrf
  @method('put')

  <div class="w-full p-2">
    <label for="update_password_current_password" class="text-sm leading-7">Current Password</label>
    <input type="password" id="update_password_current_password" name="current_password" autocomplete="current-password"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
  </div>
  <div class="w-full p-2">
    <label for="update_password_password" class="text-sm leading-7">New Password</label>
    <input type="password" id="update_password_password" name="password" autocomplete="new-password"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
  </div>
  <div class="w-full p-2">
    <label for="update_password_password_confirmation-password" class="text-sm leading-7">Confirm Password</label>
    <input type="password" id="update_password_password_confirmation-password" name="password_confirmation"
      autocomplete="new-password"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
  </div>
  <div class="w-full p-2">
    <div class="flex items-center mt-2 gap-x-4">
      <button type="submit"
        class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
        Change Password
      </button>
      <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
        href="{{ route('profile.driver-profile') }}">
        Cancel
      </a>
    </div>
  </div>
</form>
