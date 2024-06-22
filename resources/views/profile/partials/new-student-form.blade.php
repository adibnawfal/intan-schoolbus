<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">About Student</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<form method="post" action="{{ route('profile.post-new-student') }}">
  @csrf

  <div class="flex flex-wrap -m-2">
    <div class="w-1/2 p-2">
      <label for="first_name" class="text-sm leading-7">First Name</label>
      <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="last_name" class="text-sm leading-7">Last Name</label>
      <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="school" class="text-sm leading-7">School</label>
      <div class="relative">
        <select id="school" name="school"
          class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
          <option @selected(old('school') == null) value=null disabled>Select your school</option>
          @foreach ($school as $schoolData)
            <option @selected(old('school') == $schoolData->name) value="{{ $schoolData->name }}">{{ $schoolData->name }}</option>
          @endforeach
        </select>
      </div>
      <x-input-error :messages="$errors->get('school')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="standard" class="text-sm leading-7">Standard</label>
      <div class="relative">
        <select id="standard" name="standard"
          class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
          <option @selected(old('standard') == null) value=null disabled>Select your standard</option>
          <option @selected(old('standard') == 1) value=1>1</option>
          <option @selected(old('standard') == 2) value=2>2</option>
          <option @selected(old('standard') == 3) value=3>3</option>
          <option @selected(old('standard') == 4) value=4>4</option>
          <option @selected(old('standard') == 5) value=5>5</option>
          <option @selected(old('standard') == 6) value=6>6</option>
        </select>
      </div>
      <x-input-error :messages="$errors->get('standard')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="gender" class="text-sm leading-7">Gender</label>
      <div class="relative">
        <select id="gender" name="gender"
          class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
          <option @selected(old('gender') == '') value="" disabled>Select your gender</option>
          <option @selected(old('gender') == 'Male') value="Male">Male</option>
          <option @selected(old('gender') == 'Female') value="Female">Female</option>
        </select>
      </div>
      <x-input-error :messages="$errors->get('gender')" class="mt-2" />
    </div>
    <div class="w-1/2 p-2">
      <label for="date_of_birth" class="text-sm leading-7">Date of Birth</label>
      <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
      <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
    </div>
  </div>
  <div class="flex flex-col w-full mt-8">
    <h1 class="text-xl font-bold">Additional Parent/Guardian Information (Optional)</h1>
    <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
  <div class="w-full mt-2">
    <select id="parent_guardian_id" name="parent_guardian_id"
      class="w-full px-8 py-3 mt-2 font-semibold border border-gray-300 rounded hover:shadow">
      <option @selected(old('parent_guardian_id') == null) value=null disabled>Select Parent/Guardian Information</option>
      @foreach ($parentGuardian as $parentGuardianData)
        <option @selected(old('parent_guardian_id') == $parentGuardianData->id) value={{ $parentGuardianData->id }}>
          {{ $parentGuardianData->first_name }} {{ $parentGuardianData->last_name }},
          {{ $parentGuardianData->status }},
          {{ $parentGuardianData->gender }}
          @if (isset($parentGuardianData->phone_no))
            , +60{{ $parentGuardianData->phone_no }}
          @endif
        </option>
      @endforeach
    </select>
    <x-input-error :messages="$errors->get('parent_guardian_id')" class="mt-2" />
  </div>
  <div class="flex flex-col w-full mt-8">
    <h1 class="text-xl font-bold">Pick-Up Address</h1>
    <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
  </a>
  <div class="w-full mt-2">
    <select id="pickup_address_id" name="pickup_address_id"
      class="w-full px-8 py-3 mt-2 font-semibold border border-gray-300 rounded hover:shadow">
      <option @selected(old('pickup_address_id') == null) value=null disabled>Select Pick-Up Address</option>
      @foreach ($address as $addressData)
        <option @selected(old('pickup_address_id') == $addressData->id) value={{ $addressData->id }}>
          {{ $addressData->address_1 }}, {{ $addressData->address_2 }}, {{ $addressData->postal_code }}
          {{ $addressData->city }}, {{ $addressData->state }} - ({{ $addressData->area }})
        </option>
      @endforeach
    </select>
    <x-input-error :messages="$errors->get('pickup_address_id')" class="mt-2" />
  </div>
  <div class="flex flex-col w-full mt-8">
    <h1 class="text-xl font-bold">Drop-Off Address</h1>
    <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
  <div class="w-full mt-2">
    <select id="dropoff_address_id" name="dropoff_address_id"
      class="w-full px-8 py-3 mt-2 font-semibold border border-gray-300 rounded hover:shadow">
      <option @selected(old('dropoff_address_id') == null) value=null disabled>Select Drop-Off Address</option>
      @foreach ($address as $addressData)
        <option @selected(old('dropoff_address_id') == $addressData->id) value={{ $addressData->id }}>
          {{ $addressData->address_1 }}, {{ $addressData->address_2 }}, {{ $addressData->postal_code }}
          {{ $addressData->city }}, {{ $addressData->state }} - ({{ $addressData->area }})
        </option>
      @endforeach
    </select>
    <x-input-error :messages="$errors->get('dropoff_address_id')" class="mt-2" />
  </div>
  <div class="flex items-center mt-8 gap-x-4">
    <button type="submit"
      class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
      Add Student
    </button>
    <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
      href="{{ route('profile.student-profile') }}">
      Cancel
    </a>
  </div>
</form>
