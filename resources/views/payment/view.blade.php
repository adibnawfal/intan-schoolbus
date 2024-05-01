<x-app-layout>
  <x-slot name="title">
    {{ __('Payment') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Select Payment Record</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>

      <div class="flex flex-wrap -m-2">
        <a class="w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('payment.record') }}">
          <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
            <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
              src="https://dummyimage.com/80x80">
            <div class="flex-grow">
              <h2 class="font-medium text-gray-900 title-font">Holden Caulfield</h2>
              <p class="text-gray-500">UI Designer</p>
            </div>
          </div>
        </a>
        <a class="w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('payment.record') }}">
          <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
            <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
              src="https://dummyimage.com/84x84">
            <div class="flex-grow">
              <h2 class="font-medium text-gray-900 title-font">Henry Letham</h2>
              <p class="text-gray-500">CTO</p>
            </div>
          </div>
        </a>
        <a class="w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('payment.record') }}">
          <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
            <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
              src="https://dummyimage.com/88x88">
            <div class="flex-grow">
              <h2 class="font-medium text-gray-900 title-font">Oskar Blinde</h2>
              <p class="text-gray-500">Founder</p>
            </div>
          </div>
        </a>
        <a class="w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('payment.record') }}">
          <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
            <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
              src="https://dummyimage.com/90x90">
            <div class="flex-grow">
              <h2 class="font-medium text-gray-900 title-font">John Doe</h2>
              <p class="text-gray-500">DevOps</p>
            </div>
          </div>
        </a>
        <a class="w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('payment.record') }}">
          <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
            <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4 bg-gray-100 rounded-full"
              src="https://dummyimage.com/94x94">
            <div class="flex-grow">
              <h2 class="font-medium text-gray-900 title-font">Martin Eden</h2>
              <p class="text-gray-500">Software Engineer</p>
            </div>
          </div>
        </a>
      </div>

      <p class="text-sm leading-relaxed">
        Did not see student’s name?
        <a class="font-semibold underline" href="{{ route('transportation.view') }}">
          Request for Bus Service.
        </a>
      </p>
    </div>
  </div>
</x-app-layout>
