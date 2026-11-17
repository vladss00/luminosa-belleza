<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 animate-fade-in">
            <div> <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                 {{ __('Admin Dashboard') }}
                </h2>
                <div class="mt-1 flex items-center text-sm text-slate-500">
                    <svg class="mr-1.5 h-4 w-4 flex-shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18.75 0c0 1.242 1.008 2.25 2.25 2.25h13.5c1.242 0 2.25-1.008 2.25-2.25m-18.75 0V7.5" />
                    </svg>
                    {{ now()->format('l, F d, Y') }}
                </div>
            </div>

            
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=General+Sans:wght@300;400;500;600&display=swap');
        
        :root {
            --color-primary: #6366f1;
            --color-primary-dark: #4f46e5;
            --color-secondary: #ec4899;
            --color-accent: #f59e0b;
            --color-success: #10b981;
            --color-warning: #f59e0b;
            --color-danger: #ef4444;
            --color-info: #3b82f6;
            
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-4: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --gradient-5: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
        
        .font-display {
            font-family: 'Clash Display', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .font-body {
            font-family: 'General Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            font-family: 'General Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .page-background {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slide-in-left {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
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
        
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }
        
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
        
        .animate-slide-in {
            animation: slide-in-left 0.6s ease-out;
        }
        
        .animate-scale-in {
            animation: scale-in 0.6s ease-out;
        }
        
        .stat-card {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }
        
        .stat-card-1 {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.95) 0%, rgba(139, 92, 246, 0.95) 100%);
        }
        
        .stat-card-2 {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.95) 0%, rgba(5, 150, 105, 0.95) 100%);
        }
        
        .stat-card-3 {
            background: linear-gradient(135deg, rgba(251, 146, 60, 0.95) 0%, rgba(249, 115, 22, 0.95) 100%);
        }
        
        .stat-card-4 {
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.95) 0%, rgba(219, 39, 119, 0.95) 100%);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .stat-card:hover::before {
            left: 100%;
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .gradient-border {
            position: relative;
            background: white;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: inherit;
            padding: 2px;
            background: var(--gradient-1);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .gradient-border:hover::before {
            opacity: 1;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.025em;
            transition: all 0.2s;
        }
        
        .status-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
        
        .stat-icon {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.15) rotate(5deg);
        }
        
        .appointment-item {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .appointment-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--gradient-1);
            border-radius: 2px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .appointment-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.15);
        }
        
        .appointment-item:hover::before {
            opacity: 1;
        }
        
        .service-item {
            transition: all 0.3s ease;
        }
        
        .service-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(236, 72, 153, 0.15);
        }
        
        table tbody tr {
            transition: all 0.2s ease;
        }
        
        table tbody tr:hover {
            background: rgba(99, 102, 241, 0.04);
            transform: scale(1.01);
        }
        
        .section-card {
            animation: scale-in 0.6s ease-out;
        }
        
        .section-card:nth-child(1) { animation-delay: 0.1s; }
        .section-card:nth-child(2) { animation-delay: 0.2s; }
        .section-card:nth-child(3) { animation-delay: 0.3s; }
        .section-card:nth-child(4) { animation-delay: 0.4s; }
        
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        
        .link-hover {
            position: relative;
            transition: color 0.3s;
        }
        
        .link-hover::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: currentColor;
            transition: width 0.3s ease;
        }
        
        .link-hover:hover::after {
            width: 100%;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #764ba2 0%, #667eea 100%);
        }
    </style>

    <div class="page-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Customers -->
            <div class="stat-card stat-card-1 section-card rounded-2xl shadow-lg p-6 border border-white border-opacity-20">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-indigo-100 text-sm font-medium mb-2 tracking-wide uppercase">Total Customers</p>
                        <p class="text-5xl font-display font-bold text-white">
                            {{ $stats['total_customers'] }}
                        </p>
                        <p class="text-xs text-indigo-200 mt-2">All registered users</p>
                    </div>
                    <div class="stat-icon flex items-center justify-center w-16 h-16 rounded-2xl bg-white bg-opacity-20 backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Staff -->
            <div class="stat-card stat-card-2 section-card rounded-2xl shadow-lg p-6 border border-white border-opacity-20">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-emerald-100 text-sm font-medium mb-2 tracking-wide uppercase">Total Staff</p>
                        <p class="text-5xl font-display font-bold text-white">
                            {{ $stats['total_staff'] }}
                        </p>
                        <p class="text-xs text-emerald-200 mt-2">Active team members</p>
                    </div>
                    <div class="stat-icon flex items-center justify-center w-16 h-16 rounded-2xl bg-white bg-opacity-20 backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Today's Appointments -->
            <div class="stat-card stat-card-3 section-card rounded-2xl shadow-lg p-6 border border-white border-opacity-20">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-orange-100 text-sm font-medium mb-2 tracking-wide uppercase">Today's Bookings</p>
                        <p class="text-5xl font-display font-bold text-white">
                            {{ $stats['today_appointments'] }}
                        </p>
                        <p class="text-xs text-orange-200 mt-2">Scheduled for today</p>
                    </div>
                    <div class="stat-icon flex items-center justify-center w-16 h-16 rounded-2xl bg-white bg-opacity-20 backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Monthly Revenue -->
            <div class="stat-card stat-card-4 section-card rounded-2xl shadow-lg p-6 border border-white border-opacity-20">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-pink-100 text-sm font-medium mb-2 tracking-wide uppercase">Monthly Revenue</p>
                        <p class="text-5xl font-display font-bold text-white">
                            ₱{{ number_format($stats['this_month_revenue'], 2) }}
                        </p>
                        <p class="text-xs text-pink-200 mt-2">This month's earnings</p>
                    </div>
                    <div class="stat-icon flex items-center justify-center w-16 h-16 rounded-2xl bg-white bg-opacity-20 backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 mb-8">
            <!-- Recent Appointments -->
            <div class="content-card bg-white rounded-2xl shadow-lg border border-white border-opacity-30 overflow-hidden animate-fade-in">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-purple-50">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-display font-bold text-gray-900">Recent Appointments</h3>
                            <p class="text-sm text-gray-600 mt-1">Latest booking activity</p>
                        </div>
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.appointments.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View All Appointments
                    </a>
                </div>
                <div class="p-6 max-h-[500px] overflow-y-auto">
                    @forelse($recentAppointments as $appointment)
                        <div class="appointment-item mb-4 pb-4 border-b border-gray-100 last:border-0 rounded-xl p-4 bg-gradient-to-r from-indigo-50 to-purple-50 hover:from-indigo-100 hover:to-purple-100">
                            <div class="flex justify-between items-start gap-4">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">{{ substr($appointment->customer->name, 0, 1) }}</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900 font-display text-lg truncate">{{ $appointment->customer->name }}</h4>
                                            <p class="text-xs text-gray-400 flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $appointment->formatted_date_time }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ml-15 space-y-1">
                                        @if($appointment->services && $appointment->services->count() > 1)
                                            <p class="text-sm text-gray-600 flex items-center gap-2 mb-2">
                                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="font-bold">{{ $appointment->services->count() }} Services</span>
                                            </p>
                                            <div class="flex flex-wrap gap-1.5 ml-6">
                                                @foreach($appointment->services as $service)
                                                    <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 border border-indigo-200 text-xs font-semibold rounded-lg">
                                                        {{ $service->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @elseif($appointment->services && $appointment->services->count() === 1)
                                            <p class="text-sm text-gray-600 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="font-medium">{{ $appointment->services->first()->name }}</span>
                                            </p>
                                        @elseif($appointment->service)
                                            <p class="text-sm text-gray-600 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="font-medium">{{ $appointment->service->name }}</span>
                                            </p>
                                        @endif
                                        
                                        @if($appointment->staff && $appointment->staff->user)
                                            <p class="text-sm text-gray-500 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                {{ $appointment->staff->user->name }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <span class="status-badge bg-{{ $appointment->status_badge }}-50 text-{{ $appointment->status_badge }}-700 shrink-0">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 font-medium">No recent appointments</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Popular Services -->
            <div class="content-card bg-white rounded-2xl shadow-lg border border-white border-opacity-30 overflow-hidden animate-fade-in">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-pink-50 to-rose-50">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-display font-bold text-gray-900">Popular Services</h3>
                            <p class="text-sm text-gray-600 mt-1">Top performers this month</p>
                        </div>
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-pink-500 to-rose-600 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-pink-600 to-rose-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                        Manage Services
                    </a>
                </div>
                <div class="p-6 max-h-[500px] overflow-y-auto">
                    @forelse($popularServices as $service)
                        <div class="service-item mb-4 pb-4 border-b border-gray-100 last:border-0 rounded-xl p-5 bg-gradient-to-r from-pink-50 to-rose-50 hover:from-pink-100 hover:to-rose-100">
                            <div class="flex justify-between items-center gap-4">
                                <div class="flex items-center gap-4 flex-1 min-w-0">
                                    <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center shadow-lg">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 font-display text-lg truncate mb-2">{{ $service->name }}</h4>
                                        <div class="flex items-center gap-4">
                                            <span class="inline-flex items-center gap-1.5 text-sm text-gray-600 bg-white px-3 py-1.5 rounded-lg shadow-sm">
                                                <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="font-semibold">{{ $service->formatted_price }}</span>
                                            </span>
                                            <span class="inline-flex items-center gap-1.5 text-sm text-gray-600 bg-white px-3 py-1.5 rounded-lg shadow-sm">
                                                <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="font-semibold">{{ $service->formatted_duration }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center shrink-0 bg-white px-6 py-3 rounded-xl shadow-md">
                                    <p class="text-4xl font-display font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">
                                        {{ $service->appointments_count }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide font-semibold">bookings</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-gray-400 font-medium">No services booked this month</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Today's Schedule -->
        @if($todaySchedule->count() > 0)
            <div class="content-card bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden animate-fade-in">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-display font-bold text-gray-900">Today's Schedule</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ now()->format('l, F d, Y') }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="px-4 py-2 bg-white rounded-xl shadow-sm border border-gray-200 text-sm font-semibold text-gray-700">
                                {{ $todaySchedule->count() }} Appointments
                            </span>
                            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Time</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Service(s)</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Staff Member</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($todaySchedule as $appointment)
                                <tr class="hover:shadow-md">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-sm font-bold text-gray-900 font-display">{{ $appointment->formatted_time }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold text-sm">{{ substr($appointment->customer->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">{{ $appointment->customer->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($appointment->services && $appointment->services->count() > 1)
                                            <div class="text-sm font-bold text-gray-900 mb-1">{{ $appointment->services->count() }} Services</div>
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($appointment->services as $service)
                                                    <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 text-xs font-semibold rounded-md">
                                                        {{ $service->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @elseif($appointment->services && $appointment->services->count() === 1)
                                            <span class="text-sm text-gray-700 font-medium">{{ $appointment->services->first()->name }}</span>
                                        @elseif($appointment->service)
                                            <span class="text-sm text-gray-700 font-medium">{{ $appointment->service->name }}</span>
                                        @else
                                            <span class="text-sm text-gray-500 italic">No service assigned</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($appointment->staff && $appointment->staff->user)
                                            <span class="text-sm text-gray-700 font-medium">{{ $appointment->staff->user->name }}</span>
                                        @else
                                            <span class="text-sm text-gray-500 italic">Not assigned</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge bg-{{ $appointment->status_badge }}-50 text-{{ $appointment->status_badge }}-700">
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    </div>
</x-app-layout>