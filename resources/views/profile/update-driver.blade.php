@php
  $isMyProfile = false;
  $isDriverProfile = true;
  $isStudentProfile = false;
  $isChangePassword = false;
  $isDeleteProfile = false;
@endphp

<x-app-layout>
  <x-slot name="title">
    {{ __('Update Driver') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Profile Header -->
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.profile-header')
    </div>
    <!-- End Profile Header -->

    <!-- Update Driver Form -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.update-driver-form')
    </div>
    <!-- End Update Driver Form -->
  </div>
</x-app-layout>
