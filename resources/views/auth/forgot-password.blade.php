<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forgot Password - Luminosa Belleza</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        
        .brand-gradient {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #F59E0B 100%);
        }
        
        .luxury-bg {
            background: 
                radial-gradient(circle at 20% 50%, rgba(139, 92, 246, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(236, 72, 153, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(245, 158, 11, 0.06) 0%, transparent 50%),
                linear-gradient(to bottom, #fafafa 0%, #ffffff 100%);
        }
        
        .card-luxury {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(139, 92, 246, 0.1);
            box-shadow: 
                0 0 0 1px rgba(139, 92, 246, 0.05),
                0 20px 60px -15px rgba(139, 92, 246, 0.15),
                0 30px 80px -20px rgba(236, 72, 153, 0.1);
        }
        
        .logo-shine {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #F59E0B 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }
        
        .logo-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -100%;
            width: 100%;
            height: 200%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            0% { left: -100%; }
            50%, 100% { left: 200%; }
        }
        
        .icon-luxury {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
            border: 1px solid rgba(139, 92, 246, 0.15);
        }
        
        .input-luxury {
            border: 2px solid #E5E7EB;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #FAFAFA;
        }
        
        .input-luxury:focus {
            background: white;
            border-color: #8B5CF6;
            box-shadow: 
                0 0 0 4px rgba(139, 92, 246, 0.1),
                0 10px 30px -10px rgba(139, 92, 246, 0.2);
            outline: none;
        }
        
        .radio-card {
            border: 2px solid #E5E7EB;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #FAFAFA;
        }
        
        .radio-card:has(input:checked) {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
            border-color: #8B5CF6;
            box-shadow: 
                0 0 0 4px rgba(139, 92, 246, 0.1),
                0 10px 30px -10px rgba(139, 92, 246, 0.15);
        }
        
        .btn-luxury {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #F59E0B 100%);
            background-size: 200% 200%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 
                0 10px 40px -10px rgba(139, 92, 246, 0.4),
                0 0 0 1px rgba(139, 92, 246, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .btn-luxury::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-luxury:hover {
            background-position: 100% 0;
            transform: translateY(-2px);
            box-shadow: 
                0 20px 50px -10px rgba(139, 92, 246, 0.5),
                0 0 0 1px rgba(139, 92, 246, 0.2);
        }
        
        .btn-luxury:hover::before {
            left: 100%;
        }
        
        .btn-luxury:active {
            transform: translateY(0);
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(5, 150, 105, 0.05) 100%);
            border: 2px solid rgba(16, 185, 129, 0.2);
        }
        
        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.05) 0%, rgba(220, 38, 38, 0.05) 100%);
            border: 2px solid rgba(239, 68, 68, 0.2);
        }
        
        .alert-info {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.03) 0%, rgba(236, 72, 153, 0.03) 100%);
            border: 2px solid rgba(139, 92, 246, 0.15);
        }
        
        .divider {
            position: relative;
            text-align: center;
            margin: 2rem 0;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #E5E7EB 20%, #E5E7EB 80%, transparent);
        }
        
        .divider span {
            position: relative;
            background: white;
            padding: 0 1rem;
            color: #9CA3AF;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        
        .stagger-1 { animation-delay: 0.1s; opacity: 0; }
        .stagger-2 { animation-delay: 0.2s; opacity: 0; }
        .stagger-3 { animation-delay: 0.3s; opacity: 0; }
        .stagger-4 { animation-delay: 0.4s; opacity: 0; }
    </style>
</head>
<body class="antialiased luxury-bg">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        <!-- Logo -->
        <div class="mb-12 fade-in stagger-1">
            <a href="{{ route('home') }}" class="flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-5xl md:text-6xl font-bold font-playfair logo-shine mb-2">
                        Luminosa Belleza
                    </h1>
                    <p class="text-gray-500 tracking-[0.3em] uppercase text-xs font-medium">Hair & Beauty Salon</p>
                    <div class="mt-4 h-0.5 w-24 mx-auto brand-gradient rounded-full"></div>
                </div>
            </a>
        </div>

        <!-- Forgot Password Card -->
        <div class="w-full sm:max-w-xl px-8 py-10 md:px-12 md:py-12 card-luxury rounded-2xl overflow-hidden fade-in stagger-2">
            <!-- Header -->
            <div class="mb-8 text-center">
                <div class="mx-auto w-20 h-20 icon-luxury rounded-2xl flex items-center justify-center mb-6 fade-in stagger-3">
                    <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-playfair font-bold text-gray-900 mb-3">
                    Reset Password
                </h2>
                <p class="text-gray-600 text-base leading-relaxed max-w-md mx-auto">
                    Enter your email address or phone number and we'll send you a secure link to reset your password
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 font-medium text-sm text-emerald-700 alert-success rounded-xl p-4 flex items-start fade-in">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 alert-error rounded-xl p-4 fade-in">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="text-sm text-red-700 font-medium">
                            @foreach ($errors->all() as $error)
                                <p class="mb-1 last:mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Reset Form -->
            <form method="POST" action="{{ route('password.email') }}" class="fade-in stagger-4">
                @csrf

                <!-- Reset Method Selection -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-800 mb-4 tracking-wide">
                        Choose Reset Method
                    </label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="radio-card cursor-pointer rounded-xl p-4 flex flex-col items-center justify-center transition-all">
                            <input type="radio" name="method" value="email" class="sr-only peer" checked>
                            <svg class="w-8 h-8 mb-2 text-gray-400 peer-checked:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-gray-600 peer-checked:text-purple-600 transition-colors">
                                Email
                            </span>
                        </label>

                        <label class="radio-card cursor-pointer rounded-xl p-4 flex flex-col items-center justify-center transition-all">
                            <input type="radio" name="method" value="sms" class="sr-only peer">
                            <svg class="w-8 h-8 mb-2 text-gray-400 peer-checked:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-gray-600 peer-checked:text-purple-600 transition-colors">
                                SMS
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Email/Phone Input -->
                <div class="mb-8">
                    <label for="email" class="block text-sm font-semibold text-gray-800 mb-3 tracking-wide">
                        Email Address or Phone Number
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input id="email" 
                               type="text" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus
                               class="block w-full pl-12 pr-4 py-3.5 input-luxury rounded-xl text-gray-900 font-medium"
                               placeholder="your@email.com or +1234567890">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full btn-luxury text-white font-semibold py-4 px-6 rounded-xl text-base tracking-wide">
                    Send Reset Link
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">
                <span>Information</span>
            </div>

            <!-- Info Box -->
            <div class="p-5 alert-info rounded-xl">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-purple-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-sm text-gray-700">
                        <p class="font-bold text-gray-900 mb-2">What happens next?</p>
                        <p class="leading-relaxed">We'll send you a secure link to reset your password. The link will expire after <span class="font-semibold">60 minutes</span> for security reasons.</p>
                    </div>
                </div>
            </div>

            <!-- Back to Login -->
            <div class="mt-8 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center text-sm text-purple-600 hover:text-purple-700 font-semibold transition-colors group">
                    <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Login
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center text-sm text-gray-500 fade-in stagger-4">
            <p class="font-medium tracking-wide">&copy; {{ date('Y') }} Luminosa Belleza. All rights reserved.</p>
            <div class="mt-3 flex items-center justify-center space-x-4">
                <a href="#" class="hover:text-purple-600 transition-colors">Privacy Policy</a>
                <span class="text-gray-300">•</span>
                <a href="#" class="hover:text-purple-600 transition-colors">Terms of Service</a>
                <span class="text-gray-300">•</span>
                <a href="#" class="hover:text-purple-600 transition-colors">Contact Support</a>
            </div>
        </div>
    </div>
</body>
</html>