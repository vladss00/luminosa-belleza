<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                        
                    </div>
                    <div>
                         <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                       Staff Member Details
                        </h2>
                        <p class="text-sm font-semibold text-gray-500 mt-0.5">Complete profile overview</p>
                    </div>
                </div>
                <a href="{{ route('admin.staff.edit', $staff) }}" class="group relative overflow-hidden px-6 py-3 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Profile
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Main Profile Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Hero Profile Card -->
                <div class="group relative overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-xl hover:shadow-2xl transition-all duration-500">
                    <!-- Gradient Header -->
                    <div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-fuchsia-600 px-8 py-12 text-white overflow-hidden">
                        <!-- Animated background pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
                            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
                        </div>
                        
                        <div class="relative flex flex-col sm:flex-row items-center sm:items-start gap-6">
                            @if($staff->profile_image)
                                <div class="relative group/avatar">
                                    <div class="absolute -inset-2 bg-white/30 rounded-full blur-xl"></div>
                                    <img src="{{ $staff->profile_image_url }}" alt="{{ $staff->user->name }}" 
                                         class="relative w-32 h-32 rounded-full object-cover border-4 border-white/50 shadow-2xl ring-4 ring-white/20 backdrop-blur">
                                    <div class="absolute bottom-2 right-2 w-8 h-8 {{ $staff->is_available ? 'bg-emerald-400' : 'bg-gray-400' }} border-4 border-white rounded-full shadow-lg {{ $staff->is_available ? 'animate-pulse' : '' }}"></div>
                                </div>
                            @else
                                <div class="relative group/avatar">
                                    <div class="absolute -inset-2 bg-white/30 rounded-full blur-xl"></div>
                                    <div class="relative w-32 h-32 rounded-full bg-white/20 backdrop-blur-xl flex items-center justify-center border-4 border-white/50 shadow-2xl ring-4 ring-white/20 text-5xl font-black text-white">
                                        {{ $staff->user->initials }}
                                    </div>
                                    <div class="absolute bottom-2 right-2 w-8 h-8 {{ $staff->is_available ? 'bg-emerald-400' : 'bg-gray-400' }} border-4 border-white rounded-full shadow-lg {{ $staff->is_available ? 'animate-pulse' : '' }}"></div>
                                </div>
                            @endif
                            
                            <div class="flex-1 text-center sm:text-left">
                                <h3 class="text-3xl font-black mb-2 drop-shadow-lg">{{ $staff->user->name }}</h3>
                                <p class="text-lg font-bold text-indigo-100 mb-4 drop-shadow">{{ $staff->specialization ?: 'Staff Member' }}</p>
                                <div class="flex flex-wrap gap-2 justify-center sm:justify-start">
                                    <form action="{{ route('admin.staff.toggle', $staff) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="group/btn relative overflow-hidden px-4 py-2 text-sm font-black rounded-xl transition-all duration-300 hover:scale-105 {{ $staff->is_available ? 'bg-emerald-500 hover:bg-emerald-600 shadow-lg shadow-emerald-500/30' : 'bg-gray-500 hover:bg-gray-600 shadow-lg shadow-gray-500/30' }}">
                                            <span class="relative z-10 flex items-center gap-2">
                                                <span class="w-2 h-2 bg-white rounded-full {{ $staff->is_available ? 'animate-pulse' : '' }}"></span>
                                                {{ $staff->is_available ? 'Available' : 'Unavailable' }}
                                            </span>
                                        </button>
                                    </form>
                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-xl text-white text-sm font-bold rounded-xl border border-white/30 shadow-lg">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                                        </svg>
                                        {{ $staff->services->count() }} Services
                                    </span>
                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-xl text-white text-sm font-bold rounded-xl border border-white/30 shadow-lg">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $stats['total_appointments'] }} Appointments
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Sections -->
                    <div class="p-8 space-y-8">
                        <!-- Contact Information -->
                        <div>
                            <div class="flex items-center gap-3 mb-5">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                                    <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h4 class="text-lg font-black text-gray-900">Contact Information</h4>
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-2xl hover:border-violet-300 hover:shadow-md transition-all duration-300">
                                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-violet-500/5 to-transparent rounded-bl-full"></div>
                                    <div class="relative flex items-start gap-3">
                                        <div class="p-2.5 bg-violet-100 rounded-xl group-hover:bg-violet-200 transition-colors">
                                            <svg class="w-5 h-5 text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Email Address</p>
                                            <p class="font-bold text-gray-900 truncate">{{ $staff->user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if($staff->user->phone)
                                <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-2xl hover:border-fuchsia-300 hover:shadow-md transition-all duration-300">
                                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-fuchsia-500/5 to-transparent rounded-bl-full"></div>
                                    <div class="relative flex items-start gap-3">
                                        <div class="p-2.5 bg-fuchsia-100 rounded-xl group-hover:bg-fuchsia-200 transition-colors">
                                            <svg class="w-5 h-5 text-fuchsia-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Phone Number</p>
                                            <p class="font-bold text-gray-900">{{ $staff->user->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Bio Section -->
                        @if($staff->bio)
                        <div class="pb-8 border-b-2 border-gray-100">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-purple-600 rounded-xl blur opacity-20"></div>
                                    <div class="relative p-2.5 bg-gradient-to-br from-purple-600 to-violet-600 rounded-xl">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h4 class="text-lg font-black text-gray-900">About</h4>
                            </div>
                            <div class="p-6 bg-gradient-to-br from-purple-50/50 to-violet-50/30 border-2 border-purple-100 rounded-2xl">
                                <p class="text-gray-700 leading-relaxed font-medium">{{ $staff->bio }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Assigned Services -->
                        <div class="pb-8 border-b-2 border-gray-100">
                            <div class="flex items-center justify-between mb-5">
                                <div class="flex items-center gap-3">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-fuchsia-600 rounded-xl blur opacity-20"></div>
                                        <div class="relative p-2.5 bg-gradient-to-br from-fuchsia-600 to-purple-600 rounded-xl">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h4 class="text-lg font-black text-gray-900">Assigned Services</h4>
                                </div>
                                <span class="px-3 py-1.5 bg-fuchsia-100 text-fuchsia-700 text-sm font-black rounded-full border border-fuchsia-200">
                                    {{ $staff->services->count() }} Total
                                </span>
                            </div>
                            @if($staff->services->count() > 0)
                                <div class="grid sm:grid-cols-2 gap-4">
                                    @foreach($staff->services->groupBy('category') as $category => $services)
                                        <div class="group relative overflow-hidden bg-white border-2 border-gray-200 rounded-2xl hover:border-fuchsia-300 hover:shadow-lg transition-all duration-300">
                                            <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-50/0 to-purple-50/0 group-hover:from-fuchsia-50/50 group-hover:to-purple-50/50 transition-all duration-300"></div>
                                            <div class="relative p-5">
                                                <h5 class="font-black text-gray-900 mb-4 capitalize flex items-center gap-2.5">
                                                    <span class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-fuchsia-600 to-purple-600 rounded-xl shadow-lg">
                                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                    {{ $category }}
                                                </h5>
                                                <ul class="space-y-2.5">
                                                    @foreach($services as $service)
                                                        <li class="flex items-start gap-2.5">
                                                            <div class="mt-0.5 flex-shrink-0 p-1 bg-fuchsia-100 rounded-lg">
                                                                <svg class="w-4 h-4 text-fuchsia-600" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <span class="text-sm font-bold text-gray-700 flex-1">{{ $service->name }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="p-8 bg-gray-50 border-2 border-dashed border-gray-300 rounded-2xl text-center">
                                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <p class="text-gray-500 font-bold">No services assigned yet</p>
                                    <p class="text-sm text-gray-400 mt-1">Assign services to this staff member to get started</p>
                                </div>
                            @endif
                        </div>

                        <!-- Working Hours -->
                        <div>
                            <div class="flex items-center gap-3 mb-5">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-blue-600 rounded-xl blur opacity-20"></div>
                                    <div class="relative p-2.5 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h4 class="text-lg font-black text-gray-900">Working Hours</h4>
                            </div>
                            @if($staff->availability->count() > 0)
                                <div class="grid sm:grid-cols-2 gap-3">
                                    @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                        @php
                                            $schedule = $staff->availability->where('day_of_week', $day)->first();
                                        @endphp
                                        <div class="group flex justify-between items-center p-4 {{ $schedule ? 'bg-gradient-to-br from-emerald-50 to-teal-50 border-2 border-emerald-200 hover:border-emerald-300 hover:shadow-md' : 'bg-gray-50 border-2 border-gray-200' }} rounded-xl transition-all duration-300">
                                            <div class="flex items-center gap-3">
                                                @if($schedule)
                                                    <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors">
                                                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="p-2 bg-gray-200 rounded-lg">
                                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                <span class="font-black text-gray-900 capitalize">{{ $day }}</span>
                                            </div>
                                            @if($schedule)
                                                <span class="text-sm font-bold text-emerald-700 bg-white px-3 py-1 rounded-lg">
                                                    {{ $schedule->formatted_start_time }} - {{ $schedule->formatted_end_time }}
                                                </span>
                                            @else
                                                <span class="text-xs font-bold text-gray-500 uppercase tracking-wide">Closed</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="p-6 bg-yellow-50 border-2 border-yellow-200 rounded-2xl flex items-start gap-4">
                                    <div class="flex-shrink-0 p-2 bg-yellow-100 rounded-xl">
                                        <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-black text-yellow-900 mb-1">No availability schedule set</p>
                                        <p class="text-sm text-yellow-700 font-medium">Staff member should configure their working hours to accept appointments.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Recent Appointments -->
                <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-6">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="absolute inset-0 bg-indigo-600 rounded-xl blur opacity-20"></div>
                                <div class="relative p-2.5 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-black text-gray-900">Recent Appointments</h3>
                                <p class="text-xs font-medium text-gray-500 mt-0.5">Latest booking activity</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        @if($staff->appointments->count() > 0)
                            <div class="space-y-3">
                                @foreach($staff->appointments->sortByDesc('appointment_date')->take(10) as $appointment)
                                    <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-2xl hover:border-indigo-300 hover:shadow-md transition-all duration-300">
                                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/5 to-transparent rounded-bl-full"></div>
                                        <div class="relative flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-start justify-between gap-3 mb-3">
                                                    <h4 class="font-black text-gray-900 text-base">{{ $appointment->service->name }}</h4>
                                                    <span class="flex-shrink-0 px-3 py-1 text-xs font-black rounded-full {{ $appointment->status_badge == 'green' ? 'bg-emerald-100 text-emerald-700 border border-emerald-200' : ($appointment->status_badge == 'yellow' ? 'bg-yellow-100 text-yellow-700 border border-yellow-200' : ($appointment->status_badge == 'blue' ? 'bg-blue-100 text-blue-700 border border-blue-200' : 'bg-gray-100 text-gray-700 border border-gray-200')) }}">
                                                        {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                                    </span>
                                                </div>
                                                <p class="text-sm font-bold text-gray-600 mb-2">{{ $appointment->customer->name }}</p>
                                                <div class="flex flex-wrap items-center gap-3 text-sm">
                                                    <span class="inline-flex items-center gap-1.5 text-gray-500 font-medium">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        {{ $appointment->formatted_date }}
                                                    </span>
                                                    <span class="inline-flex items-center gap-1.5 text-gray-500 font-medium">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        {{ $appointment->formatted_time }}
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.appointments.show', $appointment) }}" class="group/btn inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition-all duration-300 hover:scale-105 shadow-lg shadow-indigo-500/30 hover:shadow-xl hover:shadow-indigo-500/40">
                                                View Details
                                                <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="py-16 text-center">
                                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-400 font-bold text-lg">No appointments yet</p>
                                <p class="text-sm text-gray-400 mt-2">Appointments will appear here once scheduled</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Performance Statistics -->
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
                                <h4 class="text-base font-black text-gray-900">Performance</h4>
                                <p class="text-xs font-medium text-gray-500 mt-0.5">Overall statistics</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl hover:border-blue-300 hover:shadow-lg transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-500/20 to-transparent rounded-bl-full"></div>
                            <div class="relative text-center">
                                <p class="text-4xl font-black text-blue-600 mb-2">{{ $stats['total_appointments'] }}</p>
                                <p class="text-xs font-bold text-blue-700 uppercase tracking-wide">Total Appointments</p>
                            </div>
                        </div>
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-emerald-50 to-teal-50 border-2 border-emerald-200 rounded-2xl hover:border-emerald-300 hover:shadow-lg transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-emerald-500/20 to-transparent rounded-bl-full"></div>
                            <div class="relative text-center">
                                <p class="text-4xl font-black text-emerald-600 mb-2">{{ $stats['completed_appointments'] }}</p>
                                <p class="text-xs font-bold text-emerald-700 uppercase tracking-wide">Completed</p>
                            </div>
                        </div>
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-yellow-50 to-orange-50 border-2 border-yellow-200 rounded-2xl hover:border-yellow-300 hover:shadow-lg transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-yellow-500/20 to-transparent rounded-bl-full"></div>
                            <div class="relative text-center">
                                <p class="text-4xl font-black text-yellow-600 mb-2">{{ $stats['pending_appointments'] }}</p>
                                <p class="text-xs font-bold text-yellow-700 uppercase tracking-wide">Pending</p>
                            </div>
                        </div>
                        <div class="group relative overflow-hidden p-5 bg-gradient-to-br from-violet-50 to-fuchsia-50 border-2 border-violet-200 rounded-2xl hover:border-violet-300 hover:shadow-lg transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-violet-500/20 to-transparent rounded-bl-full"></div>
                            <div class="relative text-center">
                                <p class="text-4xl font-black text-violet-600 mb-2">{{ $stats['this_month_appointments'] }}</p>
                                <p class="text-xs font-bold text-violet-700 uppercase tracking-wide">This Month</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-6 py-5">
                        <h4 class="text-base font-black text-gray-900">Quick Actions</h4>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('admin.staff.edit', $staff) }}" class="group flex items-center gap-3 p-4 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white rounded-xl transition-all duration-300 hover:scale-105 shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40">
                            <div class="p-2 bg-white/20 rounded-lg group-hover:bg-white/30 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <span class="font-black">Edit Profile</span>
                        </a>
                        
                        <a href="{{ route('admin.appointments.index', ['staff_id' => $staff->id]) }}" class="group flex items-center gap-3 p-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-xl transition-all duration-300 hover:scale-105 shadow-lg shadow-indigo-500/30 hover:shadow-xl hover:shadow-indigo-500/40">
                            <div class="p-2 bg-white/20 rounded-lg group-hover:bg-white/30 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="font-black">View All Appointments</span>
                        </a>
                        
                        <form action="{{ route('admin.staff.toggle', $staff) }}" method="POST">
                            @csrf
                            <button type="submit" class="group w-full flex items-center gap-3 p-4 {{ $staff->is_available ? 'bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 shadow-gray-500/30 hover:shadow-gray-500/40' : 'bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-emerald-500/30 hover:shadow-emerald-500/40' }} text-white rounded-xl transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                                <div class="p-2 bg-white/20 rounded-lg group-hover:bg-white/30 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </div>
                                <span class="font-black">{{ $staff->is_available ? 'Mark Unavailable' : 'Mark Available' }}</span>
                            </button>
                        </form>
                        
                        <a href="{{ route('admin.staff.index') }}" class="group flex items-center gap-3 p-4 bg-white border-2 border-gray-300 hover:border-gray-400 hover:bg-gray-50 text-gray-900 rounded-xl transition-all">
                            <div class="p-2 bg-gray-100 group-hover:bg-gray-200 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                            </div>
                            <span class="font-black">Back to Staff List</span>
                        </a>
                    </div>
                </div>

                <!-- Account Information -->
                <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-6 py-5">
                        <h4 class="text-base font-black text-gray-900">Account Information</h4>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="p-4 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-xl">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Account Created</p>
                            <p class="font-black text-gray-900 mb-1">{{ $staff->user->created_at->format('M d, Y') }}</p>
                            <p class="text-xs text-gray-500 font-medium">{{ $staff->user->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-xl">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Last Updated</p>
                            <p class="font-black text-gray-900 mb-1">{{ $staff->updated_at->format('M d, Y') }}</p>
                            <p class="text-xs text-gray-500 font-medium">{{ $staff->updated_at->diffForHumans() }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-gradient-to-br from-violet-50 to-fuchsia-50 border-2 border-violet-200 rounded-xl text-center">
                                <p class="text-xs font-bold text-violet-600 uppercase tracking-wide mb-1">Staff ID</p>
                                <p class="font-black text-gray-900">#{{ $staff->id }}</p>
                            </div>
                            <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-xl text-center">
                                <p class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-1">User ID</p>
                                <p class="font-black text-gray-900">#{{ $staff->user_id }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="relative overflow-hidden rounded-3xl bg-white border-2 border-red-300 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50/80 via-rose-50/50 to-white pointer-events-none"></div>
                    <div class="relative p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="relative flex-shrink-0">
                                <div class="absolute inset-0 bg-red-600 rounded-xl blur opacity-25"></div>
                                <div class="relative p-2.5 bg-gradient-to-br from-red-600 to-rose-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-base font-black text-red-600 mb-1">Danger Zone</h4>
                                <p class="text-xs text-gray-700 font-medium leading-relaxed">Permanently delete this staff member and their account. This action cannot be undone.</p>
                            </div>
                        </div>
                        <form action="{{ route('admin.staff.destroy', $staff) }}" method="POST" onsubmit="return confirm('⚠️ Are you absolutely sure?\n\nThis will permanently delete the staff member and their account.\nThis action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="group w-full relative overflow-hidden px-5 py-3 bg-red-600 text-white rounded-xl font-black text-sm shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete Staff Member
                                </span>
                                <div class="absolute inset-0 bg-red-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>