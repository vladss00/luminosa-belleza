<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                        <div class="relative w-12 h-12 bg-gradient-to-br from-violet-600 via-fuchsia-600 to-purple-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600 tracking-tight">
                            Appointment Details
                        </h2>
                        <p class="text-sm font-medium text-gray-500 mt-0.5">Appointment #{{ $appointment->id }}</p>
                    </div>
                </div>
                <a href="{{ route('customer.appointments.index') }}" class="flex items-center gap-2 px-5 py-2.5 border-2 border-gray-200 rounded-xl hover:border-violet-300 hover:bg-violet-50 font-bold text-gray-600 hover:text-violet-700 text-sm transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
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
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes scale-in {
            from { opacity: 0; transform: scale(0.96); }
            to   { opacity: 1; transform: scale(1); }
        }

        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        .animate-fade-in-up { animation: fade-in-up 0.7s cubic-bezier(0.16, 1, 0.3, 1); }
        .animate-scale-in   { animation: scale-in 0.7s cubic-bezier(0.16, 1, 0.3, 1); }

        .stagger-1 { animation: fade-in-up 0.6s cubic-bezier(0.16,1,0.3,1) 0.05s backwards; }
        .stagger-2 { animation: fade-in-up 0.6s cubic-bezier(0.16,1,0.3,1) 0.12s backwards; }
        .stagger-3 { animation: fade-in-up 0.6s cubic-bezier(0.16,1,0.3,1) 0.19s backwards; }
        .stagger-4 { animation: fade-in-up 0.6s cubic-bezier(0.16,1,0.3,1) 0.26s backwards; }
        .stagger-5 { animation: fade-in-up 0.6s cubic-bezier(0.16,1,0.3,1) 0.33s backwards; }

        .premium-card {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.06);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px -4px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.5);
            transition: all 0.4s cubic-bezier(0.16,1,0.3,1);
        }

        .premium-card:hover {
            box-shadow: 0 20px 60px -15px rgba(0,0,0,0.1);
        }

        .hero-banner {
            background: linear-gradient(135deg, #7c3aed 0%, #6366f1 40%, #8b5cf6 70%, #a855f7 100%);
            background-size: 200% 200%;
            animation: gradient-shift 6s ease infinite;
        }

        .detail-block {
            padding: 28px 32px;
            border-bottom: 1px solid rgba(0,0,0,0.06);
            transition: background 0.3s ease;
        }

        .detail-block:last-of-type { border-bottom: none; }
        .detail-block:hover { background: rgba(139,92,246,0.015); }

        .detail-label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }

        .detail-label-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .detail-label h4 {
            font-family: 'Sora', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -0.01em;
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            background: #f9fafb;
            border: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 10px;
            transition: all 0.2s ease;
        }

        .info-row:last-child { margin-bottom: 0; }
        .info-row:hover { background: #f3f4f6; border-color: rgba(139,92,246,0.15); }

        .info-row-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(139,92,246,0.1), rgba(168,85,247,0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .service-card {
            background: linear-gradient(135deg, #faf5ff 0%, #f5f3ff 100%);
            border: 1px solid rgba(139,92,246,0.15);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 12px;
        }

        .service-card:last-child {
            margin-bottom: 0;
        }

        .staff-avatar {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: linear-gradient(135deg, #ede9fe, #f3e8ff);
            border: 2px solid rgba(139,92,246,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #7c3aed;
        }

        .notes-box {
            background: linear-gradient(135deg, #fefce8 0%, #fef9c3 100%);
            border: 1px solid rgba(234,179,8,0.25);
            border-radius: 14px;
            padding: 20px 24px;
        }

        /* Status */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 18px;
            border-radius: 9999px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.02em;
            border: 1px solid;
        }

        .status-pending    { background: #fefce8; color: #a16207; border-color: #fde047; }
        .status-confirmed  { background: #ecfdf5; color: #047857; border-color: #6ee7b7; }
        .status-completed  { background: #eff6ff; color: #1d4ed8; border-color: #93c5fd; }
        .status-cancelled  { background: #fef2f2; color: #dc2626; border-color: #fca5a5; }

        .pulse-pending   { background: #ca8a04; }
        .pulse-confirmed { background: #10b981; }
        .pulse-completed { background: #3b82f6; }
        .pulse-cancelled { background: #ef4444; }
    </style>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Banner -->
        <div class="hero-banner rounded-2xl shadow-2xl shadow-violet-500/25 overflow-hidden mb-8 animate-scale-in">
            <div class="relative p-8 text-white">
                <!-- decorative blobs -->
                <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl -mr-36 -mt-36 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-400/15 rounded-full blur-3xl -ml-32 -mb-32 pointer-events-none"></div>

                @php
                    $totalDuration = $appointment->services->sum('duration');
                    $totalPrice = $appointment->services->sum('price');
                    $hours = floor($totalDuration / 60);
                    $minutes = $totalDuration % 60;
                    $durationText = $hours > 0 ? "{$hours}h " . ($minutes > 0 ? "{$minutes}m" : "") : "{$minutes}m";
                @endphp

                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-violet-200 text-sm font-semibold uppercase tracking-widest mb-2">
                            @if($appointment->services->count() > 1)
                                Services
                            @else
                                Service
                            @endif
                        </p>
                        <h3 class="font-display text-3xl font-extrabold mb-2">
                            @if($appointment->services->count() > 1)
                                {{ $appointment->services->count() }} Services Booked
                            @else
                                {{ $appointment->services->first()->name }}
                            @endif
                        </h3>
                        <div class="flex items-center gap-3 mt-3">
                            <span class="text-violet-200 text-sm font-medium flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $durationText }}
                            </span>
                            <span class="w-1 h-1 bg-violet-300 rounded-full"></span>
                            <span class="text-white font-bold text-sm">₱{{ number_format($totalPrice, 2) }}</span>
                        </div>
                    </div>

                    @php
                        $status = $appointment->status;
                    @endphp
                    <span class="status-badge status-{{ $status }}">
                        <span class="w-2 h-2 rounded-full pulse-{{ $status }} animate-pulse"></span>
                        {{ ucfirst($status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Details Card -->
        <div class="premium-card">
            <!-- Date & Time -->
            <div class="detail-block stagger-1">
                <div class="detail-label">
                    <div class="detail-label-icon bg-gradient-to-br from-violet-100 to-fuchsia-100">
                        <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4>Date & Time</h4>
                </div>

                <div class="grid sm:grid-cols-2 gap-3">
                    <div class="info-row">
                        <div class="info-row-icon">
                            <svg class="w-4.5 h-4.5 text-violet-600" style="width:18px;height:18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-0.5">Date</p>
                            <p class="text-sm font-bold text-gray-900">{{ $appointment->formatted_date }}</p>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-row-icon">
                            <svg style="width:18px;height:18px;" class="text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-0.5">Time</p>
                            <p class="text-sm font-bold text-gray-900">{{ $appointment->formatted_time }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Details -->
            <div class="detail-block stagger-2">
                <div class="detail-label">
                    <div class="detail-label-icon bg-gradient-to-br from-fuchsia-100 to-purple-100">
                        <svg class="w-5 h-5 text-fuchsia-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h4>Service Details ({{ $appointment->services->count() }})</h4>
                </div>

                <div class="space-y-3">
                    @foreach($appointment->services as $index => $service)
                        <div class="service-card">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="px-2 py-1 bg-violet-600 text-white text-xs font-bold rounded-md">{{ $index + 1 }}</span>
                                        <p class="font-display font-bold text-gray-900" style="font-size:15px;">{{ $service->name }}</p>
                                    </div>
                                    @if($service->description)
                                        <p class="text-sm text-gray-500 mt-1.5 leading-relaxed">{{ $service->description }}</p>
                                    @endif
                                </div>
                                <span class="font-display font-extrabold text-violet-600 ml-3" style="font-size:18px;">{{ $service->formatted_price }}</span>
                            </div>

                            <div class="flex items-center gap-2 mt-4 pt-4" style="border-top:1px solid rgba(139,92,246,0.12);">
                                <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Duration: <span class="text-violet-600 font-bold">{{ $service->formatted_duration }}</span></span>
                            </div>
                        </div>
                    @endforeach

                    @if($appointment->services->count() > 1)
                        <div class="mt-4 p-4 bg-gradient-to-r from-violet-50 to-fuchsia-50 border-2 border-violet-200 rounded-xl">
                            <div class="flex items-center justify-between">
                                <span class="font-display font-bold text-gray-700 text-lg">Total</span>
                                <div class="text-right">
                                    <div class="text-sm font-semibold text-gray-600 mb-1">{{ $durationText }}</div>
                                    <div class="font-display text-2xl font-extrabold text-violet-600">₱{{ number_format($totalPrice, 2) }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Staff Info -->
            <div class="detail-block stagger-3">
                <div class="detail-label">
                    <div class="detail-label-icon bg-gradient-to-br from-blue-100 to-cyan-100">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h4>Your Stylist</h4>
                </div>

                <div class="flex items-start gap-5">
                    <div class="staff-avatar flex-shrink-0">
                        {{ strtoupper(substr($appointment->staff->user->name, 0, 2)) }}
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 flex-wrap">
                            <p class="font-display font-bold text-gray-900" style="font-size:16px;">{{ $appointment->staff->user->name }}</p>
                            <span class="px-3 py-1 bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold rounded-full">
                                {{ $appointment->staff->specialization }}
                            </span>
                        </div>
                        @if($appointment->staff->bio)
                            <p class="text-sm text-gray-500 mt-2 leading-relaxed">{{ $appointment->staff->bio }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Notes -->
            @if($appointment->notes)
                <div class="detail-block stagger-4">
                    <div class="detail-label">
                        <div class="detail-label-icon bg-gradient-to-br from-amber-100 to-yellow-100">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <h4>Additional Notes</h4>
                    </div>
                    <div class="notes-box">
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $appointment->notes }}</p>
                    </div>
                </div>
            @endif

            <!-- Actions Footer -->
            <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-white" style="border-top:1px solid rgba(0,0,0,0.06);">
                <div class="flex items-center justify-between">
                    <a href="{{ route('customer.appointments.index') }}" class="flex items-center gap-2 text-sm font-bold text-gray-500 hover:text-violet-600 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Appointments
                    </a>

                    @if($appointment->canBeCancelled())
                        <form action="{{ route('customer.appointments.cancel', $appointment) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                            @csrf
                            <button type="submit" class="group relative overflow-hidden px-6 py-2.5 bg-gradient-to-r from-red-500 to-rose-600 text-white rounded-xl font-bold text-sm shadow-lg shadow-red-500/25 hover:shadow-xl hover:shadow-red-500/35 transition-all duration-300 hover:-translate-y-0.5">
                                <span class="relative z-10 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel Appointment
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-rose-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>