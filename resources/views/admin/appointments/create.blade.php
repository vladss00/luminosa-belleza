<x-app-layout>

    <style>
        /* FORCE HIDE the Tailwind Forms plugin arrow.
           The plugin uses a background-image for the arrow, 
           which stays even with appearance-none.
        */
        #appointmentForm select {
            background-image: none !important;
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
        }
    </style>
    <x-slot name="header">
        <div class="py-2">
            <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                   Create New Appointment
            </h2>
            <p class="text-sm text-gray-500 mt-1 font-medium">Schedule a premium service experience for your customers</p>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="relative rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
            <!-- Decorative gradient background -->
            <div class="absolute inset-0 bg-gradient-to-br from-violet-50/50 via-fuchsia-50/30 to-purple-50/50 pointer-events-none"></div>
            
            <div class="relative p-8 lg:p-10">
                <form id="appointmentForm" method="POST" action="{{ route('admin.appointments.store') }}">
                    @csrf

                    <!-- Customer Selection -->
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
    <select name="customer_id" id="customerId" 
            class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none" 
            required>
        <option value="">Select a customer...</option>
        </select>
    
    <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none">
        <svg class="w-5 h-5 text-violet-500 group-hover:text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
</div>
                        @error('customer_id')
                            <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Service Selection -->
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
                            <select name="service_id" id="serviceId" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" style="-webkit-appearance: none; -moz-appearance: none;" required>
                                <option value="">Select a service...</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" 
                                            data-duration="{{ $service->duration }}" 
                                            data-price="{{ $service->price }}"
                                            {{ old('service_id') == $service->id ? 'selected' : '' }}>
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
                        @error('service_id')
                            <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Staff Selection -->
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
                            <select name="staff_id" id="staffId" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" style="-webkit-appearance: none; -moz-appearance: none;" required>
                                <option value="">Select staff member...</option>
                                @foreach($staff as $member)
                                    <option value="{{ $member->id }}" {{ old('staff_id') == $member->id ? 'selected' : '' }}>
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
                        @error('staff_id')
                            <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Date and Time Grid -->
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <!-- Date Selection -->
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
                                <input type="date" name="appointment_date" id="appointmentDate" 
                                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 hover:border-violet-300 hover:shadow-md"
                                       min="{{ date('Y-m-d') }}" 
                                       value="{{ old('appointment_date') }}" required>
                            </div>
                            @error('appointment_date')
                                <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Time Selection -->
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
                                <select name="time_slot" id="timeSlot" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" style="-webkit-appearance: none; -moz-appearance: none;" required>
                                    <option value="">Select time...</option>
                                    <option value="09:00">09:00 AM</option>
                                    <option value="09:30">09:30 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="10:30">10:30 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="11:30">11:30 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="12:30">12:30 PM</option>
                                    <option value="13:00">01:00 PM</option>
                                    <option value="13:30">01:30 PM</option>
                                    <option value="14:00">02:00 PM</option>
                                    <option value="14:30">02:30 PM</option>
                                    <option value="15:00">03:00 PM</option>
                                    <option value="15:30">03:30 PM</option>
                                    <option value="16:00">04:00 PM</option>
                                    <option value="16:30">04:30 PM</option>
                                    <option value="17:00">05:00 PM</option>
                                    <option value="17:30">05:30 PM</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none">
                                    <svg class="w-5 h-5 text-violet-500 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('time_slot')
                                <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
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
                            Status *
                        </label>
                        <div class="relative group">
                            <select name="status" class="w-full px-5 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 transition-all duration-300 bg-white font-semibold text-gray-900 appearance-none hover:border-violet-300 hover:shadow-md" style="-webkit-appearance: none; -moz-appearance: none;" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="confirmed" {{ old('status', 'confirmed') == 'confirmed' ? 'selected' : '' }}>✓ Confirmed</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-5 pointer-events-none">
                                <svg class="w-5 h-5 text-violet-500 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
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
                                  placeholder="Any special requests, allergies, or important notes for this appointment...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="text-red-600 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Appointment Summary -->
                    <div id="appointmentSummary" class="mb-8 rounded-2xl bg-gradient-to-br from-violet-50 via-fuchsia-50 to-purple-50 border-2 border-violet-200 shadow-lg shadow-violet-500/20 overflow-hidden transition-all duration-500 transform" style="display: none;">
                        <div class="p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl flex items-center justify-center shadow-lg shadow-violet-500/30">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-xl">Appointment Summary</h4>
                                    <p class="text-sm text-violet-600 font-medium">Review your booking details</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-3 gap-4">
                                <div class="bg-white rounded-xl p-5 shadow-md border border-violet-100">
                                    <p class="text-gray-500 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        Customer
                                    </p>
                                    <p id="summaryCustomer" class="text-gray-900 font-bold text-sm">-</p>
                                </div>
                                <div class="bg-white rounded-xl p-5 shadow-md border border-violet-100">
                                    <p class="text-gray-500 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                                        </svg>
                                        Service
                                    </p>
                                    <p id="summaryService" class="text-gray-900 font-bold text-sm">-</p>
                                </div>
                                <div class="bg-white rounded-xl p-5 shadow-md border border-violet-100">
                                    <p class="text-gray-500 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                        </svg>
                                        Staff
                                    </p>
                                    <p id="summaryStaff" class="text-gray-900 font-bold text-sm">-</p>
                                </div>
                                <div class="bg-white rounded-xl p-5 shadow-md border border-violet-100">
                                    <p class="text-gray-500 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        Date & Time
                                    </p>
                                    <p id="summaryDateTime" class="text-gray-900 font-bold text-sm">-</p>
                                </div>
                                <div class="bg-white rounded-xl p-5 shadow-md border border-violet-100">
                                    <p class="text-gray-500 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        Duration
                                    </p>
                                    <p id="summaryDuration" class="text-gray-900 font-bold text-sm">-</p>
                                </div>
                                <div class="bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-xl p-5 shadow-lg shadow-violet-500/30">
                                    <p class="text-violet-100 text-xs font-bold uppercase mb-2 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                        </svg>
                                        Total Price
                                    </p>
                                    <p id="summaryPrice" class="text-white font-bold text-2xl">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 border-t-2 border-gray-100">
                        <a href="{{ route('admin.appointments.index') }}" class="group text-gray-600 hover:text-gray-900 font-bold flex items-center transition-all">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Appointments
                        </a>
                        <button type="submit" class="group px-8 py-4 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Create Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('appointmentForm');
            const summary = document.getElementById('appointmentSummary');
            
            form.addEventListener('change', updateSummary);
            
            function updateSummary() {
                const customerId = document.getElementById('customerId');
                const serviceId = document.getElementById('serviceId');
                const staffId = document.getElementById('staffId');
                const appointmentDate = document.getElementById('appointmentDate');
                const timeSlot = document.getElementById('timeSlot');
                
                if (customerId.value && serviceId.value && staffId.value && appointmentDate.value && timeSlot.value) {
                    summary.style.display = 'block';
                    summary.style.opacity = '0';
                    summary.style.transform = 'translateY(10px)';
                    
                    setTimeout(() => {
                        summary.style.transition = 'all 0.5s ease';
                        summary.style.opacity = '1';
                        summary.style.transform = 'translateY(0)';
                    }, 10);
                    
                    // Extract customer name (remove email)
                    const customerText = customerId.options[customerId.selectedIndex].text;
                    const customerName = customerText.split('•')[0].trim();
                    document.getElementById('summaryCustomer').textContent = customerName;
                    
                    // Extract service name (remove price and duration)
                    const serviceText = serviceId.options[serviceId.selectedIndex].text;
                    const serviceName = serviceText.split('•')[0].trim();
                    document.getElementById('summaryService').textContent = serviceName;
                    
                    // Extract staff name (remove specialization)
                    const staffText = staffId.options[staffId.selectedIndex].text;
                    const staffName = staffText.split('•')[0].trim();
                    document.getElementById('summaryStaff').textContent = staffName;
                    
                    const date = new Date(appointmentDate.value);
                    const dateStr = date.toLocaleDateString('en-US', { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' });
                    const timeStr = timeSlot.options[timeSlot.selectedIndex].text;
                    document.getElementById('summaryDateTime').textContent = dateStr + ' at ' + timeStr;
                    
                    const selectedService = serviceId.options[serviceId.selectedIndex];
                    document.getElementById('summaryDuration').textContent = selectedService.dataset.duration + ' min';
                    document.getElementById('summaryPrice').textContent = '₱' + parseFloat(selectedService.dataset.price).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                } else {
                    summary.style.display = 'none';
                }
            }
        });
    </script>
    @endpush
</x-app-layout>