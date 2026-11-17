<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In - Luminosa Belleza</title>
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
        
        /* Advanced glass morphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(50px);
            -webkit-backdrop-filter: blur(50px);
        }
        
        /* Premium layered shadows */
        .shadow-luxury {
            box-shadow: 
                0 4px 20px rgba(139, 92, 246, 0.12),
                0 8px 40px rgba(139, 92, 246, 0.08),
                0 16px 60px rgba(139, 92, 246, 0.04);
        }
        
        .shadow-violet-intense {
            box-shadow: 
                0 10px 50px rgba(139, 92, 246, 0.3),
                0 20px 70px rgba(217, 70, 239, 0.2),
                0 30px 90px rgba(168, 85, 247, 0.1);
        }
        
        /* Floating orb animations */
        @keyframes float-complex {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25% { transform: translate(30px, -40px) rotate(5deg) scale(1.05); }
            50% { transform: translate(-20px, -30px) rotate(-3deg) scale(0.95); }
            75% { transform: translate(20px, -20px) rotate(3deg) scale(1.02); }
        }
        
        .float-1 { animation: float-complex 20s ease-in-out infinite; }
        .float-2 { animation: float-complex 25s ease-in-out infinite; animation-delay: -8s; }
        .float-3 { animation: float-complex 30s ease-in-out infinite; animation-delay: -15s; }
        
        /* Pulse glow with color shift */
        @keyframes pulse-rainbow {
            0%, 100% { 
                box-shadow: 
                    0 0 30px rgba(139, 92, 246, 0.5),
                    0 0 60px rgba(217, 70, 239, 0.3);
            }
            50% { 
                box-shadow: 
                    0 0 50px rgba(217, 70, 239, 0.6),
                    0 0 100px rgba(139, 92, 246, 0.4);
            }
        }
        
        .pulse-rainbow { animation: pulse-rainbow 4s ease-in-out infinite; }
        
        /* Button hover glow */
        .btn-glow:hover {
            box-shadow: 
                0 0 40px rgba(139, 92, 246, 0.6),
                0 0 80px rgba(217, 70, 239, 0.4),
                0 10px 60px rgba(168, 85, 247, 0.3);
        }
        
        /* Smooth premium transitions */
        .smooth { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .smooth-fast { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        
        /* Input focus with color shift */
        input:focus {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.02), rgba(217, 70, 239, 0.02));
            box-shadow: 
                0 0 0 4px rgba(139, 92, 246, 0.1),
                0 4px 20px rgba(139, 92, 246, 0.15);
        }
        
        /* Animated border gradient */
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
    <!-- Advanced Animated Gradient Orbs -->
    <div class="fixed top-10 right-10 w-[700px] h-[700px] bg-violet-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-30 float-1 pointer-events-none"></div>
    <div class="fixed bottom-10 left-10 w-[650px] h-[650px] bg-fuchsia-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-30 float-2 pointer-events-none"></div>
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-purple-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-20 float-3 pointer-events-none"></div>
    
    <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 relative z-10">
        <!-- Modern Logo with Enhanced Glow -->
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

        <!-- Ultra-Modern Login Card -->
        <div class="w-full sm:max-w-lg mb-8">
            <div class="glass-card px-8 py-10 shadow-violet-intense rounded-[2rem] overflow-hidden smooth hover:shadow-luxury relative">
                <!-- Decorative gradient line -->
                <div class="absolute top-0 left-0 right-0 h-1 border-animated"></div>
                
                <!-- Enhanced Header -->
                <div class="mb-8 text-center">
                    <h2 class="text-3xl font-black text-gray-900 mb-2 leading-tight">Welcome Back!</h2>
                    <p class="text-gray-600 font-semibold">Sign in to continue your beauty journey</p>
                </div>

                <!-- Modern Success Message -->
                @if (session('status'))
                    <div class="mb-6 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-green-400 opacity-10 rounded-2xl"></div>
                        <div class="relative font-medium text-sm text-emerald-800 bg-emerald-50/80 backdrop-blur-sm border-2 border-emerald-200 rounded-2xl p-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-emerald-900 mb-1">Success!</p>
                                    <p class="text-emerald-700">{{ session('status') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Modern Error Messages -->
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
                                    <p class="font-bold text-red-900 mb-2 text-sm">Authentication Error</p>
                                    <div class="text-sm text-red-700 font-medium space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <p class="flex items-start gap-2">
                                                <span class="text-red-500 mt-0.5">•</span>
                                                <span>{{ $error }}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Ultra-Modern Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="group">
                        <label for="email" class="block text-xs font-black text-gray-700 mb-2 uppercase tracking-widest">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-violet-500 group-focus-within:text-violet-600 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                   class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 smooth bg-white font-semibold text-gray-900 hover:border-violet-300"
                                   placeholder="you@example.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="group">
                        <label for="password" class="block text-xs font-black text-gray-700 mb-2 uppercase tracking-widest">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-violet-500 group-focus-within:text-violet-600 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                   class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500 smooth bg-white font-semibold text-gray-900 hover:border-violet-300"
                                   placeholder="Enter your password">
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center group cursor-pointer">
                            <input type="checkbox" name="remember" class="rounded-lg border-2 border-gray-300 text-violet-600 shadow-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-200 focus:ring-opacity-50 w-5 h-5 smooth-fast">
                            <span class="ml-3 text-sm text-gray-700 font-bold group-hover:text-violet-600 smooth-fast">Keep me signed in</span>
                        </label>

                        @if (Route::has('password.request'))
                            
                            
                        @endif
                    </div>

                    <!-- Ultra-Modern Gradient Button -->
                    <button type="submit" class="w-full brand-gradient text-white font-black py-4 px-6 rounded-2xl shadow-violet-intense hover:shadow-luxury smooth hover:scale-[1.02] btn-glow relative overflow-hidden group">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Sign In
                            <svg class="w-5 h-5 group-hover:translate-x-1 smooth-fast" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </button>
                </form>

                <!-- Modern Demo Credentials Card - Compact Version -->
                <div class="mt-8 relative overflow-hidden rounded-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400/10 via-indigo-400/10 to-purple-400/10"></div>
                    <div class="relative p-5 bg-gradient-to-br from-blue-50 to-indigo-50 border-2 border-blue-200">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="flex-shrink-0 w-7 h-7 bg-blue-500 rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-black text-blue-900 mb-1 uppercase tracking-widest">Quick Access</p>
                                <p class="text-xs text-blue-700 font-medium">Try our demo accounts</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-xs mb-3">
                            <div class="p-2 bg-white/60 backdrop-blur-sm rounded-lg border border-blue-200 text-center">
                                <p class="font-black text-blue-900 mb-1">👑 Admin</p>

                            
                            </div>
                            
                            <div class="p-2 bg-white/60 backdrop-blur-sm rounded-lg border border-blue-200 text-center">
                                <p class="font-black text-blue-900 mb-1">💼 Staff</p>
                            </div>
                            <div class="p-2 bg-white/60 backdrop-blur-sm rounded-lg border border-blue-200 text-center">
                                <p class="font-black text-blue-900 mb-1">✨ Customer</p>
                            </div>
                        </div>
                           <p class="text-blue-700 font-medium">admin@luminosabelleza.com</p>

                             <p class="text-blue-700 font-medium">maria@luminosabelleza.com</p>
                                 <p class="text-blue-700 font-medium">customer1@example.com</p>

                            
                        <div class="text-center pt-3 border-t-2 border-blue-200">
                            <p class="text-xs font-black text-blue-900">🔑 Password: <span class="text-violet-600">password</span></p>
                        </div>
                    </div>
                </div>
                

                <!-- Modern Register Link -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600 font-medium">
                        New to Luminosa Belleza?
                        <a href="{{ route('register') }}" class="font-black text-violet-600 hover:text-violet-800 smooth-fast hover:underline ml-1">
                            Create account →
                        </a>
                    </p>
                </div>

                <!-- Enhanced Back to Home Link -->
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

        <!-- Modern Footer -->
        <div class="text-center">
            <p class="text-sm text-gray-600 font-semibold">&copy; {{ date('Y') }} Luminosa Belleza. All rights reserved.</p>
        </div>
    </div>
</body>
</html>