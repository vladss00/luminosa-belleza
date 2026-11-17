<!-- Use this same file for both create.blade.php and edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-3 mb-2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                    
                </div>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                   {{ isset($service) ? 'Edit Service' : 'Create New Service' }}
                    </h2>
                    @if(isset($service))
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-sm font-semibold text-gray-500">{{ $service->name }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span class="text-xs font-medium text-gray-400 capitalize">{{ $service->category }} Service</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                @if(isset($service))
                <!-- Service Overview Card -->
                <div class="group relative overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-xl transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-500/5 via-transparent to-fuchsia-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-start gap-6 mb-6">
                            <div class="relative group/icon">
                                <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur opacity-25 group-hover/icon:opacity-75 transition duration-300"></div>
                                <div class="relative w-20 h-20 rounded-2xl bg-gradient-to-br from-violet-100 to-fuchsia-100 flex items-center justify-center border-4 border-white shadow-xl ring-2 ring-gray-100">
                                    <svg class="w-10 h-10 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $service->name }}</h3>
                                <p class="text-gray-600 font-medium mb-3 capitalize">{{ $service->category }} Service</p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-violet-50 text-violet-700 text-xs font-bold rounded-full border border-violet-200">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $service->formatted_duration }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full border border-emerald-200">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $service->formatted_price }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 {{ $service->is_active ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-gray-50 text-gray-700 border-gray-200' }} text-xs font-bold rounded-full border">
                                        <span class="w-2 h-2 rounded-full {{ $service->is_active ? 'bg-emerald-500' : 'bg-gray-400' }} animate-pulse"></span>
                                        {{ $service->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if($service->description)
                        <div class="p-4 bg-gray-50/50 rounded-2xl border border-gray-100">
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $service->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Edit Form -->
                <form method="POST" action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" class="space-y-6">
                    @csrf
                    @if(isset($service))
                        @method('PUT')
                    @endif

                    <!-- Basic Information -->
                    <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                        <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                                    <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-black text-gray-900">Basic Information</h3>
                                    <p class="text-xs font-medium text-gray-500 mt-0.5">Service name and description</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8 space-y-6">
                            <!-- Service Name -->
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                    <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                                    Service Name
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" 
                                       class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none" 
                                       placeholder="e.g., Haircut, Manicure, Facial Treatment"
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

                            <!-- Description -->
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                    Description
                                </label>
                                <textarea name="description" rows="4" 
                                          class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-medium text-gray-900 placeholder-gray-400 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none resize-none"
                                          placeholder="Describe what this service includes...">{{ old('description', $service->description ?? '') }}</textarea>
                                @error('description')
                                    <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                @enderror
                                <p class="flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    This will be shown to customers when booking
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Details -->
                    <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                        <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-fuchsia-600 rounded-xl blur opacity-20"></div>
                                    <div class="relative p-2.5 bg-gradient-to-br from-fuchsia-600 to-purple-600 rounded-xl">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-black text-gray-900">Service Details</h3>
                                    <p class="text-xs font-medium text-gray-500 mt-0.5">Category, duration, and pricing</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8 space-y-6">
                            <div class="grid md:grid-cols-3 gap-6">
                                <!-- Category -->
                                <div class="space-y-2.5">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                        <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                        Category
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <select name="category" class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none cursor-pointer" required>
                                        <option value="">Select Category</option>
                                        <option value="hair" {{ old('category', $service->category ?? '') == 'hair' ? 'selected' : '' }}>Hair Services</option>
                                        <option value="beauty" {{ old('category', $service->category ?? '') == 'beauty' ? 'selected' : '' }}>Beauty Services</option>
                                        <option value="nails" {{ old('category', $service->category ?? '') == 'nails' ? 'selected' : '' }}>Nail Services</option>
                                        <option value="spa" {{ old('category', $service->category ?? '') == 'spa' ? 'selected' : '' }}>Spa Services</option>
                                    </select>
                                    @error('category')
                                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Duration -->
                                <div class="space-y-2.5">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                        <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                        Duration (min)
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" name="duration" value="{{ old('duration', $service->duration ?? '60') }}" 
                                           min="15" max="480" step="15"
                                           class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none" 
                                           placeholder="60" required>
                                    @error('duration')
                                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                    @enderror
                                    <p class="flex items-center gap-1.5 text-xs text-gray-500 font-medium">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                        </svg>
                                        In 15-minute increments
                                    </p>
                                </div>

                                <!-- Price -->
                                <div class="space-y-2.5">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                        <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                        Price (₱)
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" name="price" value="{{ old('price', $service->price ?? '') }}" 
                                           min="0" step="0.01"
                                           class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none" 
                                           placeholder="500.00" required>
                                    @error('price')
                                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Availability Toggle -->
                    <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 border-2 border-emerald-200 shadow-sm hover:shadow-lg transition-all duration-300">
                        <div class="p-6">
                            <label class="flex items-start cursor-pointer group">
                                <div class="relative mt-1">
                                    <input type="checkbox" name="is_active" value="1" 
                                           {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="w-14 h-8 bg-gray-300 rounded-full peer-checked:bg-emerald-500 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md transition-all duration-300 peer-checked:translate-x-6"></div>
                                </div>
                                <span class="ml-5">
                                    <span class="flex items-center gap-2 text-base font-black text-gray-900 mb-1">
                                        <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Active Service
                                    </span>
                                    <p class="text-sm text-gray-700 font-medium leading-relaxed">Enable to make this service available for booking. Disable to hide from customers.</p>
                                </span>
                            </label>
                              <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8">
                        <a href="{{ route('admin.services.index') }}" class="group inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-bold transition-all">
                            <div class="p-2 bg-gray-100 rounded-xl group-hover:bg-gray-200 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                            </div>
                            Back to Services
                        </a>
                        <button type="submit" class="group relative overflow-hidden px-8 py-3.5 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ isset($service) ? 'Update Service' : 'Create Service' }}
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </div>
                </form>
            </div>
                        </div>
                    </div>

                  

            <!-- Sidebar -->
            <div class="space-y-6">
                @if(isset($service))
                <!-- Service Statistics -->
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
                                <h3 class="text-base font-black text-gray-900">Statistics</h3>
                                <p class="text-xs font-medium text-gray-500 mt-0.5">Service performance</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-2xl hover:border-blue-300 hover:shadow-md transition-all duration-300">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-500/10 to-transparent rounded-bl-full"></div>
                            <div class="relative">
                                <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-2">Total Bookings</p>
                                <p class="text-4xl font-black text-gray-900">{{ $service->appointments()->count() }}</p>
                            </div>
                        </div>
                        
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-emerald-50 to-teal-50 border-2 border-emerald-200 rounded-2xl hover:border-emerald-300 hover:shadow-md transition-all duration-300">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-emerald-500/20 to-transparent rounded-bl-full"></div>
                            <div class="relative">
                                <p class="text-sm font-bold text-emerald-700 uppercase tracking-wide mb-2">Completed</p>
                                <p class="text-4xl font-black text-emerald-600">{{ $service->appointments()->where('status', 'completed')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Quick Info Card -->
                <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-violet-50 via-fuchsia-50 to-purple-50 border-2 border-violet-200 shadow-sm">
                    <div class="p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-black text-gray-900 mb-1">{{ isset($service) ? 'Editing Tips' : 'Creation Tips' }}</h3>
                            </div>
                        </div>
                        <ul class="space-y-2.5 text-sm text-gray-700">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Use clear, descriptive service names</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Set realistic duration estimates</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Include details customers care about</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Review pricing regularly</span>
                            </li>
                        </ul>
                    </div>
                </div>

                @if(isset($service))
                <!-- Quick Actions -->
                <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-6 py-5">
                        <h3 class="text-base font-black text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('admin.services.show', $service) }}" class="flex items-center gap-3 p-4 bg-gray-50 hover:bg-blue-50 border-2 border-gray-200 hover:border-blue-300 rounded-xl transition-all group">
                            <div class="p-2.5 bg-blue-100 group-hover:bg-blue-200 rounded-xl transition-colors">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900 group-hover:text-blue-700 transition-colors">View Service Details</span>
                        </a>
                        
                        <a href="{{ route('admin.appointments.index', ['service' => $service->id]) }}" class="flex items-center gap-3 p-4 bg-gray-50 hover:bg-violet-50 border-2 border-gray-200 hover:border-violet-300 rounded-xl transition-all group">
                            <div class="p-2.5 bg-violet-100 group-hover:bg-violet-200 rounded-xl transition-colors">
                                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900 group-hover:text-violet-700 transition-colors">View Bookings</span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>

        @if(isset($service))
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
                            Deleting this service will permanently remove it from the system and all associated data. This action cannot be undone.
                        </p>
                        @if($service->appointments()->count() > 0)
                            <div class="flex items-start gap-2 p-4 bg-red-100 border-2 border-red-300 rounded-xl mb-4">
                                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-black text-red-900">Critical Warning</p>
                                    <p class="text-sm text-red-700 font-medium mt-1">This service has <span class="font-black">{{ $service->appointments()->count() }}</span> associated appointment(s).</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('⚠️ Are you absolutely sure?\n\nThis will permanently delete:\n• Service and all data\n• {{ $service->appointments()->count() }} associated appointment(s)\n• Cannot be recovered\n\nType DELETE to confirm.');" class="flex justify-end">
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
        @endif
    </div>
</x-app-layout>