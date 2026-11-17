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
                   Staff Management
                        </h2>
                        <p class="text-sm font-semibold text-gray-500 mt-0.5">Manage your salon team members</p>
                    </div>
                </div>
                <a href="{{ route('admin.staff.create') }}" 
                   class="group relative overflow-hidden px-6 py-3 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-bold shadow-lg shadow-violet-500/30 hover:shadow-xl hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Staff Member
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if($staff->count() > 0)
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="group relative overflow-hidden rounded-2xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-50/50 to-fuchsia-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-3 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-black text-gray-900 mb-1">{{ $staff->total() }}</p>
                        <p class="text-sm font-bold text-gray-600">Total Staff</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 to-teal-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-3 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-black text-emerald-600 mb-1">{{ $staff->where('is_available', true)->count() }}</p>
                        <p class="text-sm font-bold text-gray-600">Available</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-indigo-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-3 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-black text-blue-600 mb-1">{{ $staff->sum(function($member) { return $member->services->count(); }) }}</p>
                        <p class="text-sm font-bold text-gray-600">Total Services</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50/50 to-pink-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-3 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-black text-purple-600 mb-1">{{ $staff->sum('appointments_count') }}</p>
                        <p class="text-sm font-bold text-gray-600">Total Appointments</p>
                    </div>
                </div>
            </div>

            <!-- Staff Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($staff as $member)
                    <div class="group relative overflow-hidden rounded-3xl bg-white border border-gray-200/60 shadow-lg hover:shadow-2xl hover:border-violet-300 transition-all duration-500 hover:-translate-y-1">
                        <!-- Gradient overlay on hover -->
                        <div class="absolute inset-0 bg-gradient-to-br from-violet-500/5 via-transparent to-fuchsia-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Header with Profile -->
                        <div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-fuchsia-600 p-6 overflow-hidden">
                            <!-- Animated background pattern -->
                            <div class="absolute inset-0 opacity-10">
                                <div class="absolute top-0 right-0 w-40 h-40 bg-white rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>
                            </div>
                            
                            <div class="relative flex items-start justify-between mb-4">
                                @if($member->profile_image)
                                    <div class="relative group/avatar">
                                        <div class="absolute -inset-1 bg-white/30 rounded-full blur-lg"></div>
                                        <img src="{{ $member->profile_image_url }}" alt="{{ $member->user->name }}" 
                                             class="relative w-20 h-20 rounded-full object-cover border-4 border-white/40 shadow-xl ring-2 ring-white/20">
                                        <div class="absolute bottom-0 right-0 w-6 h-6 {{ $member->is_available ? 'bg-emerald-400' : 'bg-gray-400' }} border-4 border-white rounded-full shadow-lg {{ $member->is_available ? 'animate-pulse' : '' }}"></div>
                                    </div>
                                @else
                                    <div class="relative group/avatar">
                                        <div class="absolute -inset-1 bg-white/30 rounded-full blur-lg"></div>
                                        <div class="relative flex-shrink-0 w-20 h-20 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center text-3xl font-black text-white border-4 border-white/40 shadow-xl ring-2 ring-white/20">
                                            {{ $member->user->initials }}
                                        </div>
                                        <div class="absolute bottom-0 right-0 w-6 h-6 {{ $member->is_available ? 'bg-emerald-400' : 'bg-gray-400' }} border-4 border-white rounded-full shadow-lg {{ $member->is_available ? 'animate-pulse' : '' }}"></div>
                                    </div>
                                @endif
                                
                                <form action="{{ route('admin.staff.toggle', $member) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="group/btn px-4 py-2 text-xs font-black rounded-xl transition-all duration-300 {{ $member->is_available ? 'bg-white/20 hover:bg-white/30 backdrop-blur-xl border-2 border-white/30 text-white shadow-lg' : 'bg-red-500 hover:bg-red-600 text-white shadow-lg shadow-red-500/30' }}">
                                        <span class="flex items-center gap-1.5">
                                            @if($member->is_available)
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                                Available
                                            @else
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path>
                                                </svg>
                                                Unavailable
                                            @endif
                                        </span>
                                    </button>
                                </form>
                            </div>
                            
                            <div class="relative">
                                <h3 class="text-2xl font-black text-white mb-1 drop-shadow-lg">{{ $member->user->name }}</h3>
                                <p class="text-indigo-100 text-sm font-bold drop-shadow">{{ $member->specialization ?: 'Staff Member' }}</p>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="relative p-6 space-y-5">
                            <!-- Contact Info -->
                            <div class="space-y-2.5">
                                <div class="group/item flex items-center gap-3 p-3 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-xl hover:border-violet-300 hover:shadow-md transition-all duration-300">
                                    <div class="flex-shrink-0 p-2 bg-violet-100 rounded-lg group-hover/item:bg-violet-200 transition-colors">
                                        <svg class="w-4 h-4 text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-600 font-bold truncate flex-1">{{ $member->user->email }}</span>
                                </div>
                                @if($member->user->phone)
                                    <div class="group/item flex items-center gap-3 p-3 bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-xl hover:border-fuchsia-300 hover:shadow-md transition-all duration-300">
                                        <div class="flex-shrink-0 p-2 bg-fuchsia-100 rounded-lg group-hover/item:bg-fuchsia-200 transition-colors">
                                            <svg class="w-4 h-4 text-fuchsia-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-600 font-bold flex-1">{{ $member->user->phone }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Bio -->
                            @if($member->bio)
                                <div class="p-4 bg-gradient-to-br from-purple-50/50 to-violet-50/30 border-2 border-purple-100 rounded-xl">
                                    <p class="text-sm text-gray-700 font-medium leading-relaxed line-clamp-2">{{ $member->bio }}</p>
                                </div>
                            @endif

                            <!-- Services -->
                            <div>
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="p-1.5 bg-violet-100 rounded-lg">
                                        <svg class="w-3.5 h-3.5 text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-black text-gray-700 uppercase tracking-wide">Services Offered</p>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    @forelse($member->services->take(3) as $service)
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-violet-100 text-violet-700 border-2 border-violet-200 hover:bg-violet-200 transition-colors">
                                            {{ $service->name }}
                                        </span>
                                    @empty
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-gray-100 text-gray-500 border-2 border-gray-200">
                                            No services assigned
                                        </span>
                                    @endforelse
                                    @if($member->services->count() > 3)
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-fuchsia-100 text-fuchsia-700 border-2 border-fuchsia-200">
                                            +{{ $member->services->count() - 3 }} more
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-3 p-4 bg-gradient-to-br from-blue-50/50 to-indigo-50/30 border-2 border-blue-100 rounded-xl">
                                <div class="text-center">
                                    <p class="text-3xl font-black text-gray-900 mb-1">{{ $member->appointments_count }}</p>
                                    <p class="text-xs text-gray-600 uppercase font-black tracking-wide">Total</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-3xl font-black text-emerald-600 mb-1">{{ $member->appointments()->where('status', 'completed')->count() }}</p>
                                    <p class="text-xs text-gray-600 uppercase font-black tracking-wide">Completed</p>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2 pt-2">
                                <a href="{{ route('admin.staff.show', $member) }}" 
                                   class="group/btn flex-1 text-center px-3 py-3 bg-gradient-to-r from-indigo-50 to-blue-50 border-2 border-indigo-200 text-indigo-700 rounded-xl text-xs font-black hover:from-indigo-100 hover:to-blue-100 hover:border-indigo-300 hover:shadow-lg transition-all duration-300 hover:scale-105">
                                    <span class="flex items-center justify-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View
                                    </span>
                                </a>
                                <a href="{{ route('admin.staff.edit', $member) }}" 
                                   class="group/btn flex-1 text-center px-3 py-3 bg-gradient-to-r from-violet-50 to-fuchsia-50 border-2 border-violet-200 text-violet-700 rounded-xl text-xs font-black hover:from-violet-100 hover:to-fuchsia-100 hover:border-violet-300 hover:shadow-lg transition-all duration-300 hover:scale-105">
                                    <span class="flex items-center justify-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </span>
                                </a>
                                <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" class="flex-1" onsubmit="return confirm('⚠️ Are you sure you want to delete this staff member?\n\nThis action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="group/btn w-full px-3 py-3 bg-gradient-to-r from-red-50 to-rose-50 border-2 border-red-200 text-red-700 rounded-xl text-xs font-black hover:from-red-100 hover:to-rose-100 hover:border-red-300 hover:shadow-lg transition-all duration-300 hover:scale-105">
                                        <span class="flex items-center justify-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($staff->hasPages())
                <div class="mt-8">
                    {{ $staff->links() }}
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h3 class="text-3xl font-black text-gray-900 mb-3">No Staff Members Yet</h3>
                    <p class="text-gray-600 font-medium mb-10 max-w-md mx-auto leading-relaxed">
                        Build your dream team! Add your first staff member to start managing appointments and services.
                    </p>
                    
                    <a href="{{ route('admin.staff.create') }}" 
                       class="group relative inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 text-white rounded-xl font-black shadow-2xl shadow-violet-500/40 hover:shadow-3xl hover:shadow-violet-500/50 transition-all duration-300 hover:-translate-y-1 hover:scale-105">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Your First Staff Member
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-700 via-fuchsia-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>