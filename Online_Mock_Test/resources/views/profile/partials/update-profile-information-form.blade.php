<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Profile Picture -->
        <div>
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-full h-20 w-20 object-cover mt-2">
            @else
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{{ __('No profile picture uploaded.') }}</p>
            @endif

            <input id="profile_picture" name="profile_picture" type="file" class="mt-2 block w-full" accept="image/*">
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <!-- About -->
        <div>
            <x-input-label for="about" :value="__('About')" />
            <x-text-input id="about" name="about" class="mt-1 block w-full text-white" rows="4" :value="old('about', $user->about)" />
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <!-- Education -->
        <div>
            <x-input-label for="education" :value="__('Education')" />
            <x-text-input id="education" name="education" class="mt-1 block w-full text-white" rows="4" :value="old('education', $user->education)"  />
        </div>

        <!-- Currently Works At -->
        <div>
            <x-input-label for="current_organization" :value="__('Current Organization')" />
            <x-text-input id="current_organization" name="current_organization" type="text" class="mt-1 block w-full" :value="old('current_organization', $user->current_organization)" />
            <x-input-error class="mt-2" :messages="$errors->get('current_organization')" />
        </div>

        <!-- Current Position -->
        <div>
            <x-input-label for="current_position" :value="__('Current Position')" />
            <x-text-input id="current_position" name="current_position" type="text" class="mt-1 block w-full" :value="old('current_position', $user->current_position)" />
            <x-input-error class="mt-2" :messages="$errors->get('current_position')" />
        </div>

        <!-- Skills -->
        <div>
            <x-input-label for="skills" :value="__('Skills')" />
            <x-text-input id="skills" name="skills" type="text" class="mt-1 block w-full" :value="old('skills', $user->skills)" placeholder="e.g. PHP, JavaScript, Laravel etc." />
            <x-input-error class="mt-2" :messages="$errors->get('skills')" />
        </div>

        <!-- Interests -->
        <div>
            <x-input-label for="interests" :value="__('Interests')" />
            <x-text-input id="interests" name="interests" type="text" class="mt-1 block w-full" :value="old('interests', $user->interests)" placeholder="e.g. Reading, Traveling, Coding" />
            <x-input-error class="mt-2" :messages="$errors->get('interests')" />
        </div>

        <!-- Experience -->
        <div>
            <x-input-label for="experience" :value="__('Experience')" />
            <x-text-input id="experience" name="experience" type="text" class="mt-1 block w-full" :value="old('experience', $user->experience)" placeholder="e.g. 5 years in Software Development" />
            <x-input-error class="mt-2" :messages="$errors->get('experience')" />
        </div>

        <!-- Role -->
        <div>
            <x-input-label for="role" :value="__('Register As')" />
            <select id="role" name="role" class="mt-1 block w-full">
            <option value="examiner" {{ old('role', $user->role) == 'examiner' ? 'selected' : '' }}>{{ __('Examiner') }}</option>
            <option value="examnee" {{ old('role', $user->role) == 'examnee' ? 'selected' : '' }}>{{ __('Examnee') }}</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div>

        <!-- Linkedin Profile -->
        <div>
            <x-input-label for="linkedin" :value="__('Linkedin Profile')" />
            <x-text-input id="linkedin" name="linkedin" type="url" class="mt-1 block w-full" :value="old('linkedin', $user->linkedin)" placeholder="https://www.linkedin.com/in/your-profile" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
