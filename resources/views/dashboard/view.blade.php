<x-app-layout>
  <x-slot name="title">
    {{ __('Dashboard') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <h1 class="text-4xl font-bold leading-none tracking-tighter">
      It’s Good to See You Again,
      <span class="text-blue-600">
        {{ $userDetails->first_name }} {{ $userDetails->last_name }}!
      </span>
    </h1>

    <div class="flex w-full text-center gap-x-4">
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-blue-600 size-14" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
          </svg>
          <h2 class="text-3xl font-bold">1.3K</h2>
          <p class="text-sm leading-relaxed">Students</p>
        </div>
      </div>
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-blue-600 size-14" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bus-front">
            <path d="M4 6 2 7" />
            <path d="M10 6h4" />
            <path d="m22 7-2-1" />
            <rect width="16" height="16" x="4" y="3" rx="2" />
            <path d="M4 11h16" />
            <path d="M8 15h.01" />
            <path d="M16 15h.01" />
            <path d="M6 19v2" />
            <path d="M18 21v-2" />
          </svg>
          <h2 class="text-3xl font-bold">3</h2>
          <p class="text-sm leading-relaxed">Driver</p>
        </div>
      </div>
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-blue-600 size-14" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap">
            <path
              d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
            <path d="M22 10v6" />
            <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
          </svg>
          <h2 class="text-3xl font-bold">2</h2>
          <p class="text-sm leading-relaxed">School</p>
        </div>
      </div>
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-blue-600 size-14" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card">
            <rect width="20" height="14" x="2" y="5" rx="2" />
            <line x1="2" x2="22" y1="10" y2="10" />
          </svg>
          <h2 class="text-3xl font-bold">64</h2>
          <p class="text-sm leading-relaxed">Pending Fee</p>
        </div>
      </div>
    </div>

    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">School Bus Live Location</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="relative w-full h-[30rem] shadow sm:rounded">
        <div class="absolute inset-0">
          <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://maps.google.com/maps?width=100%25&amp;height=100%25&amp;hl=en&amp;q=Sekolah%20Kebangsaan%20Setiawangsa+(maps)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
          </iframe>
        </div>
      </div>
    </div>

  </div>
</x-app-layout>
