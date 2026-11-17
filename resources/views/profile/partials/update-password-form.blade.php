<section class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
    <!-- Decorative gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-violet-50/50 via-fuchsia-50/30 to-purple-50/50 pointer-events-none"></div>
    
    <div class="relative p-8 lg:p-10">
        <header class="mb-8">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-xl flex items-center justify-center shadow-lg shadow-violet-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">
                    {{ __('Update Password') }}
                </h2>
            </div>

            <p class="text-sm text-gray-600 font-medium leading-relaxed">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div>
                <label for="update_password_current_password" class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                    <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                    {{ __('Current Password') }}
                </label>
                <input id="update_password_current_password" 
                       name="current_password" 
                       type="password" 
                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-violet-300 hover:shadow-md" 
                       autocomplete="current-password" />
                @error('current_password', 'updatePassword')
                    <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="update_password_password" class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                    <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    {{ __('New Password') }}
                </label>
                <input id="update_password_password" 
                       name="password" 
                       type="password" 
                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-violet-300 hover:shadow-md" 
                       autocomplete="new-password" />
                @error('password', 'updatePassword')
                    <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="update_password_password_confirmation" class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                    <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    {{ __('Confirm Password') }}
                </label>
                <input id="update_password_password_confirmation" 
                       name="password_confirmation" 
                       type="password" 
                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-violet-300 hover:shadow-md" 
                       autocomplete="new-password" />
                @error('password_confirmation', 'updatePassword')
                    <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 pt-6 border-t-2 border-gray-100">
                <button type="submit" class="group px-8 py-4 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ __('Save Changes') }}
                </button>

                @if (session('status') === 'password-updated')
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition
                         x-init="setTimeout(() => show = false, 3000)"
                         class="inline-flex items-center gap-2 px-4 py-3 bg-emerald-100 border-2 border-emerald-300 rounded-xl">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-bold text-emerald-800">{{ __('Password updated successfully!') }}</span>
                    </div>
                @endif
            </div>
        </form>
    </div>
</section>