<div class="flex flex-col w-full">
  <h1 class="text-xl font-bold">Delete Profile</h1>
  <p class="text-sm leading-relaxed">Once your profile is deleted, all of its resources and data will be
    permanently deleted. Before deleting your profile, please download any data or information that you wish to retain.
  </p>
</div>

<button type="submit" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
  class="px-8 py-2 mt-2 text-sm text-white bg-red-600 rounded w-max focus:outline-none hover:bg-red-700">
  Delete Profile
</button>

<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
  <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
    @csrf
    @method('delete')

    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Are you sure you want to delete your account?') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </p>

    <div class="mt-6">
      <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

      <x-text-input id="password" name="password" type="password" class="block w-3/4 mt-1"
        placeholder="{{ __('Password') }}" />

      <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
    </div>

    <div class="flex justify-end mt-6">
      <x-secondary-button x-on:click="$dispatch('close')">
        {{ __('Cancel') }}
      </x-secondary-button>

      <x-danger-button class="ms-3">
        {{ __('Delete Account') }}
      </x-danger-button>
    </div>
  </form>
</x-modal>

@if (session('status') === 'delete-profile-failure')
  <div id="dismiss-alert"
    class="fixed bottom-0 m-8 transition duration-300 max-w-[550px] end-0 hs-removing:translate-x-5 hs-removing:opacity-0">
    <div>
      <div class="p-4 rounded border-red-500 bg-red-50 border-s-4 role="alert">
        <div class="flex text-red-500">
          <div class="flex-shrink-0">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              aria-hidden="true">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="ms-3">
            <p class="text-sm">Can't delete profile because your bus services request are being processed.</p>
          </div>
          <div class="flex ms-8">
            <button type="button"
              class="inline-flex items-center justify-center flex-shrink-0 rounded-lg size-5 hover:text-red-600 focus:outline-none"
              data-hs-remove-element="#dismiss-alert">
              <span class="sr-only">Close</span>
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

{{-- <section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Delete Account') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>
  </header>

  <x-danger-button x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

  <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
      @csrf
      @method('delete')

      <h2 class="text-lg font-medium text-gray-900">
        {{ __('Are you sure you want to delete your account?') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
      </p>

      <div class="mt-6">
        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

        <x-text-input id="password" name="password" type="password" class="block w-3/4 mt-1"
          placeholder="{{ __('Password') }}" />

        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
      </div>

      <div class="flex justify-end mt-6">
        <x-secondary-button x-on:click="$dispatch('close')">
          {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3">
          {{ __('Delete Account') }}
        </x-danger-button>
      </div>
    </form>
  </x-modal>
</section> --}}
