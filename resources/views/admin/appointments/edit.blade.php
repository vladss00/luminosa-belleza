<x-app-layout>
    <style>
        /* FORCE HIDE the Tailwind Forms plugin arrow on all selects within the form */
        #appointmentEditForm select {
            background-image: none !important;
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
        }
    </style>
    
    <x-slot name="header">
        <div class="py-2">
           <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                    Edit Appointment #{{ $appointment->id }}
            </h2>
            <p class="text-sm text-gray-500 mt-1 font-medium">Update appointment details and manage booking information</p>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="relative mb-8 rounded-2xl bg-gradient-to-br from-violet-600 via-fuchsia-600 to-purple-600 shadow-2xl shadow-violet-500/30 overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-24 -translate-x-24"></div>
            
            <div class="relative p-8">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl mb-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            <span class="text-white font-bold text-sm">Editing Mode</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Current Appointment Details</h3>
                        <p class="text-violet-100 text-sm">Review the existing information before making changes</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="px-5 py-3 bg-white rounded-xl shadow-lg">
                            <p class="text-xs text-gray-500 font-bold uppercase mb-1">Appointment ID</p>
                            <p class="text-2xl font-bold bg-gradient-to-r from-violet-600 to-fuchsia-600 bg-clip-text text-transparent">#{{ $appointment->id }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-4 gap-4">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                        <p class="text-violet-200 text-xs font-bold uppercase mb-2">Customer</p>
                        <p class="text-white font-bold">{{ $appointment->customer->name }}</p>
                        <p class="text-violet-100 text-sm mt-1 truncate">{{ $appointment->customer->email }}</p>
                    </div><div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
    <p class="text-violet-200 text-xs font-bold uppercase mb-2">Service(s)</p>
    @if($appointment->services && $appointment->services->count() > 1)
        <p class="text-white font-bold mb-2">{{ $appointment->services->count() }} Services</p>
        <div class="flex flex-wrap gap-1">
            @foreach($appointment->services as $service)
                <span class="px-2 py-0.5 bg-white/20 text-white text-xs font-semibold rounded-lg">
                    {{ $service->name }}
                </span>
            @endforeach
        </div>
        @php
            $totalPrice = $appointment->services->sum('price');
        @endphp
        <p class="text-violet-100 text-sm mt-2">₱{{ number_format($totalPrice, 2) }}</p>
    @elseif($appointment->services && $appointment->services->count() === 1)
        <p class="text-white font-bold">{{ $appointment->services->first()->name }}</p>
        <p class="text-violet-100 text-sm mt-1">{{ $appointment->services->first()->formatted_price }}</p>
    @elseif($appointment->service)
        <p class="text-white font-bold">{{ $appointment->service->name }}</p>
        <p class="text-violet-100 text-sm mt-1">{{ $appointment->service->formatted_price }}</p>
    @else
        <p class="text-white font-bold">No service assigned</p>
    @endif
