<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with('user')->latest();

        // --- Filters ---
        if ($request->filled('module')) {
            $query->where('module', $request->module);
        }

        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%"));
            });
        }

        $logs = $query->paginate(25)->withQueryString();

        // --- Stats for summary cards ---
        $stats = [
            'total'   => ActivityLog::count(),
            'today'   => ActivityLog::whereDate('created_at', today())->count(),
            'week'    => ActivityLog::where('created_at', '>=', now()->subDays(7))->count(),
            'logins'  => ActivityLog::where('action', 'login')->whereDate('created_at', today())->count(),
        ];

        // --- Filter option lists ---
        $modules = ActivityLog::select('module')->distinct()->pluck('module');
        $actions = ActivityLog::select('action')->distinct()->pluck('action');
        $users   = User::whereIn('role', ['admin', 'staff'])
            ->orderBy('name')
            ->get(['id', 'name', 'role']);

        return view('admin.activity-log.index', compact(
            'logs', 'stats', 'modules', 'actions', 'users'
        ));
    }

    public function show(ActivityLog $activityLog)
    {
        $activityLog->load('user');
        return view('admin.activity-log.show', compact('activityLog'));
    }

    public function clear(Request $request)
    {
        $request->validate([
            'older_than' => 'required|in:7,30,90,all',
        ]);

        $deleted = 0;

        if ($request->older_than === 'all') {
            $deleted = ActivityLog::count();
            ActivityLog::truncate();
        } else {
            $cutoff  = now()->subDays((int) $request->older_than);
            $deleted = ActivityLog::where('created_at', '<', $cutoff)->count();
            ActivityLog::where('created_at', '<', $cutoff)->delete();
        }

        // Log this action itself
        ActivityLog::log(
            'deleted',
            'activity-log',
            "Admin cleared {$deleted} activity log entries (older than {$request->older_than} days)."
        );

        return redirect()
            ->route('admin.activity-log.index')
            ->with('success', "{$deleted} log entries cleared successfully.");
    }
}
