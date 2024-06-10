@php
  $isMyProfile = false;
  $isDriverProfile = false;
  $isEmergencyContact = false;
  $isDrivingLicense = false;
  $isStudentProfile = true;
  $isChangePassword = false;
  $isDeleteProfile = false;
@endphp

<x-app-layout>
  <x-slot name="title">
    {{ __('Add New Student') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Profile Header -->
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.profile-header')
    </div>
    <!-- End Profile Header -->

    <!-- New Student Form -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      @include('profile.partials.new-student-form')
    </div>
    <!-- End New Student Form -->
  </div>
</x-app-layout>
