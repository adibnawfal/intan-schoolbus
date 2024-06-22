<header class="z-50 flex flex-wrap w-full py-3 text-sm bg-[#F2BA1D] sm:justify-start sm:flex-nowrap sm:py-0">
  <nav class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
    aria-label="Global">
    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <a class="flex-none text-xl font-semibold text-[#08183A] navbar-brand fw-bolder" href="{{ route('welcome') }}">
          <img class="object-cover size-[40px] outline-none" src="{{ asset('images/logo/logo.png') }}" alt="Logo">
        </a>
        <a class="flex-none ml-4 text-lg font-bold text-[#08183A]" href="{{ route('welcome') }}"
          aria-label="Intan School Bus">
          Intan School Bus
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
        <a class="font-semibold text-[#08183A] sm:py-6" href="{{ route('welcome') }}" aria-current="page">Home</a>
        <a class="font-semibold text-[#08183A] sm:py-6" href="{{ url('/#aboutus') }}">About Us</a>
        <a class="font-semibold text-[#08183A] sm:py-6" href="{{ url('/#contactus') }}">Contact Us</a>
        @if (Route::has('login'))
          @auth
            <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-[#F2BA1D] bg-[#08183A] border border-transparent rounded-lg gap-x-2 hover:bg-[#08183A]/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('dashboard') }}">Dashboard</a>
          @else
            <!-- Sign In -->
            <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-[#F2BA1D] bg-[#08183A] border border-transparent rounded-lg gap-x-2 hover:bg-[#08183A]/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('login') }}">Sign In</a>
            @if (Route::has('register'))
              <!-- Sign Up -->
              <a class="inline-flex items-center px-6 py-2 text-sm font-semibold text-[#08183A] border border-[#08183A] rounded-lg gap-x-2 hover:bg-[#08183A] hover:text-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="{{ route('register') }}">Sign Up</a>
            @endif
          @endauth
        @endif
      </div>
    </div>
  </nav>
</header>
