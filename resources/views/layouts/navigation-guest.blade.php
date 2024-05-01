{{-- <nav class="px-20 text-gray-100 bg-indigo-600">

  <!-- Primary Navigation Menu -->
  <div class="flex justify-between h-16">

    <!-- Left Section -->
    <div class="flex text-sm text-gray-100">

      <!-- Logo -->
      <div class="flex items-center shrink-0">
        <a href="{{ route('welcome') }}">
          <x-application-logo class="block w-auto text-gray-100 fill-current h-9" />
        </a>
        <a class="navbar-brand fw-bolder" href="{{ route('welcome') }}">
          <i class="fa-solid fa-road fa-lg"></i>
        </a>
      </div>

      <!-- App Name -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')"
          class="border-b-transparent hover:border-b-transparent focus:border-b-transparent">
          <span class="text-gray-100 hover:text-gray-100">
            {{ __('Intan School Bus') }}
          </span>
        </x-nav-link>
      </div>

    </div>

    <!-- Right Section -->
    <div class="flex text-sm text-gray-100">

      <!-- Home -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link href="{{ route('welcome') }}">
          <span class="text-gray-100 hover:text-gray-100">
            {{ __('Home') }}
          </span>
        </x-nav-link>
      </div>

      <!-- Service -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link>
          <span class="text-gray-100 hover:text-gray-100">
            {{ __('Service') }}
          </span>
        </x-nav-link>
      </div>

      <!-- About Us -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link>
          <span class="text-gray-100 hover:text-gray-100">
            {{ __('About Us') }}
          </span>
        </x-nav-link>
      </div>

      <!-- Contact Us -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link>
          <span class="text-gray-100 hover:text-gray-100">
            {{ __('Contact Us') }}
          </span>
        </x-nav-link>
      </div>

      @if (Route::has('login'))
        @auth
          <!-- Dashboard -->
          <a href="{{ url('/dashboard') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
          <!-- Sign In -->
          <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <a href="{{ route('login') }}"
              class="flex items-center justify-center p-0 my-4 font-semibold text-indigo-600 bg-gray-100 rounded shadow-sm w-28">
              {{ __('Sign In') }}
            </a>
          </div>
          @if (Route::has('register'))
            <!-- Sign Up -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <a href="{{ route('register') }}"
                class="flex items-center justify-center p-0 my-4 font-semibold text-gray-100 border border-gray-100 rounded shadow-sm w-28 hover:bg-gray-100 hover:text-indigo-600">
                {{ __('Sign Up') }}
              </a>
            </div>
          @endif
        @endauth
      @endif

      <!-- Sign In -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <a href="{{ route('login') }}"
          class="flex items-center justify-center p-0 my-4 font-semibold text-indigo-600 bg-gray-100 rounded shadow-sm w-28">
          {{ __('Sign In') }}
        </a>
      </div>

      <!-- Sign Up -->
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <a href="{{ route('register') }}"
          class="flex items-center justify-center p-0 my-4 font-semibold text-gray-100 border border-gray-100 rounded shadow-sm w-28 hover:bg-gray-100 hover:text-indigo-600">
          {{ __('Sign Up') }}
        </a>
      </div>

    </div>
  </div>
</nav> --}}

<!-- Navigation Guest -->
<header class="z-50 flex flex-wrap w-full py-3 text-sm bg-blue-600 sm:justify-start sm:flex-nowrap sm:py-0">
  <nav class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
    aria-label="Global">
    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <a class="flex-none text-xl font-semibold text-white navbar-brand fw-bolder" href="{{ route('welcome') }}">
          <i class="fa-solid fa-road"></i>
        </a>
        <a class="flex-none ml-8 font-medium text-white" href="{{ route('welcome') }}" aria-label="Intan School Bus">Intan
          School Bus
        </a>
      </div>
      <div class="sm:hidden">
        <button type="button"
          class="flex items-center justify-center text-sm font-semibold text-white border rounded-lg hs-collapse-toggle size-9 gap-x-2 border-white/20 hover:border-white/40 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
          data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
          aria-label="Toggle navigation">
          <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" x2="21" y1="6" y2="6" />
            <line x1="3" x2="21" y1="12" y2="12" />
            <line x1="3" x2="21" y1="18" y2="18" />
          </svg>
          <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
          </svg>
        </button>
      </div>
    </div>
    <div id="navbar-collapse-with-animation"
      class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:block">
      <div
        class="flex flex-col mt-5 gap-y-4 gap-x-0 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
        <a class="font-medium text-white sm:py-6" href="{{ route('welcome') }}" aria-current="page">Home</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Service</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">About Us</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Contact Us</a>
        @if (Route::has('login'))
          @auth
            <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-blue-600 bg-white border border-transparent rounded-lg gap-x-2 hover:bg-white/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('dashboard') }}">Dashboard</a>
            {{-- @php($user = Auth::user())
            @if ($user->role === 'admin')
              <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-blue-600 bg-white border border-transparent rounded-lg gap-x-2 hover:bg-white/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="{{ route('admin.dashboard') }}">Dashboard</a>
            @elseif ($user->role === 'driver')
              <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-blue-600 bg-white border border-transparent rounded-lg gap-x-2 hover:bg-white/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="{{ route('driver.dashboard') }}">Dashboard</a>
            @else
              <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-blue-600 bg-white border border-transparent rounded-lg gap-x-2 hover:bg-white/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="{{ route('customer.dashboard') }}">Dashboard</a>
            @endif --}}
          @else
            <!-- Sign In -->
            <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-blue-600 bg-white border border-transparent rounded-lg gap-x-2 hover:bg-white/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('login') }}">Sign In</a>
            @if (Route::has('register'))
              <!-- Sign Up -->
              <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-white border border-white rounded-lg gap-x-2 hover:border-white/[.8] hover:text-white/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="{{ route('register') }}">Sign Up</a>
            @endif
          @endauth
        @endif
      </div>
    </div>
  </nav>
</header>
