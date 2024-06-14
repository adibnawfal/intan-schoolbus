<x-app-layout>
  <x-slot name="title">
    {{ __('Request Bus Service') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <livewire:RequestBus />
  </div>
</x-app-layout>
