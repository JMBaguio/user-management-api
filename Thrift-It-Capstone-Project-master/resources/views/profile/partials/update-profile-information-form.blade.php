<section class="relative">
    <header class="flex items-start gap-3 mb-6">
        <div class="flex-shrink-0">
            <div class="p-2 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                <svg class="w-6 h-6 text-blue-600 dark:text-purple-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                {{ __('Profile Information') }}
                <span
                    class="px-2 py-1 text-xs font-medium bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 rounded-full">
                    Personal
                </span>
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- ✅ Updated form to handle S3 profile pic --}}
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('patch')

        <!-- Profile Picture -->
        <div class="flex flex-col items-center text-center space-y-4">
            @if ($user->profile_pic)
                <img src="{{ Storage::disk('s3')->url($user->profile_pic) }}" alt="Profile Picture"
                    class="w-28 h-28 rounded-full object-cover border-4 border-blue-500 shadow-md hover:scale-105 transition-transform duration-300">
            @else
                <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile Picture"
                    class="w-28 h-28 rounded-full object-cover border-4 border-gray-300 dark:border-gray-600 shadow-md hover:scale-105 transition-transform duration-300">
            @endif

            <div class="w-full max-w-xs">
                <x-input-label for="profile_pic" :value="__('Profile Picture')" />
                <input id="profile_pic" name="profile_pic" type="file" accept="image/*"
                    class="block w-full text-sm text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Allowed types: JPG, PNG — Max size: 2MB
                </p>
                <x-input-error class="mt-2" :messages="$errors->get('profile_pic')" />
            </div>
        </div>

        <!-- Name Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="group">
                <x-input-label for="fname" :value="__('First Name')" class="text-sm font-semibold mb-2" />
                <x-text-input id="fname" name="fname" type="text"
                    class="block w-full border-gray-300 dark:border-gray-700 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                    :value="old('fname', $user->fname)" required autocomplete="fname" placeholder="Enter your first name" />
                <x-input-error class="mt-2" :messages="$errors->get('fname')" />
            </div>

            <div class="group">
                <x-input-label for="lname" :value="__('Last Name')" class="text-sm font-semibold mb-2" />
                <x-text-input id="lname" name="lname" type="text"
                    class="block w-full border-gray-300 dark:border-gray-700 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                    :value="old('lname', $user->lname)" required autocomplete="lname" placeholder="Enter your last name" />
                <x-input-error class="mt-2" :messages="$errors->get('lname')" />
            </div>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-sm font-semibold mb-2" />
            <x-text-input id="email" name="email" type="email"
                class="block w-full border-gray-300 dark:border-gray-700 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                :value="old('email', $user->email)" required autocomplete="email" placeholder="Enter your email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="underline text-blue-600 hover:text-blue-800 text-sm">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </div>
            @endif
        </div>

        <!-- Barangay -->
        <div class="space-y-4">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Location</h3>
            <div class="mb-8">
                <label for="barangay_id"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Barangay</label>

                <select id="barangay_id" name="barangay_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500"
                    required>
                    <option value="" disabled>Select a barangay</option>
                    @foreach ($barangays as $barangay)
                        <option value="{{ $barangay->id }}"
                            {{ old('barangay_id', $user->barangay_id ?? '') == $barangay->id ? 'selected' : '' }}>
                            {{ $barangay->name }}
                        </option>
                    @endforeach
                </select>

                @error('barangay_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 pt-4">
            <x-primary-button
                class="flex items-center gap-2 px-6 py-3 rounded-xl transition-all duration-300 hover:shadow-lg bg-blue-600 hover:bg-blue-700 focus:ring-blue-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'Profile picture updated successfully!' ||
                    session('status') === 'Profile updated successfully!')
                <p class="text-sm text-green-600 dark:text-green-400 font-medium">
                    {{ session('status') }}
                </p>
            @endif
        </div>
    </form>
</section>
