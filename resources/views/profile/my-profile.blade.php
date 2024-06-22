@php
  $isMyProfile = true;
  $isDriverProfile = false;
  $isEmergencyContact = false;
  $isDrivingLicense = false;
  $isStudentProfile = false;
  $isChangePassword = false;
  $isDeleteProfile = false;
@endphp

<x-app-layout>
  <x-slot name="title">
    {{ __('My Profile') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <!-- Profile Header -->
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded">
      @include('profile.partials.profile-header')
    </div>
    <!-- End Profile Header -->

    <!-- About Me -->
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      @include('profile.partials.about-me')
    </div>
    <!-- End About Me -->

    @if (Auth::user()->role === 'customer')
      <!-- Parent/Guardian Information -->
      <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
        @include('profile.partials.parent-guardian-information')
      </div>
      <!-- End Parent/Guardian Information -->

      <!-- Address Information -->
      <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
        @include('profile.partials.address-information')
      </div>
      <!-- End Address Information -->
    @endif

    {{-- <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
      <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
        <div class="max-w-xl">
          @include('profile.partials.update-profile-information-form')
        </div>
      </div>

      <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
        <div class="max-w-xl">
          @include('profile.partials.update-password-form')
        </div>
      </div>

      <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
        <div class="max-w-xl">
          @include('profile.partials.delete-user-form')
        </div>
      </div>
    </div> --}}
  </div>
</x-app-layout>
