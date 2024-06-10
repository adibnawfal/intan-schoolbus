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
    {{ __('Change Driver Password') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Profile Header -->
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.profile-header')
    </div>
    <!-- End Profile Header -->

    <!-- Change Driver Password Form -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      @include('profile.partials.change-driver-password-form')
    </div>
    <!-- End Change Driver Password Form -->
  </div>
</x-app-layout>
