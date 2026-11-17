<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-2">
            <div>
                <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                   Appointment #{{ $appointment->id }}
                </h2>
                <p class="text-sm text-gray-500 mt-1 font-medium">Complete appointment details and management</p>
            </div>
            <a href="{{ route('admin.appointments.edit', $appointment) }}" class="group px-6 py-3 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2">
                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Appointment
            </a>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Main Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Status Card -->
                <div class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
                    <!-- Header with gradient -->
                    <div class="relative bg-gradient-to-br from-violet-600 via-fuchsia-600 to-purple-600 px-8 py-10 text-white overflow-hidden">
                        <!-- Decorative elements -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-24 -translate-x-24"></div>
                        
                        <div class="relative flex justify-between items-start">
                            <div>
                                @if($appointment->services && $appointment->services->count() > 1)
    <h3 class="text-3xl font-bold mb-2">{{ $appointment->services->count() }} Services</h3>
@elseif($appointment->services && $appointment->services->count() === 1)
    <h3 class="text-3xl font-bold mb-2">{{ $appointment->services->first()->name }}</h3>
@elseif($appointment->service)
    <h3 class="text-3xl font-bold mb-2">{{ $appointment->service->name }}</h3>
@else
    <h3 class="text-3xl font-bold mb-2">Appointment</h3>
