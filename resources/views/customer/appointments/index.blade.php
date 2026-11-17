<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                        
                    </div>
                    <div>
                        <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600 tracking-tight">
                            My Appointments
                        </h2>
                        <p class="text-sm font-medium text-gray-500 mt-0.5">View and manage all your bookings</p>
                    </div>
                </div>
                <a href="{{ route('customer.appointments.create') }}" class="group relative overflow-hidden px-6 py-3 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold text-sm shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Book New
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
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

        .animate-fade-in-up {
            animation: fade-in-up 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .animate-scale-in {
            animation: scale-in 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .row-stagger {
            animation: fade-in-up 0.6s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        }

        .premium-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px -4px rgba(0, 0, 0, 0.05), inset 0 1px 0 rgba(255,255,255,0.5);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .premium-card:hover {
            box-shadow: 0 20px 60px -15px rgba(0, 0, 0, 0.1);
        }

        /* Table */
        .table-head-cell {
            padding: 16px 24px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            white-space: nowrap;
            background: linear-gradient(180deg, #f9fafb 0%, #ffffff 100%);
            border-bottom: 2px solid rgba(0,0,0,0.06);
        }

        .table-head-cell:first-child { border-radius: 0; }

        .table-row {
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        .table-row:last-child { border-bottom: none; }

        .table-row:hover {
            background: linear-gradient(90deg, rgba(139,92,246,0.03) 0%, rgba(168,85,247,0.01) 100%);
        }

        .table-row:hover .row-accent {
            opacity: 1;
        }

        .row-accent {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, #8b5cf6, #a855f7);
            border-radius: 0 4px 4px 0;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .table-cell {
            padding: 20px 24px;
            vertical-align: middle;
        }

        /* Status */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
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

        /* Action buttons */
        .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            color: #7c3aed;
            background: rgba(139, 92, 246, 0.08);
            border: 1px solid rgba(139, 92, 246, 0.15);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            text-decoration: none;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: #fff;
            border-color: transparent;
            box-shadow: 0 6px 16px -4px rgba(139, 92, 246, 0.4);
            transform: translateY(-1px);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            color: #dc2626;
            background: rgba(239, 68, 68, 0.07);
            border: 1px solid rgba(239, 68, 68, 0.15);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            background-color: transparent;
        }

        .btn-cancel:hover {
            background: linear-gradient(135deg, #dc2626, #f43f5e);
            color: #fff;
            border-color: transparent;
            box-shadow: 0 6px 16px -4px rgba(220, 38, 38, 0.4);
            transform: translateY(-1px);
        }

        /* Pagination override */
        .pagination-wrap nav .flex a,
        .pagination-wrap nav .flex button,
        .pagination-wrap nav .flex span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: #4b5563;
            background: #fff;
            border: 1px solid rgba(0,0,0,0.08);
            margin: 0 2px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .pagination-wrap nav .flex a:hover {
            border-color: rgba(139, 92, 246, 0.3);
            color: #7c3aed;
            box-shadow: 0 4px 12px -4px rgba(139, 92, 246, 0.25);
        }

        .pagination-wrap nav .flex span[aria-current="page"] {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: #fff;
            border-color: transparent;
            box-shadow: 0 4px 14px -4px rgba(139, 92, 246, 0.45);
        }

        .pagination-wrap nav .flex span[aria-label="Previous page"],
        .pagination-wrap nav .flex span[aria-label="Next page"] {
            color: #9ca3af;
            cursor: not-allowed;
        }

        /* Empty state */
        .empty-icon-wrap {
            width: 100px;
            height: 100px;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            background: linear-gradient(135deg, rgba(139,92,246,0.08), rgba(168,85,247,0.12));
            border: 2px solid rgba(139, 92, 246, 0.12);
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if($appointments->count() > 0)
            <!-- Summary Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 animate-fade-in-up">
                @php
                    $totalCount     = $appointments->total();
                    $pendingCount   = $appointments->filter(fn($a) => $a->status === 'pending')->count();
                    $confirmedCount = $appointments->filter(fn($a) => $a->status === 'confirmed')->count();
                    $cancelledCount = $appointments->filter(fn($a) => $a->status === 'cancelled')->count();
                @endphp

                <div style="background:#fff; border:2px solid rgba(139,92,246,0.3); border-radius:16px; padding:20px; text-align:center; box-shadow:0 4px 12px -4px rgba(139,92,246,0.2); transition:all 0.3s cubic-bezier(0.16,1,0.3,1);" onmouseenter="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px -8px rgba(139,92,246,0.3)'" onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 12px -4px rgba(139,92,246,0.2)'">
                    <p class="font-display text-3xl font-bold text-violet-600 mb-1">{{ $totalCount }}</p>
                    <p class="text-xs font-bold text-gray-600 uppercase tracking-wider">Total</p>
                </div>
                <div style="background:#fff; border:2px solid rgba(202,138,4,0.3); border-radius:16px; padding:20px; text-align:center; box-shadow:0 4px 12px -4px rgba(202,138,4,0.2); transition:all 0.3s cubic-bezier(0.16,1,0.3,1);" onmouseenter="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px -8px rgba(202,138,4,0.3)'" onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 12px -4px rgba(202,138,4,0.2)'">
                    <p class="font-display text-3xl font-bold text-yellow-600 mb-1">{{ $pendingCount }}</p>
                    <p class="text-xs font-bold text-gray-600 uppercase tracking-wider">Pending</p>
                </div>
                <div style="background:#fff; border:2px solid rgba(16,185,129,0.3); border-radius:16px; padding:20px; text-align:center; box-shadow:0 4px 12px -4px rgba(16,185,129,0.2); transition:all 0.3s cubic-bezier(0.16,1,0.3,1);" onmouseenter="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px -8px rgba(16,185,129,0.3)'" onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 12px -4px rgba(16,185,129,0.2)'">
                    <p class="font-display text-3xl font-bold text-green-600 mb-1">{{ $confirmedCount }}</p>
                    <p class="text-xs font-bold text-gray-600 uppercase tracking-wider">Confirmed</p>
                </div>
                <div style="background:#fff; border:2px solid rgba(220,38,38,0.3); border-radius:16px; padding:20px; text-align:center; box-shadow:0 4px 12px -4px rgba(220,38,38,0.2); transition:all 0.3s cubic-bezier(0.16,1,0.3,1);" onmouseenter="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px -8px rgba(220,38,38,0.3)'" onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 12px -4px rgba(220,38,38,0.2)'">
                    <p class="font-display text-3xl font-bold text-red-600 mb-1">{{ $cancelledCount }}</p>
                    <p class="text-xs font-bold text-gray-600 uppercase tracking-wider">Cancelled</p>
                </div>
            </div>

            <!-- Table Card -->
            <div class="premium-card animate-scale-in" style="animation-delay: 0.1s;">
                <!-- Table Header Bar -->
                <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                                <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-display text-lg font-bold text-gray-900">All Appointments</h3>
                                <p class="text-xs font-medium text-gray-500 mt-0.5">{{ $appointments->total() }} total record{{ $appointments->total() != 1 ? 's' : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scrollable Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="table-head-cell">Service</th>
                                <th class="table-head-cell">Staff</th>
                                <th class="table-head-cell">Date & Time</th>
                                <th class="table-head-cell">Status</th>
                                <th class="table-head-cell" style="text-align:right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $idx => $appointment)
                                @php
                                    $status = $appointment->status;
                                    $totalDuration = $appointment->services && $appointment->services->count() > 0 
                                        ? $appointment->services->sum('duration') 
                                        : 0;
                                    $totalPrice = $appointment->services && $appointment->services->count() > 0 
                                        ? $appointment->services->sum('price') 
                                        : 0;
                                    $hours = floor($totalDuration / 60);
                                    $minutes = $totalDuration % 60;
                                    $durationText = $hours > 0 ? "{$hours}h " . ($minutes > 0 ? "{$minutes}m" : "") : "{$minutes}m";
                                @endphp
                                <tr class="table-row row-stagger" style="animation-delay: {{ $idx * 0.05 }}s;">
                                    <div class="row-accent"></div>
                                    
                                    <!-- Service Cell -->
                                    <td class="table-cell">
                                        @if($appointment->services && $appointment->services->count() > 1)
                                            <div class="font-display font-bold text-gray-900 mb-2" style="font-size:14px;">
                                                {{ $appointment->services->count() }} Services
                                            </div>
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($appointment->services as $service)
                                                    <span class="px-2 py-0.5 bg-violet-100 text-violet-700 text-xs font-semibold rounded-md">
                                                        {{ $service->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @elseif($appointment->services && $appointment->services->count() === 1)
                                            <div class="font-display font-bold text-gray-900" style="font-size:14px;">
                                                {{ $appointment->services->first()->name }}
                                            </div>
                                        @elseif($appointment->service)
                                            <div class="font-display font-bold text-gray-900" style="font-size:14px;">
                                                {{ $appointment->service->name }}
                                            </div>
                                        @else
                                            <div class="font-display font-bold text-gray-500" style="font-size:14px;">
                                                No service assigned
                                            </div>
                                        @endif
                                        
                                        @if($totalDuration > 0 || $totalPrice > 0)
                                            <div class="flex items-center gap-2 mt-2">
                                                @if($totalDuration > 0)
                                                    <span class="text-xs font-semibold text-gray-500">{{ $durationText }}</span>
                                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                                @endif
                                                @if($totalPrice > 0)
                                                    <span class="text-xs font-bold text-violet-600">₱{{ number_format($totalPrice, 2) }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <!-- Staff Cell -->
                                    <td class="table-cell">
                                        @if($appointment->staff && $appointment->staff->user)
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-violet-100 to-fuchsia-100 flex items-center justify-center">
                                                    <span class="text-sm font-bold text-violet-600">{{ strtoupper(substr($appointment->staff->user->name, 0, 2)) }}</span>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-bold text-gray-900">{{ $appointment->staff->user->name }}</div>
                                                    @if($appointment->staff->specialization)
                                                        <div class="text-xs font-medium text-gray-500">{{ $appointment->staff->specialization }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-sm font-medium text-gray-500">Staff not assigned</div>
                                        @endif
                                    </td>
                                    
                                    <!-- Date & Time Cell -->
                                    <td class="table-cell">
                                        <div class="text-sm font-bold text-gray-900">{{ $appointment->formatted_date }}</div>
                                        <div class="text-xs font-semibold text-gray-500 mt-0.5 flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $appointment->formatted_time }}
                                        </div>
                                    </td>
                                    
                                    <!-- Status Cell -->
                                    <td class="table-cell">
                                        <span class="status-badge status-{{ $status }}">
                                            <span class="w-1.5 h-1.5 rounded-full pulse-{{ $status }} animate-pulse"></span>
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    
                                    <!-- Actions Cell -->
                                    <td class="table-cell" style="text-align:right;">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('customer.appointments.show', $appointment) }}" class="btn-view">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a>
                                            @if($appointment->canBeCancelled())
                                                <form action="{{ route('customer.appointments.cancel', $appointment) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                                    @csrf
                                                    <button type="submit" class="btn-cancel">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                        Cancel
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($appointments->hasPages())
                    <div class="pagination-wrap border-t border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5 flex items-center justify-center">
                        {{ $appointments->links() }}
                    </div>
                @endif
            </div>

        @else
            <!-- Empty State -->
            <div class="premium-card animate-scale-in py-24 px-8 text-center">
                <div class="empty-icon-wrap">
                    <svg class="w-12 h-12 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-display text-2xl font-bold text-gray-900 mb-2">No Appointments Yet</h3>
                <p class="text-gray-500 font-medium max-w-md mx-auto mb-8">Get started by booking your first appointment with one of our professionals.</p>
                <a href="{{ route('customer.appointments.create') }}" class="group relative overflow-hidden inline-flex px-8 py-3.5 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Book Your First Appointment
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        @endif
    </div>
</x-app-layout>