<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-3 mb-2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                    
                </div>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                        Edit Staff Member
                    </h2>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-sm font-semibold text-gray-500">{{ $staff->user->name }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span class="text-xs font-medium text-gray-400">{{ $staff->user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Profile Overview Card -->
                <div class="group relative overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-xl transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-500/5 via-transparent to-fuchsia-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-start gap-6 mb-6">
                            @if($staff->profile_image)
                                <div class="relative group/avatar">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-full blur opacity-25 group-hover/avatar:opacity-75 transition duration-300"></div>
                                    <img src="{{ $staff->profile_image_url }}" alt="{{ $staff->user->name }}" 
                                         class="relative w-24 h-24 rounded-full object-cover border-4 border-white shadow-xl ring-2 ring-gray-100">
                                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-emerald-500 border-4 border-white rounded-full {{ $staff->is_available ? '' : 'bg-gray-400' }}"></div>
                                </div>
                            @else
                                <div class="relative group/avatar">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-full blur opacity-25 group-hover/avatar:opacity-75 transition duration-300"></div>
                                    <div class="relative w-24 h-24 rounded-full bg-gradient-to-br from-violet-100 to-fuchsia-100 flex items-center justify-center border-4 border-white shadow-xl ring-2 ring-gray-100">
                                        <span class="text-3xl font-bold text-violet-600">{{ substr($staff->user->name, 0, 1) }}</span>
                                    </div>
                                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-emerald-500 border-4 border-white rounded-full {{ $staff->is_available ? '' : 'bg-gray-400' }}"></div>
                                </div>
                            @endif
                            
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $staff->user->name }}</h3>
                                <p class="text-gray-600 font-medium mb-3">{{ $staff->specialization ?: 'No specialization set' }}</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-violet-50 text-violet-700 text-xs font-bold rounded-full border border-violet-200">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                        {{ $staff->user->email }}
                                    </span>
                                    @if($staff->user->phone)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-fuchsia-50 text-fuchsia-700 text-xs font-bold rounded-full border border-fuchsia-200">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                        </svg>
                                        {{ $staff->user->phone }}
                                    </span>
                                    @endif
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 {{ $staff->is_available ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-gray-50 text-gray-700 border-gray-200' }} text-xs font-bold rounded-full border">
                                        <span class="w-2 h-2 rounded-full {{ $staff->is_available ? 'bg-emerald-500' : 'bg-gray-400' }} animate-pulse"></span>
                                        {{ $staff->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if($staff->bio)
                        <div class="p-4 bg-gray-50/50 rounded-2xl border border-gray-100">
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $staff->bio }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Edit Form -->
                <form method="POST" action="{{ route('admin.staff.update', $staff) }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

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
                                    <p class="text-xs font-medium text-gray-500 mt-0.5">User credentials and contact details</p>
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
                                    <input type="text" name="name" value="{{ old('name', $staff->user->name) }}" 
                                           class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                           placeholder="Enter full name"
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
                                    <input type="email" name="email" value="{{ old('email', $staff->user->email) }}" 
                                           class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                           placeholder="email@example.com"
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
                                    <input type="text" name="phone" value="{{ old('phone', $staff->user->phone) }}" 
                                           class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none"
                                           placeholder="+1 (555) 000-0000">
                                    @error('phone')
                                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="space-y-2.5">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                        New Password
                                    </label>
                                    <input type="password" name="password" 
                                           class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                           placeholder="••••••••">
                                    @error('password')
                                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                    @enderror
                                    <p class="flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                        </svg>
                                        Leave blank to keep current password
                                    </p>
                                </div>
                            </div>

                            <!-- Password Confirmation -->
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                    Confirm New Password
                                </label>
                                <input type="password" name="password_confirmation" 
                                       class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                       placeholder="••••••••">
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
                                <input type="text" name="specialization" value="{{ old('specialization', $staff->specialization) }}" 
                                       class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none" 
                                       placeholder="e.g., Hair Styling & Coloring">
                                @error('specialization')
                                    <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Bio -->
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                    <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                    Bio / Description
                                </label>
                                <textarea name="bio" rows="5" 
                                          class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-medium text-gray-900 placeholder-gray-400 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none resize-none"
                                          placeholder="Share expertise, experience, and what makes this staff member special...">{{ old('bio', $staff->bio) }}</textarea>
                                @error('bio')
                                    <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Current Profile Image -->
                            @if($staff->profile_image)
                                <div class="space-y-2.5">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                        <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                        Current Profile Image
                                    </label>
                                    <div class="relative group/img p-6 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-2xl hover:border-fuchsia-300 transition-all">
                                        <div class="flex items-center gap-5">
                                            <div class="relative">
                                                <div class="absolute -inset-1 bg-gradient-to-r from-fuchsia-600 to-purple-600 rounded-full blur opacity-25 group-hover/img:opacity-50 transition duration-300"></div>
                                                <img src="{{ $staff->profile_image_url }}" alt="{{ $staff->user->name }}" 
                                                     class="relative w-20 h-20 rounded-full object-cover border-4 border-white shadow-lg ring-2 ring-gray-100">
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-900 mb-1">{{ $staff->user->name }}</p>
                                                <p class="text-xs text-gray-500 font-medium">Upload a new image below to replace</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Profile Image Upload -->
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                    <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                    {{ $staff->profile_image ? 'Update Profile Image' : 'Profile Image' }}
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
                                    <p class="text-red-600 text-sm font-bold">{{ $message }}</p>
                                </div>
                            @enderror

                            @php
                                $assignedServiceIds = old('services', $staff->services->pluck('id')->toArray());
                            @endphp

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
                                                               {{ in_array($service->id, $assignedServiceIds) ? 'checked' : '' }}
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
                                           {{ old('is_available', $staff->is_available) ? 'checked' : '' }}
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
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8">
                        <a href="{{ route('admin.staff.index') }}" class="group inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-bold transition-all">
                            <div class="p-2 bg-gray-100 rounded-xl group-hover:bg-gray-200 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                            </div>
                            Back to Staff List
                        </a>
                        <div class="flex gap-3 w-full sm:w-auto">
                            <a href="{{ route('admin.staff.show', $staff) }}" class="flex-1 sm:flex-initial px-6 py-3.5 border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 font-bold text-gray-700 transition-all text-center">
                                View Details
                            </a>
                            <button type="submit" class="group relative flex-1 sm:flex-initial overflow-hidden px-8 py-3.5 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Update Staff
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
                        </div>
                    </div>

                  

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Performance Stats -->
                <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="absolute inset-0 bg-blue-600 rounded-xl blur opacity-20"></div>
                                <div class="relative p-2.5 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-base font-black text-gray-900">Performance</h3>
                                <p class="text-xs font-medium text-gray-500 mt-0.5">Overall statistics</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-2xl hover:border-blue-300 hover:shadow-md transition-all duration-300">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-500/10 to-transparent rounded-bl-full"></div>
                            <div class="relative">
                                <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-2">Total Appointments</p>
                                <p class="text-4xl font-black text-gray-900">{{ $staff->appointments()->count() }}</p>
                            </div>
                        </div>
                        
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-emerald-50 to-teal-50 border-2 border-emerald-200 rounded-2xl hover:border-emerald-300 hover:shadow-md transition-all duration-300">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-emerald-500/20 to-transparent rounded-bl-full"></div>
                            <div class="relative">
                                <p class="text-sm font-bold text-emerald-700 uppercase tracking-wide mb-2">Completed</p>
                                <p class="text-4xl font-black text-emerald-600">{{ $staff->appointments()->where('status', 'completed')->count() }}</p>
                            </div>
                        </div>
                        
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-violet-50 to-fuchsia-50 border-2 border-violet-200 rounded-2xl hover:border-violet-300 hover:shadow-md transition-all duration-300">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-violet-500/20 to-transparent rounded-bl-full"></div>
                            <div class="relative">
                                <p class="text-sm font-bold text-violet-700 uppercase tracking-wide mb-2">Services Offered</p>
                                <p class="text-4xl font-black text-violet-600">{{ $staff->services->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-6 py-5">
                        <h3 class="text-base font-black text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('admin.staff.show', $staff) }}" class="flex items-center gap-3 p-4 bg-gray-50 hover:bg-blue-50 border-2 border-gray-200 hover:border-blue-300 rounded-xl transition-all group">
                            <div class="p-2.5 bg-blue-100 group-hover:bg-blue-200 rounded-xl transition-colors">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900 group-hover:text-blue-700 transition-colors">View Full Profile</span>
                        </a>
                        
                        <a href="{{ route('admin.appointments.index', ['staff' => $staff->id]) }}" class="flex items-center gap-3 p-4 bg-gray-50 hover:bg-violet-50 border-2 border-gray-200 hover:border-violet-300 rounded-xl transition-all group">
                            <div class="p-2.5 bg-violet-100 group-hover:bg-violet-200 rounded-xl transition-colors">
                                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900 group-hover:text-violet-700 transition-colors">View Appointments</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="mt-8 relative overflow-hidden rounded-3xl bg-white border-2 border-red-300 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-br from-red-50/80 via-rose-50/50 to-white pointer-events-none"></div>
            
            <div class="relative p-8">
                <div class="flex items-start gap-4 mb-6">
                    <div class="relative flex-shrink-0">
                        <div class="absolute inset-0 bg-red-600 rounded-xl blur opacity-25"></div>
                        <div class="relative p-3 bg-gradient-to-br from-red-600 to-rose-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-black text-red-600 mb-2">Danger Zone</h3>
                        <p class="text-sm text-gray-700 font-medium leading-relaxed mb-3">
                            Deleting this staff member will permanently remove their account, profile, and all associated data. This action cannot be undone.
                        </p>
                        @php
                            $futureAppointments = $staff->appointments()->where('appointment_date', '>=', now())->whereIn('status', ['pending', 'confirmed'])->count();
                        @endphp
                        @if($futureAppointments > 0)
                            <div class="flex items-start gap-2 p-4 bg-red-100 border-2 border-red-300 rounded-xl mb-4">
                                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-black text-red-900">Critical Warning</p>
                                    <p class="text-sm text-red-700 font-medium mt-1">This staff member has <span class="font-black">{{ $futureAppointments }}</span> upcoming appointment(s).</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
                <form action="{{ route('admin.staff.destroy', $staff) }}" method="POST" onsubmit="return confirm('⚠️ Are you absolutely sure?\n\nThis will permanently delete:\n• Staff account and profile\n• All associated data\n• Cannot be recovered\n\nType DELETE to confirm.');" class="flex justify-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="group relative overflow-hidden px-8 py-3.5 bg-red-600 text-white rounded-xl font-black shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Permanently
                        </span>
                        <div class="absolute inset-0 bg-red-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>