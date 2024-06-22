<x-app-layout>
  <x-slot name="title">
    {{ __('Student Details') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full mt-4">
        <h1 class="text-xl font-bold">Student Details</h1>
        <p class="text-sm leading-relaxed">View successful registered student details here.</p>
      </div>
      <div class="flex flex-wrap -m-2">
        @php
          $count = 1;
        @endphp
        <a class="relative w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('transportation.all-student') }}">
          <div class="flex items-center justify-between p-6 border border-gray-300 rounded gap-x-4 hover:shadow">
            <div class="flex gap-x-4">
              <p class="font-medium">{{ $count++ }}.</p>
              <div class="flex flex-col items-start">
                <h2 class="font-medium line-clamp-1">
                  All Student
                </h2>
                <p class="text-xs text-gray-500 line-clamp-1">
                  Student details from all area.
                </p>
              </div>
            </div>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-chevron-right">
              <path d="m9 18 6-6-6-6" />
            </svg>
          </div>
        </a>
        <a class="relative w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('transportation.morning-session') }}">
          <div class="flex items-center justify-between p-6 border border-gray-300 rounded gap-x-4 hover:shadow">
            <div class="flex gap-x-4">
              <p class="font-medium">{{ $count++ }}.</p>
              <div class="flex flex-col items-start">
                <h2 class="font-medium line-clamp-1">
                  Morning Session
                </h2>
                <p class="text-xs text-gray-500 line-clamp-1">
                  Student details from morning session only.
                </p>
              </div>
            </div>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-chevron-right">
              <path d="m9 18 6-6-6-6" />
            </svg>
          </div>
        </a>
        <a class="relative w-full p-2 lg:w-1/3 md:w-1/2" href="{{ route('transportation.evening-session') }}">
          <div class="flex items-center justify-between p-6 border border-gray-300 rounded gap-x-4 hover:shadow">
            <div class="flex gap-x-4">
              <p class="font-medium">{{ $count++ }}.</p>
              <div class="flex flex-col items-start">
                <h2 class="font-medium line-clamp-1">
                  Evening Session
                </h2>
                <p class="text-xs text-gray-500 line-clamp-1">
                  Student details from evening session only.
                </p>
              </div>
            </div>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-chevron-right">
              <path d="m9 18 6-6-6-6" />
            </svg>
          </div>
        </a>
      </div>
    </div>
  </div>
</x-app-layout>
