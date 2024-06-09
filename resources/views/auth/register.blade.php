<x-guest-layout>
  <!-- Left Section -->
  <div class="flex flex-col items-end justify-center w-full basis-1/2 bg-[#08183A]">
    <div class="max-w-[41rem] w-full pr-[15rem]  py-20">
      <div class="text-center">
        <h1 class="block text-3xl font-bold text-[#F2BA1D] dark:text-white">Sign Up</h1>
      </div>

      <div class="mt-6">
        <!-- Form -->
        <form method="post" action="{{ route('register') }}">
          @csrf

          <div class="grid gap-y-4">
            <!-- First & Last Name -->
            <div class="grid grid-cols-2 gap-x-4">
              <div>
                <label for="first_name" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">First
                  Name</label>
                <div class="relative">
                  <input type="text" id="first_name" name="first_name" placeholder="Enter your first name"
                    class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    autocomplete="first_name" value="{{ old('first_name') }}" autofocus>
                  <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                    <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                      viewBox="0 0 16 16" aria-hidden="true">
                      <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                  </div>
                </div>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
              </div>
              <div>
                <label for="last_name" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Last
                  Name</label>
                <div class="relative">
                  <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"
                    class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    autocomplete="last_name" value="{{ old('last_name') }}">
                  <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                    <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                      viewBox="0 0 16 16" aria-hidden="true">
                      <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                  </div>
                </div>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
              </div>
            </div>

            <!-- Email Address -->
            <div>
              <label for="email" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Email
                Address</label>
              <div class="relative">
                <input type="email" id="email" name="email" placeholder="Enter your email address"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="email" value="{{ old('email') }}" aria-describedby="email-error">
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

            <!-- Gender -->
            <div>
              <label for="gender" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Gender</label>
              <div class="flex gap-x-6">
                <div class="flex">
                  <input type="radio" name="gender" id="male" value="Male" @checked(old('gender') == 'Male')
                    class="shrink-0 mt-0.5 border-gray-200 rounded-full text-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    checked>
                  <label for="male" class="text-sm text-white ms-2 dark:text-gray-400">Male</label>
                </div>

                <div class="flex">
                  <input type="radio" name="gender" id="female" value="Female" @checked(old('gender') == 'Female')
                    class="shrink-0 mt-0.5 border-gray-200 rounded-full text-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                  <label for="female" class="text-sm text-white ms-2 dark:text-gray-400">Female</label>
                </div>
              </div>
              <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
            <!-- End Gender -->

            <!-- Role -->
            <div>
              <label for="status" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Role</label>
              <div class="relative">
                <select name="status" id="status"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg pe-9 focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                  <option @selected(old('status') == '') disabled value="">Select your role</option>
                  <option @selected(old('status') == 'Parent') value="Parent">Parent</option>
                  <option @selected(old('status') == 'Guardian') value="Guardian">Guardian</option>
                </select>
              </div>
              <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
            <!-- End Role -->

            <!-- Password -->
            <div>
              <label for="password"
                class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Password</label>
              <div class="relative">
                <input type="password" id="password" name="password" placeholder="Enter your password"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="new-password">
                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                  <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16" aria-hidden="true">
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
              <label for="password_confirmation"
                class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Re-type Password</label>
              <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation"
                  placeholder="Re-type your password"
                  class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                  autocomplete="new-password">
                <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                  <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16" aria-hidden="true">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                  </svg>
                </div>
              </div>
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- End Confirm Password -->

            <!-- Terms and Conditions -->
            <div class="flex flex-col justify-center">
              <div class="flex items-center">
                <input type="checkbox" id="terms_and_conditions" name="terms_and_conditions"
                  class="shrink-0 mt-0.5 border-gray-200 rounded text-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                  @checked(old('terms_and_conditions'))>
                <label for="terms_and_conditions" class="text-sm text-white ms-3 dark:text-white">I accept the <a
                    class="font-medium text-[#F2BA1D] decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="#">Terms and Conditions</a></label>
              </div>
              <x-input-error :messages="$errors->get('terms_and_conditions')" class="mt-2" />
            </div>
            <!-- End Terms and Conditions -->

            <!-- Submit -->
            <button type="submit"
              class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-[#08183A] bg-[#F2BA1D] border border-transparent rounded-lg gap-x-2 hover:bg-[#F2BA1D]/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign
              Up</button>
            <!-- End Submit -->
          </div>
        </form>
        <!-- End Form -->

        <!-- Sign In -->
        <div class="mt-5 text-center">
          <p class="mt-2 text-sm text-white dark:text-gray-400">
            Already a member?
            <a class="font-medium text-[#F2BA1D] decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('login') }}">
              Sign In
            </a>
          </p>
        </div>
        <!-- End Sign In -->

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
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
        autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
        autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
        autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

      <x-text-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation"
        required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{ route('login') }}">
        {{ __('Already registered?') }}
      </a>

      <x-primary-button class="ms-4">
        {{ __('Register') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout> --}}
