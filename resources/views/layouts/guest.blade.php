<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Luminosa Belleza') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { 
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
            }
            
            /* Vibrant animated gradient background */
            .auth-bg {
                background: linear-gradient(135deg, #f5f3ff 0%, #faf5ff 50%, #fdf4ff 100%);
                position: relative;
            }
            
            .brand-gradient {
                background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 25%, #d946ef 50%, #c026d3 75%, #a855f7 100%);
                background-size: 400% 400%;
                animation: gradient-shift 15s ease infinite;
            }
            
            @keyframes gradient-shift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
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
            
            /* Pulse glow animation */
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
            
            /* Smooth transitions */
            .smooth { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
            
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
    <body class="font-sans text-gray-900 antialiased auth-bg">
        <!-- Animated Gradient Orbs -->
        <div class="fixed top-10 right-10 w-[700px] h-[700px] bg-violet-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-30 float-1 pointer-events-none"></div>
        <div class="fixed bottom-10 left-10 w-[650px] h-[650px] bg-fuchsia-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-30 float-2 pointer-events-none"></div>
        <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-purple-400 rounded-full mix-blend-multiply filter blur-[140px] opacity-20 float-3 pointer-events-none"></div>
        
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 relative z-10">
            <!-- Logo Section -->
            <div class="mb-8">
                <a href="/" class="flex items-center justify-center group">
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
                            Luminosa Belleza
                        </h1>
                        <p class="text-gray-600 font-bold tracking-wide text-sm">Where Beauty Meets Innovation</p>
                    </div>
                </a>
            </div>

            <!-- Content Card -->
            <div class="w-full sm:max-w-lg">
                <div class="glass-card px-8 py-10 shadow-violet-intense rounded-[2rem] overflow-hidden smooth hover:shadow-luxury relative">
                    <!-- Animated top border -->
                    <div class="absolute top-0 left-0 right-0 h-1 border-animated"></div>
                    
                    {{ $slot }}
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-10 text-center">
                <p class="text-sm text-gray-600 font-semibold">&copy; {{ date('Y') }} Luminosa Belleza. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>