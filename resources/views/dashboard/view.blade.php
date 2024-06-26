<x-app-layout>
  <x-slot name="title">
    {{ __('Dashboard') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <h1 class="text-4xl font-bold leading-none tracking-tighter">
      It’s Good to See You Again,
      <span class="text-[#F2BA1D]">
        {{ $userDetails->first_name }} {{ $userDetails->last_name }}!
      </span>
    </h1>

    <div class="flex w-full text-center gap-x-4">
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-[#F2BA1D] size-14" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
          </svg>
          <h2 class="text-3xl font-bold">{{ $student->count() }}</h2>
          <p class="text-sm leading-relaxed">Students</p>
        </div>
      </div>
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-[#F2BA1D] size-14" xmlns="http://www.w3.org/2000/svg" width="24"
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
          <h2 class="text-3xl font-bold">{{ $driver->count() }}</h2>
          <p class="text-sm leading-relaxed">Driver</p>
        </div>
      </div>
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-[#F2BA1D] size-14" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap">
            <path
              d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
            <path d="M22 10v6" />
            <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
          </svg>
          <h2 class="text-3xl font-bold">{{ $school->count() }}</h2>
          <p class="text-sm leading-relaxed">School</p>
        </div>
      </div>
      <div class="w-full bg-white shadow sm:rounded md:w-1/4 sm:w-1/2">
        <div class="flex flex-col items-center justify-center px-4 py-6">
          <svg class="flex-shrink-0 mb-2 text-[#F2BA1D] size-14" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card">
            <rect width="20" height="14" x="2" y="5" rx="2" />
            <line x1="2" x2="22" y1="10" y2="10" />
          </svg>
          <h2 class="text-3xl font-bold">{{ $payment->count() }}</h2>
          <p class="text-sm leading-relaxed">Pending Fee</p>
        </div>
      </div>
    </div>

    @if ($payment->count() > 0)
      <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
        <div class="flex flex-col w-full">
          <h1 class="text-xl font-bold">School Bus Live Location</h1>
          <p class="text-sm leading-relaxed">Stay updated with the current location of the school bus!</p>
        </div>
        <div class="relative w-full h-[30rem] shadow sm:rounded">
          <div class="absolute inset-0">
            <iframe id="map" width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0"
              marginwidth="0">
            </iframe>
          </div>
        </div>
      </div>
    @else
      <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
        <div class="flex flex-col w-full">
          <h1 class="text-xl font-bold">School Bus Live Location</h1>
          <p class="text-sm leading-relaxed">
            Did not see the school bus live-location?
            <a class="font-semibold underline" href="{{ route('profile.student-profile') }}">
              Register student
            </a>
            to the school bus service first.
          </p>
        </div>
      </div>
    @endif
  </div>

  <script>
    // Fetch GPS data from the server and update the map
    setInterval(function() {
      fetch('/dashboard/get-latest-gps') // Define a route to fetch the latest GPS data
        .then(response => response.json())
        .then(data => {
          const {
            lat,
            lng
          } = data;
          document.getElementById('map').src = `https://maps.google.com/maps?q=${lat},${lng}&z=15&output=embed`;
        });
    }, 10000); // Update map every 10 seconds
  </script>
</x-app-layout>
