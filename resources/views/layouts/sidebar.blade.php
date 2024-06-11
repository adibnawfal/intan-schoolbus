<!-- Sidebar -->
<div id="application-sidebar"
  class="z-[60] min-w-64 bg-[#08183A] border-e border-gray-200 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700">
  <nav class="flex flex-col flex-wrap w-full px-6 py-8 hs-accordion-group" data-hs-accordion-always-open>
    <ul class="space-y-1.5">
      {{-- <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
          href="#">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-panels-top-left">
            <rect width="18" height="18" x="3" y="3" rx="2" />
            <path d="M3 9h18" />
            <path d="M9 21V9" />
          </svg>
          Dashboard
        </a>
      </li> --}}

      <li>
        <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 font-semibold text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
          href="{{ route('dashboard') }}">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-panels-top-left">
            <rect width="18" height="18" x="3" y="3" rx="2" />
            <path d="M3 9h18" />
            <path d="M9 21V9" />
          </svg>
          Dashboard
        </a>
      </li>

      <li>
        <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 font-semibold text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
          href="{{ route('profile.my-profile') }}">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
          </svg>
          Profile
        </a>
      </li>

      <li class="hs-accordion" id="account-accordion">
        <button type="button"
          class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent font-semibold text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-bus-front">
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
          Transportation

          <svg class="hidden hs-accordion-active:block ms-auto size-4" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 15-6-6-6 6" />
          </svg>

          <svg class="block hs-accordion-active:hidden ms-auto size-4" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>

        <div id="account-accordion-child"
          class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
          <ul class="pt-2 ps-2">
            @if (Auth::user()->role === 'admin')
              <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
                  href="{{ route('transportation.service-information') }}">
                  Service Information
                </a>
              </li>
            @endif

            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'customer')
              <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
                  href="{{ route('transportation.view') }}">
                  Request Bus Service
                </a>
              </li>
              <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
                  href="{{ route('transportation.request-status') }}">
                  Request Status
                </a>
              </li>
            @endif

            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'driver')
              <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
                  href="{{ route('transportation.student-details') }}">
                  Student Details
                </a>
              </li>
            @endif
          </ul>
        </div>
      </li>

      @if (Auth::user()->role === 'admin' || Auth::user()->role === 'customer')
        <li>
          <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 font-semibold text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
            href="{{ route('payment.view') }}">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-credit-card">
              <rect width="20" height="14" x="2" y="5" rx="2" />
              <line x1="2" x2="22" y1="10" y2="10" />
            </svg>
            Payment
          </a>
        </li>
      @endif

      @if (Auth::user()->role === 'admin')
        <li>
          <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 font-semibold text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
            href="{{ route('report.view') }}">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-book-open">
              <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
              <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
            </svg>
            Report
          </a>
        </li>
      @endif

      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 font-semibold text-sm text-white rounded-lg hover:bg-[#F2BA1D] hover:text-[#08183A]"
            onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('logout') }}">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-log-out">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
              <polyline points="16 17 21 12 16 7" />
              <line x1="21" x2="9" y1="12" y2="12" />
            </svg>
            Logout
          </a>
        </form>
      </li>
    </ul>
  </nav>
</div>
<!-- End Sidebar -->