</div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                        <p class="text-violet-200 text-xs font-bold uppercase mb-2">Date & Time</p>
                        <p class="text-white font-bold">{{ $appointment->formatted_date }}</p>
                        <p class="text-violet-100 text-sm mt-1">{{ $appointment->formatted_time }}</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                        <p class="text-violet-200 text-xs font-bold uppercase mb-2">Staff Member</p>
                        <p class="text-white font-bold">{{ $appointment->staff->user->name }}</p>
                        <p class="text-violet-100 text-sm mt-1">{{ $appointment->staff->specialization }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-violet-50/50 via-fuchsia-50/30 to-purple-50/50 pointer-events-none"></div>
            
            <div class="relative p-8 lg:p-10">
                <form id="appointmentEditForm" method="POST" action="{{ route('admin.appointments.update', $appointment) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-8">
                        <label class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                            <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            Customer *
                        </label>
                        <div class="relative group">
                            <select name="customer_id" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $appointment->customer_id) == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }} • {{ $customer->email }}
                                        @if($customer->id == $appointment->customer_id) (Current) @endif
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none">
                                <svg class="w-5 h-5 text-violet-500 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                            <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Service *
                        </label>
                        <div class="relative group">
                            <select name="service_id" id="serviceSelect" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" required>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" 
                                            data-duration="{{ $service->duration }}"
                                            data-price="{{ $service->price }}"
                                            {{ old('service_id', $appointment->service_id) == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }} • {{ $service->formatted_price }} • {{ $service->formatted_duration }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none">
                                <svg class="w-5 h-5 text-violet-500 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                            <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            Staff Member *
                        </label>
                        <div class="relative group">
                            <select name="staff_id" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" required>
                                @foreach($staff as $member)
                                    <option value="{{ $member->id }}" {{ old('staff_id', $appointment->staff_id) == $member->id ? 'selected' : '' }}>
                                        {{ $member->user->name }} • {{ $member->specialization }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none">
                                <svg class="w-5 h-5 text-violet-500 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                Appointment Date *
                            </label>
                            <div class="relative group">
                                <input type="date" name="appointment_date" 
                                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-violet-300 hover:shadow-md"
                                       value="{{ old('appointment_date', $appointment->appointment_date->format('Y-m-d')) }}" required>
                            </div>
                        </div>

                        <div>
                            <label class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                Time Slot *
                            </label>
                            <div class="relative group">
                                <select name="time_slot" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" required>
                                    @php
                                        $currentTime = old('time_slot', $appointment->appointment_date->format('H:i'));
                                        $slots = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'];
                                    @endphp
                                    @foreach($slots as $slot)
                                        <option value="{{ $slot }}" {{ $currentTime == $slot ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::parse($slot)->format('h:i A') }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none">
                                    <svg class="w-5 h-5 text-violet-500 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Selection -->
                    <div class="mb-8">
                        <label class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                            <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Appointment Status *
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="status" value="pending" 
                                       {{ old('status', $appointment->status) == 'pending' ? 'checked' : '' }}
                                       class="peer sr-only" required>
                                <div class="px-4 py-4 border-2 border-gray-200 rounded-xl text-center transition-all duration-300 peer-checked:border-amber-500 peer-checked:bg-amber-50 peer-checked:shadow-lg peer-checked:shadow-amber-500/20 hover:border-amber-300 hover:bg-amber-50/50">
                                    <div class="text-2xl mb-1">⏳</div>
                                    <span class="text-sm font-bold text-gray-900">Pending</span>
                                </div>
                            </label>
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="status" value="confirmed" 
                                       {{ old('status', $appointment->status) == 'confirmed' ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="px-4 py-4 border-2 border-gray-200 rounded-xl text-center transition-all duration-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:shadow-lg peer-checked:shadow-blue-500/20 hover:border-blue-300 hover:bg-blue-50/50">
                                    <div class="text-2xl mb-1">✓</div>
                                    <span class="text-sm font-bold text-gray-900">Confirmed</span>
                                </div>
                            </label>
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="status" value="in_progress" 
                                       {{ old('status', $appointment->status) == 'in_progress' ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="px-4 py-4 border-2 border-gray-200 rounded-xl text-center transition-all duration-300 peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:shadow-lg peer-checked:shadow-violet-500/20 hover:border-violet-300 hover:bg-violet-50/50">
                                    <div class="text-2xl mb-1">🔄</div>
                                    <span class="text-sm font-bold text-gray-900">In Progress</span>
                                </div>
                            </label>
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="status" value="completed" 
                                       {{ old('status', $appointment->status) == 'completed' ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="px-4 py-4 border-2 border-gray-200 rounded-xl text-center transition-all duration-300 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:shadow-lg peer-checked:shadow-emerald-500/20 hover:border-emerald-300 hover:bg-emerald-50/50">
                                    <div class="text-2xl mb-1">✓</div>
                                    <span class="text-sm font-bold text-gray-900">Completed</span>
                                </div>
                            </label>
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="status" value="cancelled" 
                                       {{ old('status', $appointment->status) == 'cancelled' ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="px-4 py-4 border-2 border-gray-200 rounded-xl text-center transition-all duration-300 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:shadow-lg peer-checked:shadow-red-500/20 hover:border-red-300 hover:bg-red-50/50">
                                    <div class="text-2xl mb-1">✕</div>
                                    <span class="text-sm font-bold text-gray-900">Cancelled</span>
                                </div>
                            </label>
                        </div>
                        @error('status')
                            <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="mb-8">
                        <label class="flex items-center gap-2 text-xs font-bold text-gray-700 mb-3 uppercase tracking-wider">
                            <div class="w-6 h-6 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            Notes (Optional)
                        </label>
                        <textarea name="notes" rows="4" 
                                  class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-medium text-gray-900 resize-none hover:border-violet-300 hover:shadow-md"
                                  placeholder="Any special requests, allergies, or important notes for this appointment...">{{ old('notes', $appointment->notes) }}</textarea>
                        @error('notes')
                            <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Appointment History -->
                    <div class="mb-8 rounded-2xl bg-gradient-to-br from-blue-50 via-indigo-50 to-violet-50 border-2 border-blue-200 shadow-lg shadow-blue-500/10 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Appointment History</h4>
                                    <p class="text-sm text-blue-600 font-medium">Track changes and timestamps</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white rounded-xl p-4 shadow-md border border-blue-100">
                                    <p class="text-gray-500 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        Created
                                    </p>
                                    <p class="text-gray-900 font-bold">{{ $appointment->created_at->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ $appointment->created_at->format('h:i A') }}</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-md border border-blue-100">
                                    <p class="text-gray-500 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                        </svg>
                                        Last Updated
                                    </p>
                                    <p class="text-gray-900 font-bold">{{ $appointment->updated_at->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ $appointment->updated_at->format('h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 border-t-2 border-gray-100">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.appointments.index') }}" class="group text-gray-600 hover:text-gray-900 font-bold flex items-center transition-all">
                                <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Back to List
                            </a>
                            <a href="{{ route('admin.appointments.show', $appointment) }}" class="group text-indigo-600 hover:text-indigo-800 font-bold flex items-center transition-all">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Details
                            </a>
                        </div>
                        <button type="submit" class="group px-8 py-4 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Warning Notice -->
        <div class="mt-6 rounded-2xl bg-gradient-to-r from-amber-50 to-yellow-50 border-2 border-amber-200 shadow-lg shadow-amber-500/10 overflow-hidden">
            <div class="p-6 flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-amber-500 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-amber-900 mb-2 text-lg">Important Notice</h4>
                    <p class="text-amber-800 text-sm leading-relaxed">
                        Changing the date, time, or staff member may create scheduling conflicts. The system will check for conflicts when you submit the update.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>