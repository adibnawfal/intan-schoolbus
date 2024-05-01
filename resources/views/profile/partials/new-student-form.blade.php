<!-- New Student Form -->
<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">About Student</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
<div class="flex flex-wrap -m-2">
  <div class="w-1/2 p-2">
    <label for="first-name" class="text-sm leading-7">First Name</label>
    <input type="text" id="first-name" name="first-name"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="last-name" class="text-sm leading-7">Last Name</label>
    <input type="text" id="last-name" name="last-name"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="school" class="text-sm leading-7">School</label>
    <input type="text" id="school" name="school"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="standard" class="text-sm leading-7">Standard</label>
    <input type="number" id="standard" name="standard"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="date-of-birth" class="text-sm leading-7">Date of Birth</label>
    <input type="date" id="date-of-birth" name="date-of-birth"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="age" class="text-sm leading-7">Age</label>
    <input type="number" id="age" name="age"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
  <div class="w-1/2 p-2">
    <label for="gender" class="text-sm leading-7">Gender</label>
    <input type="text" id="gender" name="gender"
      class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
  </div>
</div>
<div class="flex flex-col w-full mt-8">
  <h1 class="text-xl font-bold">Parent/Guardian Information</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
<a class="flex items-center justify-between px-8 py-3 mt-2 font-semibold border border-gray-300 shadow sm:rounded"
  href="#">
  Select Parent/Guardian Information
  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
    class="lucide lucide-chevron-down">
    <path d="m6 9 6 6 6-6" />
  </svg>
</a>
<div class="flex flex-col w-full mt-8">
  <h1 class="text-xl font-bold">Pick-Up Address</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
<a class="flex items-center justify-between px-8 py-3 mt-2 font-semibold border border-gray-300 shadow sm:rounded"
  href="#">
  Select Pick-Up Address
  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
    class="lucide lucide-chevron-down">
    <path d="m6 9 6 6 6-6" />
  </svg>
</a>
<div class="flex flex-col w-full mt-8">
  <h1 class="text-xl font-bold">Drop-Off Address</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
<a class="flex items-center justify-between px-8 py-3 mt-2 font-semibold border border-gray-300 shadow sm:rounded"
  href="#">
  Select Drop-Off Address
  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
    class="lucide lucide-chevron-down">
    <path d="m6 9 6 6 6-6" />
  </svg>
</a>
<div class="flex items-center mt-8 gap-x-4">
  <button class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700">
    Add Student
  </button>
  <button class="px-8 py-2 text-sm border border-gray-300 rounded w-max focus:outline-none hover:bg-blue-700">
    Cancel
  </button>
</div>
<!-- End New Student Form -->
