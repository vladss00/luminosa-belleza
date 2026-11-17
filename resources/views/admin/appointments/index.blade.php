<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-2xl blur-xl opacity-40"></div>
                     
                    </div>
                    <div>
               <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                            Appointments
                        </h2>
                        <p class="text-sm font-semibold text-gray-500 mt-0.5">Manage and track all your appointments</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Filter Section -->
        <div class="mb-8 overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-8 py-5">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-violet-600 rounded-xl blur opacity-20"></div>
                        <div class="relative p-2.5 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Filter Appointments</h3>
                        <p class="text-xs font-medium text-gray-500 mt-0.5">Refine your search criteria</p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <form method="GET" action="{{ route('admin.appointments.index') }}" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">
                        <!-- Status Filter -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-violet-600 rounded-full"></span>
                                Status
                            </label>
                            <select name="status" class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/10 transition-all outline-none">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>✓ Confirmed</option>
                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>🔄 In Progress</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>✓ Completed</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>✕ Cancelled</option>
                            </select>
                        </div>

                        <!-- Date Filter -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span>
                                Date
                            </label>
                            <input type="date" name="date" value="{{ request('date') }}" 
                                   class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                        </div>

                        <!-- Staff Filter -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-fuchsia-600 rounded-full"></span>
                                Staff Member
                            </label>
                            <select name="staff_id" class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-fuchsia-500 focus:ring-4 focus:ring-fuchsia-500/10 transition-all outline-none">
                                <option value="">All Staff</option>
                                @foreach($staff as $member)
                                    <option value="{{ $member->id }}" {{ request('staff_id') == $member->id ? 'selected' : '' }}>
                                        {{ $member->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Service Filter -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-purple-600 rounded-full"></span>
                                Service
                            </label>
                            <select name="service_id" class="w-full px-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 transition-all outline-none">
                                <option value="">All Services</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ request('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Search Filter -->
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-2 text-sm font-bold text-gray-900">
                                <span class="w-1.5 h-1.5 bg-emerald-600 rounded-full"></span>
                                Search
                            </label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Name or email..."
                                       class="w-full pl-11 pr-4 py-3.5 bg-gray-50/50 border-2 border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 placeholder-gray-400 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none">
                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-3 pt-6 border-t-2 border-gray-100">
                        <a href="{{ route('admin.appointments.index') }}" 
                           class="px-6 py-3 border-2 border-gray-300 rounded-xl font-bold text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-all">
                            Clear Filters
                        </a>
                        <button type="submit" 
                                class="group relative overflow-hidden px-6 py-3 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all hover:-translate-y-0.5">
                            <span class="relative z-10">Apply Filters</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-700 to-fuchsia-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Appointments Table -->
        @if($appointments->count() > 0)
            <div class="rounded-3xl bg-white shadow-xl border border-gray-200/60 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y-2 divide-gray-100">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-50 via-gray-100/50 to-gray-50">
                                <th class="px-6 py-5 text-left text-xs font-black text-gray-700 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-5 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-5 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Service(s)</th>
                                <th class="px-6 py-5 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Staff</th>
                                <th class="px-6 py-5 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Date & Time</th>
                                <th class="px-6 py-5 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-5 text-left text-xs font-black text-gray-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($appointments as $appointment)
                                <tr class="group hover:bg-gradient-to-r hover:from-violet-50/30 hover:via-fuchsia-50/20 hover:to-purple-50/30 transition-all duration-200">
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        <span class="inline-flex items-center justify-center w-11 h-11 bg-gradient-to-br from-violet-100 to-fuchsia-100 border-2 border-violet-200 rounded-xl font-black text-violet-700 text-sm shadow-sm">
                                            {{ $appointment->id }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="relative flex-shrink-0">
                                                <div class="absolute -inset-0.5 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-full blur opacity-25"></div>
                                                <div class="relative w-11 h-11 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-full flex items-center justify-center text-white font-black text-sm shadow-lg">
                                                    {{ substr($appointment->customer->name, 0, 1) }}
                                                </div>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="font-black text-gray-900 truncate">{{ $appointment->customer->name }}</div>
                                                <div class="text-xs text-gray-500 font-medium truncate">{{ $appointment->customer->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        @if($appointment->services && $appointment->services->count() > 1)
                                            <div class="font-bold text-gray-900 mb-1.5">{{ $appointment->services->count() }} Services</div>
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($appointment->services as $service)
                                                    <span class="px-2 py-0.5 bg-violet-100 text-violet-700 border border-violet-200 text-xs font-semibold rounded-lg whitespace-nowrap">
                                                        {{ $service->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            @php
                                                $totalPrice = $appointment->services->sum('price');
                                            @endphp
                                            <div class="text-sm font-black text-violet-600 mt-1">₱{{ number_format($totalPrice, 2) }}</div>
                                        @elseif($appointment->services && $appointment->services->count() === 1)
                                            <div class="font-bold text-gray-900">{{ $appointment->services->first()->name }}</div>
                                            <div class="text-sm font-black text-violet-600">{{ $appointment->services->first()->formatted_price }}</div>
                                        @elseif($appointment->service)
                                            <div class="font-bold text-gray-900">{{ $appointment->service->name }}</div>
                                            <div class="text-sm font-black text-violet-600">{{ $appointment->service->formatted_price }}</div>
                                        @else
                                            <div class="font-bold text-gray-500 italic">No service assigned</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        @if($appointment->staff && $appointment->staff->user)
                                            <div class="font-bold text-gray-900">{{ $appointment->staff->user->name }}</div>
                                            @if($appointment->staff->specialization)
                                                <div class="text-xs text-gray-500 font-medium">{{ $appointment->staff->specialization }}</div>
                                            @endif
                                        @else
                                            <div class="font-bold text-gray-500 italic">Not assigned</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        <div class="flex items-center gap-2 text-sm mb-1">
                                            <div class="p-1 bg-blue-100 rounded-lg">
                                                <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span class="font-bold text-gray-900">{{ $appointment->formatted_date }}</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-sm">
                                            <div class="p-1 bg-indigo-100 rounded-lg">
                                                <svg class="w-3.5 h-3.5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span class="text-gray-600 font-semibold">{{ $appointment->formatted_time }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        @php
                                            $statusConfig = [
                                                'pending' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'border' => 'border-amber-200'],
                                                'confirmed' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'border' => 'border-blue-200'],
                                                'in_progress' => ['bg' => 'bg-violet-50', 'text' => 'text-violet-700', 'border' => 'border-violet-200'],
                                                'completed' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'border' => 'border-emerald-200'],
                                                'cancelled' => ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'border' => 'border-red-200']
                                            ];
                                            $config = $statusConfig[$appointment->status] ?? ['bg' => 'bg-gray-50', 'text' => 'text-gray-700', 'border' => 'border-gray-200'];
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-black {{ $config['bg'] }} {{ $config['text'] }} border-2 {{ $config['border'] }}">
                                            {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.appointments.show', $appointment) }}" 
                                               class="group/btn inline-flex items-center px-3 py-2.5 bg-gradient-to-r from-indigo-50 to-blue-50 border-2 border-indigo-200 text-indigo-700 rounded-xl text-xs font-black hover:from-indigo-100 hover:to-blue-100 hover:border-indigo-300 hover:shadow-md transition-all duration-300">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a>
                                            <a href="{{ route('admin.appointments.edit', $appointment) }}" 
                                               class="group/btn inline-flex items-center px-3 py-2.5 bg-gradient-to-r from-violet-50 to-fuchsia-50 border-2 border-violet-200 text-violet-700 rounded-xl text-xs font-black hover:from-violet-100 hover:to-fuchsia-100 hover:border-violet-300 hover:shadow-md transition-all duration-300">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="inline" onsubmit="return confirm('⚠️ Are you sure you want to delete this appointment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="group/btn inline-flex items-center px-3 py-2.5 bg-gradient-to-r from-red-50 to-rose-50 border-2 border-red-200 text-red-700 rounded-xl text-xs font-black hover:from-red-100 hover:to-rose-100 hover:border-red-300 hover:shadow-md transition-all duration-300">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($appointments->hasPages())
                <div class="mt-8">
                    {{ $appointments->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="relative overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-xl">
                <!-- Decorative background -->
                <div class="absolute inset-0 bg-gradient-to-br from-violet-50/80 via-fuchsia-50/50 to-purple-50/80"></div>
                
                <!-- Animated circles -->
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute top-0 left-1/4 w-96 h-96 bg-violet-400/10 rounded-full blur-3xl -translate-y-1/2"></div>
                    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-fuchsia-400/10 rounded-full blur-3xl translate-y-1/2"></div>
                </div>
                
                <div class="relative px-12 py-24 text-center">
                    <div class="relative inline-flex items-center justify-center mb-8">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-3xl blur-2xl opacity-30"></div>
                        <div class="relative flex items-center justify-center w-24 h-24 bg-gradient-to-br from-violet-600 via-fuchsia-600 to-purple-600 rounded-3xl shadow-2xl shadow-violet-500/40">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h3 class="text-3xl font-black text-gray-900 mb-3">No Appointments Found</h3>
                    <p class="text-gray-600 font-medium mb-10 max-w-md mx-auto leading-relaxed">
                        Get started by creating your first appointment or adjust your filters to see more results.
                    </p>
                    
                    <a href="{{ route('admin.appointments.create') }}" 
                       class="group relative inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-black shadow-2xl shadow-violet-500/40 hover:shadow-3xl hover:shadow-violet-500/50 transition-all duration-300 hover:-translate-y-1 hover:scale-105">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Your First Appointment
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>