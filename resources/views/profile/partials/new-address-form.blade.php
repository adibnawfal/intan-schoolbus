<!-- New Address Form -->
<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">New Address Information</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
<div class="flex flex-wrap -m-2">
  <div class="w-1/2 p-2">
    <label for="address-1" class="text-sm leading-7">Address Line 1</label>
    <input type="text" id="address-1" name="address-1"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="address-2" class="text-sm leading-7">Address Line 2 (Optional)</label>
    <input type="text" id="address-2" name="address-2"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="city" class="text-sm leading-7">City</label>
    <input type="text" id="city" name="city"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="state" class="text-sm leading-7">State</label>
    <input type="text" id="state" name="state"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="area" class="text-sm leading-7">Area</label>
    <input type="text" id="area" name="area"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="postal-code" class="text-sm leading-7">Postal Code</label>
    <input type="text" id="postal-code" name="postal-code"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
</div>
<div class="flex items-center mt-2 gap-x-4">
  <button class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
    Add Address
  </button>
  <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
    href="{{ route('profile.my-profile') }}">
    Cancel
  </a>
</div>
<!-- End New Address Form -->
