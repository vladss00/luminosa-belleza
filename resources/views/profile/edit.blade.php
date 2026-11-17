<x-app-layout>
    <x-slot name="header">
        <div class="py-2">
            <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                        {{ __('Profile') }}
            </h2>
            <p class="text-sm text-gray-500 mt-1 font-medium">Manage your account settings and preferences</p>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="space-y-6">
            <!-- Profile Information -->
            <div>
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Update Password -->
            <div>
                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete Account -->
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>