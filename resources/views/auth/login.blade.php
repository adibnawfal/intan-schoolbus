<x-guest-layout>
  <!-- Left Section -->
  <div class="flex flex-col items-end justify-center w-full basis-1/2 bg-[#08183A]">
    <div class="max-w-[41rem] w-full pr-[15rem]">
      <div class="text-center">
        <h1 class="block text-3xl font-bold text-[#F2BA1D] dark:text-white">Sign In</h1>
      </div>

      <!-- Session Status -->
      <x-auth-session-status class="mt-6" :status="session('status')" />

      <div class="mt-6">
        <!-- Form -->
        <form method="post" action="{{ route('login') }}">
          @csrf

          <div class="grid gap-y-4">
            <!-- Email Address -->
            <div>
              <label for="email" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Email
                Address</label>
              <div class="relative">
                <input type="email" id="email" name="email" placeholder="Enter your email address"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="email" value="{{ old('email') }}" autofocus>
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
              <label for="password"
                class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Password</label>
              <div class="relative">
                <input type="password" id="password" name="password" placeholder="Enter your password"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="current-password">
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

            <!-- Remember Me -->
            <div class="flex items-center">
              <div class="flex items-center">
                <input type="checkbox" id="remember_me" name="remember" @checked(old('remember'))
                  class="shrink-0 mt-0.5 border-gray-200 rounded text-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                <label for="remember_me" class="text-sm text-white ms-3 dark:text-white">Remember Me</label>
              </div>
            </div>
            <!-- End Remember Me -->

            <!-- Submit -->
            <button type="submit"
              class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-[#08183A] bg-[#F2BA1D] border border-transparent rounded-lg gap-x-2 hover:bg-[#F2BA1D]/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign
              In</button>
            <!-- End Submit -->
          </div>
        </form>
        <!-- End Form -->

        <!-- Forgot Password -->
        <div class="mt-5 text-center">
          <p class="mt-2 text-sm text-white dark:text-gray-400">
            Forgot Password?
            @if (Route::has('password.request'))
              <a class="font-medium text-[#F2BA1D] decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="{{ route('password.request') }}">
                Help
              </a>
            @endif
          </p>
        </div>
        <!-- End Forgot Password -->

      </div>
    </div>
  </div>
  <!-- End Left Section -->

  <!-- Right Section -->
  <div
    class="hidden md:block md:absolute md:top-0 md:start-1/2 md:end-0 h-full bg-[url('https://cdn.dribbble.com/users/85685/screenshots/4964889/media/b563d8368d3d99c7c7173f5895d75395.png')] bg-no-repeat bg-center bg-cover">
  </div>
  <!-- End Right Section -->
</x-guest-layout>

{{-- <x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
        autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
        autocomplete="current-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
        <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
      @endif

      <x-primary-button class="ms-3">
        {{ __('Log in') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout> --}}
