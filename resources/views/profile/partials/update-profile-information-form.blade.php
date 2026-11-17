<section class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
    <!-- Decorative gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-violet-50/50 via-fuchsia-50/30 to-purple-50/50 pointer-events-none"></div>
    
    <div class="relative p-8 lg:p-10">
        <header class="mb-8">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-xl flex items-center justify-center shadow-lg shadow-violet-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">
                    {{ __('Profile Information') }}
                </h2>
            </div>

            <p class="text-sm text-gray-600 font-medium leading-relaxed">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <!-- Name Field -->
            <div>
                <label for="name" class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                    <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    {{ __('Name') }}
                </label>
                <input id="name" 
                       name="name" 
                       type="text" 
                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-violet-300 hover:shadow-md" 
                       value="{{ old('name', $user->name) }}" 
                       required 
                       autofocus 
                       autocomplete="name" />
                @error('name')
                    <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                    <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    {{ __('Email') }}
                </label>
                <input id="email" 
                       name="email" 
                       type="email" 
                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-violet-300 hover:shadow-md" 
                       value="{{ old('email', $user->email) }}" 
                       required 
                       autocomplete="username" />
                @error('email')
                    <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 rounded-xl bg-gradient-to-r from-amber-50 to-yellow-50 border-2 border-amber-200 shadow-md overflow-hidden">
                        <div class="p-4 flex items-start gap-3">
                            <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-amber-500 to-yellow-500 rounded-lg flex items-center justify-center shadow-lg shadow-amber-500/30">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-amber-900 font-medium mb-2">
                                    {{ __('Your email address is unverified.') }}
                                </p>
                                <button form="send-verification" class="inline-flex items-center px-4 py-2 bg-white border-2 border-amber-300 rounded-lg text-sm font-bold text-amber-900 hover:bg-amber-50 hover:border-amber-400 transition-all shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </div>

                        @if (session('status') === 'verification-link-sent')
                            <div class="px-4 pb-4">
                                <div class="bg-emerald-100 border-2 border-emerald-300 rounded-lg p-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-sm font-bold text-emerald-800">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 pt-6 border-t-2 border-gray-100">
                <button type="submit" class="group px-8 py-4 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ __('Save Changes') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition
                         x-init="setTimeout(() => show = false, 3000)"
                         class="inline-flex items-center gap-2 px-4 py-3 bg-emerald-100 border-2 border-emerald-300 rounded-xl">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-bold text-emerald-800">{{ __('Saved successfully!') }}</span>
                    </div>
                @endif
            </div>
        </form>
    </div>
</section>