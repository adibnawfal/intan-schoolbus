<x-app-layout>
  <x-slot name="title">
    {{ __('Update School') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <form method="post" action="{{ route('transportation.patch-update-school', $schoolData->id) }}">
      @csrf
      @method('patch')

      <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
        <div class="flex flex-col w-full">
          <h1 class="text-xl font-bold">Update School Information</h1>
          <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap -m-2">
          <div class="w-1/2 p-2">
            <label for="school_name" class="text-sm leading-7">School Name</label>
            <input type="text" id="school_name" name="school_name"
              value="{{ old('school_name', $schoolData->name) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('school_name')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="service_period" class="text-sm leading-7">Service Period</label>
            <div class="flex w-full rounded-lg shadow-sm">
              <input type="number" id="service_period" name="service_period"
                value="{{ old('service_period', $schoolData->service_period) }}"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-s focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
              <span
                class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-e border-s-0">Months</span>
            </div>
            <x-input-error :messages="$errors->get('service_period')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="start_date" class="text-sm leading-7">Start Date</label>
            <input type="date" id="start_date" name="start_date"
              value="{{ old('start_date', $schoolData->start_date) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="end_date" class="text-sm leading-7">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $schoolData->end_date) }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="standard" class="text-sm leading-7">Standard</label>
            <div class="relative">
              @php
                $details = json_decode($schoolData->details);
                $standard = json_decode($schoolData->standard);
              @endphp
              @foreach ($standard as $key => $standardData)
                @if ($loop->last)
                  @php
                    $standardVal = $standardData;
                  @endphp
                @endif
              @endforeach
              <select id="standard" name="standard"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                <option @selected(old('standard', $standardVal) == 0) value=0 disabled>Select maximum standard</option>
                <option @selected(old('standard', $standardVal) == 1) value=1>1</option>
                <option @selected(old('standard', $standardVal) == 2) value=2>2</option>
                <option @selected(old('standard', $standardVal) == 3) value=3>3</option>
                <option @selected(old('standard', $standardVal) == 4) value=4>4</option>
                <option @selected(old('standard', $standardVal) == 5) value=5>5</option>
                <option @selected(old('standard', $standardVal) == 6) value=6>6</option>
              </select>
            </div>
            <x-input-error :messages="$errors->get('standard')" class="mt-2" />
          </div>
        </div>
        <div class="flex flex-col w-full mt-4">
          <h1 class="text-xl font-bold">Area Covered</h1>
          <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex flex-wrap -m-2">
          <div class="w-1/2 p-2">
            <label for="area1" class="text-sm leading-7">Area Name</label>
            <input type="text" id="area1" name="area1" value="{{ old('area1', 'Taman Keramat AU1') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
              disabled>
            <x-input-error class="mt-2" :messages="$errors->get('area1')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="price1" class="text-sm leading-7">Price</label>
            <div class="flex w-full rounded-lg shadow-sm">
              <span
                class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">RM</span>
              <input type="number" id="price1" name="price1"
                value="{{ old('price1', $details->{'Taman Keramat AU1'}) }}"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            </div>
            <x-input-error :messages="$errors->get('price1')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="area2" class="text-sm leading-7">Area Name</label>
            <input type="text" id="area2" name="area2" value="{{ old('area2', 'Taman Keramat AU2') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
              disabled>
            <x-input-error class="mt-2" :messages="$errors->get('area2')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="price2" class="text-sm leading-7">Price</label>
            <div class="flex w-full rounded-lg shadow-sm">
              <span
                class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">RM</span>
              <input type="number" id="price2" name="price2"
                value="{{ old('price2', $details->{'Taman Keramat AU2'}) }}"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            </div>
            <x-input-error :messages="$errors->get('price2')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="area3" class="text-sm leading-7">Area Name</label>
            <input type="text" id="area3" name="area3" value="{{ old('area3', 'Taman Keramat AU3') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
              disabled>
            <x-input-error class="mt-2" :messages="$errors->get('area3')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="price3" class="text-sm leading-7">Price</label>
            <div class="flex w-full rounded-lg shadow-sm">
              <span
                class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">RM</span>
              <input type="number" id="price3" name="price3"
                value="{{ old('price3', $details->{'Taman Keramat AU3'}) }}"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            </div>
            <x-input-error :messages="$errors->get('price3')" class="mt-2" />
          </div>
          <div class="w-1/2 p-2">
            <label for="area4" class="text-sm leading-7">Area Name</label>
            <input type="text" id="area4" name="area4" value="{{ old('area4', 'Taman Keramat AU4') }}"
              class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
              disabled>
            <x-input-error class="mt-2" :messages="$errors->get('area4')" />
          </div>
          <div class="w-1/2 p-2">
            <label for="price4" class="text-sm leading-7">Price</label>
            <div class="flex w-full rounded-lg shadow-sm">
              <span
                class="inline-flex items-center px-4 text-sm bg-gray-100 bg-opacity-50 border border-gray-300 min-w-fit rounded-s border-e-0">RM</span>
              <input type="number" id="price4" name="price4"
                value="{{ old('price4', $details->{'Taman Keramat AU4'}) }}"
                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 outline-none rounded-e focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            </div>
            <x-input-error :messages="$errors->get('price4')" class="mt-2" />
          </div>
          <div class="flex items-center p-2 mt-4 gap-x-4">
            <button type="submit"
              class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
              Update School
            </button>
            <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
              href="{{ route('transportation.school-information') }}">
              Cancel
            </a>
          </div>
        </div>
      </div>
    </form>
  </div>
</x-app-layout>
