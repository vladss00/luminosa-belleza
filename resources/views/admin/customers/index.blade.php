<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                        Customer List
                    </h2>
                    <p class="text-sm font-semibold text-gray-500 mt-0.5">All registered customers and their booking history</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

        {{-- Flash --}}
        @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-3.5 rounded-xl font-medium text-sm">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @php
            $statCards = [
                ['label' => 'Total Customers',    'value' => $stats['total'],            'color' => 'from-violet-600 to-fuchsia-600',  'bg' => 'from-violet-50 to-fuchsia-50',  'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                ['label' => 'New This Month',     'value' => $stats['new_this_month'],   'color' => 'from-emerald-500 to-teal-500',    'bg' => 'from-emerald-50 to-teal-50',    'icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'],
                ['label' => 'Active Customers',   'value' => $stats['with_appointments'],'color' => 'from-blue-500 to-indigo-600',     'bg' => 'from-blue-50 to-indigo-50',     'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Total Appointments', 'value' => $stats['total_appointments'],'color' => 'from-orange-500 to-rose-500',   'bg' => 'from-orange-50 to-rose-50',     'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ];
            @endphp

            @foreach($statCards as $card)
            <div class="group relative overflow-hidden rounded-2xl bg-white border border-gray-200/60 shadow-sm hover:shadow-lg transition-all duration-300">
                <div class="absolute inset-0 bg-gradient-to-br {{ $card['bg'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-3 bg-gradient-to-br {{ $card['color'] }} rounded-xl shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="{{ $card['icon'] }}"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-black text-gray-900 mb-1">{{ number_format($card['value']) }}</p>
                    <p class="text-sm font-bold text-gray-500">{{ $card['label'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Search & Sort --}}
        <div class="bg-white rounded-2xl border border-gray-200/60 shadow-sm p-5">
            <form method="GET" action="{{ route('admin.customers.index') }}" class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-violet-500/30 focus:border-violet-400"
                           placeholder="Search by name, email or phone…">
                </div>
                <select name="sort"
                        class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 focus:outline-none focus:ring-2 focus:ring-violet-500/30 focus:border-violet-400 bg-white">
                    <option value="newest"     @selected(request('sort','newest') === 'newest')>Newest First</option>
                    <option value="oldest"     @selected(request('sort') === 'oldest')>Oldest First</option>
                    <option value="name_asc"   @selected(request('sort') === 'name_asc')>Name A–Z</option>
                    <option value="name_desc"  @selected(request('sort') === 'name_desc')>Name Z–A</option>
                    <option value="most_appts" @selected(request('sort') === 'most_appts')>Most Appointments</option>
                </select>
                <button type="submit"
                        class="px-6 py-2.5 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold text-sm hover:opacity-90 transition-opacity">
                    Search
                </button>
                @if(request()->hasAny(['search','sort']))
                <a href="{{ route('admin.customers.index') }}"
                   class="px-4 py-2.5 border-2 border-gray-200 text-gray-500 rounded-xl font-bold text-sm hover:bg-gray-50 transition-colors text-center">
                    Reset
                </a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-2xl border border-gray-200/60 shadow-sm overflow-hidden">
            @if($customers->isEmpty())
            <div class="py-20 text-center">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-violet-50 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-violet-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                    </svg>
                </div>
                <p class="text-gray-400 font-semibold text-lg">No customers found</p>
                @if(request('search'))
                    <p class="text-gray-300 text-sm mt-1">Try a different search term</p>
                @endif
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-violet-50 to-fuchsia-50 border-b border-violet-100">
                            <th class="text-left px-6 py-4 font-bold text-violet-700 text-xs uppercase tracking-wider">Customer</th>
                            <th class="text-left px-4 py-4 font-bold text-violet-700 text-xs uppercase tracking-wider hidden md:table-cell">Contact</th>
                            <th class="text-center px-4 py-4 font-bold text-violet-700 text-xs uppercase tracking-wider">Appts</th>
                            <th class="text-center px-4 py-4 font-bold text-violet-700 text-xs uppercase tracking-wider hidden lg:table-cell">Completed</th>
                            <th class="text-center px-4 py-4 font-bold text-violet-700 text-xs uppercase tracking-wider hidden lg:table-cell">Cancelled</th>
                            <th class="text-left px-4 py-4 font-bold text-violet-700 text-xs uppercase tracking-wider hidden md:table-cell">Joined</th>
                            <th class="px-4 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($customers as $customer)
                        <tr class="hover:bg-violet-50/40 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-500 to-fuchsia-500 flex items-center justify-center text-white font-black text-sm flex-shrink-0 shadow-md shadow-violet-200">
                                        {{ strtoupper(substr($customer->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800">{{ $customer->name }}</p>
                                        <p class="text-xs text-gray-400 font-medium md:hidden">{{ $customer->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 hidden md:table-cell">
                                <p class="font-medium text-gray-700">{{ $customer->email }}</p>
                                @if($customer->phone)
                                <p class="text-xs text-gray-400 font-medium mt-0.5">{{ $customer->phone }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg
                                    {{ $customer->appointments_count > 0 ? 'bg-violet-100 text-violet-700' : 'bg-gray-100 text-gray-400' }}
                                    font-black text-sm">
                                    {{ $customer->appointments_count }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-center hidden lg:table-cell">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg
                                    {{ $customer->completed_count > 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-400' }}
                                    font-black text-sm">
                                    {{ $customer->completed_count }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-center hidden lg:table-cell">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg
                                    {{ $customer->cancelled_count > 0 ? 'bg-red-100 text-red-500' : 'bg-gray-100 text-gray-400' }}
                                    font-black text-sm">
                                    {{ $customer->cancelled_count }}
                                </span>
                            </td>
                            <td class="px-4 py-4 hidden md:table-cell">
                                <p class="text-gray-600 font-medium text-xs">{{ $customer->created_at->format('M d, Y') }}</p>
                                <p class="text-gray-400 text-xs">{{ $customer->created_at->diffForHumans() }}</p>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2 justify-end">
                                    <a href="{{ route('admin.customers.show', $customer) }}"
                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-violet-50 text-violet-600 border border-violet-200 rounded-lg font-bold text-xs hover:bg-violet-100 transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        View
                                    </a>
                                    <form method="POST" action="{{ route('admin.customers.destroy', $customer) }}"
                                          onsubmit="return confirm('Remove {{ addslashes($customer->name) }}? This cannot be undone.')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center justify-center w-7 h-7 bg-red-50 text-red-400 border border-red-200 rounded-lg hover:bg-red-100 hover:text-red-600 transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($customers->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                <p class="text-xs text-gray-400 font-medium">
                    Showing {{ $customers->firstItem() }}–{{ $customers->lastItem() }} of {{ number_format($customers->total()) }} customers
                </p>
                {{ $customers->links() }}
            </div>
            @endif
            @endif
        </div>

    </div>
</x-app-layout>
