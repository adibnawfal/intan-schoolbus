@php
  $isMyProfile = false;
  $isDriverProfile = true;
  $isEmergencyContact = false;
  $isDrivingLicense = false;
  $isStudentProfile = false;
  $isChangePassword = false;
  $isDeleteProfile = false;
@endphp

<x-app-layout>
  <x-slot name="title">
    {{ __('Add New Driver') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Profile Header -->
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.profile-header')
    </div>
    <!-- End Profile Header -->

    <!-- New Driver Form -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.new-driver-form')
    </div>
    <!-- End New Driver Form -->
  </div>
</x-app-layout>
