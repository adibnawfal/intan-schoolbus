<!-- Student Information -->
<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">Student Information</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<div class="flex flex-wrap -m-2">
  <div class="w-full p-2 lg:w-1/3 md:w-1/2">
    <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
      <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
        src="https://dummyimage.com/80x80">
      <div class="flex-grow">
        <h2 class="font-medium text-gray-900 title-font">Holden Caulfield</h2>
        <p class="text-gray-500">UI Designer</p>
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/3 md:w-1/2">
    <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
      <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
        src="https://dummyimage.com/84x84">
      <div class="flex-grow">
        <h2 class="font-medium text-gray-900 title-font">Henry Letham</h2>
        <p class="text-gray-500">CTO</p>
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/3 md:w-1/2">
    <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
      <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
        src="https://dummyimage.com/88x88">
      <div class="flex-grow">
        <h2 class="font-medium text-gray-900 title-font">Oskar Blinde</h2>
        <p class="text-gray-500">Founder</p>
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/3 md:w-1/2">
    <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
      <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
        src="https://dummyimage.com/90x90">
      <div class="flex-grow">
        <h2 class="font-medium text-gray-900 title-font">John Doe</h2>
        <p class="text-gray-500">DevOps</p>
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/3 md:w-1/2">
    <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
      <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
        src="https://dummyimage.com/94x94">
      <div class="flex-grow">
        <h2 class="font-medium text-gray-900 title-font">Martin Eden</h2>
        <p class="text-gray-500">Software Engineer</p>
      </div>
    </div>
  </div>
</div>

<a class="flex items-center justify-between px-8 py-3 mt-2 font-semibold border border-gray-300 shadow sm:rounded"
  href="{{ route('profile.new-student') }}">
  Add New Student Information
  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
    class="lucide lucide-circle-plus">
    <circle cx="12" cy="12" r="10" />
    <path d="M8 12h8" />
    <path d="M12 8v8" />
  </svg>
</a>
<!-- End Student Information -->
