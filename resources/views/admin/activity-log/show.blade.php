<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.activity-log.index') }}"
               class="w-9 h-9 rounded-xl bg-violet-100 flex items-center justify-center text-violet-600 hover:bg-violet-200 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <div>
                <h2 class="font-display text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
                    Log Entry #{{ $activityLog->id }}
                </h2>
                <p class="text-sm text-slate-500 mt-0.5">{{ $activityLog->created_at->format('l, F d, Y — h:i:s A') }}</p>
            </div>
        </div>
    </x-slot>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .card { background: white; border-radius: 1.25rem; box-shadow: 0 1px 3px rgba(0,0,0,.07),0 8px 24px rgba(139,92,246,.08); }
        .label { font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: #94a3b8; margin-bottom: .35rem; display: block; }
        .value { font-size: .9375rem; font-weight: 600; color: #1e293b; }
        .badge { display: inline-flex; align-items: center; gap: 4px; padding: 4px 12px; border-radius: 9999px; font-size: .8rem; font-weight: 700; }
        .badge-green  { background:#d1fae5; color:#065f46; }
        .badge-blue   { background:#dbeafe; color:#1e40af; }
        .badge-red    { background:#fee2e2; color:#991b1b; }
        .badge-yellow { background:#fef3c7; color:#92400e; }
        .badge-violet { background:#ede9fe; color:#5b21b6; }
        .badge-slate  { background:#f1f5f9; color:#475569; }
        .badge-orange { background:#ffedd5; color:#9a3412; }
        .badge-gray   { background:#f3f4f6; color:#4b5563; }
    </style>

    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto space-y-6">

        {{-- Main info card --}}
        <div class="card p-7">
            <div class="flex items-start gap-5 mb-6 pb-6 border-b border-slate-100">
                @php $color = $activityLog->action_color; @endphp
                <div class="w-14 h-14 rounded-2xl bg-{{ $color === 'green' ? 'emerald' : $color }}-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-7 h-7 text-{{ $color === 'green' ? 'emerald' : $color }}-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $activityLog->action_icon }}" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap gap-2 mb-2">
                        <span class="badge badge-{{ $color }}">{{ ucfirst(str_replace('_', ' ', $activityLog->action)) }}</span>
                        <span class="badge badge-violet">{{ ucfirst($activityLog->module) }}</span>
                    </div>
                    <p class="text-slate-800 font-semibold text-base leading-relaxed">{{ $activityLog->description }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <span class="label">Performed By</span>
                    @if($activityLog->user)
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-violet-500 to-fuchsia-500 flex items-center justify-center text-white font-black text-sm flex-shrink-0">
                            {{ strtoupper(substr($activityLog->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="value">{{ $activityLog->user->name }}</p>
                            <p class="text-xs text-slate-400 font-medium">{{ $activityLog->user->email }}</p>
                        </div>
                    </div>
                    @else
                    <p class="value text-slate-400 italic">Deleted / System User</p>
                    @endif
                </div>

                <div>
                    <span class="label">Timestamp</span>
                    <p class="value">{{ $activityLog->created_at->format('M d, Y h:i:s A') }}</p>
                    <p class="text-xs text-slate-400 font-medium mt-0.5">{{ $activityLog->created_at->diffForHumans() }}</p>
                </div>

                <div>
                    <span class="label">IP Address</span>
                    <code class="text-sm bg-slate-100 text-slate-700 px-3 py-1.5 rounded-lg font-mono inline-block">
                        {{ $activityLog->ip_address ?? '—' }}
                    </code>
                </div>

                @if($activityLog->subject_type)
                <div>
                    <span class="label">Subject</span>
                    <p class="value text-sm">{{ class_basename($activityLog->subject_type) }} #{{ $activityLog->subject_id }}</p>
                </div>
                @endif

                @if($activityLog->user_agent)
                <div class="sm:col-span-2">
                    <span class="label">User Agent</span>
                    <p class="text-xs text-slate-500 font-mono bg-slate-50 px-3 py-2 rounded-lg break-all">{{ $activityLog->user_agent }}</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Properties / snapshot --}}
        @if($activityLog->properties)
        <div class="card p-7">
            <h3 class="font-black text-slate-700 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-violet-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                </svg>
                Data Snapshot
            </h3>
            <pre class="text-xs bg-slate-50 text-slate-700 p-4 rounded-xl overflow-x-auto font-mono leading-relaxed border border-slate-200">{{ json_encode($activityLog->properties, JSON_PRETTY_PRINT) }}</pre>
        </div>
        @endif

        <div class="flex justify-end">
            <a href="{{ route('admin.activity-log.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-xl font-bold text-sm hover:opacity-90 transition-opacity">
                ← Back to Activity Log
            </a>
        </div>

    </div>
</x-app-layout>
