<!-- About Me -->
<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">About Me</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
  @csrf
</form>

<form method="post" action="{{ route('profile.patch-about-me') }}" class="flex flex-wrap -m-2">
  @csrf
  @method('patch')

  <div class="w-1/2 p-2">
    <label for="first-name" class="text-sm leading-7">First Name</label>
    <input type="text" id="first-name" name="first-name" value="{{ old('first-name', $userDetails->first_name) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="last-name" class="text-sm leading-7">Last Name</label>
    <input type="text" id="last-name" name="last-name" value="{{ old('last-name', $userDetails->last_name) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="email" class="text-sm leading-7">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
    <div>
      <p class="mt-2 text-sm text-gray-800">
        {{ __('Your email address is unverified.') }}

        <button form="send-verification"
          class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          {{ __('Click here to re-send the verification email.') }}
        </button>
      </p>

      @if (session('status') === 'verification-link-sent')
        <p class="mt-2 text-sm font-medium text-green-600">
          {{ __('A new verification link has been sent to your email address.') }}
        </p>
      @endif
    </div>
  @endif
  {{-- <div class="w-1/2 p-2">
    <label for="gender" class="text-sm leading-7">Gender</label>
    <input type="text" id="gender" name="gender" value="{{ old('gender', $userDetails->gender) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div> --}}
  <div class="w-1/2 p-2">
    <label for="gender" class="text-sm leading-7">Gender</label>
    <div class="relative">
      <select id="gender" name="gender"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('gender', $userDetails->gender) == '') value="" disabled>Select your gender</option>
        <option @selected(old('gender', $userDetails->gender) == 'male') value="male">Male</option>
        <option @selected(old('gender', $userDetails->gender) == 'female') value="female">Female</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
  </div>
  {{-- <div class="w-1/2 p-2">
    <label for="role" class="text-sm leading-7">Role</label>
    <input type="text" id="role" name="role" value="{{ old('role', $userDetails->status) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div> --}}
  <div class="w-1/2 p-2">
    <label for="status" class="text-sm leading-7">Role</label>
    <div class="relative">
      <select id="status" name="status"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('status', $userDetails->status) == '') value="" disabled>Select your role</option>
        <option @selected(old('status', $userDetails->status) == 'parent') value="parent">Parent</option>
        <option @selected(old('status', $userDetails->status) == 'guardian') value="guardian">Guardian</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('role')" class="mt-2" />
  </div>
  <div class="w-1/2 p-2">
    <label for="phone-no" class="text-sm leading-7">Phone Number</label>
    <input type="text" id="phone-no" name="phone-no" value="{{ old('phone-no', $userDetails->phone_no) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-full p-2">
    <label for="bio" class="text-sm leading-7">Bio</label>
    <textarea id="bio" name="bio" value="{{ old('bio', $userDetails->bio) }}"
      class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
  </div>

  <div class="flex items-center p-2 mt-2 gap-x-4">
    <button type="submit"
      class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
      Update Profile
    </button>
  </div>
</form>

<!-- End About Me -->
