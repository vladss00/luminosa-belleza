<section class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
    <!-- Decorative gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-red-50/50 via-rose-50/30 to-pink-50/50 pointer-events-none"></div>
    
    <div class="relative p-8 lg:p-10">
        <header class="mb-8">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg shadow-red-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">
                    {{ __('Delete Account') }}
                </h2>
            </div>

            <p class="text-sm text-gray-600 font-medium leading-relaxed mb-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>

            <!-- Warning Box -->
            <div class="rounded-xl bg-gradient-to-r from-amber-50 to-yellow-50 border-2 border-amber-200 shadow-md overflow-hidden">
                <div class="p-4 flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-amber-500 to-yellow-500 rounded-lg flex items-center justify-center shadow-lg shadow-amber-500/30">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-amber-900 font-bold mb-1">
                            Warning: This action is permanent
                        </p>
                        <p class="text-sm text-amber-800">
                            All your data will be permanently deleted and cannot be recovered.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="group px-8 py-4 bg-gradient-to-r from-red-600 to-rose-600 text-white rounded-xl font-bold shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/40 transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
            {{ __('Delete Account') }}
        </button>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="relative rounded-2xl bg-white overflow-hidden">
            <!-- Header with gradient -->
            <div class="bg-gradient-to-r from-red-600 to-rose-600 px-8 py-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold">
                        {{ __('Are you sure?') }}
                    </h2>
                </div>
            </div>

            <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
                @csrf
                @method('delete')

                <p class="text-gray-600 font-medium leading-relaxed mb-6">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mb-6">
                    <label for="password" class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                        <div class="w-6 h-6 bg-gradient-to-br from-red-500 to-rose-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        {{ __('Password') }}
                    </label>

                    <input id="password"
                           name="password"
                           type="password"
                           class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-red-500/10 focus:border-red-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-red-300 hover:shadow-md"
                           placeholder="{{ __('Enter your password') }}" />

                    @error('password', 'userDeletion')
                        <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-6 border-t-2 border-gray-100">
                    <button type="button"
                            x-on:click="$dispatch('close')"
                            class="px-6 py-3 border-2 border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all font-bold text-gray-700">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-red-600 to-rose-600 text-white rounded-xl font-bold shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/40 transition-all hover:-translate-y-0.5 flex items-center gap-2 justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>