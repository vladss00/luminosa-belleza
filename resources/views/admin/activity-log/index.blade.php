<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                    Activity Log
                </h2>
                <p class="mt-1 text-sm text-slate-500 flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75a2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                    Track every admin action across the system
                </p>
            </div>
            <!-- Clear Logs Modal Trigger -->
            <button onclick="document.getElementById('clearModal').classList.remove('hidden')"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-50 text-red-600 border border-red-200 rounded-xl font-semibold text-sm hover:bg-red-100 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Clear Logs
            </button>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }

        .card {
            background: white;
            border-radius: 1.25rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.07), 0 8px 24px rgba(139,92,246,.08);
        }

        .stat-card {
            background: white;
            border-radius: 1.25rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 4px 16px rgba(139,92,246,.07);
            transition: transform .2s, box-shadow .2s;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(139,92,246,.18); }

        .badge {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 3px 10px; border-radius: 9999px;
            font-size: .75rem; font-weight: 700; letter-spacing: .02em;
        }
        .badge-green  { background:#d1fae5; color:#065f46; }
        .badge-blue   { background:#dbeafe; color:#1e40af; }
        .badge-red    { background:#fee2e2; color:#991b1b; }
        .badge-yellow { background:#fef3c7; color:#92400e; }
        .badge-violet { background:#ede9fe; color:#5b21b6; }
        .badge-slate  { background:#f1f5f9; color:#475569; }
        .badge-orange { background:#ffedd5; color:#9a3412; }
        .badge-gray   { background:#f3f4f6; color:#4b5563; }

        .module-pill {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 3px 10px; border-radius: 9999px;
            font-size: .72rem; font-weight: 600;
            background: rgba(139,92,246,.1); color: #6d28d9;
        }

        .log-row { border-left: 3px solid transparent; transition: background .15s, border-color .15s; }
        .log-row:hover { background: #faf5ff; border-left-color: #a78bfa; }

        .filter-input {
            border: 1.5px solid #e2e8f0; border-radius: .75rem;
            padding: .5rem .875rem; font-size: .875rem; font-weight: 500;
            color: #374151; background: white;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }
        .filter-input:focus { border-color: #a78bfa; box-shadow: 0 0 0 3px rgba(167,139,250,.2); }

        .btn-filter {
            padding: .5rem 1.25rem; border-radius: .75rem;
            font-size: .875rem; font-weight: 700;
            background: linear-gradient(135deg,#8b5cf6,#d946ef);
            color: white; border: none; cursor: pointer;
            transition: opacity .2s, transform .2s;
        }
        .btn-filter:hover { opacity: .92; transform: translateY(-1px); }

        .timeline-dot {
            width: 2.25rem; height: 2.25rem; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .dot-green  { background:#d1fae5; color:#10b981; }
        .dot-blue   { background:#dbeafe; color:#3b82f6; }
        .dot-red    { background:#fee2e2; color:#ef4444; }
        .dot-yellow { background:#fef3c7; color:#f59e0b; }
        .dot-violet { background:#ede9fe; color:#8b5cf6; }
        .dot-slate  { background:#f1f5f9; color:#94a3b8; }
        .dot-orange { background:#ffedd5; color:#f97316; }
        .dot-gray   { background:#f3f4f6; color:#6b7280; }

        .pagination-link {
            display: inline-flex; align-items: center; justify-content: center;
            width: 2rem; height: 2rem; border-radius: .5rem;
            font-size: .875rem; font-weight: 600; color: #6d28d9;
            background: #ede9fe; transition: background .2s;
        }
        .pagination-link:hover { background:#ddd6fe; }
        .pagination-active { background: linear-gradient(135deg,#8b5cf6,#d946ef); color:white; }
    </style>

    <div class="py-6 space-y-6">

        {{-- ── FLASH MESSAGE ────────────────────────────────────────── --}}
        @if(session('success'))
        <div class="mx-4 sm:mx-6 lg:mx-8 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-3.5 rounded-xl font-medium text-sm">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
        @endif

        <div class="px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ── STAT CARDS ───────────────────────────────────────── --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                    $statDefs = [
                        ['label'=>'Total Logs',    'value'=>$stats['total'],  'icon'=>'M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z', 'gradient'=>'from-violet-500 to-fuchsia-500'],
                        ['label'=>'Today',         'value'=>$stats['today'],  'icon'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18.75 0c0 1.242 1.008 2.25 2.25 2.25h13.5c1.242 0 2.25-1.008 2.25-2.25m-18.75 0V7.5',    'gradient'=>'from-blue-500 to-cyan-400'],
                        ['label'=>'Last 7 Days',   'value'=>$stats['week'],   'icon'=>'M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5', 'gradient'=>'from-emerald-500 to-teal-400'],
                        ['label'=>'Logins Today',  'value'=>$stats['logins'], 'icon'=>'M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9', 'gradient'=>'from-orange-400 to-rose-400'],
                    ];
                @endphp

                @foreach($statDefs as $s)
                <div class="stat-card p-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">{{ $s['label'] }}</span>
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $s['gradient'] }} flex items-center justify-center">
                            <svg class="w-4.5 h-4.5 text-white w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-black text-slate-800">{{ number_format($s['value']) }}</p>
                </div>
                @endforeach
            </div>

            {{-- ── FILTERS ──────────────────────────────────────────── --}}
            <div class="card p-5">
                <form method="GET" action="{{ route('admin.activity-log.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 items-end">
                    <div class="xl:col-span-2">
                        <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase tracking-wider">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               class="filter-input w-full" placeholder="Description, user name…">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase tracking-wider">Module</label>
                        <select name="module" class="filter-input w-full">
                            <option value="">All Modules</option>
                            @foreach($modules as $mod)
                                <option value="{{ $mod }}" @selected(request('module') === $mod)>
                                    {{ ucfirst($mod) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase tracking-wider">Action</label>
                        <select name="action" class="filter-input w-full">
                            <option value="">All Actions</option>
                            @foreach($actions as $act)
                                <option value="{{ $act }}" @selected(request('action') === $act)>
                                    {{ ucfirst(str_replace('_', ' ', $act)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase tracking-wider">User</label>
                        <select name="user_id" class="filter-input w-full">
                            <option value="">All Users</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}" @selected(request('user_id') == $u->id)>
                                    {{ $u->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="btn-filter flex-1">Filter</button>
                        @if(request()->hasAny(['search','module','action','user_id','date_from','date_to']))
                        <a href="{{ route('admin.activity-log.index') }}"
                           class="flex-1 text-center px-3 py-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-sm hover:bg-slate-50 transition-all">
                            Reset
                        </a>
                        @endif
                    </div>
                    {{-- Date range row --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase tracking-wider">From</label>
                        <input type="date" name="date_from" value="{{ request('date_from') }}" class="filter-input w-full">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase tracking-wider">To</label>
                        <input type="date" name="date_to" value="{{ request('date_to') }}" class="filter-input w-full">
                    </div>
                </form>
            </div>

            {{-- ── LOG TABLE ────────────────────────────────────────── --}}
            <div class="card overflow-hidden">
                @if($logs->isEmpty())
                <div class="py-20 text-center">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-violet-50 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-violet-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z" />
                        </svg>
                    </div>
                    <p class="text-slate-400 font-semibold">No activity logs found</p>
                    @if(request()->anyFilled(['search','module','action','user_id']))
                        <p class="text-slate-300 text-sm mt-1">Try adjusting your filters</p>
                    @endif
                </div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-violet-50 to-fuchsia-50 border-b border-violet-100">
                                <th class="text-left px-5 py-3.5 font-bold text-violet-700 text-xs uppercase tracking-wider">Event</th>
                                <th class="text-left px-4 py-3.5 font-bold text-violet-700 text-xs uppercase tracking-wider">Module</th>
                                <th class="text-left px-4 py-3.5 font-bold text-violet-700 text-xs uppercase tracking-wider hidden md:table-cell">User</th>
                                <th class="text-left px-4 py-3.5 font-bold text-violet-700 text-xs uppercase tracking-wider hidden lg:table-cell">IP Address</th>
                                <th class="text-left px-4 py-3.5 font-bold text-violet-700 text-xs uppercase tracking-wider">Time</th>
                                <th class="px-4 py-3.5"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($logs as $log)
                            @php $color = $log->action_color; @endphp
                            <tr class="log-row">
                                <td class="px-5 py-3.5">
                                    <div class="flex items-start gap-3">
                                        <div class="timeline-dot dot-{{ $color }} mt-0.5">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $log->action_icon }}" />
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <span class="badge badge-{{ $color }} mb-1">
                                                {{ ucfirst(str_replace('_', ' ', $log->action)) }}
                                            </span>
                                            <p class="text-slate-700 font-medium leading-snug text-xs mt-1 max-w-xs truncate" title="{{ $log->description }}">
                                                {{ $log->description }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="module-pill">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $log->module_icon }}" />
                                        </svg>
                                        {{ ucfirst($log->module) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 hidden md:table-cell">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-violet-500 to-fuchsia-500 flex items-center justify-center text-white font-bold text-xs flex-shrink-0">
                                            {{ strtoupper(substr($log->user->name ?? '?', 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-700 text-xs leading-tight">{{ $log->user->name ?? '—' }}</p>
                                            <p class="text-slate-400 text-xs">{{ $log->user->role ?? '' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5 hidden lg:table-cell">
                                    <code class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded-lg font-mono">
                                        {{ $log->ip_address ?? '—' }}
                                    </code>
                                </td>
                                <td class="px-4 py-3.5">
                                    <p class="text-slate-600 text-xs font-medium whitespace-nowrap">{{ $log->created_at->format('M d, Y') }}</p>
                                    <p class="text-slate-400 text-xs">{{ $log->created_at->format('h:i A') }}</p>
                                    <p class="text-slate-300 text-xs">{{ $log->created_at->diffForHumans() }}</p>
                                </td>
                                <td class="px-4 py-3.5">
                                    <a href="{{ route('admin.activity-log.show', $log) }}"
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-violet-50 text-violet-500 hover:bg-violet-100 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($logs->hasPages())
                <div class="px-5 py-4 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs text-slate-400 font-medium">
                        Showing {{ $logs->firstItem() }}–{{ $logs->lastItem() }} of {{ number_format($logs->total()) }} entries
                    </p>
                    <div class="flex items-center gap-1">
                        {{ $logs->links('vendor.pagination.custom') }}
                    </div>
                </div>
                @endif
                @endif
            </div>

        </div>{{-- /px wrapper --}}
    </div>{{-- /py-6 --}}

    {{-- ── CLEAR MODAL ──────────────────────────────────────────────── --}}
    <div id="clearModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="document.getElementById('clearModal').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-7 z-10">
            <div class="flex items-center gap-4 mb-5">
                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-black text-slate-800 text-lg">Clear Activity Logs</h3>
                    <p class="text-slate-500 text-sm">This action cannot be undone</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.activity-log.clear') }}">
                @csrf
                <div class="mb-5">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Delete logs older than:</label>
                    <select name="older_than" class="filter-input w-full">
                        <option value="7">7 days</option>
                        <option value="30" selected>30 days</option>
                        <option value="90">90 days</option>
                        <option value="all">All logs</option>
                    </select>
                </div>
                <div class="flex gap-3">
                    <button type="button" onclick="document.getElementById('clearModal').classList.add('hidden')"
                            class="flex-1 py-2.5 rounded-xl border-2 border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all">
                        Cancel
                    </button>
                    <button type="submit"
                            class="flex-1 py-2.5 rounded-xl bg-red-500 text-white font-bold text-sm hover:bg-red-600 transition-all">
                        Clear Logs
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
