<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\PasswordResetSms;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{


public function create()
{
    return view('auth.forgot-password');
}
    /**
     * Handle an incoming password reset link request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string'],
            'method' => ['required', 'in:email,sms'],
        ]);

        $input = $request->input('email');
        $method = $request->input('method');

        // Find user by email or phone
        $user = User::where('email', $input)
            ->orWhere('phone', $input)
            ->first();

        if (!$user) {
            return back()->withErrors(['email' => __('This email or phone number is not registered.')])->withInput();
        }

        if ($method === 'sms') {
            // Generate token manually for SMS
            $token = Str::random(64);

            // Store in password_reset_tokens
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                ['token' => Hash::make($token), 'created_at' => now()]
            );

            // Send SMS
            $user->notify(new PasswordResetSms($token, $user->email));

            return back()->with('status', __('We have sent a reset link to your phone.'));
        }

        // Default: send via email using Laravel's built-in
        $status = Password::sendResetLink(
            ['email' => $user->email]
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __('We have emailed your password reset link.'))
            : back()->withErrors(['email' => __($status)]);
    }
}