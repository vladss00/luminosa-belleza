<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-3 mb-2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-2xl blur-xl opacity-40"></div>
                    
                </div>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 tracking-tight">
                        Customer Dashboard
                    </h2>
                    <p class="text-sm font-medium text-gray-500 mt-0.5">Manage your appointments and bookings</p>
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
        
        @keyframes gradient-shift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
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
            transform: translateY(-2px);
        }
        
        .welcome-banner {
            background: linear-gradient(135deg, #7c3aed 0%, #6366f1 50%, #8b5cf6 100%);
            background-size: 200% 200%;
            animation: gradient-shift 8s ease infinite;
        }
        
        .action-card {
            position: relative;
            background: #ffffff;
            border: 2px solid rgba(0, 0, 0, 0.06);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
        }
        
        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px -8px rgba(0, 0, 0, 0.15);
            border-color: rgba(139, 92, 246, 0.3);
        }
        
        .stat-card {
            position: relative;
            background: #ffffff;
            border: 2px solid;
            border-radius: 16px;
            padding: 24px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px -8px rgba(0, 0, 0, 0.15);
        }
        
        .stat-card-green {
            border-color: rgba(16, 185, 129, 0.3);
            box-shadow: 0 4px 12px -4px rgba(16, 185, 129, 0.2);
        }
        
        .stat-card-green:hover {
            border-color: rgba(16, 185, 129, 0.5);
            box-shadow: 0 12px 32px -8px rgba(16, 185, 129, 0.3);
        }
        
        .stat-card-blue {
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 4px 12px -4px rgba(59, 130, 246, 0.2);
        }
        
        .stat-card-blue:hover {
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 12px 32px -8px rgba(59, 130, 246, 0.3);
        }
        
        .appointment-item {
            padding: 20px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.06);
            margin-bottom: 16px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .appointment-item:hover {
            background: rgba(139, 92, 246, 0.02);
            border-color: rgba(139, 92, 246, 0.15);
            transform: translateX(4px);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Banner -->
        <div class="welcome-banner rounded-2xl shadow-2xl shadow-purple-500/30 p-8 mb-8 text-white animate-fade-in-up overflow-hidden relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl -ml-48 -mb-48"></div>
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-3 bg-white/20 backdrop-blur-sm rounded-2xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display text-3xl font-extrabold mb-1">Welcome back, {{ auth()->user()->name }}!</h3>
                        <p class="text-purple-100 font-medium">Manage your appointments and book new services</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Stats Grid -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <!-- Book Appointment Action Card -->
            <a href="{{ route('customer.appointments.create') }}" class="action-card stagger-item group">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <div class="absolute inset-0 bg-purple-600 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity"></div>
                        <div class="relative p-3.5 bg-gradient-to-br from-purple-600 to-indigo-600 rounded-xl">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-display text-lg font-bold text-gray-900 mb-0.5">Book Appointment</h4>
                        <p class="text-sm font-medium text-gray-500">Schedule a new service</p>
                    </div>
                </div>
            </a>

            <!-- Upcoming Stats Card -->
            <div class="stat-card stat-card-green stagger-item">
                <div class="flex items-center gap-4">
                    <div class="p-3.5 bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-display text-3xl font-extrabold text-green-600 mb-0.5">{{ $upcomingAppointments->count() }}</p>
                        <p class="text-xs font-bold text-gray-600 uppercase tracking-wider">Upcoming</p>
                    </div>
                </div>
            </div>

            <!-- Past Appointments Stats Card -->
            <div class="stat-card stat-card-blue stagger-item">
                <div class="flex items-center gap-4">
                    <div class="p-3.5 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-display text-3xl font-extrabold text-blue-600 mb-0.5">{{ $recentAppointments->count() }}</p>
                        <p class="text-xs font-bold text-gray-600 uppercase tracking-wider">Past Appointments</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments Grid -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Upcoming Appointments -->
            <div class="premium-card animate-scale-in" style="animation-delay: 0.1s;">
                <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-green-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-green-600 to-emerald-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-display text-lg font-bold text-gray-900">Upcoming Appointments</h3>
                            <p class="text-xs font-medium text-gray-500 mt-0.5">Your scheduled services</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-8">
                    @forelse($upcomingAppointments as $appointment)
                        <div class="appointment-item">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    @if($appointment->services && $appointment->services->count() > 1)
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-2">
                                            {{ $appointment->services->count() }} Services
                                        </h4>
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach($appointment->services as $service)
                                                <span class="px-2 py-1 bg-violet-50 text-violet-700 border border-violet-200 text-xs font-semibold rounded-lg">
                                                    {{ $service->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @elseif($appointment->services && $appointment->services->count() === 1)
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-1">
                                            {{ $appointment->services->first()->name }}
                                        </h4>
                                    @elseif($appointment->service)
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-1">
                                            {{ $appointment->service->name }}
                                        </h4>
                                    @else
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-1">
                                            Appointment #{{ $appointment->id }}
                                        </h4>
                                    @endif
                                    
                                    @if($appointment->staff && $appointment->staff->user)
                                        <p class="text-sm font-medium text-gray-600 flex items-center gap-1.5 mt-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            {{ $appointment->staff->user->name }}
                                        </p>
                                    @endif
                                </div>
                                @php
                                    $statusColors = [
                                        'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'border' => 'border-yellow-200'],
                                        'confirmed' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'border' => 'border-green-200'],
                                        'completed' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'border' => 'border-blue-200'],
                                        'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'border' => 'border-red-200'],
                                    ];
                                    $colors = $statusColors[$appointment->status] ?? $statusColors['pending'];
                                @endphp
                                <span class="status-badge {{ $colors['bg'] }} {{ $colors['text'] }} border {{ $colors['border'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ str_replace('100', '500', $colors['bg']) }} animate-pulse"></span>
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </div>
                            
                            <div class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $appointment->formatted_date }} at {{ $appointment->formatted_time }}
                            </div>
                            
                            <div class="flex justify-end">
                                <a href="{{ route('customer.appointments.show', $appointment) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg font-bold text-sm shadow-lg shadow-purple-500/30 hover:shadow-xl hover:shadow-purple-500/40 transition-all hover:-translate-y-0.5">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-2xl mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium mb-4">No upcoming appointments</p>
                            <a href="{{ route('customer.appointments.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-purple-500/30 hover:shadow-xl hover:shadow-purple-500/40 transition-all hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Book Your First Appointment
                            </a>
                        </div>
                    @endforelse
                </div>
                
                @if($upcomingAppointments->count() > 0)
                    <div class="p-6 bg-gradient-to-r from-gray-50 to-white border-t border-gray-100 text-center">
                        <a href="{{ route('customer.appointments.index') }}" class="inline-flex items-center gap-2 font-bold text-purple-600 hover:text-purple-700 transition-colors">
                            View All Appointments
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Recent History -->
            <div class="premium-card animate-scale-in" style="animation-delay: 0.2s;">
                <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-blue-600 rounded-xl blur opacity-20"></div>
                            <div class="relative p-2.5 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-display text-lg font-bold text-gray-900">Recent History</h3>
                            <p class="text-xs font-medium text-gray-500 mt-0.5">Your past appointments</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-8">
                    @forelse($recentAppointments as $appointment)
                        <div class="appointment-item">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    @if($appointment->services && $appointment->services->count() > 1)
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-2">
                                            {{ $appointment->services->count() }} Services
                                        </h4>
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach($appointment->services as $service)
                                                <span class="px-2 py-1 bg-violet-50 text-violet-700 border border-violet-200 text-xs font-semibold rounded-lg">
                                                    {{ $service->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @elseif($appointment->services && $appointment->services->count() === 1)
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-1">
                                            {{ $appointment->services->first()->name }}
                                        </h4>
                                    @elseif($appointment->service)
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-1">
                                            {{ $appointment->service->name }}
                                        </h4>
                                    @else
                                        <h4 class="font-display font-bold text-gray-900 text-lg mb-1">
                                            Appointment #{{ $appointment->id }}
                                        </h4>
                                    @endif
                                    
                                    @if($appointment->staff && $appointment->staff->user)
                                        <p class="text-sm font-medium text-gray-600 flex items-center gap-1.5 mt-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            {{ $appointment->staff->user->name }}
                                        </p>
                                    @endif
                                </div>
                                @php
                                    $statusColors = [
                                        'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'border' => 'border-yellow-200'],
                                        'confirmed' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'border' => 'border-green-200'],
                                        'completed' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'border' => 'border-blue-200'],
                                        'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'border' => 'border-red-200'],
                                    ];
                                    $colors = $statusColors[$appointment->status] ?? $statusColors['completed'];
                                @endphp
                                <span class="status-badge {{ $colors['bg'] }} {{ $colors['text'] }} border {{ $colors['border'] }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </div>
                            
                            <div class="flex items-center text-sm font-semibold text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $appointment->formatted_date }}
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-2xl mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-medium">No appointment history yet</p>
                        </div>
                    @endforelse
                </div>
                
                @if($recentAppointments->count() > 0)
                    <div class="p-6 bg-gradient-to-r from-gray-50 to-white border-t border-gray-100 text-center">
                        <a href="{{ route('customer.appointments.index') }}" class="inline-flex items-center gap-2 font-bold text-blue-600 hover:text-blue-700 transition-colors">
                            View Full History
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>