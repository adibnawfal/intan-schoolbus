<x-app-layout>
  <x-slot name="title">
    {{ __('Transportation') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Announcement -->
    <div class="relative flex flex-wrap w-full px-10 py-24 bg-black shadow sm:rounded">
      <img class="absolute inset-0 block object-cover object-center w-full h-full opacity-25"
        src="https://images.unsplash.com/photo-1556504505-2ebcc8edf84a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="announcement">
      <div class="relative z-10 w-full text-center text-white">
        <h2 class="mb-2 text-5xl font-bold title-font">Welcome Back To School</h2>
        <p class="w-3/5 mx-auto leading-relaxed">
          We are open for student registration for Intan School Bus Service for 2023 School
          Session from 1/12/2022 - 31/1/2023!
        </p>
      </div>
    </div>
    <!-- End Announcement -->

    <!-- Table -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">School Name, Pickup and Dropoff Area Covered & Fee Range 2023 Session</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-auto">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 rounded-tl rounded-bl">School Name</th>
              <th class="px-4 py-3">School Bus Service Provided</th>
              <th class="px-4 py-3">Start - End Date</th>
              <th class="px-4 py-3">Area Covered</th>
              <th class="px-4 py-3">Monthly Fee Per Person</th>
              <th class="px-4 py-3 rounded-tr rounded-br">Standard</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b-2 border-gray-200 ">
              <td class="px-4 py-3">Sekolah Kebangsaan Setiawangsa</td>
              <td class="px-4 py-3">12 Months</td>
              <td class="px-4 py-3">1/1/2023 - 15/12/2023</td>
              <td class="px-4 py-3">Taman Keramat AU1</td>
              <td class="px-4 py-3">RM50</td>
              <td class="px-4 py-3">1 to 6</td>
            </tr>
            <tr class="border-b-2 border-gray-200">
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3">Taman Keramat AU2</td>
              <td class="px-4 py-3">RM60</td>
              <td class="px-4 py-3"></td>
            </tr>
            <tr class="border-b-2 border-gray-200">
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3">Taman Keramat AU3</td>
              <td class="px-4 py-3">RM70</td>
              <td class="px-4 py-3"></td>
            </tr>
            <tr class="border-b-2 border-gray-200">
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3"></td>
              <td class="px-4 py-3">Taman Keramat AU4</td>
              <td class="px-4 py-3">RM80</td>
              <td class="px-4 py-3"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="flex flex-col w-full mt-4">
        <h1 class="text-xl font-bold">Intan School Bus Operation Hour</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="w-full mt-2 overflow-auto">
        <table class="w-full text-sm text-center whitespace-no-wrap table-fixed">
          <thead>
            <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
              <th class="px-4 py-3 rounded-tl rounded-bl">Session</th>
              <th class="px-4 py-3">Standard</th>
              <th class="px-4 py-3">Pick-Up Time (From Home to School)</th>
              <th class="px-4 py-3 rounded-tr rounded-br">Drop-Off Time (From School to Home)</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b-2 border-gray-200">
              <td class="px-4 py-3">Morning</td>
              <td class="px-4 py-3">1,4,5, & 6</td>
              <td class="px-4 py-3">6.10 a.m - 6.45 a.m</td>
              <td class="px-4 py-3">1.30 p.m - 2.30 p.m</td>
            </tr>
            <tr class="border-b-2 border-gray-200">
              <td class="px-4 py-3">Evening</td>
              <td class="px-4 py-3">2 & 3</td>
              <td class="px-4 py-3">11.30 a.m - 1.00 p.m</td>
              <td class="px-4 py-3">6.00 p.m - 7.00 p.m</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="flex items-center mt-4 gap-x-4">
        <a class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700"
          href="{{ route('transportation.get-request-bus') }}">
          Request Bus Service
        </a>
      </div>
    </div>
    <!-- End Table -->
  </div>
</x-app-layout>
