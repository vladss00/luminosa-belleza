<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luminosa - Transform Your Beauty</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Vibrant violet-to-fuchsia gradient */
        .hero-gradient { 
            background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 25%, #d946ef 50%, #c026d3 75%, #a855f7 100%);
            background-size: 400% 400%;
            animation: gradient-shift 15s ease infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        @keyframes float { 
            0%, 100% { transform: translateY(0) rotate(0deg); } 
            33% { transform: translateY(-25px) rotate(2deg); }
            66% { transform: translateY(-12px) rotate(-2deg); }
        }
        
        .float { animation: float 6s ease-in-out infinite; }
        
        @keyframes shimmer { 
            0% { background-position: -1000px 0; } 
            100% { background-position: 1000px 0; } 
        }
        
        .shimmer { 
            animation: shimmer 3s linear infinite; 
            background: linear-gradient(to right, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%); 
            background-size: 1000px 100%; 
        }
        
        /* Professional glass morphism */
        .glass { 
            background: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(30px); 
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.2); 
        }
        
        .glass-strong {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        /* Layered professional glow */
        .glow { 
            box-shadow: 
                0 0 30px rgba(139, 92, 246, 0.6), 
                0 0 60px rgba(217, 70, 239, 0.4),
                0 10px 40px rgba(168, 85, 247, 0.3);
        }
        
        .glow-lg {
            box-shadow:
                0 0 40px rgba(139, 92, 246, 0.7),
                0 0 80px rgba(217, 70, 239, 0.5),
                0 20px 60px rgba(168, 85, 247, 0.4);
        }
        
        @keyframes pulse-glow {
            0%, 100% { 
                box-shadow: 0 0 30px rgba(139, 92, 246, 0.6), 
                           0 0 60px rgba(217, 70, 239, 0.4);
            }
            50% { 
                box-shadow: 0 0 50px rgba(139, 92, 246, 0.8), 
                           0 0 100px rgba(217, 70, 239, 0.6);
            }
        }
        
        .pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }
        
        /* Animated grid pattern */
        .grid-pattern {
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: grid-move 20s linear infinite;
        }
        
        @keyframes grid-move {
            0% { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }
        
        /* Smooth transitions */
        .smooth { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }

        /* Glass navbar — transparent at top, frosted when scrolled */
        #main-nav {
            background: transparent;
            border-bottom: 1px solid transparent;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                        background 0.4s ease,
                        backdrop-filter 0.4s ease,
                        box-shadow 0.4s ease,
                        border-color 0.4s ease;
        }

        #main-nav.nav-scrolled {
            background: rgba(109, 40, 217, 0.25);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            box-shadow: 0 4px 32px rgba(109, 40, 217, 0.3);
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        #main-nav.nav-hidden {
            transform: translateY(-100%);
        }

        /* Map section */
        .map-container {
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 0 0 60px rgba(139,92,246,0.5), 0 20px 60px rgba(168,85,247,0.3);
            border: 2px solid rgba(255,255,255,0.25);
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">
    <!-- Animated Background -->
    <div class="fixed inset-0 hero-gradient"></div>
    <div class="fixed inset-0 grid-pattern opacity-30"></div>
    
    <div id="page-content" class="relative z-10">
        <!-- Navigation - Glass with blur body on scroll + slide up/down -->
        <nav id="main-nav" class="fixed w-full z-50 top-0">
            <div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-20">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center pulse-glow border border-white/30">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                </svg>
                            </div>
                            <span class="text-2xl font-black text-white">Luminosa</span>
                        </div>
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="glass px-6 py-3 rounded-xl text-white font-bold hover:bg-white/25 smooth">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-white font-bold hover:text-white/80 smooth">Login</a>
                                <a href="{{ route('register') }}" class="relative px-8 py-3 bg-white text-violet-600 rounded-xl font-black overflow-hidden group smooth hover:scale-105">
                                    <span class="relative z-10">Get Started</span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-violet-500 to-fuchsia-500 opacity-0 group-hover:opacity-100 smooth"></div>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section with Maximum Impact -->
        <section class="min-h-screen flex items-center justify-center pt-20 px-4 relative overflow-hidden">
            <!-- Massive floating gradient orbs -->
            <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-violet-400 rounded-full mix-blend-multiply filter blur-[120px] opacity-40 float"></div>
            <div class="absolute bottom-20 left-0 w-[500px] h-[500px] bg-fuchsia-400 rounded-full mix-blend-multiply filter blur-[120px] opacity-40 float" style="animation-delay: 3s;"></div>
            
            <div class="max-w-7xl mx-auto text-center relative z-10">
                <div class="float mb-10">
                    <div class="inline-block glass-strong px-8 py-4 rounded-full text-white font-bold mb-8 border border-white/20 glow">
                        <span class="shimmer">✨ Transform Your Beauty Experience</span>
                    </div>
                </div>
                <h1 class="text-6xl md:text-8xl lg:text-9xl font-black text-white mb-8 leading-[0.95]">
                    Your Beauty,<br/>
                    <span class="bg-gradient-to-r from-pink-200 via-purple-200 to-indigo-200 bg-clip-text text-transparent">Reimagined</span>
                </h1>
                <p class="text-xl md:text-2xl text-white/95 mb-14 max-w-4xl mx-auto leading-relaxed font-medium">
                    Book appointments instantly. Choose expert stylists. Experience premium beauty services with our cutting-edge booking platform.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-20">
                    <a href="{{ route('register') }}" class="group relative px-14 py-6 bg-white rounded-2xl font-black text-lg overflow-hidden smooth hover:scale-110 hover:shadow-2xl glow-lg">
                        <span class="relative z-10 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 bg-clip-text text-transparent text-xl">Book Now</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-fuchsia-600 opacity-0 group-hover:opacity-10 smooth"></div>
                    </a>
                    <a href="#services" class="glass-strong px-14 py-6 rounded-2xl text-white font-black text-lg hover:bg-white/25 smooth hover:scale-105 border border-white/20">
                        Explore Services
                    </a>
                </div>
                
                <!-- Enhanced Stats with Glass Cards -->
                <div class="grid grid-cols-3 gap-6 max-w-4xl mx-auto">
                    <div class="glass-strong rounded-2xl p-8 hover:bg-white/25 smooth hover:scale-105 border border-white/20 glow">
                        <div class="text-5xl font-black text-white mb-3"></div>
                        <div class="text-white/90 font-bold">Happy Clients</div>
                    </div>
                    <div class="glass-strong rounded-2xl p-8 hover:bg-white/25 smooth hover:scale-105 border border-white/20 glow">
                        <div class="text-5xl font-black text-white mb-3"></div>
                        <div class="text-white/90 font-bold">Expert Stylists</div>
                    </div>
                    <div class="glass-strong rounded-2xl p-8 hover:bg-white/25 smooth hover:scale-105 border border-white/20 glow">
                        <div class="text-5xl font-black text-white mb-3"></div>
                        <div class="text-white/90 font-bold">Online Booking</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section with Layered Shadows -->
        <section class="py-32 px-4 relative">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="text-5xl md:text-6xl font-black text-white mb-6">Why Choose Us?</h2>
                    <div class="h-1.5 w-28 bg-gradient-to-r from-violet-400 via-fuchsia-400 to-purple-400 rounded-full mx-auto"></div>
                </div>
                
                <div class="grid md:grid-cols-3 gap-10">
                    <div class="group relative smooth hover:scale-105">
                        <div class="absolute -inset-2 bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-3xl blur-xl opacity-30 group-hover:opacity-75 smooth"></div>
                        <div class="relative glass-strong rounded-3xl p-10 h-full border border-white/20">
                            <div class="w-16 h-16 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-2xl flex items-center justify-center mb-8 glow group-hover:scale-110 smooth">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-black text-white mb-4">Instant Booking</h3>
                            <p class="text-white/90 leading-relaxed text-lg">Book your appointments 24/7 with real-time availability checking and instant confirmation.</p>
                        </div>
                    </div>
                    
                    <div class="group relative smooth hover:scale-105">
                        <div class="absolute -inset-2 bg-gradient-to-r from-fuchsia-600 to-purple-600 rounded-3xl blur-xl opacity-30 group-hover:opacity-75 smooth"></div>
                        <div class="relative glass-strong rounded-3xl p-10 h-full border border-white/20">
                            <div class="w-16 h-16 bg-gradient-to-br from-fuchsia-500 to-purple-500 rounded-2xl flex items-center justify-center mb-8 glow group-hover:scale-110 smooth">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-black text-white mb-4">Expert Stylists</h3>
                            <p class="text-white/90 leading-relaxed text-lg">Choose from our team of certified professionals with years of experience in beauty services.</p>
                        </div>
                    </div>
                    
                    <div class="group relative smooth hover:scale-105">
                        <div class="absolute -inset-2 bg-gradient-to-r from-purple-600 to-violet-600 rounded-3xl blur-xl opacity-30 group-hover:opacity-75 smooth"></div>
                        <div class="relative glass-strong rounded-3xl p-10 h-full border border-white/20">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-500 rounded-2xl flex items-center justify-center mb-8 glow group-hover:scale-110 smooth">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-black text-white mb-4">Zero Wait Time</h3>
                            <p class="text-white/90 leading-relaxed text-lg">Scheduled appointments mean you're seen right on time. No more waiting rooms!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section with Enhanced Cards -->
        <section id="services" class="py-32 px-4 relative">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-purple-400 rounded-full filter blur-[150px] opacity-20"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-20">
                    <h2 class="text-5xl md:text-6xl font-black text-white mb-6">Our Services</h2>
                    <div class="h-1.5 w-28 bg-gradient-to-r from-violet-400 via-fuchsia-400 to-purple-400 rounded-full mx-auto mb-6"></div>
                    <p class="text-2xl text-white/95 font-bold">Premium treatments for your complete transformation</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach([
                        ['title' => 'Hair Services', 'items' => ['Haircut & Styling', 'Hair Coloring', 'Hair Treatment', 'Rebonding'], 'gradient' => 'from-violet-500 to-fuchsia-500'],
                        ['title' => 'Beauty Services', 'items' => ['Facial Treatment', 'Makeup Application', 'Eyebrow Threading', 'Eyelash Extensions'], 'gradient' => 'from-fuchsia-500 to-purple-500'],
                        ['title' => 'Nail Services', 'items' => ['Manicure', 'Pedicure', 'Gel Nails', 'Nail Art'], 'gradient' => 'from-purple-500 to-violet-500'],
                        ['title' => 'Spa Services', 'items' => ['Body Massage', 'Foot Spa', 'Body Scrub', 'Aromatherapy'], 'gradient' => 'from-violet-500 to-purple-500']
                    ] as $service)
                    <div class="glass-strong rounded-3xl p-8 hover:bg-white/25 smooth group border border-white/20 hover:scale-105 glow">
                        <div class="w-14 h-14 bg-gradient-to-br {{ $service['gradient'] }} rounded-xl flex items-center justify-center mb-6 group-hover:scale-125 group-hover:rotate-12 smooth glow">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-6">{{ $service['title'] }}</h3>
                        <ul class="space-y-3">
                            @foreach($service['items'] as $item)
                            <li class="text-white/90 flex items-center gap-3 font-medium">
                                <div class="w-2 h-2 bg-gradient-to-r {{ $service['gradient'] }} rounded-full"></div>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA Section with Maximum Glow -->
        <section class="py-32 px-4 relative">
            <div class="max-w-4xl mx-auto text-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-purple-600 rounded-[2.5rem] blur-3xl opacity-60"></div>
                    <div class="relative glass-strong rounded-[2.5rem] p-16 border-2 border-white/30 glow-lg">
                        <h2 class="text-5xl md:text-6xl font-black text-white mb-8">Ready to Transform?</h2>
                        <p class="text-2xl text-white/95 mb-12 font-medium max-w-2xl mx-auto">Join thousands of satisfied customers and book your appointment today</p>
                        <a href="{{ route('register') }}" class="inline-block px-14 py-6 bg-white rounded-2xl text-violet-600 font-black text-xl hover:scale-110 smooth glow-lg">
                            Start Your Journey
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Find Us / Map Section -->
        <section id="location" class="py-32 px-4 relative">
            <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-violet-500 rounded-full filter blur-[160px] opacity-15 pointer-events-none"></div>
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-5xl md:text-6xl font-black text-white mb-6">Find Us</h2>
                    <div class="h-1.5 w-28 bg-gradient-to-r from-violet-400 via-fuchsia-400 to-purple-400 rounded-full mx-auto mb-6"></div>
                    <p class="text-xl text-white/90 font-medium max-w-xl mx-auto">Visit us at our salon — we'd love to see you in person</p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8 items-start">
                    <!-- Info Cards -->
                    <div class="space-y-5">
                        <div class="glass-strong rounded-2xl p-6 border border-white/20 hover:bg-white/20 smooth">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-xl flex items-center justify-center flex-shrink-0 glow">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-black text-lg mb-1">Address</h4>
                                    <p class="text-white/80 font-medium leading-relaxed">Lola Frida and Lolo Peter Bldg.,<br>San Pedro St., Central West 1,<br>Bangar, La Union 2519</p>
                                </div>
                            </div>
                        </div>

                        <div class="glass-strong rounded-2xl p-6 border border-white/20 hover:bg-white/20 smooth">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-fuchsia-500 to-purple-500 rounded-xl flex items-center justify-center flex-shrink-0 glow">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-black text-lg mb-1">Phone</h4>
                                    <p class="text-white/80 font-medium">+63 976 314 5388</p>
                                </div>
                            </div>
                        </div>

                        <div class="glass-strong rounded-2xl p-6 border border-white/20 hover:bg-white/20 smooth">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center flex-shrink-0 glow">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-black text-lg mb-1">Hours</h4>
                                    <p class="text-white/80 font-medium">Monday – Sunday<br>8:00 AM – 7:00 PM</p>
                                </div>
                            </div>
                        </div>

                        <a href="https://maps.google.com/?q=16.8932,120.4211" target="_blank"
                           class="flex items-center justify-center gap-2 w-full py-4 bg-white/20 hover:bg-white/30 text-white font-black rounded-2xl border border-white/30 smooth hover:scale-105 glow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                            Get Directions
                        </a>
                    </div>

                    <!-- Map Embed -->
                    <div class="lg:col-span-2">
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d481.2!2d120.42105!3d16.8932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33918de5cf1e19d3%3A0xd274f3d9ffa5c36e!2sLola%20Frida%20and%20Lolo%20Peter%20Bldg!5e0!3m2!1sen!2sph!4v1710000000000!5m2!1sen!2sph"
                                width="100%"
                                height="420"
                                style="border:0; display:block;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Luminosa Belleza Location">
                            </iframe>
                        </div>
                        <!-- Coordinates badge -->
                        <div class="mt-4 flex items-center justify-center gap-2 text-white/60 text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            16.8932° N, 120.4211° E — Bangar, La Union, Philippines
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer with Glass -->
        <footer class="glass-strong py-12 mt-32 border-t-2 border-white/20">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center pulse-glow">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-black text-white">Luminosa Belleza</span>
                </div>
                <p class="text-white/90 font-bold mb-3">&copy; {{ date('Y') }} Luminosa Belleza. Supporting SDG 9: Industry, Innovation, and Infrastructure</p>
                <p class="text-white/70">Innovating beauty services through digital transformation</p>
            </div>
        </footer>
    </div>
    
    <!-- Enhanced Floating Decorations -->
    <div class="fixed top-10 right-10 w-96 h-96 bg-violet-400 rounded-full mix-blend-multiply filter blur-[120px] opacity-30 animate-pulse pointer-events-none"></div>
    <div class="fixed bottom-10 left-10 w-96 h-96 bg-fuchsia-400 rounded-full mix-blend-multiply filter blur-[120px] opacity-30 animate-pulse pointer-events-none" style="animation-delay: 2s;"></div>
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-[120px] opacity-20 animate-pulse pointer-events-none" style="animation-delay: 4s;"></div>

    <script>
        (function () {
            const nav     = document.getElementById('main-nav');
            let lastScrollY = window.scrollY;
            let ticking = false;

            function updateNav() {
                const currentScrollY = window.scrollY;
                const scrolled = currentScrollY > 10;

                // Glass effect when scrolled
                if (scrolled) {
                    nav.classList.add('nav-scrolled');
                } else {
                    nav.classList.remove('nav-scrolled');
                }

                // Slide up on scroll down, slide down on scroll up
                if (currentScrollY <= 0) {
                    nav.classList.remove('nav-hidden');
                } else if (currentScrollY > lastScrollY + 5) {
                    nav.classList.add('nav-hidden');
                } else if (currentScrollY < lastScrollY - 5) {
                    nav.classList.remove('nav-hidden');
                }

                lastScrollY = currentScrollY;
                ticking = false;
            }

            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(updateNav);
                    ticking = true;
                }
            }, { passive: true });
        })();
    </script>
</body>
</html>