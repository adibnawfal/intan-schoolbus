<!-- Change Password Form -->
<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">Change Password</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Ensure your account is using a long, random password to stay secure.</p>
</div>
<form method="post" action="{{ route('password.update') }}" class="flex flex-wrap -m-2">
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
    <button type="submit"
      class="px-8 py-2 mt-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
      Change Password
    </button>
  </div>
</form>
<!-- End Change Password Form -->

{{-- <section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Update Password') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>
  </header>

  <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div>
      <x-input-label for="update_password_current_password" :value="__('Current Password')" />
      <x-text-input id="update_password_current_password" name="current_password" type="password"
        class="block w-full mt-1" autocomplete="current-password" />
      <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div>
      <x-input-label for="update_password_password" :value="__('New Password')" />
      <x-text-input id="update_password_password" name="password" type="password" class="block w-full mt-1"
        autocomplete="new-password" />
      <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    <div>
      <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
      <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
        class="block w-full mt-1" autocomplete="new-password" />
      <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>

      @if (session('status') === 'password-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
          {{ __('Saved.') }}</p>
      @endif
    </div>
  </form>
</section> --}}