@endif<p class="text-violet-100 text-base">Appointment #{{ $appointment->id }}</p>
                            </div>
                            @php
                                $statusConfig = [
                                    'pending' => ['bg' => 'bg-amber-500/20', 'text' => 'text-white', 'border' => 'border-amber-300/30'],
                                    'confirmed' => ['bg' => 'bg-blue-500/20', 'text' => 'text-white', 'border' => 'border-blue-300/30'],
                                    'in_progress' => ['bg' => 'bg-violet-500/20', 'text' => 'text-white', 'border' => 'border-violet-300/30'],
                                    'completed' => ['bg' => 'bg-emerald-500/20', 'text' => 'text-white', 'border' => 'border-emerald-300/30'],
                                    'cancelled' => ['bg' => 'bg-red-500/20', 'text' => 'text-white', 'border' => 'border-red-300/30']
                                ];
                                $config = $statusConfig[$appointment->status] ?? ['bg' => 'bg-gray-500/20', 'text' => 'text-white', 'border' => 'border-gray-300/30'];
                            @endphp
                            <span class="px-4 py-2 {{ $config['bg'] }} backdrop-blur-sm {{ $config['text'] }} rounded-xl text-sm font-bold border-2 {{ $config['border'] }} shadow-lg">
                                {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8">
                        <!-- Quick Actions -->
                        <div class="mb-8 pb-8 border-b-2 border-gray-100">
                            <h4 class="flex items-center gap-3 font-bold text-gray-900 mb-5 text-lg">
                                <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-xl flex items-center justify-center shadow-lg shadow-violet-500/30">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                Quick Actions
                            </h4>
                            <form action="{{ route('admin.appointments.status', $appointment) }}" method="POST" class="flex flex-wrap gap-3">
                                @csrf
                                @if($appointment->status === 'pending')
                                    <button type="submit" name="status" value="confirmed" class="px-6 py-3 bg-blue-500 text-white rounded-xl hover:bg-blue-600 text-sm font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                        ✓ Confirm Appointment
                                    </button>
                                @endif
                                @if($appointment->status === 'confirmed')
                                    <button type="submit" name="status" value="in_progress" class="px-6 py-3 bg-violet-500 text-white rounded-xl hover:bg-violet-600 text-sm font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                        ▶ Start Service
                                    </button>
                                @endif
                                @if($appointment->status === 'in_progress')
                                    <button type="submit" name="status" value="completed" class="px-6 py-3 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 text-sm font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                        ✓ Mark Complete
                                    </button>
                                @endif
                                @if(in_array($appointment->status, ['pending', 'confirmed']))
                                    <button type="submit" name="status" value="cancelled" class="px-6 py-3 bg-red-500 text-white rounded-xl hover:bg-red-600 text-sm font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5" 
                                            onclick="return confirm('Are you sure you want to cancel this appointment?')">
                                        ✕ Cancel Appointment
                                    </button>
                                @endif
                            </form>
                        </div>

                        <!-- Date & Time -->
                        <div class="mb-8 pb-8 border-b-2 border-gray-100">
                            <h4 class="font-bold text-gray-900 mb-5 text-lg">Date & Time</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="flex items-center p-5 bg-gradient-to-br from-violet-50 to-fuchsia-50 rounded-xl border-2 border-violet-100 shadow-md">
                                    <div class="w-14 h-14 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-xl flex items-center justify-center mr-4 shadow-lg shadow-violet-500/30">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-900 block text-lg mb-1">{{ $appointment->formatted_date }}</span>
                                        <p class="text-sm text-violet-600 font-medium">{{ $appointment->appointment_date->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-5 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border-2 border-gray-200 shadow-md">
                                    <div class="w-14 h-14 bg-gradient-to-br from-gray-600 to-gray-700 rounded-xl flex items-center justify-center mr-4 shadow-lg shadow-gray-500/30">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-900 block text-lg mb-1">{{ $appointment->formatted_time }}</span>
                                        <p class="text-sm text-gray-600 font-medium">Duration: {{ $appointment->service->formatted_duration }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Service Details -->
<div class="mb-8 pb-8 border-b-2 border-gray-100">
    <h4 class="font-bold text-gray-900 mb-5 text-lg">Service Details</h4>
    <div class="bg-gradient-to-br from-violet-50 via-fuchsia-50 to-purple-50 rounded-2xl p-6 border-2 border-violet-200 shadow-lg shadow-violet-500/10">
        @if($appointment->services && $appointment->services->count() > 1)
            <!-- Multiple Services -->
            <div class="flex justify-between items-start mb-4">
                <div class="flex-1">
                    <p class="font-bold text-gray-900 text-xl mb-3">{{ $appointment->services->count() }} Services</p>
                    <div class="space-y-4 mb-4">
                        @foreach($appointment->services as $service)
                            <div class="flex items-start gap-3 p-4 bg-white rounded-xl border border-violet-200">
                                <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 mb-1">{{ $service->name }}</p>
                                    @if($service->description)
                                        <p class="text-sm text-gray-600 font-medium mb-2">{{ $service->description }}</p>
                                    @endif
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-bold text-violet-600">{{ $service->formatted_price }}</span>
                                        <span class="text-sm text-gray-500">{{ $service->formatted_duration }}</span>
                                        <span class="inline-flex items-center px-2 py-0.5 bg-violet-100 rounded-lg text-xs font-bold text-violet-700 capitalize">
                                            {{ $service->category }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @php
                    $totalPrice = $appointment->services->sum('price');
                    $totalDuration = $appointment->services->sum('duration');
                @endphp
                <div class="ml-4 text-right">
                    <p class="text-xs text-gray-500 mb-1">Total</p>
                    <span class="font-bold bg-gradient-to-r from-violet-600 to-fuchsia-600 bg-clip-text text-transparent text-3xl block">
                        ₱{{ number_format($totalPrice, 2) }}
                    </span>
                    <p class="text-sm text-gray-600 mt-2">{{ floor($totalDuration / 60) }}h {{ $totalDuration % 60 }}m</p>
                </div>
            </div>
        @elseif($appointment->services && $appointment->services->count() === 1)
            <!-- Single Service from services relationship -->
            @php $service = $appointment->services->first(); @endphp
            <div class="flex justify-between items-start mb-4">
                <div class="flex-1">
                    <p class="font-bold text-gray-900 text-xl mb-3">{{ $service->name }}</p>
                    <p class="text-sm text-gray-600 font-medium leading-relaxed mb-3">{{ $service->description }}</p>
                    <span class="inline-flex items-center px-3 py-1.5 bg-white rounded-lg text-xs font-bold text-gray-700 shadow-sm border border-violet-100 capitalize">
                        {{ $service->category }}
                    </span>
                </div>
                <span class="font-bold bg-gradient-to-r from-violet-600 to-fuchsia-600 bg-clip-text text-transparent text-3xl ml-4">
                    {{ $service->formatted_price }}
                </span>
            </div>
        @elseif($appointment->service)
            <!-- Single Service from service relationship (backward compatibility) -->
            <div class="flex justify-between items-start mb-4">
                <div class="flex-1">
                    <p class="font-bold text-gray-900 text-xl mb-3">{{ $appointment->service->name }}</p>
                    <p class="text-sm text-gray-600 font-medium leading-relaxed mb-3">{{ $appointment->service->description }}</p>
                    <span class="inline-flex items-center px-3 py-1.5 bg-white rounded-lg text-xs font-bold text-gray-700 shadow-sm border border-violet-100 capitalize">
                        {{ $appointment->service->category }}
                    </span>
                </div>
                <span class="font-bold bg-gradient-to-r from-violet-600 to-fuchsia-600 bg-clip-text text-transparent text-3xl ml-4">
                    {{ $appointment->service->formatted_price }}
                </span>
            </div>
        @else
            <p class="text-gray-500 italic">No service assigned</p>
        @endif
    </div>
</div>
                        <!-- Notes -->
                        @if($appointment->notes)
                            <div class="mb-8 pb-8 border-b-2 border-gray-100">
                                <h4 class="font-bold text-gray-900 mb-4 text-lg">Additional Notes</h4>
                                <div class="bg-gradient-to-r from-amber-50 to-yellow-50 rounded-xl p-5 border-l-4 border-amber-500 shadow-md">
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                        </svg>
                                        <p class="text-gray-700 font-medium leading-relaxed">{{ $appointment->notes }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Metadata -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border-2 border-gray-200 shadow-md">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-4 h-4 text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="font-bold text-gray-700 text-sm uppercase tracking-wide">Created</p>
                                    </div>
                                    <p class="font-bold text-gray-900">{{ $appointment->created_at->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ $appointment->created_at->format('h:i A') }}</p>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-4 h-4 text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="font-bold text-gray-700 text-sm uppercase tracking-wide">Last Updated</p>
                                    </div>
                                    <p class="font-bold text-gray-900">{{ $appointment->updated_at->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ $appointment->updated_at->format('h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Customer Card -->
                <div class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 p-6">
                    <h4 class="font-bold text-gray-900 mb-5 text-lg">Customer</h4>
                    <div class="flex items-center mb-5">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-violet-500 to-fuchsia-500 flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-violet-500/30">
                            {{ $appointment->customer->initials }}
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-gray-900 mb-1">{{ $appointment->customer->name }}</p>
                            <p class="text-sm text-gray-500 font-medium">Customer</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-600 p-4 bg-gray-50 rounded-xl border border-gray-200">
                            <svg class="w-5 h-5 mr-3 text-violet-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-medium text-sm break-all">{{ $appointment->customer->email }}</span>
                        </div>
                        @if($appointment->customer->phone)
                            <div class="flex items-center text-gray-600 p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <svg class="w-5 h-5 mr-3 text-violet-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="font-medium text-sm">{{ $appointment->customer->phone }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Staff Card -->
                <div class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 p-6">
                    <h4 class="font-bold text-gray-900 mb-5 text-lg">Assigned Staff</h4>
                    <div class="flex items-center mb-5">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-gray-600 to-gray-700 flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-gray-500/30">
                            {{ $appointment->staff->user->initials }}
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-gray-900 mb-1">{{ $appointment->staff->user->name }}</p>
                            <p class="text-sm text-violet-600 font-medium italic">{{ $appointment->staff->specialization }}</p>
                        </div>
                    </div>
                    @if($appointment->staff->bio)
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                            <p class="text-sm text-gray-600 font-medium leading-relaxed">{{ $appointment->staff->bio }}</p>
                        </div>
                    @endif
                </div>

                <!-- Actions Card -->
                <div class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 p-6">
                    <h4 class="font-bold text-gray-900 mb-5 text-lg">Actions</h4>
                    <div class="space-y-3">
                        <a href="{{ route('admin.appointments.edit', $appointment) }}" class="block w-full text-center px-5 py-3 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl hover:from-violet-700 hover:to-fuchsia-700 transition-all font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 hover:-translate-y-0.5">
                            Edit Appointment
                        </a>
                        <a href="{{ route('admin.appointments.index') }}" class="block w-full text-center px-5 py-3 border-2 border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all font-bold text-gray-700">
                            Back to List
                        </a>
                        <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block w-full text-center px-5 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all font-bold shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                Delete Appointment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>