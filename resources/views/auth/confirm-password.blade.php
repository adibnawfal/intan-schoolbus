<x-guest-layout>
  <!-- Left Section -->
  <div class="flex flex-col items-end justify-center w-full basis-1/2 bg-[#08183A]">
    <div class="max-w-[41rem] w-full pr-[15rem]">
      <div class="text-center">
        <p class="block font-bold text-[#F2BA1D] dark:text-white">This is a secure area of the application.
          Please confirm your password before continuing.</p>
      </div>

      <div class="mt-6">
        <!-- Form -->
        <form method="post" action="{{ route('password.confirm') }}">
          @csrf

          <div class="grid gap-y-4">
            <!-- Password -->
            <div>
              <label for="password" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Password</label>
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

            <!-- Submit -->
            <button type="submit"
              class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-[#08183A] bg-[#F2BA1D] border border-transparent rounded-lg gap-x-2 hover:bg-[#F2BA1D]/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Confirm</button>
            <!-- End Submit -->
          </div>
        </form>
        <!-- End Form -->
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
  <div class="mb-4 text-sm text-gray-600">
    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
  </div>

  <form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
    <div>
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
        autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex justify-end mt-4">
      <x-primary-button>
        {{ __('Confirm') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout> --}}
