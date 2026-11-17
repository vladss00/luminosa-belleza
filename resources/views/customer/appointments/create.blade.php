<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                    <div class="relative w-12 h-12 bg-gradient-to-br from-violet-600 via-fuchsia-600 to-purple-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600 tracking-tight">
                        Book New Appointment
                    </h2>
                    <p class="text-sm font-medium text-gray-500 mt-0.5">Schedule your next visit in 4 easy steps</p>
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
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes scale-in {
            from { opacity: 0; transform: scale(0.96); }
            to   { opacity: 1; transform: scale(1); }
        }

        @keyframes pulse-ring {
            0%   { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        .animate-fade-in-up { animation: fade-in-up 0.7s cubic-bezier(0.16, 1, 0.3, 1); }
        .animate-scale-in   { animation: scale-in 0.7s cubic-bezier(0.16, 1, 0.3, 1); }

        .premium-card {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.06);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px -4px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.5);
            transition: all 0.4s cubic-bezier(0.16,1,0.3,1);
        }

        /* Progress Steps */
        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 40px;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .step-circle {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
        }

        .step-circle.inactive {
            background: #f3f4f6;
            color: #9ca3af;
            border: 2px solid #e5e7eb;
        }

        .step-circle.active {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white;
            border: 2px solid transparent;
            box-shadow: 0 8px 20px -6px rgba(139,92,246,0.4);
        }

        .step-circle.active::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 14px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            opacity: 0.3;
            animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .step-circle.completed {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: 2px solid transparent;
        }

        .step-divider {
            width: 40px;
            height: 2px;
            background: #e5e7eb;
            transition: background 0.3s ease;
        }

        .step-divider.completed {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .step-label {
            font-size: 12px;
            font-weight: 700;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .step-label.active { color: #7c3aed; }
        .step-label.completed { color: #10b981; }

        /* Section Styling */
        .wizard-section {
            margin-bottom: 32px;
            padding: 32px;
            border-radius: 16px;
            border: 2px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .wizard-section.active {
            border-color: rgba(139,92,246,0.2);
            background: linear-gradient(135deg, rgba(139,92,246,0.02), rgba(168,85,247,0.02));
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section-title {
            font-family: 'Sora', sans-serif;
            font-size: 17px;
            font-weight: 700;
            color: #111827;
        }

        /* Service/Staff Cards - Updated for checkboxes */
        .selection-card {
            position: relative;
            padding: 20px;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16,1,0.3,1);
        }

        .selection-card:hover {
            border-color: rgba(139,92,246,0.3);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px -6px rgba(139,92,246,0.15);
        }

        .selection-card.selected {
            border-color: #7c3aed;
            background: linear-gradient(135deg, rgba(139,92,246,0.05), rgba(168,85,247,0.03));
            box-shadow: 0 8px 20px -6px rgba(139,92,246,0.25);
        }

        .selection-card .checkbox-input,
        .selection-card .radio-input {
            position: absolute;
            opacity: 0;
        }

        .selection-card .check-indicator {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 24px;
            height: 24px;
            border-radius: 8px;
            border: 2px solid #d1d5db;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .selection-card.selected .check-indicator {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            border-color: #7c3aed;
        }

        .selection-card .check-icon {
            opacity: 0;
            color: white;
            width: 14px;
            height: 14px;
        }

        .selection-card.selected .check-icon {
            opacity: 1;
        }

        /* Summary Box */
        .summary-box {
            position: sticky;
            top: 20px;
            background: linear-gradient(135deg, #faf5ff, #f3e8ff);
            border: 2px solid #e9d5ff;
            border-radius: 16px;
            padding: 20px;
            margin-top: 24px;
        }

        .summary-title {
            font-family: 'Sora', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: #6b21a8;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e9d5ff;
        }

        .summary-item:last-child {
            border-bottom: none;
            padding-top: 16px;
            margin-top: 8px;
            border-top: 2px solid #e9d5ff;
        }

        .summary-label {
            font-size: 13px;
            color: #7e22ce;
            font-weight: 600;
        }

        .summary-value {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            color: #6b21a8;
        }

        .summary-value.total {
            font-size: 20px;
            color: #7c3aed;
        }

        /* Time Slots */
        .time-slot {
            padding: 14px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16,1,0.3,1);
            font-weight: 600;
            font-size: 14px;
            color: #374151;
        }

        .time-slot:hover {
            border-color: rgba(139,92,246,0.4);
            background: rgba(139,92,246,0.04);
        }

        .time-slot.selected {
            border-color: #7c3aed;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white;
            box-shadow: 0 6px 16px -4px rgba(139,92,246,0.4);
        }

        /* Date Input */
        .date-input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            color: #111827;
            transition: all 0.2s ease;
        }

        .date-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(139,92,246,0.1);
        }

        /* Notes Textarea */
        .notes-textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 14px;
            color: #374151;
            transition: all 0.2s ease;
            resize: vertical;
        }

        .notes-textarea:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(139,92,246,0.1);
        }

        .notes-textarea::placeholder {
            color: #9ca3af;
        }

        .service-count-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 24px;
            height: 24px;
            padding: 0 8px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
        }
    </style>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Progress Indicator -->
        <div class="progress-steps animate-fade-in-up mb-10">
            <div class="step-item">
                <div class="text-center">
                    <div class="step-circle active" id="step1-circle">1</div>
                    <p class="step-label active mt-2" id="step1-label">Services</p>
                </div>
            </div>
            <div class="step-divider" id="divider1"></div>
            <div class="step-item">
                <div class="text-center">
                    <div class="step-circle inactive" id="step2-circle">2</div>
                    <p class="step-label mt-2" id="step2-label">Stylist</p>
                </div>
            </div>
            <div class="step-divider" id="divider2"></div>
            <div class="step-item">
                <div class="text-center">
                    <div class="step-circle inactive" id="step3-circle">3</div>
                    <p class="step-label mt-2" id="step3-label">Date</p>
                </div>
            </div>
            <div class="step-divider" id="divider3"></div>
            <div class="step-item">
                <div class="text-center">
                    <div class="step-circle inactive" id="step4-circle">4</div>
                    <p class="step-label mt-2" id="step4-label">Time</p>
                </div>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="premium-card animate-scale-in" style="animation-delay: 0.1s;">
            <form id="appointmentForm" method="POST" action="{{ route('customer.appointments.store') }}" class="p-8">
                @csrf

                <!-- Step 1: Select Services (Multiple) -->
                <div class="wizard-section active" id="serviceSection">
                    <div class="section-header">
                        <div class="section-icon bg-gradient-to-br from-violet-100 to-fuchsia-100">
                            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="flex-1 flex items-center justify-between">
                            <h3 class="section-title">Select Your Services <span class="text-sm font-normal text-gray-400">(Choose 1-5)</span></h3>
                            <span id="serviceCount" class="service-count-badge" style="display: none;">0</span>
                        </div>
                    </div>

                    @foreach($services as $category => $categoryServices)
                        <div class="mb-6">
                            <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">{{ $category }} Services</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                @foreach($categoryServices as $service)
                                    <label class="selection-card service-card" data-service-id="{{ $service->id }}">
                                        <input type="checkbox" 
                                               name="service_ids[]" 
                                               value="{{ $service->id }}" 
                                               class="checkbox-input service-checkbox"
                                               data-price="{{ $service->price }}"
                                               data-duration="{{ $service->duration }}"
                                               data-name="{{ $service->name }}">
                                        <div class="check-indicator">
                                            <svg class="check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div class="pr-8">
                                            <h5 class="font-display font-bold text-gray-900 mb-1">{{ $service->name }}</h5>
                                            <p class="text-sm text-gray-500 mb-3">{{ $service->description }}</p>
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $service->formatted_duration }}</span>
                                                <span class="font-display font-extrabold text-violet-600">{{ $service->formatted_price }}</span>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <!-- Summary Box -->
                    <div id="summaryBox" class="summary-box" style="display: none;">
                        <div class="summary-title">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                            Selected Services
                        </div>
                        <div id="selectedServicesList"></div>
                        <div class="summary-item">
                            <span class="summary-label">Total Duration:</span>
                            <span class="summary-value" id="totalDuration">0m</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Total Price:</span>
                            <span class="summary-value total" id="totalPrice">₱0.00</span>
                        </div>
                    </div>

                    @error('service_ids')
                        <p class="text-red-600 text-sm font-semibold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Step 2: Select Staff -->
                <div class="wizard-section" id="staffSection" style="display: none;">
                    <div class="section-header">
                        <div class="section-icon bg-gradient-to-br from-blue-100 to-cyan-100">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="section-title">Choose Your Stylist</h3>
                    </div>
                    <div id="staffList" class="grid md:grid-cols-2 gap-4">
                        <!-- Staff options loaded via JS -->
                    </div>
                    @error('staff_id')
                        <p class="text-red-600 text-sm font-semibold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Step 3: Select Date -->
                <div class="wizard-section" id="dateSection" style="display: none;">
                    <div class="section-header">
                        <div class="section-icon bg-gradient-to-br from-green-100 to-emerald-100">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="section-title">Select Date</h3>
                    </div>
                    <input type="date" name="appointment_date" id="appointmentDate" 
                           class="date-input"
                           min="{{ date('Y-m-d', strtotime('+1 day')) }}" 
                           value="{{ old('appointment_date') }}" required>
                    @error('appointment_date')
                        <p class="text-red-600 text-sm font-semibold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Step 4: Select Time -->
                <div class="wizard-section" id="timeSection" style="display: none;">
                    <div class="section-header">
                        <div class="section-icon bg-gradient-to-br from-amber-100 to-yellow-100">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="section-title">Choose Time Slot</h3>
                    </div>
                    <div id="timeSlots" class="grid grid-cols-3 md:grid-cols-5 gap-3">
                        <!-- Time slots loaded via JS -->
                    </div>
                    <p id="noSlotsMessage" class="text-gray-500 text-center py-8 font-medium" style="display: none;">
                        No available slots for this date. Please select another date.
                    </p>
                    @error('time_slot')
                        <p class="text-red-600 text-sm font-semibold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Notes -->
                <div class="wizard-section" id="notesSection" style="display: none;">
                    <div class="section-header">
                        <div class="section-icon bg-gradient-to-br from-purple-100 to-pink-100">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <h3 class="section-title">Additional Notes <span class="text-sm font-normal text-gray-400">(Optional)</span></h3>
                    </div>
                    <textarea name="notes" rows="4" class="notes-textarea"
                              placeholder="Any special requests or notes for your appointment...">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="text-red-600 text-sm font-semibold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="flex justify-between items-center pt-8 mt-8" style="border-top: 2px solid rgba(0,0,0,0.05);">
                    <a href="{{ route('customer.appointments.index') }}" class="flex items-center gap-2 px-5 py-2.5 border-2 border-gray-200 rounded-xl hover:border-red-300 hover:bg-red-50 font-bold text-gray-600 hover:text-red-700 text-sm transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>
                    <button type="submit" id="submitBtn" class="group relative overflow-hidden px-8 py-3 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5 disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:translate-y-0 disabled:hover:shadow-xl" disabled>
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Book Appointment
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        const MAX_SERVICES = 5;
        let selectedServices = [];
        let selectedStaff = null;
        let selectedDate = null;

        // Progress tracker
        function updateProgress(step) {
            for (let i = 1; i <= 4; i++) {
                const circle = document.getElementById(`step${i}-circle`);
                const label = document.getElementById(`step${i}-label`);
                const divider = document.getElementById(`divider${i}`);

                if (i < step) {
                    circle.className = 'step-circle completed';
                    label.className = 'step-label completed mt-2';
                    if (divider) divider.className = 'step-divider completed';
                } else if (i === step) {
                    circle.className = 'step-circle active';
                    label.className = 'step-label active mt-2';
                    if (divider) divider.className = 'step-divider';
                } else {
                    circle.className = 'step-circle inactive';
                    label.className = 'step-label mt-2';
                    if (divider) divider.className = 'step-divider';
                }
            }
        }

        function activateSection(sectionId) {
            document.querySelectorAll('.wizard-section').forEach(s => s.classList.remove('active'));
            const section = document.getElementById(sectionId);
            if (section) section.classList.add('active');
        }

        function updateSummary() {
            const summaryBox = document.getElementById('summaryBox');
            const serviceCount = document.getElementById('serviceCount');
            const selectedServicesList = document.getElementById('selectedServicesList');
            const totalDurationEl = document.getElementById('totalDuration');
            const totalPriceEl = document.getElementById('totalPrice');

            if (selectedServices.length === 0) {
                summaryBox.style.display = 'none';
                serviceCount.style.display = 'none';
                return;
            }

            summaryBox.style.display = 'block';
            serviceCount.style.display = 'inline-flex';
            serviceCount.textContent = selectedServices.length;

            // Calculate totals
            let totalPrice = 0;
            let totalDuration = 0;
            let servicesHTML = '';

            selectedServices.forEach((service, index) => {
                totalPrice += parseFloat(service.price);
                totalDuration += parseInt(service.duration);
                
                servicesHTML += `
                    <div class="summary-item">
                        <span class="summary-label">${index + 1}. ${service.name}</span>
                        <span class="summary-value">₱${parseFloat(service.price).toFixed(2)}</span>
                    </div>
                `;
            });

            selectedServicesList.innerHTML = servicesHTML;
            totalPriceEl.textContent = '₱' + totalPrice.toFixed(2);
            
            // Format duration
            const hours = Math.floor(totalDuration / 60);
            const minutes = totalDuration % 60;
            let durationText = '';
            if (hours > 0 && minutes > 0) {
                durationText = `${hours}h ${minutes}m`;
            } else if (hours > 0) {
                durationText = `${hours}h`;
            } else {
                durationText = `${minutes}m`;
            }
            totalDurationEl.textContent = durationText;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Service checkbox selection
            document.querySelectorAll('.service-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const card = this.closest('.service-card');
                    const serviceData = {
                        id: this.value,
                        name: this.dataset.name,
                        price: this.dataset.price,
                        duration: this.dataset.duration
                    };

                    if (this.checked) {
                        if (selectedServices.length >= MAX_SERVICES) {
                            this.checked = false;
                            alert(`You can select a maximum of ${MAX_SERVICES} services.`);
                            return;
                        }
                        card.classList.add('selected');
                        selectedServices.push(serviceData);
                    } else {
                        card.classList.remove('selected');
                        selectedServices = selectedServices.filter(s => s.id !== serviceData.id);
                    }

                    updateSummary();

                    // Auto-proceed when at least one service is selected
                    if (selectedServices.length > 0) {
                        loadStaff();
                        updateProgress(2);
                        activateSection('staffSection');
                    } else {
                        document.getElementById('staffSection').style.display = 'none';
                        document.getElementById('dateSection').style.display = 'none';
                        document.getElementById('timeSection').style.display = 'none';
                        document.getElementById('notesSection').style.display = 'none';
                    }
                });
            });

            // Date selection
            document.getElementById('appointmentDate').addEventListener('change', function() {
                selectedDate = this.value;
                if (selectedStaff && selectedDate && selectedServices.length > 0) {
                    loadTimeSlots();
                    updateProgress(4);
                    activateSection('timeSection');
                }
            });
        });

        function loadStaff() {
            const serviceIds = selectedServices.map(s => s.id);
            
            fetch(`/customer/api/staff?service_ids=${serviceIds.join(',')}`)
                .then(response => response.json())
                .then(data => {
                    const staffList = document.getElementById('staffList');
                    staffList.innerHTML = '';

                    if (data.length === 0) {
                        staffList.innerHTML = '<p class="text-gray-500 col-span-2 text-center py-8 font-medium">No staff available for all selected services. Please adjust your service selection.</p>';
                        return;
                    }

                    data.forEach(staff => {
                        staffList.innerHTML += `
                            <label class="selection-card">
                                <input type="radio" name="staff_id" value="${staff.id}" class="radio-input staff-radio" required>
                                <div class="check-indicator">
                                    <svg class="check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div class="flex items-center gap-3 pr-8">
                                    <div style="width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,#ede9fe,#f3e8ff);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:16px;color:#7c3aed;">
                                        ${staff.name.substring(0,2).toUpperCase()}
                                    </div>
                                    <div>
                                        <h5 class="font-display font-bold text-gray-900">${staff.name}</h5>
                                        <p class="text-sm text-gray-500">${staff.specialization || 'Professional Stylist'}</p>
                                    </div>
                                </div>
                            </label>
                        `;
                    });

                    document.getElementById('staffSection').style.display = 'block';

                    // Staff radio listeners
                    document.querySelectorAll('.staff-radio').forEach(radio => {
                        radio.addEventListener('change', function() {
                            document.querySelectorAll('#staffList .selection-card').forEach(c => c.classList.remove('selected'));
                            this.closest('.selection-card').classList.add('selected');
                            selectedStaff = this.value;
                            document.getElementById('dateSection').style.display = 'block';
                            document.getElementById('notesSection').style.display = 'block';
                            updateProgress(3);
                            activateSection('dateSection');
                        });
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading staff. Please try again.');
                });
        }

        function loadTimeSlots() {
            const serviceIds = selectedServices.map(s => s.id);
            const timeSlotsDiv = document.getElementById('timeSlots');
            const noSlotsMsg = document.getElementById('noSlotsMessage');
            
            timeSlotsDiv.innerHTML = '<p class="text-gray-500 col-span-full text-center py-8 font-medium">Loading available slots...</p>';
            noSlotsMsg.style.display = 'none';

            fetch(`/customer/api/slots?staff_id=${selectedStaff}&date=${selectedDate}&service_ids=${serviceIds.join(',')}`)
                .then(response => response.json())
                .then(data => {
                    timeSlotsDiv.innerHTML = '';

                    if (data.slots.length === 0) {
                        noSlotsMsg.style.display = 'block';
                        document.getElementById('submitBtn').disabled = true;
                        return;
                    }

                    data.slots.forEach(slot => {
                        timeSlotsDiv.innerHTML += `
                            <label class="time-slot">
                                <input type="radio" name="time_slot" value="${slot.time}" class="hidden time-radio" required>
                                <span>${slot.display}</span>
                            </label>
                        `;
                    });

                    document.getElementById('timeSection').style.display = 'block';

                    // Time slot listeners
                    document.querySelectorAll('.time-radio').forEach(radio => {
                        radio.addEventListener('change', function() {
                            document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                            this.closest('.time-slot').classList.add('selected');
                            document.getElementById('submitBtn').disabled = false;
                        });
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    timeSlotsDiv.innerHTML = '<p class="text-red-600 col-span-full text-center py-8 font-semibold">Error loading time slots. Please try again.</p>';
                });
        }
    </script>
    @endpush
</x-app-layout>