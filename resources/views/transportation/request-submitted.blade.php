<x-app-layout>
  <x-slot name="title">
    {{ __('Request Submitted') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="text-center">
        <h1 class="max-w-2xl mx-auto text-5xl font-bold leading-none tracking-tighter">
          School Bus Service Request was Submitted!
        </h1>
        <p class="max-w-sm mx-auto mt-4 text-base leading-relaxed text-gray-500">
          Your request is being processed. The system will notify request status in 1-3 working days.
        </p>
        <div class="flex items-center justify-center mt-8 gap-x-4">
          <a class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700"
            href="{{ route('transportation.request-status') }}">
            Service Request Status
          </a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
