<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Account - Luminosa </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Ultra-modern animated gradient */
        .brand-gradient {
            background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 25%, #d946ef 50%, #c026d3 75%, #a855f7 100%);
            background-size: 400% 400%;
            animation: gradient-shift 15s ease infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .auth-bg {
            background: linear-gradient(135deg, #f5f3ff 0%, #faf5ff 50%, #fdf4ff 100%);
        }
        
        /* Glass morphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(50px);
            -webkit-backdrop-filter: blur(50px);
        }
        
        /* Premium shadows */
        .shadow-violet-intense {
            box-shadow: 
                0 10px 50px rgba(139, 92, 246, 0.3),
                0 20px 70px rgba(217, 70, 239, 0.2),
                0 30px 90px rgba(168, 85, 247, 0.1);
        }
        
        /* Floating animations */
        @keyframes float-complex {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25% { transform: translate(30px, -40px) rotate(5deg) scale(1.05); }
            50% { transform: translate(-20px, -30px) rotate(-3deg) scale(0.95); }
            75% { transform: translate(20px, -20px) rotate(3deg) scale(1.02); }
        }
        
        .float-1 { animation: float-complex 20s ease-in-out infinite; }
        .float-2 { animation: float-complex 25s ease-in-out infinite; animation-delay: -8s; }
        .float-3 { animation: float-complex 30s ease-in-out infinite; animation-delay: -15s; }
        
        /* Pulse rainbow */
        @keyframes pulse-rainbow {
            0%, 100% { 
                box-shadow: 0 0 30px rgba(139, 92, 246, 0.5), 0 0 60px rgba(217, 70, 239, 0.3);
            }
            50% { 
                box-shadow: 0 0 50px rgba(217, 70, 239, 0.6), 0 0 100px rgba(139, 92, 246, 0.4);
            }
        }
        
        .pulse-rainbow { animation: pulse-rainbow 4s ease-in-out infinite; }
        
        /* Smooth transitions */
        .smooth { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .smooth-fast { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        
        /* Password strength bar animations */
        .strength-bar {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Animated border */
        @keyframes border-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .border-animated {
            background: linear-gradient(90deg, #8b5cf6, #d946ef, #a855f7, #8b5cf6);
            background-size: 300% 100%;
            animation: border-flow 6s ease infinite;
        }
    </style>
</head>
<body class="antialiased auth-bg relative overflow-x-hidden">
    <!-- Animated Gradient Orbs -->
    <div class="fixed top-10 right-10 w-[700px] h-[700px] bg-violet-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-30 float-1 pointer-events-none"></div>
    <div class="fixed bottom-10 left-10 w-[650px] h-[650px] bg-fuchsia-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-30 float-2 pointer-events-none"></div>
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-purple-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-20 float-3 pointer-events-none"></div>
    
    <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 relative z-10">
        <!-- Modern Logo -->
        <div class="mb-8">
            <a href="{{ route('home') }}" class="flex items-center justify-center group">
                <div class="text-center">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="relative">
                            <div class="absolute inset-0 brand-gradient rounded-2xl blur-xl opacity-60"></div>
                            <div class="relative w-16 h-16 brand-gradient rounded-2xl flex items-center justify-center pulse-rainbow border-2 border-white/40 group-hover:scale-110 smooth">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h1 class="text-4xl font-black bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 bg-clip-text text-transparent mb-2">
                        Luminosa 
                    </h1>
                    <p class="text-gray-600 font-bold tracking-wide text-sm">Where Beauty Meets Innovation</p>
                </div>
            </a>
        </div>

        <!-- Register Card -->
        <div class="w-full sm:max-w-lg mb-8">
            <div class="glass-card px-8 py-10 shadow-violet-intense rounded-[2rem] overflow-hidden smooth relative">
                <!-- Animated top border -->
                <div class="absolute top-0 left-0 right-0 h-1 border-animated"></div>
                
                <!-- Header -->
                <div class="mb-8 text-center">
                    <h2 class="text-3xl font-black text-gray-900 mb-2">Create Your Account</h2>
                    <p class="text-gray-600 font-semibold">Join us and book your beauty appointments</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-rose-400 opacity-10 rounded-2xl"></div>
                        <div class="relative bg-red-50/80 backdrop-blur-sm border-2 border-red-200 rounded-2xl p-4">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-red-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-red-900 mb-2 text-sm">Validation Errors</p>
                                    <ul class="text-sm text-red-700 font-medium space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li class="flex items-start gap-2">
                                                <span class="text-red-500 mt-0.5">•</span>
                                                <span>{{ $error }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div class="group">
                        <label for="name" class="block text-xs font-black text-gray-700 mb-2 uppercase tracking-widest">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-violet-500 group-focus-within:text-violet-600 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                   class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 smooth bg-white font-semibold text-gray-900 hover:border-violet-300 @error('name') border-red-400 @enderror"
                                   placeholder="John Doe">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="group">
                        <label for="email" class="block text-xs font-black text-gray-700 mb-2 uppercase tracking-widest">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-violet-500 group-focus-within:text-violet-600 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                   class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 smooth bg-white font-semibold text-gray-900 hover:border-violet-300 @error('email') border-red-400 @enderror"
                                   placeholder="you@example.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="group">
                        <label for="phone" class="block text-xs font-black text-gray-700 mb-2 uppercase tracking-widest">
                            Phone Number <span class="text-gray-400 text-xs font-normal">(optional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-violet-500 group-focus-within:text-violet-600 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                   class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 smooth bg-white font-semibold text-gray-900 hover:border-violet-300"
                                   placeholder="+639123456789">
                        </div>
                    </div>

                    <!-- Password with Strength Indicator -->
                    <div class="group">
                        <label for="password" class="block text-xs font-black text-gray-700 mb-2 uppercase tracking-widest">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-violet-500 group-focus-within:text-violet-600 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                   class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 smooth bg-white font-semibold text-gray-900 hover:border-violet-300"
                                   placeholder="Create a strong password"
                                   oninput="checkPasswordStrength(this.value)">
                        </div>
                        
                        <!-- Password Strength Bar -->
                        <div class="mt-3">
                            <div class="flex gap-1 mb-2">
                                <div id="strength-bar-1" class="strength-bar h-1.5 flex-1 rounded-full bg-gray-200"></div>
                                <div id="strength-bar-2" class="strength-bar h-1.5 flex-1 rounded-full bg-gray-200"></div>
                                <div id="strength-bar-3" class="strength-bar h-1.5 flex-1 rounded-full bg-gray-200"></div>
                                <div id="strength-bar-4" class="strength-bar h-1.5 flex-1 rounded-full bg-gray-200"></div>
                            </div>
                            <div class="flex items-center justify-between">
                                <p id="strength-text" class="text-xs font-bold text-gray-400">Enter password to check strength</p>
                                <p class="text-xs text-gray-500 font-medium">Min. 8 characters</p>
                            </div>
                        </div>
                        
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="group">
                        <label for="password_confirmation" class="block text-xs font-black text-gray-700 mb-2 uppercase tracking-widest">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-violet-500 group-focus-within:text-violet-600 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                   class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 smooth bg-white font-semibold text-gray-900 hover:border-violet-300"
                                   placeholder="Re-enter your password">
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="pt-2">
                        <label class="flex items-start group cursor-pointer">
                            <input type="checkbox" required
                                   class="mt-1 rounded-lg border-2 border-gray-300 text-violet-600 shadow-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-200 focus:ring-opacity-50 w-5 h-5 smooth-fast">
                            <span class="ml-3 text-sm text-gray-600 font-medium">
                                I agree to the <a href="#" class="text-violet-600 hover:text-violet-800 font-bold hover:underline">Terms of Service</a> and <a href="#" class="text-violet-600 hover:text-violet-800 font-bold hover:underline">Privacy Policy</a>
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full brand-gradient text-white font-black py-4 px-6 rounded-2xl shadow-violet-intense hover:shadow-luxury smooth hover:scale-[1.02] relative overflow-hidden group">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Create Account
                            <svg class="w-5 h-5 group-hover:translate-x-1 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </button>
                </form>

                <!-- Benefits -->
                <div class="mt-8 relative overflow-hidden rounded-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-400/10 via-fuchsia-400/10 to-purple-400/10"></div>
                    <div class="relative p-5 bg-gradient-to-br from-violet-50 to-fuchsia-50 border-2 border-violet-200">
                        <p class="text-xs font-black text-violet-900 mb-3 uppercase tracking-widest">Member Benefits:</p>
                        <ul class="text-sm text-violet-800 font-medium space-y-2">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-violet-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Book appointments 24/7 online
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-violet-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Choose your preferred stylist
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-violet-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Track your booking history
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-violet-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Manage appointments easily
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600 font-medium">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-black text-violet-600 hover:text-violet-800 smooth-fast hover:underline ml-1">
                            Sign in here →
                        </a>
                    </p>
                </div>

                <!-- Back to Home -->
                <div class="mt-5 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-violet-600 font-bold smooth-fast group">
                        <svg class="w-4 h-4 group-hover:-translate-x-1 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Homepage
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center">
            <p class="text-sm text-gray-600 font-semibold">&copy; {{ date('Y') }} Luminosa . All rights reserved.</p>
        </div>
    </div>

    <!-- Password Strength Checker Script -->
    <script>
        function checkPasswordStrength(password) {
            const strengthBars = [
                document.getElementById('strength-bar-1'),
                document.getElementById('strength-bar-2'),
                document.getElementById('strength-bar-3'),
                document.getElementById('strength-bar-4')
            ];
            const strengthText = document.getElementById('strength-text');
            
            // Reset all bars
            strengthBars.forEach(bar => {
                bar.className = 'strength-bar h-1.5 flex-1 rounded-full bg-gray-200';
            });
            
            if (password.length === 0) {
                strengthText.textContent = 'Enter password to check strength';
                strengthText.className = 'text-xs font-bold text-gray-400';
                return;
            }
            
            let strength = 0;
            
            // Check length
            if (password.length >= 8) strength++;
            if (password.length >= 12) strength++;
            
            // Check for uppercase
            if (/[A-Z]/.test(password)) strength++;
            
            // Check for lowercase
            if (/[a-z]/.test(password)) strength++;
            
            // Check for numbers
            if (/[0-9]/.test(password)) strength++;
            
            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            // Calculate final strength (0-4 scale)
            let finalStrength = Math.min(Math.floor(strength / 1.5), 4);
            
            // Update bars and text based on strength
            if (finalStrength >= 1) {
                strengthBars[0].className = 'strength-bar h-1.5 flex-1 rounded-full bg-red-500';
                strengthText.textContent = '😟 Weak - Add more characters';
                strengthText.className = 'text-xs font-bold text-red-600';
            }
            if (finalStrength >= 2) {
                strengthBars[1].className = 'strength-bar h-1.5 flex-1 rounded-full bg-orange-500';
                strengthText.textContent = '😐 Fair - Add numbers or symbols';
                strengthText.className = 'text-xs font-bold text-orange-600';
            }
            if (finalStrength >= 3) {
                strengthBars[2].className = 'strength-bar h-1.5 flex-1 rounded-full bg-yellow-500';
                strengthText.textContent = '🙂 Good - Almost there!';
                strengthText.className = 'text-xs font-bold text-yellow-600';
            }
            if (finalStrength >= 4) {
                strengthBars[3].className = 'strength-bar h-1.5 flex-1 rounded-full bg-green-500';
                strengthText.textContent = '🔒 Strong - Excellent password!';
                strengthText.className = 'text-xs font-bold text-green-600';
            }
        }
    </script>
</body>
</html>