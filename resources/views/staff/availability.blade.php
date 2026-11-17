<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-3 mb-2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                    
                </div>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600 tracking-tight">
                        Manage My Availability
                    </h2>
                    <p class="text-sm font-medium text-gray-500 mt-0.5">Configure your working hours and schedule</p>
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
        .stagger-item:nth-child(5) { animation-delay: 0.25s; }
        .stagger-item:nth-child(6) { animation-delay: 0.3s; }
        .stagger-item:nth-child(7) { animation-delay: 0.35s; }
        
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
        
        .day-card {
            position: relative;
            background: #ffffff;
            border: 2px solid rgba(0, 0, 0, 0.06);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .day-card.active {
            border-color: rgba(139, 92, 246, 0.3);
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.03) 0%, rgba(124, 58, 237, 0.03) 100%);
        }
        
        .day-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px -8px rgba(0, 0, 0, 0.1);
        }
        
        .stat-box {
            text-align: center;
            padding: 20px;
            border-radius: 14px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border: 2px solid;
            background: white;
        }
        
        .stat-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px -8px rgba(0, 0, 0, 0.2);
        }
        
        .stat-box-blue {
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 4px 12px -4px rgba(59, 130, 246, 0.2);
        }
        
        .stat-box-blue:hover {
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 12px 32px -8px rgba(59, 130, 246, 0.3);
        }
        
        .stat-box-green {
            border-color: rgba(16, 185, 129, 0.3);
            box-shadow: 0 4px 12px -4px rgba(16, 185, 129, 0.2);
        }
        
        .stat-box-green:hover {
            border-color: rgba(16, 185, 129, 0.5);
            box-shadow: 0 12px 32px -8px rgba(16, 185, 129, 0.3);
        }
        
        .stat-box-purple {
            border-color: rgba(168, 85, 247, 0.3);
            box-shadow: 0 4px 12px -4px rgba(168, 85, 247, 0.2);
        }
        
        .stat-box-purple:hover {
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 12px 32px -8px rgba(168, 85, 247, 0.3);
        }
        
        .stat-box-gray {
            border-color: rgba(107, 114, 128, 0.3);
            box-shadow: 0 4px 12px -4px rgba(107, 114, 128, 0.2);
        }
        
        .stat-box-gray:hover {
            border-color: rgba(107, 114, 128, 0.5);
            box-shadow: 0 12px 32px -8px rgba(107, 114, 128, 0.3);
        }
    </style>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Summary Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 animate-fade-in-up">
            @php
                $availableDays = $staff->availability->count();
                $totalHours = $staff->availability->sum(function($a) {
                    $start = \Carbon\Carbon::parse($a->start_time);
                    $end = \Carbon\Carbon::parse($a->end_time);
                    return $end->diffInHours($start);
                });
            @endphp
            
            <div class="stat-box stat-box-blue">
                <p class="font-display text-3xl font-bold text-blue-600 mb-1">{{ $availableDays }}</p>
                <p class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Days/Week</p>
            </div>
            <div class="stat-box stat-box-green">
                <p class="font-display text-3xl font-bold text-green-600 mb-1">{{ $totalHours }}</p>
                <p class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Hours/Week</p>
            </div>
            <div class="stat-box stat-box-purple">
                <p class="font-display text-3xl font-bold text-purple-600 mb-1">{{ $staff->appointments()->whereIn('status', ['pending', 'confirmed'])->count() }}</p>
                <p class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Upcoming</p>
            </div>
            <div class="stat-box stat-box-gray">
                <p class="font-display text-3xl font-bold text-gray-600 mb-1">{{ 7 - $availableDays }}</p>
                <p class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Days Off</p>
            </div>
        </div>

        <!-- Main Form -->
        <div class="premium-card animate-scale-in" style="animation-delay: 0.1s;">
            <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-6">
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
                        <h3 class="font-display text-lg font-bold text-gray-900">Set Your Working Hours</h3>
                        <p class="text-xs font-medium text-gray-500 mt-0.5">Configure which days and times you're available</p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <form method="POST" action="{{ route('staff.availability.update') }}" class="space-y-6">
                    @csrf
                    
                    @foreach($daysOfWeek as $index => $day)
                        @php
                            $existing = $staff->availability->where('day_of_week', $day)->first();
                        @endphp
                        
                        <div class="day-card {{ $existing ? 'active' : '' }} stagger-item">
                            <div class="flex items-center justify-between mb-4">
                                <label class="flex items-center cursor-pointer group">
                                    <div class="relative">
                                        <input type="checkbox" 
                                               name="availability[{{ $index }}][is_available]" 
                                               value="1" 
                                               {{ $existing ? 'checked' : '' }}
                                               class="sr-only availability-checkbox"
                                               data-day="{{ $day }}"
                                               data-index="{{ $index }}">
                                        <div class="w-6 h-6 border-2 border-gray-300 rounded-lg flex items-center justify-center transition-all group-hover:border-violet-400">
                                            <svg class="w-4 h-4 text-white opacity-0 checkbox-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="ml-3 font-bold text-gray-900 capitalize text-lg">{{ $day }}</span>
                                </label>
                                <span class="status-badge-{{ $day }} inline-flex items-center gap-1.5 px-3 py-1.5 {{ $existing ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-gray-50 text-gray-500 border-gray-200' }} text-xs font-bold rounded-full border transition-all">
                                    @if($existing)
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                        Available
                                    @else
                                        Day Off
                                    @endif
                                </span>
                            </div>
                            
                            <!-- Always include the day_of_week hidden field -->
                            <input type="hidden" name="availability[{{ $index }}][day_of_week]" value="{{ $day }}">
                            
                            <div class="grid grid-cols-2 gap-4 time-inputs" data-day="{{ $day }}">
                                <div class="space-y-2">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                        <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                                        Start Time
                                    </label>
                                    @php
                                        $startTime = '09:00';
                                        if ($existing && $existing->start_time) {
                                            $startTime = \Carbon\Carbon::parse($existing->start_time)->format('H:i');
                                        }
                                        
                                        $startTimeOptions = [
                                            '09:00' => '9:00 AM', '09:30' => '9:30 AM', '10:00' => '10:00 AM',
                                            '10:30' => '10:30 AM', '11:00' => '11:00 AM', '11:30' => '11:30 AM',
                                            '12:00' => '12:00 PM (Noon)', '12:30' => '12:30 PM', '13:00' => '1:00 PM',
                                            '13:30' => '1:30 PM', '14:00' => '2:00 PM', '14:30' => '2:30 PM',
                                            '15:00' => '3:00 PM', '15:30' => '3:30 PM', '16:00' => '4:00 PM',
                                            '16:30' => '4:30 PM', '17:00' => '5:00 PM',
                                        ];
                                    @endphp
                                    <select name="availability[{{ $index }}][start_time]" 
                                            class="time-input w-full px-4 py-3 bg-gray-50/50 border-2 {{ $errors->has("availability.{$index}.start_time") ? 'border-red-500' : 'border-gray-200' }} rounded-xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none cursor-pointer"
                                            data-day="{{ $day }}">
                                        @foreach($startTimeOptions as $value => $label)
                                            <option value="{{ $value }}" {{ $startTime == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                    @error("availability.{$index}.start_time")
                                        <p class="text-[11px] font-bold text-red-600 mt-1 ml-1 uppercase tracking-wider">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                        <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                        End Time
                                    </label>
                                    @php
                                        $endTime = '18:00';
                                        if ($existing && $existing->end_time) {
                                            $endTime = \Carbon\Carbon::parse($existing->end_time)->format('H:i');
                                        }
                                        
                                        $endTimeOptions = [
                                            '17:00' => '5:00 PM', '17:30' => '5:30 PM', '18:00' => '6:00 PM',
                                            '18:30' => '6:30 PM', '19:00' => '7:00 PM', '19:30' => '7:30 PM',
                                            '20:00' => '8:00 PM',
                                        ];
                                    @endphp
                                    <select name="availability[{{ $index }}][end_time]" 
                                            class="time-input w-full px-4 py-3 bg-gray-50/50 border-2 {{ $errors->has("availability.{$index}.end_time") ? 'border-red-500' : 'border-gray-200' }} rounded-xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none cursor-pointer"
                                            data-day="{{ $day }}">
                                        @foreach($endTimeOptions as $value => $label)
                                            <option value="{{ $value }}" {{ $endTime == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error("availability.{$index}.end_time")
                                        <p class="text-[11px] font-bold text-red-600 mt-1 ml-1 uppercase tracking-wider">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Quick Set Options -->
                    <div class="mt-8 p-6 bg-gradient-to-br from-violet-50 via-fuchsia-50 to-purple-50 rounded-2xl border-2 border-violet-200">
                        <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Quick Set Options
                        </h4>
                        <div class="flex flex-wrap gap-3 mb-3">
                            <button type="button" onclick="setWeekdays()" class="px-4 py-2.5 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">
                                Set Weekdays (Mon-Fri)
                            </button>
                            <button type="button" onclick="setWeekend()" class="px-4 py-2.5 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">
                                Set Weekend (Sat-Sun)
                            </button>
                            <button type="button" onclick="setAllDays()" class="px-4 py-2.5 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">
                                Set All Days
                            </button>
                            <button type="button" onclick="clearAll()" class="px-4 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5">
                                Clear All
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 font-medium flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            Default hours: 9:00 AM - 6:00 PM
                        </p>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end gap-3 pt-6">
                        <a href="{{ route('staff.dashboard') }}" class="px-6 py-3 border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 font-bold text-gray-700 transition-all">
                            Cancel
                        </a>
                        <button type="submit" class="group relative overflow-hidden px-8 py-3 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-xl shadow-violet-500/30 hover:shadow-2xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Save Availability
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Info -->
        <div class="mt-8 premium-card animate-fade-in-up" style="animation-delay: 0.3s;">
            <div class="p-6">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-gradient-to-br from-amber-100 to-yellow-100 rounded-xl">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-3">Important Information</h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Your availability determines when customers can book appointments with you</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Existing appointments won't be affected by changes to your availability</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Uncheck any day to mark yourself as unavailable on that day</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-violet-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Make sure to account for breaks and preparation time</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Custom checkbox styling and functionality
        document.querySelectorAll('.availability-checkbox').forEach(checkbox => {
            const updateCheckbox = () => {
                const icon = checkbox.parentElement.querySelector('.checkbox-icon');
                const box = checkbox.parentElement.querySelector('div');
                const dayCard = checkbox.closest('.day-card');
                const day = checkbox.dataset.day;
                const statusBadge = document.querySelector(`.status-badge-${day}`);
                
                if (checkbox.checked) {
                    // Checked state - available
                    box.style.background = 'linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%)';
                    box.style.borderColor = '#8b5cf6';
                    icon.style.opacity = '1';
                    dayCard.classList.add('active');
                    
                    // Update status badge
                    statusBadge.className = 'status-badge-' + day + ' inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 text-emerald-700 border-emerald-200 text-xs font-bold rounded-full border transition-all';
                    statusBadge.innerHTML = '<span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>Available';
                } else {
                    // Unchecked state - not available
                    box.style.background = 'transparent';
                    box.style.borderColor = '#d1d5db';
                    icon.style.opacity = '0';
                    dayCard.classList.remove('active');
                    
                    // Update status badge
                    statusBadge.className = 'status-badge-' + day + ' inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-50 text-gray-500 border-gray-200 text-xs font-bold rounded-full border transition-all';
                    statusBadge.innerHTML = 'Day Off';
                }
            };
            
            updateCheckbox();
            
            checkbox.addEventListener('change', function() {
                updateCheckbox();
            });
        });

        // Quick set functions
        function setWeekdays() {
            const weekdays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
            weekdays.forEach(day => {
                const checkbox = document.querySelector(`.availability-checkbox[data-day="${day}"]`);
                checkbox.checked = true;
                checkbox.dispatchEvent(new Event('change'));
            });
        }

        function setWeekend() {
            const weekend = ['saturday', 'sunday'];
            weekend.forEach(day => {
                const checkbox = document.querySelector(`.availability-checkbox[data-day="${day}"]`);
                checkbox.checked = true;
                checkbox.dispatchEvent(new Event('change'));
            });
        }

        function setAllDays() {
            document.querySelectorAll('.availability-checkbox').forEach(checkbox => {
                checkbox.checked = true;
                checkbox.dispatchEvent(new Event('change'));
            });
        }

        function clearAll() {
            if (confirm('Are you sure you want to clear all availability? This will mark you as unavailable on all days.')) {
                document.querySelectorAll('.availability-checkbox').forEach(checkbox => {
                    checkbox.checked = false;
                    checkbox.dispatchEvent(new Event('change'));
                });
            }
        }

        // Add this to your existing script block
        document.querySelectorAll('.time-input').forEach(select => {
            select.addEventListener('change', function() {
                const day = this.dataset.day;
                const row = document.querySelector(`.time-inputs[data-day="${day}"]`);
                const startSelect = row.querySelector(`select[name*="[start_time]"]`);
                const endSelect = row.querySelector(`select[name*="[end_time]"]`);
                
                const startTime = startSelect.value;
                const endTime = endSelect.value;

                // Visual Conflict Warning
                if (startTime >= endTime) {
                    // Apply a red border to the end time to show conflict
                    endSelect.classList.add('border-red-500', 'bg-red-50');
                    endSelect.classList.remove('border-gray-200');
                    
                    // Optional: Auto-adjust end time to 1 hour after start if possible
                    const startIdx = startSelect.selectedIndex;
                    if (endSelect.options[startIdx + 2]) {
                        // endSelect.selectedIndex = startIdx + 2; // Uncomment this to auto-fix for the user
                    }
                } else {
                    // Remove error styling if conflict is resolved
                    endSelect.classList.remove('border-red-500', 'bg-red-50');
                    endSelect.classList.add('border-gray-200');
                }
            });
        });

        // Update the Form Submit to prevent submission if conflicts exist
        document.querySelector('form').addEventListener('submit', function(e) {
            const conflicts = document.querySelectorAll('.border-red-500');
            if (conflicts.length > 0) {
                e.preventDefault();
                alert('Please fix the time conflicts before saving. End time must be after start time.');
            }
        });
        
    </script>
    @endpush
</x-app-layout>