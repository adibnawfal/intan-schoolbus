<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">Address Information</h1>
  <p class="text-sm leading-relaxed lg:w-2/3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<div class="flex flex-wrap -m-2">
  @php
    $count = 1;
  @endphp
  @foreach ($address as $addressData)
    <button type="button" data-hs-overlay="#hs-address-{{ $addressData->id }}-modal"
      class="relative w-full p-2 lg:w-1/3 md:w-1/2">
      <span
        class="absolute px-3 py-1 text-xs tracking-widest border border-gray-300 rounded-tr rounded-bl top-2 right-2">{{ $addressData->area }}</span>
      <div class="flex items-center justify-between p-6 border border-gray-300 rounded gap-x-4 hover:shadow">
        <div class="flex gap-x-4">
          <p class="font-medium">{{ $count++ }}.</p>
          <div class="flex flex-col items-start">
            <h2 class="font-medium line-clamp-1">
              {{ $addressData->address_1 }}
            </h2>
            <p class="text-xs text-gray-500 line-clamp-1">
              {{ $addressData->address_2 }}, {{ $addressData->postal_code }} {{ $addressData->city }},
              {{ $addressData->state }}
            </p>
          </div>
        </div>
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="lucide lucide-chevron-right">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </div>
    </button>
    @include('profile.partials.modal.hs-address-modal')
  @endforeach
</div>

<a class="flex items-center justify-between px-6 py-3 mt-2 font-semibold border border-gray-300 rounded hover:shadow"
  href="{{ route('profile.new-address') }}">
  Add New Address Information
  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
    class="lucide lucide-circle-plus">
    <circle cx="12" cy="12" r="10" />
    <path d="M8 12h8" />
    <path d="M12 8v8" />
  </svg>
</a>
