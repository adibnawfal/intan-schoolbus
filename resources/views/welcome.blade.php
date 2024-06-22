<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Intan School Bus</title>

  <!-- Fonts Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/86e471e71f.js" crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body class="font-sans antialiased">
  <div class="flex flex-col min-h-screen bg-[#08183A]">
    <!-- Navbar -->
    @include('layouts.navigation-guest')

    <!-- Content -->
    <main class="flex flex-grow">
      <div id="scrollspy-1" class="flex flex-col items-center justify-center w-full">

        <div class="flex max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24">
          <!-- Grid -->
          <div class="grid gap-4 md:grid-cols-2 md:gap-8 xl:gap-20 md:items-center">
            <div>
              <h1 class="block font-bold text-white sm:text-4xl lg:text-5xl lg:leading-tight dark:text-white">
                Intan School Bus Management <span class="text-[#F2BA1D]">System</span></h1>
              <p class="mt-3 text-lg text-gray-200 dark:text-gray-400">
                Effortless registration and seamless management at your fingertips. Experience convenience like never
                before with our user-friendly platform.
              </p>

              <!-- Buttons -->
              <div class="grid w-full gap-3 mt-7 sm:inline-flex">
                <a class="inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-[#08183A] bg-[#F2BA1D] rounded-lg gap-x-2 hover:bg-[#F2BA1D]/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                  href="{{ route('register') }}">
                  Get started
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </a>
                <a class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-[#08183A] bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                  href="{{ url('/#contactus') }}">
                  Contact us
                </a>
              </div>
              <!-- End Buttons -->
            </div>
            <!-- End Col -->

            <div class="relative ms-4">
              <img class="w-full rounded-md"
                src="https://images.unsplash.com/photo-1556504505-2ebcc8edf84a?q=80&w=2070&auto=format&fit=crop&w=700&h=800&q=80"
                alt="Image Description">
              <div
                class="absolute inset-0 -z-[1] bg-gradient-to-tr from-gray-200 via-white/0 to-white/0 size-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6 dark:from-slate-800 dark:via-slate-900/0 dark:to-slate-900/0">
              </div>

              <!-- SVG-->
              <div class="absolute bottom-0 start-0">
                <svg class="w-2/3 h-auto text-white ms-auto dark:text-slate-900" width="630" height="451"
                  viewBox="0 0 630 451" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="531" y="352" width="99" height="99" fill="currentColor" />
                  <rect x="140" y="352" width="106" height="99" fill="currentColor" />
                  <rect x="482" y="402" width="64" height="49" fill="currentColor" />
                  <rect x="433" y="402" width="63" height="49" fill="currentColor" />
                  <rect x="384" y="352" width="49" height="50" fill="currentColor" />
                  <rect x="531" y="328" width="50" height="50" fill="currentColor" />
                  <rect x="99" y="303" width="49" height="58" fill="currentColor" />
                  <rect x="99" y="352" width="49" height="50" fill="currentColor" />
                  <rect x="99" y="392" width="49" height="59" fill="currentColor" />
                  <rect x="44" y="402" width="66" height="49" fill="currentColor" />
                  <rect x="234" y="402" width="62" height="49" fill="currentColor" />
                  <rect x="334" y="303" width="50" height="49" fill="currentColor" />
                  <rect x="581" width="49" height="49" fill="currentColor" />
                  <rect x="581" width="49" height="64" fill="currentColor" />
                  <rect x="482" y="123" width="49" height="49" fill="currentColor" />
                  <rect x="507" y="124" width="49" height="24" fill="currentColor" />
                  <rect x="531" y="49" width="99" height="99" fill="currentColor" />
                </svg>
              </div>
              <!-- End SVG-->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Grid -->
        </div>

        <div id="aboutus">
          <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <!-- Title -->
            <div class="max-w-3xl mb-10 lg:mb-14">
              <h2 class="text-2xl font-semibold text-[#F2BA1D] md:text-4xl md:leading-tight">Our approach</h2>
              <p class="mt-1 text-white">This profound insight guides our comprehensive strategy — from
                meticulous research and strategic planning to the seamless execution of brand development and website or
                product deployment.</p>
            </div>
            <!-- End Title -->

            <!-- Grid -->
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-2 lg:gap-16 lg:items-center">
              <div class="aspect-w-16 aspect-h-9 lg:aspect-none">
                <img class="object-cover w-full rounded-xl"
                  src="https://images.unsplash.com/photo-1587614203976-365c74645e83?q=80&w=480&h=600&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="Image Description">
              </div>
              <!-- End Col -->

              <!-- Timeline -->
              <div>
                <!-- Heading -->
                <div class="mb-4">
                  <h3 class="text-[#F2BA1D] text-xs font-medium uppercase">
                    Steps
                  </h3>
                </div>
                <!-- End Heading -->

                <!-- Item -->
                <div class="flex gap-x-5 ms-1">
                  <!-- Icon -->
                  <div
                    class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
                    <div class="relative z-10 flex items-center justify-center size-8">
                      <span
                        class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#F2BA1D] font-semibold text-xs uppercase rounded-full">
                        1
                      </span>
                    </div>
                  </div>
                  <!-- End Icon -->

                  <!-- Right Content -->
                  <div class="grow pt-0.5 pb-8 sm:pb-12">
                    <p class="text-sm lg:text-base text-neutral-400">
                      <span class="text-white">Market Research and Analysis:</span>
                      Identify your target audience and understand their needs, preferences, and behaviors.
                    </p>
                  </div>
                  <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="flex gap-x-5 ms-1">
                  <!-- Icon -->
                  <div
                    class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
                    <div class="relative z-10 flex items-center justify-center size-8">
                      <span
                        class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#F2BA1D] font-semibold text-xs uppercase rounded-full">
                        2
                      </span>
                    </div>
                  </div>
                  <!-- End Icon -->

                  <!-- Right Content -->
                  <div class="grow pt-0.5 pb-8 sm:pb-12">
                    <p class="text-sm lg:text-base text-neutral-400">
                      <span class="text-white">Product Development and Testing:</span>
                      Develop digital products or services that address the needs and preferences of your target
                      audience.
                    </p>
                  </div>
                  <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="flex gap-x-5 ms-1">
                  <!-- Icon -->
                  <div
                    class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
                    <div class="relative z-10 flex items-center justify-center size-8">
                      <span
                        class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#F2BA1D] font-semibold text-xs uppercase rounded-full">
                        3
                      </span>
                    </div>
                  </div>
                  <!-- End Icon -->

                  <!-- Right Content -->
                  <div class="grow pt-0.5 pb-8 sm:pb-12">
                    <p class="text-sm md:text-base text-neutral-400">
                      <span class="text-white">Marketing and Promotion:</span>
                      Develop a comprehensive marketing strategy to promote your digital products or services.
                    </p>
                  </div>
                  <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="flex gap-x-5 ms-1">
                  <!-- Icon -->
                  <div
                    class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
                    <div class="relative z-10 flex items-center justify-center size-8">
                      <span
                        class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#F2BA1D] font-semibold text-xs uppercase rounded-full">
                        4
                      </span>
                    </div>
                  </div>
                  <!-- End Icon -->

                  <!-- Right Content -->
                  <div class="grow pt-0.5 pb-8 sm:pb-12">
                    <p class="text-sm md:text-base text-neutral-400">
                      <span class="text-white">Launch and Optimization:</span>
                      Launch your digital products or services to the market, closely monitoring their performance and
                      user feedback.
                    </p>
                  </div>
                  <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-[#F2BA1D] font-medium text-sm text-neutral-800 rounded-full focus:outline-none"
                  href="#">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                      d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                    </path>
                    <path
                      class="transition opacity-0 group-hover:opacity-100 group-focus:opacity-100 group-hover:delay-100"
                      d="M14.05 2a9 9 0 0 1 8 7.94"></path>
                    <path class="transition opacity-0 group-hover:opacity-100 group-focus:opacity-100"
                      d="M14.05 6A5 5 0 0 1 18 10"></path>
                  </svg>
                  Schedule a call
                </a>
              </div>
              <!-- End Timeline -->
            </div>
            <!-- End Grid -->
          </div>
        </div>

        <div id="contactus" class="max-w-[85rem] container flex flex-col py-16 px-4 sm:px-6 lg:px-8">
          <!-- Title -->
          <div class="max-w-3xl mb-10 lg:mb-14">
            <h2 class="text-2xl font-semibold text-[#F2BA1D] md:text-4xl md:leading-tight">Contact Us</h2>
            <p class="mt-1 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ac lacus
              arcu. Proin pulvinar fringilla neque, non placerat lacus maximus et. Aliquam porttitor quis massa nec
              pharetra. Maecenas eu sagittis dui. In sollicitudin diam vel neque hendrerit malesuada.</p>
          </div>
          <!-- End Title -->

          <div class="container flex gap-x-10">
            <div
              class="relative h-[40rem] flex items-end justify-start p-10 overflow-hidden bg-gray-300 rounded-lg lg:w-2/3 md:w-1/2">
              <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map"
                marginheight="0" marginwidth="0" scrolling="no"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.6732613894205!2d101.7386778116475!3d3.180386152944203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc379aab231cdd%3A0xafb7b7f6e43663ce!2sSekolah%20Kebangsaan%20Setiawangsa!5e0!3m2!1sen!2smy!4v1719058834269!5m2!1sen!2smy"></iframe>
              <div class="relative flex flex-wrap py-6 bg-white rounded shadow-md">
                <div class="px-6 lg:w-1/2">
                  <h2 class="text-xs font-semibold tracking-widest text-gray-900 title-font">ADDRESS</h2>
                  <p class="mt-1">Photo booth tattooed prism, portland taiyaki hoodie neutra typewriter</p>
                </div>
                <div class="px-6 mt-4 lg:w-1/2 lg:mt-0">
                  <h2 class="text-xs font-semibold tracking-widest text-gray-900 title-font">EMAIL</h2>
                  <a class="leading-relaxed text-indigo-500">example@email.com</a>
                  <h2 class="mt-4 text-xs font-semibold tracking-widest text-gray-900 title-font">PHONE</h2>
                  <p class="leading-relaxed">123-456-7890</p>
                </div>
              </div>
            </div>
            <form method="post" action="{{ route('welcome.submit-contact-us') }}"
              class="flex flex-col justify-center w-full lg:w-1/3 md:w-1/2">
              @csrf

              <div class="mb-4">
                <label for="name"
                  class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Name</label>
                <div class="relative">
                  <input type="text" id="name" name="name" placeholder="Enter your name"
                    class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    value="{{ old('name') }}">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>
              <div class="mb-4">
                <label for="email" class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Email
                  Address</label>
                <div class="relative">
                  <input type="email" id="email" name="email" placeholder="Enter your email address"
                    class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    value="{{ old('email') }}">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div class="mb-4">
                <label for="message"
                  class="block mb-2 font-medium text-sm text-[#F2BA1D] dark:text-white">Message</label>
                <textarea id="message" name="message"
                  class="block w-full h-32 text-sm rounded-lg focus:border-[#F2BA1D] focus:ring-[#F2BA1D] disabled:opacity-50 disabled:pointer-events-none  outline-none resize-none">{{ old('message') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('message')" />
              </div>
              <button type="submit"
                class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-[#08183A] bg-[#F2BA1D] border border-transparent rounded-lg gap-x-2 hover:bg-[#F2BA1D]/[.8] disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Submit</button>
              <p class="mt-3 text-xs text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Nulla ac lacus arcu.</p>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>

  @if (session('status') === 'contact-us-submitted')
    <div id="dismiss-alert"
      class="fixed bottom-0 m-8 transition duration-300 max-w-[550px] end-0 hs-removing:translate-x-5 hs-removing:opacity-0">
      <div>
        <div class="p-4 rounded border-green-500 bg-green-50 border-s-4 role="alert">
          <div class="flex text-green-500">
            <div class="flex-shrink-0">
              <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                  clip-rule="evenodd"></path>
              </svg>
            </div>
            <div class="ms-3">
              <p class="text-sm">Your query has been successfully submitted.</p>
            </div>
            <div class="flex ms-8">
              <button type="button"
                class="inline-flex items-center justify-center flex-shrink-0 rounded-lg size-5 hover:text-green-600 focus:outline-none"
                data-hs-remove-element="#dismiss-alert">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

  @livewireScripts
</body>

</html>
