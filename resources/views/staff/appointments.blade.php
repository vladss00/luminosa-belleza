<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-3 mb-2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                    
                </div>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600 tracking-tight">
                        My Appointments
                    </h2>
                    <p class="text-sm font-medium text-gray-500 mt-0.5">Your schedule and client management</p>
                </div>
            </div>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');
        
        .font-display {
            font-family: 'Sora', -apple-system, BlinkMacSystemFont, sans-serif;
            letter-spacing: -0.02em;
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes scale-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .animate-scale-in {
            animation: scale-in 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stagger-item {
            animation: fade-in-up 0.7s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        }
        
        .stagger-item:nth-child(1) { animation-delay: 0.05s; }
        .stagger-item:nth-child(2) { animation-delay: 0.1s; }
        .stagger-item:nth-child(3) { animation-delay: 0.15s; }
        .stagger-item:nth-child(4) { animation-delay: 0.2s; }
        
        .stat-card {
            position: relative;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            padding: 28px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
            box-shadow: 
                0 4px 20px -4px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--card-gradient);
            opacity: 0;
            transform: scaleX(0);
            transform-origin: left;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 
                0 20px 60px -15px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            border-color: rgba(0, 0, 0, 0.08);
        }
        
        .stat-card:hover::before {
            opacity: 1;
            transform: scaleX(1);
        }
        
        .stat-card-amber { --card-gradient: linear-gradient(90deg, #f59e0b 0%, #d97706 100%); }
        .stat-card-blue { --card-gradient: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%); }
        .stat-card-violet { --card-gradient: linear-gradient(90deg, #8b5cf6 0%, #7c3aed 100%); }
        .stat-card-emerald { --card-gradient: linear-gradient(90deg, #10b981 0%, #059669 100%); }
        
        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(-5deg);
        }
        
        .premium-card {
            position: relative;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 
                0 4px 20px -4px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .premium-card:hover {
            box-shadow: 0 20px 60px -15px rgba(0, 0, 0, 0.1);
        }
        
        .premium-header {
            padding: 32px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
        }
        
        .table-row {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .table-row:hover {
            background: linear-gradient(90deg, rgba(139, 92, 246, 0.03) 0%, rgba(124, 58, 237, 0.03) 100%);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            border-radius: 10px;
            text-transform: capitalize;
            border: 1px solid;
        }
        
        .status-badge.pending {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%);
            color: #d97706;
            border-color: rgba(251, 191, 36, 0.2);
        }
        
        .status-badge.confirmed {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(37, 99, 235, 0.08) 100%);
            color: #2563eb;
            border-color: rgba(59, 130, 246, 0.2);
        }
        
        .status-badge.in_progress {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.08) 0%, rgba(147, 51, 234, 0.08) 100%);
            color: #9333ea;
            border-color: rgba(168, 85, 247, 0.2);
        }
        
        .status-badge.completed {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(5, 150, 105, 0.08) 100%);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.2);
        }
        
        .status-badge.cancelled {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.08) 0%, rgba(220, 38, 38, 0.08) 100%);
            color: #dc2626;
            border-color: rgba(239, 68, 68, 0.2);
        }
        
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 10px;
            border: 1px solid;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            letter-spacing: 0.01em;
        }
        
        .action-btn-confirm {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%);
            color: #2563eb;
            border-color: rgba(59, 130, 246, 0.2);
        }
        
        .action-btn-confirm:hover {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(37, 99, 235, 0.15) 100%);
            border-color: rgba(59, 130, 246, 0.35);
            box-shadow: 0 4px 16px -4px rgba(59, 130, 246, 0.3);
            transform: translateY(-1px);
        }
        
        .action-btn-start {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%);
            color: #7c3aed;
            border-color: rgba(139, 92, 246, 0.2);
        }
        
        .action-btn-start:hover {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(124, 58, 237, 0.15) 100%);
            border-color: rgba(139, 92, 246, 0.35);
            box-shadow: 0 4px 16px -4px rgba(139, 92, 246, 0.3);
            transform: translateY(-1px);
        }
        
        .action-btn-complete {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.2);
        }
        
        .action-btn-complete:hover {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(5, 150, 105, 0.15) 100%);
            border-color: rgba(16, 185, 129, 0.35);
            box-shadow: 0 4px 16px -4px rgba(16, 185, 129, 0.3);
            transform: translateY(-1px);
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Pending -->
            <div class="stat-card stat-card-amber stagger-item">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">Pending</p>
                        <p class="font-display text-3xl font-bold text-amber-600">{{ $appointments->where('status', 'pending')->count() }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.1) 100%); color: #f59e0b;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Awaiting Confirmation</p>
            </div>

            <!-- Confirmed -->
            <div class="stat-card stat-card-blue stagger-item">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">Confirmed</p>
                        <p class="font-display text-3xl font-bold text-blue-600">{{ $appointments->where('status', 'confirmed')->count() }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%); color: #3b82f6;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Ready to Start</p>
            </div>

            <!-- In Progress -->
            <div class="stat-card stat-card-violet stagger-item">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">In Progress</p>
                        <p class="font-display text-3xl font-bold text-violet-600">{{ $appointments->where('status', 'in_progress')->count() }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%); color: #8b5cf6;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Currently Active</p>
            </div>

            <!-- Completed -->
            <div class="stat-card stat-card-emerald stagger-item">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">Completed</p>
                        <p class="font-display text-3xl font-bold text-emerald-600">{{ $appointments->where('status', 'completed')->count() }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%); color: #10b981;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Successfully Finished</p>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="premium-card mb-8 animate-scale-in" style="animation-delay: 0.2s;">
            <div class="premium-header">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-display text-lg font-bold text-gray-900">Filter Appointments</h3>
                            <p class="text-xs font-medium text-gray-500 mt-0.5">Refine your view by status and date</p>
                        </div>
                    </div>
                    @if(request('status') || request('date'))
                        <a href="{{ route('staff.appointments') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-semibold text-sm transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear
                        </a>
                    @endif
                </div>
            </div>
            
            <div class="p-8">
                <form method="GET" action="{{ route('staff.appointments') }}" class="grid md:grid-cols-3 gap-6">
                    <!-- Status Filter -->
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                            Status
                        </label>
                        <select name="status" class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <!-- Date Filter -->
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                            <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                            Date
                        </label>
                        <input type="date" name="date" value="{{ request('date') }}" 
                               class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-end">
                        <button type="submit" class="w-full group relative overflow-hidden px-6 py-3.5 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Apply Filters
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Appointments List -->
        @if($appointments->count() > 0)
            <div class="premium-card animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="premium-header">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-display text-xl font-bold text-gray-900 mb-1">Your Schedule</h3>
                            <p class="text-sm font-medium text-gray-500">{{ $appointments->total() }} appointments found</p>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                            <span class="font-semibold">Live</span>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-widest">Date & Time</th>
                                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-widest">Client</th>
                                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-widest">Service</th>
                                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-widest">Status</th>
                                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-widest">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-50">
                            @foreach($appointments as $appointment)
                                <tr class="table-row">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2.5 bg-gradient-to-br from-violet-100 to-fuchsia-100 rounded-xl">
                                                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-900 text-sm">{{ $appointment->formatted_date }}</div>
                                                <div class="text-xs text-gray-500 font-semibold mt-0.5">{{ $appointment->formatted_time }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                                {{ substr($appointment->customer->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-900 text-sm">{{ $appointment->customer->name }}</div>
                                                <div class="text-xs text-gray-500 font-medium">{{ $appointment->customer->email }}</div>
                                            </div>
                                        </div>
                                    </td><td class="px-8 py-6">
    <div>
        @if($appointment->services && $appointment->services->count() > 1)
            <div class="flex flex-wrap gap-1.5 mb-2">
                @foreach($appointment->services as $service)
                    <span class="inline-flex items-center px-2.5 py-1 bg-violet-50 border border-violet-200 rounded-lg text-xs font-semibold text-violet-700">
                        {{ $service->name }}
                    </span>
                @endforeach
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-gray-100 rounded-lg text-xs font-semibold text-gray-600">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    @php $totalDuration = $appointment->services->sum('duration'); @endphp
                    {{ floor($totalDuration / 60) }}h {{ $totalDuration % 60 }}m
                </span>
                <span class="text-xs font-semibold text-gray-500">₱{{ number_format($appointment->services->sum('price'), 2) }}</span>
            </div>
        @elseif($appointment->services && $appointment->services->count() === 1)
            @php $service = $appointment->services->first(); @endphp
            <div class="font-bold text-gray-900 text-sm mb-1">{{ $service->name }}</div>
            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-gray-100 rounded-lg text-xs font-semibold text-gray-600">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $service->formatted_duration }}
            </div>
        @elseif($appointment->service)
            <div class="font-bold text-gray-900 text-sm mb-1">{{ $appointment->service->name }}</div>
            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-gray-100 rounded-lg text-xs font-semibold text-gray-600">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $appointment->service->formatted_duration }}
            </div>
        @endif
    </div>
</td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="status-badge {{ $appointment->status }}">
                                            {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        @if($appointment->status !== 'completed' && $appointment->status !== 'cancelled')
                                            <form action="{{ route('staff.appointments.status', $appointment) }}" method="POST" class="flex flex-wrap gap-2">
                                                @csrf
                                                @if($appointment->status === 'pending')
                                                    <button type="submit" name="status" value="confirmed" class="action-btn action-btn-confirm">
                                                        <span>✓</span>
                                                        <span>Confirm</span>
                                                    </button>
                                                @endif
                                                @if($appointment->status === 'confirmed' || $appointment->status === 'pending')
                                                    <button type="submit" name="status" value="in_progress" class="action-btn action-btn-start">
                                                        <span>▶</span>
                                                        <span>Start</span>
                                                    </button>
                                                @endif
                                                @if($appointment->status === 'in_progress')
                                                    <button type="submit" name="status" value="completed" class="action-btn action-btn-complete">
                                                        <span>✓</span>
                                                        <span>Complete</span>
                                                    </button>
                                                @endif
                                            </form>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1.5 bg-gray-50 text-gray-500 rounded-xl text-xs font-semibold border border-gray-200">
                                                <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                                </svg>
                                                No actions
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $appointments->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="premium-card animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="text-center py-20 px-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-violet-100 to-fuchsia-100 rounded-2xl mb-6 border border-violet-200">
                        <svg class="w-10 h-10 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-display text-2xl font-bold text-gray-900 mb-2">No Appointments Found</h3>
                    <p class="text-gray-600 font-medium mb-8 max-w-md mx-auto">
                        @if(request('status') || request('date'))
                            Your current filters didn't match any appointments. Try adjusting your criteria.
                        @else
                            Your schedule is clear. New appointments will appear here automatically.
                        @endif
                    </p>
                    
                    @if(request('status') || request('date'))
                        <a href="{{ route('staff.appointments') }}" 
                           class="group inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset All Filters
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</x-app-layout>