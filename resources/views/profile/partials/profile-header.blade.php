<div class="sm:flex lg:items-end group">
  <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
    @if ($userDetails->profile_img)
      <img class="object-cover size-[10rem] rounded-md bg-gray-100 bg-opacity-50 border border-gray-300 outline-none"
        src="{{ asset('images/users/' . $userDetails->profile_img) }}" alt="Profile Picture">
    @else
      <div>
        <span class="inline-flex items-center justify-center size-[10rem] rounded-md bg-gray-300">
          <span class="text-4xl font-medium leading-none text-gray-800 dark:text-gray-200">
            {{ substr($userDetails->first_name, 0, 1) }}{{ substr($userDetails->last_name, 0, 1) }}
          </span>
        </span>
      </div>
    @endif
  </div>
  <div class="w-full">
    @if ($user->role == 'customer')
      <span class="text-sm text-gray-500 uppercase">{{ $userDetails->status }}</span>
    @endif
    <p class="mt-3 mb-1 text-3xl font-bold leading-6 text-gray-800">
      {{ $userDetails->first_name }} {{ $userDetails->last_name }}
    </p>
    <p>{{ $user->email }}</p>
    <nav class="flex-col flex-grow hidden w-full pt-4 mt-2 border-t-2 md:flex md:justify-start md:flex-row">
      <ul class="space-x-6 list-none lg:space-y-0 lg:items-center lg:inline-flex">
        <li class="flex items-center gap-x-3">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-user">
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
            <circle cx="12" cy="7" r="4" />
          </svg>
          <a href="{{ route('profile.my-profile') }}" @class(['text-sm', 'hover:underline', 'underline' => $isMyProfile])>
            My Profile
          </a>
        </li>
        <li class="flex items-center gap-x-3">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-bus">
            <path d="M8 6v6" />
            <path d="M15 6v6" />
            <path d="M2 12h19.6" />
            <path
              d="M18 18h3s.5-1.7.8-2.8c.1-.4.2-.8.2-1.2 0-.4-.1-.8-.2-1.2l-1.4-5C20.1 6.8 19.1 6 18 6H4a2 2 0 0 0-2 2v10h3" />
            <circle cx="7" cy="18" r="2" />
            <path d="M9 18h5" />
            <circle cx="16" cy="18" r="2" />
          </svg>
          <a href="{{ route('profile.driver-profile') }}" @class([
              'text-sm',
              'hover:underline',
              'underline' => $isDriverProfile,
          ])>
            Driver Profile
          </a>
        </li>
        <li class="flex items-center gap-x-3">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-contact">
            <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
            <rect width="18" height="18" x="3" y="4" rx="2" />
            <circle cx="12" cy="10" r="2" />
            <line x1="8" x2="8" y1="2" y2="4" />
            <line x1="16" x2="16" y1="2" y2="4" />
          </svg>
          <a href="{{ route('profile.student-profile') }}" @class([
              'text-sm',
              'hover:underline',
              'underline' => $isStudentProfile,
          ])>
            Student Profile
          </a>
        </li>
        <li class="flex items-center gap-x-3">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-lock">
            <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
          </svg>
          <a href="{{ route('profile.change-password') }}" @class([
              'text-sm',
              'hover:underline',
              'underline' => $isChangePassword,
          ])>
            Change Password
          </a>
        </li>
        <li class="flex items-center text-red-700 gap-x-3">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-trash-2">
            <path d="M3 6h18" />
            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
            <line x1="10" x2="10" y1="11" y2="17" />
            <line x1="14" x2="14" y1="11" y2="17" />
          </svg>
          <a href="{{ route('profile.delete-profile') }}" @class([
              'text-sm',
              'hover:underline',
              'underline' => $isDeleteProfile,
          ])>
            Delete Profile
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
