<x-guest-layout>
  <!-- Left Section -->
  <div class="flex flex-col items-end justify-center w-full basis-1/2">
    <div class="max-w-[41rem] w-full pr-[15rem]">
      <div class="text-center">
        <h1 class="block text-3xl font-bold text-gray-800 dark:text-white">Reset Password</h1>
      </div>

      <div class="mt-6">
        <!-- Form -->
        <form method="post" action="{{ route('password.store') }}">
          @csrf

          <!-- Password Reset Token -->
          <input type="hidden" name="token" value="{{ $request->route('token') }}">

          <div class="grid gap-y-4">
            <!-- Email Address -->
            <div>
              <label for="email" class="block mb-2 text-sm dark:text-white">Email Address</label>
              <div class="relative">
                <input type="email" id="email" name="email" placeholder="Enter your email address"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="username" value="{{ old('email', $request->email) }}" autofocus>
                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                  <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                    aria-hidden="true">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                  </svg>
                </div>
              </div>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- End Email Address -->

            <!-- Password -->
            <div>
              <label for="password" class="block mb-2 text-sm dark:text-white">Password</label>
              <div class="relative">
                <input type="password" id="password" name="password" placeholder="Enter your password"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="new-password">
                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                  <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                    aria-hidden="true">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                  </svg>
                </div>
              </div>
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- End Password -->

            <!-- Confirm Password -->
            <div>
              <label for="confirm-password" class="block mb-2 text-sm dark:text-white">Re-type Password</label>
              <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation"
                  placeholder="Re-type your password"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="new-password">
                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                  <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                    aria-hidden="true">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                  </svg>
                </div>
              </div>
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- End Confirm Password -->

            <!-- Submit -->
            <button type="submit"
              class="inline-flex items-center justify-center w-full px-4 py-3 mt-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Reset
              Password</button>
            <!-- End Submit -->
          </div>
        </form>
        <!-- End Form -->
      </div>
    </div>
  </div>
  <!-- End Left Section -->

  <!-- Right Section -->
  <div class="w-full bg-blue-600 basis-1/2"></div>
</x-guest-layout>

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
