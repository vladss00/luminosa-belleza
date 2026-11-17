<x-app-layout>
    <x-slot name="header">
        <div class="py-3">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.customers.index') }}"
                   class="w-9 h-9 rounded-xl bg-violet-100 flex items-center justify-center text-violet-600 hover:bg-violet-200 transition-colors flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                    </svg>
                </a>
                <div>
                    <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                        {{ $customer->name }}
                    </h2>
                    <p class="text-sm font-semibold text-gray-500 mt-0.5">Customer since {{ $customer->created_at->format('F Y') }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

        {{-- Profile + Stats --}}
        <div class="grid lg:grid-cols-3 gap-6">

            {{-- Profile Card --}}
            <div class="bg-white rounded-2xl border border-gray-200/60 shadow-sm p-7">
                <div class="flex flex-col items-center text-center mb-6">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-violet-500 to-fuchsia-500 flex items-center justify-center text-white font-black text-3xl shadow-xl shadow-violet-200 mb-4">
                        {{ strtoupper(substr($customer->name, 0, 1)) }}
                    </div>
                    <h3 class="font-black text-xl text-gray-800">{{ $customer->name }}</h3>
                    <span class="mt-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-violet-100 text-violet-700">
                        Customer
                    </span>
                </div>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <svg class="w-4 h-4 text-violet-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                        <span class="font-medium text-gray-700 truncate">{{ $customer->email }}</span>
                    </div>
                    @if($customer->phone)
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <svg class="w-4 h-4 text-violet-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                        <span class="font-medium text-gray-700">{{ $customer->phone }}</span>
                    </div>
                    @endif
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <svg class="w-4 h-4 text-violet-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18.75 0c0 1.242 1.008 2.25 2.25 2.25h13.5c1.242 0 2.25-1.008 2.25-2.25m-18.75 0V7.5"/>
                        </svg>
                        <span class="font-medium text-gray-700">Joined {{ $customer->created_at->format('M d, Y') }}</span>
                    </div>
                </div>

                <div class="mt-6 pt-5 border-t border-gray-100">
                    <form method="POST" action="{{ route('admin.customers.destroy', $customer) }}"
                          onsubmit="return confirm('Permanently remove {{ addslashes($customer->name) }}?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="w-full py-2.5 rounded-xl bg-red-50 text-red-500 border border-red-200 font-bold text-sm hover:bg-red-100 transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Remove Customer
                        </button>
                    </form>
                </div>
            </div>

            {{-- Stats Grid --}}
            <div class="lg:col-span-2 grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-2 xl:grid-cols-4 gap-4 content-start">
                @php
                $statCards = [
                    ['label'=>'Total Bookings',  'value'=>$stats['total'],     'color'=>'from-violet-600 to-fuchsia-600', 'text'=>'text-violet-600'],
                    ['label'=>'Completed',        'value'=>$stats['completed'], 'color'=>'from-emerald-500 to-teal-500',  'text'=>'text-emerald-600'],
                    ['label'=>'Pending',          'value'=>$stats['pending'],   'color'=>'from-amber-500 to-orange-500',  'text'=>'text-amber-600'],
                    ['label'=>'Cancelled',        'value'=>$stats['cancelled'], 'color'=>'from-red-500 to-rose-500',      'text'=>'text-red-500'],
                ];
                @endphp
                @foreach($statCards as $s)
                <div class="bg-white rounded-2xl border border-gray-200/60 shadow-sm p-5">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $s['color'] }} flex items-center justify-center mb-3 shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-black {{ $s['text'] }}">{{ $s['value'] }}</p>
                    <p class="text-xs font-bold text-gray-500 mt-0.5">{{ $s['label'] }}</p>
                </div>
                @endforeach

                {{-- Total spent --}}
                <div class="col-span-2 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-2xl shadow-lg shadow-violet-200 p-5 text-white">
                    <p class="text-xs font-bold text-white/70 uppercase tracking-wider mb-1">Total Spent</p>
                    <p class="text-3xl font-black">₱{{ number_format($stats['spent'], 2) }}</p>
                    <p class="text-white/70 text-xs font-medium mt-1">From completed appointments</p>
                </div>
            </div>
        </div>

        {{-- Appointment History --}}
        <div class="bg-white rounded-2xl border border-gray-200/60 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-black text-gray-800">Appointment History</h3>
                <span class="text-xs font-bold text-gray-400">{{ $customer->appointments->count() }} total</span>
            </div>

            @if($customer->appointments->isEmpty())
            <div class="py-14 text-center">
                <svg class="w-10 h-10 text-gray-200 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-400 font-semibold">No appointments yet</p>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="text-left px-6 py-3 font-bold text-gray-500 text-xs uppercase tracking-wider">Date & Time</th>
                            <th class="text-left px-4 py-3 font-bold text-gray-500 text-xs uppercase tracking-wider hidden sm:table-cell">Service</th>
                            <th class="text-left px-4 py-3 font-bold text-gray-500 text-xs uppercase tracking-wider hidden md:table-cell">Staff</th>
                            <th class="text-center px-4 py-3 font-bold text-gray-500 text-xs uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($customer->appointments as $appt)
                        @php
                        $statusColors = [
                            'completed'   => 'bg-emerald-100 text-emerald-700',
                            'confirmed'   => 'bg-blue-100 text-blue-700',
                            'pending'     => 'bg-amber-100 text-amber-700',
                            'cancelled'   => 'bg-red-100 text-red-500',
                            'in_progress' => 'bg-violet-100 text-violet-700',
                        ];
                        $color = $statusColors[$appt->status] ?? 'bg-gray-100 text-gray-500';
                        @endphp
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-3.5">
                                <p class="font-semibold text-gray-700">{{ $appt->appointment_date->format('M d, Y') }}</p>
                                <p class="text-gray-400 text-xs">{{ $appt->appointment_date->format('h:i A') }}</p>
                            </td>
                            <td class="px-4 py-3.5 hidden sm:table-cell">
                                <p class="font-medium text-gray-700">
                                    {{ $appt->services->pluck('name')->join(', ') ?: ($appt->service->name ?? '—') }}
                                </p>
                            </td>
                            <td class="px-4 py-3.5 hidden md:table-cell">
                                <p class="font-medium text-gray-600">{{ $appt->staff->user->name ?? '—' }}</p>
                            </td>
                            <td class="px-4 py-3.5 text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold {{ $color }}">
                                    {{ ucfirst(str_replace('_', ' ', $appt->status)) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

    </div>
</x-app-layout>
