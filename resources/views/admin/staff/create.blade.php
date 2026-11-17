<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                    
                </div>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                        Add New Staff Member
                    </h2>
                    <p class="text-sm font-semibold text-gray-500 mt-0.5">Onboard a new team member to your salon</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="POST" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Account Information -->
            <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-gray-900">Account Information</h3>
                            <p class="text-xs font-medium text-gray-500 mt-0.5">Login credentials and contact details</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-8 space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                                Full Name
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                   class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                   placeholder="e.g., Maria Santos"
                                   required>
                            @error('name')
                                <p class="flex items-center gap-1.5 text-red-600 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                                Email Address
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                   class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                   placeholder="email@luminosabelleza.com"
                                   required>
                            @error('email')
                                <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Phone -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                Phone Number
                            </label>
                            <input type="text" name="phone" value="{{ old('phone') }}" 
                                   class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none"
                                   placeholder="+639123456789">
                            @error('phone')
                                <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                                Password
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="password" 
                                   class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                   placeholder="Minimum 8 characters"
                                   required>
                            @error('password')
                                <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                            Confirm Password
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" 
                               class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                               placeholder="Re-enter password"
                               required>
                    </div>
                </div>
            </div>

            <!-- Professional Information -->
            <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-fuchsia-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-fuchsia-600 to-purple-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-gray-900">Professional Information</h3>
                            <p class="text-xs font-medium text-gray-500 mt-0.5">Expertise, bio, and profile image</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-8 space-y-6">
                    <!-- Specialization -->
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                            Specialization
                        </label>
                        <input type="text" name="specialization" value="{{ old('specialization') }}" 
                               class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none" 
                               placeholder="e.g., Hair Styling & Coloring">
                        @error('specialization')
                            <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                        @enderror
                        <p class="flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            What is this staff member specialized in?
                        </p>
                    </div>

                    <!-- Bio -->
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                            Bio / Description
                        </label>
                        <textarea name="bio" rows="5" 
                                  class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-medium text-gray-900 placeholder-gray-400 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none resize-none"
                                  placeholder="Brief description about experience, skills, and expertise...">{{ old('bio') }}</textarea>
                        @error('bio')
                            <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                        @enderror
                        <p class="flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            This will be shown to customers when booking
                        </p>
                    </div>

                    <!-- Profile Image Upload -->
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                            Profile Image
                        </label>
                        <div class="relative">
                            <input type="file" name="profile_image" accept="image/jpeg,image/png,image/jpg" id="profile_image"
                                   class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-700 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-gradient-to-r file:from-fuchsia-600 file:to-purple-600 file:text-white hover:file:from-fuchsia-700 hover:file:to-purple-700 file:transition-all file:shadow-md hover:file:shadow-lg focus:outline-none focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all cursor-pointer">
                        </div>
                        @error('profile_image')
                            <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                        @enderror
                        <p class="flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            JPG, PNG formats accepted • Maximum 2MB
                        </p>
                    </div>
                </div>
            </div>

            <!-- Service Assignment -->
            <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="absolute inset-0 bg-purple-600 rounded-xl blur opacity-20"></div>
                                <div class="relative p-2.5 bg-gradient-to-br from-purple-600 to-violet-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-black text-gray-900">Service Assignment</h3>
                                <p class="text-xs font-medium text-gray-500 mt-0.5">Select services this staff member can perform</p>
                            </div>
                        </div>
                        <span class="text-red-500 font-bold text-sm">*</span>
                    </div>
                </div>
                
                <div class="p-8">
                    @error('services')
                        <div class="mb-6 p-4 bg-red-50 border-2 border-red-200 rounded-2xl">
                            <p class="text-red-600 text-sm font-bold flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        </div>
                    @enderror

                    <div class="grid md:grid-cols-2 gap-5">
                        @foreach($services->groupBy('category') as $category => $categoryServices)
                            <div class="group relative overflow-hidden border-2 border-gray-200 rounded-2xl bg-white hover:border-purple-300 hover:shadow-lg transition-all duration-300">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-50/0 to-violet-50/0 group-hover:from-purple-50/50 group-hover:to-violet-50/50 transition-all duration-300"></div>
                                
                                <div class="relative p-6">
                                    <h4 class="font-black text-gray-900 mb-5 capitalize flex items-center gap-2.5">
                                        <span class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-purple-600 to-violet-600 rounded-xl shadow-lg">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        {{ $category }} Services
                                    </h4>
                                    <div class="space-y-2">
                                        @foreach($categoryServices as $service)
                                            <label class="flex items-start cursor-pointer group/item hover:bg-purple-50/50 p-3.5 rounded-xl transition-all duration-200 border-2 border-transparent hover:border-purple-200">
                                                <input type="checkbox" name="services[]" value="{{ $service->id }}" 
                                                       {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}
                                                       class="mt-0.5 w-5 h-5 rounded-lg border-2 border-gray-300 text-purple-600 focus:ring-purple-500 focus:ring-offset-0 focus:ring-2 transition-all cursor-pointer">
                                                <span class="ml-3.5 flex-1">
                                                    <span class="text-sm font-bold text-gray-900 block group-hover/item:text-purple-700 transition-colors">{{ $service->name }}</span>
                                                    <span class="flex items-center gap-2 text-xs text-gray-500 mt-1.5 font-medium">
                                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-gray-100 rounded-full">
                                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            {{ $service->formatted_duration }}
                                                        </span>
                                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full font-bold">
                                                            {{ $service->formatted_price }}
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Availability Toggle -->
            <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 border-2 border-emerald-200 shadow-sm hover:shadow-lg transition-all duration-300">
                <div class="p-6">
                    <label class="flex items-start cursor-pointer group">
                        <div class="relative mt-1">
                            <input type="checkbox" name="is_available" value="1" 
                                   {{ old('is_available', true) ? 'checked' : '' }}
                                   class="sr-only peer">
                            <div class="w-14 h-8 bg-gray-300 rounded-full peer-checked:bg-emerald-500 transition-all duration-300"></div>
                            <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md transition-all duration-300 peer-checked:translate-x-6"></div>
                        </div>
                        <span class="ml-5">
                            <span class="flex items-center gap-2 text-base font-black text-gray-900 mb-1">
                                <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Available for Bookings
                            </span>
                            <p class="text-sm text-gray-700 font-medium leading-relaxed">Enable to allow new appointments. Disable to temporarily prevent bookings.</p>
                        </span>
                    </label>
                       <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4">
                <a href="{{ route('admin.staff.index') }}" class="group inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-bold transition-all">
                    <div class="p-2 bg-gray-100 rounded-xl group-hover:bg-gray-200 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </div>
                    Back to Staff List
                </a>
                <button type="submit" class="group relative overflow-hidden w-full sm:w-auto px-8 py-3.5 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Create Staff Member
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </div>
        </form>
                </div>
            </div>

          

        <!-- Helper Info -->
        <div class="mt-6 relative overflow-hidden rounded-3xl bg-white border border-blue-200/60 shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 to-indigo-50/50"></div>
            
            <div class="relative p-6">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="relative">
                            <div class="absolute inset-0 bg-blue-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="font-black text-gray-900 mb-4 text-base">Important Notes</p>
                        <ul class="space-y-3 text-sm text-gray-700">
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 p-1 bg-blue-100 rounded-lg mt-0.5">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">The staff member will receive login credentials via the email address provided</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 p-1 bg-blue-100 rounded-lg mt-0.5">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">They can update their profile and manage availability after logging in</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 p-1 bg-blue-100 rounded-lg mt-0.5">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">At least one service must be assigned to each staff member</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 p-1 bg-blue-100 rounded-lg mt-0.5">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="font-medium">Working hours can be set by the staff member in their dashboard</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>