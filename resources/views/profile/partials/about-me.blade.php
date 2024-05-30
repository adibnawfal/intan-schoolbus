<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">About Me</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
  @csrf
</form>

<form method="post" action="{{ route('profile.patch-about-me', $userDetails->id) }}" enctype="multipart/form-data"
  class="flex flex-wrap -m-2">
  @csrf
  @method('patch')

  <div class="w-1/2 p-2">
    <label for="first_name" class="text-sm leading-7">First Name</label>
    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $userDetails->first_name) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="last_name" class="text-sm leading-7">Last Name</label>
    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $userDetails->last_name) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 capitalize transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
  </div>
  <div class="w-1/2 p-2">
    <label for="email" class="text-sm leading-7">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 lowercase transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    <x-input-error class="mt-2" :messages="$errors->get('email')" />
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
  <div class="w-1/2 p-2">
    <label for="status" class="text-sm leading-7">Role</label>
    <div class="relative">
      <select id="status" name="status"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('status', $userDetails->status) == '') value="" disabled>Select your role</option>
        <option @selected(old('status', $userDetails->status) == 'Parent') value="Parent">Parent</option>
        <option @selected(old('status', $userDetails->status) == 'Guardian') value="Guardian">Guardian</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('status')" class="mt-2" />
  </div>
  <div class="w-1/2 p-2">
    <label for="phone_no" class="text-sm leading-7">Phone Number</label>
    <div class="flex w-full rounded-lg shadow-sm">
      <span
        class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">+60</span>
      <input type="text" id="phone_no" name="phone_no" value="{{ old('phone_no', $userDetails->phone_no) }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
    </div>
    <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
  </div>
  <div class="w-1/2 p-2">
    <label for="gender" class="text-sm leading-7">Gender</label>
    <div class="relative">
      <select id="gender" name="gender"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
        <option @selected(old('gender', $userDetails->gender) == '') value="" disabled>Select your gender</option>
        <option @selected(old('gender', $userDetails->gender) == 'Male') value="Male">Male</option>
        <option @selected(old('gender', $userDetails->gender) == 'Female') value="Female">Female</option>
      </select>
    </div>
    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
  </div>
  <div class="w-full p-2">
    <label for="bio" class="text-sm leading-7">Bio</label>
    <textarea id="bio" name="bio"
      class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">{{ old('bio', $userDetails->bio) }}</textarea>
    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
  </div>
  <div class="flex items-center p-2 mt-2 gap-x-4">
    <button type="submit"
      class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
      Update Profile
    </button>
  </div>
</form>
