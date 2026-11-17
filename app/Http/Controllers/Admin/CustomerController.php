<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'customer')
            ->withCount('appointments')
            ->withCount(['appointments as completed_count' => fn($q) => $q->where('status', 'completed')])
            ->withCount(['appointments as pending_count'   => fn($q) => $q->where('status', 'pending')])
            ->withCount(['appointments as cancelled_count' => fn($q) => $q->where('status', 'cancelled')]);

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(fn($q) => $q->where('name', 'like', "%$s%")
                                      ->orWhere('email', 'like', "%$s%")
                                      ->orWhere('phone', 'like', "%$s%"));
        }

        if ($request->filled('sort')) {
            match ($request->sort) {
                'name_asc'   => $query->orderBy('name'),
                'name_desc'  => $query->orderByDesc('name'),
                'newest'     => $query->orderByDesc('created_at'),
                'oldest'     => $query->orderBy('created_at'),
                'most_appts' => $query->orderByDesc('appointments_count'),
                default      => $query->orderByDesc('created_at'),
            };
        } else {
            $query->orderByDesc('created_at');
        }

        $customers = $query->paginate(15)->withQueryString();

        $stats = [
            'total'        => User::where('role', 'customer')->count(),
            'new_this_month' => User::where('role', 'customer')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
            'with_appointments' => User::where('role', 'customer')
                ->whereHas('appointments')
                ->count(),
            'total_appointments' => Appointment::whereHas('customer')->count(),
        ];

        return view('admin.customers.index', compact('customers', 'stats'));
    }

    public function show(User $customer)
    {
        abort_if($customer->role !== 'customer', 404);

        $customer->load(['appointments' => fn($q) => $q->with(['services', 'staff.user'])
            ->orderByDesc('appointment_date')]);

        $stats = [
            'total'     => $customer->appointments->count(),
            'completed' => $customer->appointments->where('status', 'completed')->count(),
            'pending'   => $customer->appointments->where('status', 'pending')->count(),
            'cancelled' => $customer->appointments->where('status', 'cancelled')->count(),
            'spent'     => $customer->appointments->where('status', 'completed')
                ->sum(fn($a) => $a->services->sum('price')),
        ];

        return view('admin.customers.show', compact('customer', 'stats'));
    }

    public function destroy(User $customer)
    {
        abort_if($customer->role !== 'customer', 404);
        $name = $customer->name;
        $customer->delete();

        return redirect()
            ->route('admin.customers.index')
            ->with('success', "Customer \"{$name}\" has been removed.");
    }
}
