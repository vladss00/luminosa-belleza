<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                        
                    </div>
                    <div>
                       <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                    Business Reports
                        </h2>
                        <p class="text-sm font-medium text-gray-500 mt-0.5">Analytics and performance insights</p>
                    </div>
                </div>
                <a href="{{ route('admin.reports.export', ['start_date' => $startDate, 'end_date' => $endDate]) }}" 
                   class="group relative overflow-hidden px-6 py-3 bg-gradient-to-r from-emerald-600 via-green-600 to-emerald-600 text-white rounded-xl font-bold shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:shadow-emerald-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export PDF
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-700 via-green-700 to-emerald-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Date Range Filter -->
        <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300 mb-6">
            <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                        <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Date Range Filter</h3>
                        <p class="text-xs font-medium text-gray-500 mt-0.5">Select period for analysis</p>
                    </div>
                </div>
            </div>
            
            <div class="p-8">
                <form method="GET" action="{{ route('admin.reports') }}" class="grid md:grid-cols-4 gap-6 items-end">
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                            Start Date
                        </label>
                        <input type="date" name="start_date" value="{{ $startDate }}" 
                               class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none">
                    </div>
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                            End Date
                        </label>
                        <input type="date" name="end_date" value="{{ $endDate }}" 
                               class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none">
                    </div>
                    <div class="md:col-span-2 flex gap-3">
                        <button type="submit" class="flex-1 group relative overflow-hidden px-6 py-3.5 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Generate
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                        <button type="button" onclick="setThisMonth()" class="px-6 py-3.5 bg-white border-2 border-gray-200 rounded-xl font-bold text-gray-700 hover:border-violet-300 hover:bg-violet-50 hover:text-violet-700 transition-all duration-300">
                            This Month
                        </button>
                        <button type="button" onclick="setLastMonth()" class="px-6 py-3.5 bg-white border-2 border-gray-200 rounded-xl font-bold text-gray-700 hover:border-fuchsia-300 hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-all duration-300">
                            Last Month
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid md:grid-cols-4 gap-6 mb-6">
            <!-- Total Revenue Card -->
            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-violet-600 via-fuchsia-600 to-purple-600 shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-500 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-sm font-bold text-white/80 uppercase tracking-wide mb-1">Total Revenue</p>
                            <p class="text-3xl font-black text-white">₱{{ number_format($revenue, 2) }}</p>
                        </div>
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-white/80">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">From completed appointments</span>
                    </div>
                </div>
            </div>

            <!-- Total Appointments Card -->
            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-cyan-600 to-blue-600 shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/40 transition-all duration-500 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-sm font-bold text-white/80 uppercase tracking-wide mb-1">Total Appointments</p>
                            <p class="text-3xl font-black text-white">{{ $appointments->count() }}</p>
                        </div>
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-white/80">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">In selected period</span>
                    </div>
                </div>
            </div>

            <!-- Completed Card -->
            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-600 via-green-600 to-emerald-600 shadow-xl shadow-emerald-500/30 hover:shadow-2xl hover:shadow-emerald-500/40 transition-all duration-500 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-sm font-bold text-white/80 uppercase tracking-wide mb-1">Completed</p>
                            <p class="text-3xl font-black text-white">{{ $appointments->where('status', 'completed')->count() }}</p>
                        </div>
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-white/80">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">{{ $appointments->count() > 0 ? round(($appointments->where('status', 'completed')->count() / $appointments->count()) * 100) : 0 }}% completion rate</span>
                    </div>
                </div>
            </div>

            <!-- Average Value Card -->
            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-amber-600 via-orange-600 to-amber-600 shadow-xl shadow-amber-500/30 hover:shadow-2xl hover:shadow-amber-500/40 transition-all duration-500 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-sm font-bold text-white/80 uppercase tracking-wide mb-1">Average Value</p>
                            <p class="text-3xl font-black text-white">₱{{ $appointments->where('status', 'completed')->count() > 0 ? number_format($revenue / $appointments->where('status', 'completed')->count(), 2) : '0.00' }}</p>
                        </div>
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-white/80">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">Per completed appointment</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service & Staff Performance -->
        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <!-- Service Performance -->
            <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                <div class="border-b border-gray-100 bg-gradient-to-r from-violet-50 to-fuchsia-50 px-8 py-5">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-gray-900">Service Performance</h3>
                            <p class="text-xs font-medium text-gray-500 mt-0.5">Revenue and bookings by service</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    @if($serviceBreakdown->count() > 0)
                        <div class="space-y-6">
                            @foreach($serviceBreakdown->sortByDesc('revenue')->take(10) as $serviceName => $data)
                                <div class="group">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="font-bold text-gray-900">{{ $serviceName }}</span>
                                        <span class="px-3 py-1 bg-gradient-to-r from-violet-100 to-fuchsia-100 text-violet-700 text-sm font-black rounded-full">₱{{ number_format($data['revenue'], 2) }}</span>
                                    </div>
                                    <div class="flex items-center gap-4 text-sm text-gray-600 mb-2">
                                        <span class="flex items-center gap-1.5 font-semibold">
                                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $data['count'] }} bookings
                                        </span>
                                        <span class="flex items-center gap-1.5 font-semibold text-emerald-600">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $data['completed'] }} completed
                                        </span>
                                    </div>
                                    <div class="relative w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-full transition-all duration-500 group-hover:from-violet-500 group-hover:to-fuchsia-500" 
                                             style="width: {{ $appointments->count() > 0 ? ($data['count'] / $appointments->count()) * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <div class="w-16 h-16 mx-auto bg-gray-100 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">No services data available</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Staff Performance -->
            <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                <div class="border-b border-gray-100 bg-gradient-to-r from-emerald-50 to-green-50 px-8 py-5">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-emerald-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-emerald-600 to-green-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-gray-900">Staff Performance</h3>
                            <p class="text-xs font-medium text-gray-500 mt-0.5">Appointments and revenue by staff</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    @if($staffPerformance->count() > 0)
                        <div class="space-y-6">
                            @foreach($staffPerformance->sortByDesc('revenue') as $staffName => $data)
                                <div class="group">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="font-bold text-gray-900">{{ $staffName }}</span>
                                        <span class="px-3 py-1 bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-700 text-sm font-black rounded-full">₱{{ number_format($data['revenue'], 2) }}</span>
                                    </div>
                                    <div class="grid grid-cols-3 gap-3 mb-2">
                                        <div class="text-center p-2 bg-blue-50 rounded-xl border border-blue-200">
                                            <p class="text-xs font-bold text-blue-600 uppercase mb-0.5">Total</p>
                                            <p class="text-lg font-black text-blue-700">{{ $data['total_appointments'] }}</p>
                                        </div>
                                        <div class="text-center p-2 bg-emerald-50 rounded-xl border border-emerald-200">
                                            <p class="text-xs font-bold text-emerald-600 uppercase mb-0.5">Done</p>
                                            <p class="text-lg font-black text-emerald-700">{{ $data['completed'] }}</p>
                                        </div>
                                        <div class="text-center p-2 bg-red-50 rounded-xl border border-red-200">
                                            <p class="text-xs font-bold text-red-600 uppercase mb-0.5">Cancelled</p>
                                            <p class="text-lg font-black text-red-700">{{ $data['cancelled'] }}</p>
                                        </div>
                                    </div>
                                    <div class="relative w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-green-600 rounded-full transition-all duration-500 group-hover:from-emerald-500 group-hover:to-green-500" 
                                             style="width: {{ $data['total_appointments'] > 0 ? ($data['completed'] / $data['total_appointments']) * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <div class="w-16 h-16 mx-auto bg-gray-100 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">No staff data available</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Daily Breakdown Chart -->
        <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300 mb-6">
            <div class="border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-5">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-blue-600 rounded-xl blur opacity-20"></div>
                        <div class="relative p-2.5 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Daily Appointment Trend</h3>
                        <p class="text-xs font-medium text-gray-500 mt-0.5">Number of appointments per day</p>
                    </div>
                </div>
            </div>
            <div class="p-8">
                @if($dailyAppointments->count() > 0)
                    <div class="space-y-4">
                        @php
                            $maxDaily = $dailyAppointments->max();
                        @endphp
                        @foreach($dailyAppointments as $date => $count)
                            <div class="group flex items-center gap-4">
                                <div class="w-28 text-sm font-bold text-gray-600">
                                    {{ \Carbon\Carbon::parse($date)->format('M d, Y') }}
                                </div>
                                <div class="flex-1">
                                    <div class="relative bg-gray-100 rounded-full h-10 overflow-hidden">
                                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-end pr-4 transition-all duration-500 group-hover:from-blue-500 group-hover:to-indigo-500" 
                                             style="width: {{ $maxDaily > 0 ? ($count / $maxDaily) * 100 : 0 }}%">
                                            <span class="text-white text-sm font-black">{{ $count }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <div class="w-16 h-16 mx-auto bg-gray-100 rounded-2xl flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 font-medium">No daily data available</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Appointment Status Breakdown -->
        <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300 mb-6">
            <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-purple-600 rounded-xl blur opacity-20"></div>
                        <div class="relative p-2.5 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Appointment Status Distribution</h3>
                        <p class="text-xs font-medium text-gray-500 mt-0.5">Breakdown by appointment status</p>
                    </div>
                </div>
            </div>
            <div class="p-8">
                <div class="grid md:grid-cols-5 gap-4">
                    @php
                        $statusCounts = [
                            'pending' => $appointments->where('status', 'pending')->count(),
                            'confirmed' => $appointments->where('status', 'confirmed')->count(),
                            'in_progress' => $appointments->where('status', 'in_progress')->count(),
                            'completed' => $appointments->where('status', 'completed')->count(),
                            'cancelled' => $appointments->where('status', 'cancelled')->count(),
                        ];
                        $statusGradients = [
                            'pending' => 'from-amber-500 to-yellow-500',
                            'confirmed' => 'from-blue-500 to-cyan-500',
                            'in_progress' => 'from-violet-500 to-purple-500',
                            'completed' => 'from-emerald-500 to-green-500',
                            'cancelled' => 'from-red-500 to-rose-500',
                        ];
                        $statusBgs = [
                            'pending' => 'from-amber-50 to-yellow-50',
                            'confirmed' => 'from-blue-50 to-cyan-50',
                            'in_progress' => 'from-violet-50 to-purple-50',
                            'completed' => 'from-emerald-50 to-green-50',
                            'cancelled' => 'from-red-50 to-rose-50',
                        ];
                    @endphp
                    @foreach($statusCounts as $status => $count)
                        <div class="group relative overflow-hidden text-center p-6 bg-gradient-to-br {{ $statusBgs[$status] }} rounded-2xl border-2 border-gray-200 hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br {{ $statusGradients[$status] }} opacity-10 rounded-bl-full"></div>
                            <p class="relative text-4xl font-black bg-gradient-to-r {{ $statusGradients[$status] }} bg-clip-text text-transparent mb-2">{{ $count }}</p>
                            <p class="text-sm font-bold text-gray-900 capitalize mb-1">{{ str_replace('_', ' ', $status) }}</p>
                            <p class="text-xs font-semibold text-gray-500">
                                {{ $appointments->count() > 0 ? round(($count / $appointments->count()) * 100) : 0 }}% of total
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Detailed Appointments Table -->
        <div class="overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
            <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gray-600 rounded-xl blur opacity-20"></div>
                        <div class="relative p-2.5 bg-gradient-to-br from-gray-700 to-gray-900 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Detailed Appointment List</h3>
                        <p class="text-xs font-medium text-gray-500 mt-0.5">All appointments in selected period ({{ $appointments->count() }} total)</p>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                @if($appointments->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Staff</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($appointments->sortByDesc('appointment_date') as $appointment)
                                <tr class="hover:bg-violet-50/30 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{ $appointment->customer->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{ $appointment->service->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{ $appointment->staff->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-black text-violet-600">
                                        ₱{{ number_format($appointment->service->price, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusColors = [
                                                'pending' => 'amber',
                                                'confirmed' => 'blue',
                                                'in_progress' => 'violet',
                                                'completed' => 'emerald',
                                                'cancelled' => 'red',
                                            ];
                                            $color = $statusColors[$appointment->status] ?? 'gray';
                                        @endphp
                                        <span class="px-3 py-1.5 text-xs font-black rounded-full bg-{{ $color }}-100 text-{{ $color }}-700 border border-{{ $color }}-200">
                                            {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-16 text-center">
                        <div class="w-20 h-20 mx-auto bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-gray-900 mb-2">No appointments</h3>
                        <p class="text-sm font-medium text-gray-500">No appointments found in the selected date range.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function setThisMonth() {
            const now = new Date();
            const firstDay = new Date(now.getFullYear(), now.getMonth(), 1);
            const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
            
            document.querySelector('input[name="start_date"]').value = firstDay.toISOString().split('T')[0];
            document.querySelector('input[name="end_date"]').value = lastDay.toISOString().split('T')[0];
        }

        function setLastMonth() {
            const now = new Date();
            const firstDay = new Date(now.getFullYear(), now.getMonth() - 1, 1);
            const lastDay = new Date(now.getFullYear(), now.getMonth(), 0);
            
            document.querySelector('input[name="start_date"]').value = firstDay.toISOString().split('T')[0];
            document.querySelector('input[name="end_date"]').value = lastDay.toISOString().split('T')[0];
        }
    </script>
    @endpush
</x-app-layout>