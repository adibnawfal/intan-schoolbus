<header
  class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-[#F2BA1D] text-sm py-2.5 sm:py-4 dark:bg-neutral-950 dark:border-neutral-700">
  <nav class="flex items-center justify-between w-full px-4 mx-auto basis-full sm:px-6 lg:px-8" aria-label="Global">
    <div class="flex items-center me-5 md:me-8">
      <a class="flex-none text-xl font-semibold text-[#08183A] navbar-brand fw-bolder" href="{{ route('welcome') }}">
        <img class="object-cover size-[40px] outline-none" src="{{ asset('images/logo/logo.png') }}" alt="Logo">
      </a>
      <a class="flex-none ml-4 text-lg font-bold text-[#08183A]" href="{{ route('welcome') }}"
        aria-label="Intan School Bus">
        Intan School Bus
      </a>
    </div>

    <div class="flex items-center gap-2">
      <button type="button"
        class="size-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full text-[#08183A] hover:bg-white/20 disabled:opacity-50 disabled:pointer-events-none">
        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
          <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
        </svg>
      </button>

      <button type="button"
        class="size-[2.375rem] inline-flex justify-center items-center me-2 gap-x-2 text-sm font-semibold rounded-full text-[#08183A] hover:bg-white/20 disabled:opacity-50 disabled:pointer-events-none"
        data-hs-offcanvas="#hs-offcanvas-right">
        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="lucide lucide-mail">
          <rect width="20" height="16" x="2" y="4" rx="2" />
          <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
        </svg>
      </button>

      <p class="flex-none font-bold text-[#08183A]">
        {{ Auth::user()->email }}
      </p>
    </div>
  </nav>
</header>
