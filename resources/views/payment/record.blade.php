<x-app-layout>
  <x-slot name="title">
    {{ __('Payment Record') }}
  </x-slot>

  <livewire:Record :busServiceData="$busServiceData" :payment="$payment" />
</x-app-layout>
