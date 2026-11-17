<nav x-data="{ open: false, showLogoutModal: false }" class="nav-glass border-b border-white border-opacity-20 backdrop-blur-xl sticky top-0 z-50">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        .nav-glass {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            box-shadow: 0 8px 32px rgba(139, 92, 246, 0.15);
            border-bottom: 2px solid rgba(139, 92, 246, 0.1);
        }
        
        /* Vibrant violet-fuchsia gradient */
        .brand-gradient {
            background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 25%, #d946ef 50%, #c026d3 75%, #a855f7 100%);
            background-size: 400% 400%;
            animation: gradient-shift 15s ease infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .brand-text {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-weight: 900;
            font-size: 1.5rem;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .brand-text:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }
        
        .brand-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            box-shadow: 0 8px 16px rgba(139, 92, 246, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .brand-icon:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 24px rgba(139, 92, 246, 0.5);
        }
        
        .nav-link {
            position: relative;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 0.9375rem;
            color: #475569;
            padding: 0.75rem 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 1rem;
            letter-spacing: -0.01em;
            white-space: nowrap;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0.25rem;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            transform: translateX(-50%);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 4px;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.08) 0%, rgba(217, 70, 239, 0.08) 100%);
            border-radius: 1rem;
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .nav-link:hover {
            color: #8b5cf6;
            transform: translateY(-2px);
        }
        
        .nav-link:hover::after {
            opacity: 1;
        }
        
        .nav-link:hover::before {
            width: 70%;
        }
        
        .nav-link.active {
            color: white;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            font-weight: 800;
            box-shadow: 0 8px 16px rgba(139, 92, 246, 0.35);
            transform: translateY(-2px);
        }
        
        .nav-link.active::before,
        .nav-link.active::after {
            display: none;
        }
        
        .user-dropdown-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 1.25rem;
            border: 2px solid rgba(139, 92, 246, 0.3);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 0.9375rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            border-radius: 1rem;
            color: #1e293b;
            background: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.1);
        }
        
        .user-dropdown-btn:hover {
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);
        }
        
        .user-dropdown-btn:hover .user-avatar {
            transform: scale(1.1);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }
        
        .user-avatar {
            width: 2.25rem;
            height: 2.25rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            box-shadow: 0 4px 8px rgba(139, 92, 246, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
        }

        .user-avatar span {
            font-weight: 900;
            font-size: 1.1rem;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        .auth-buttons .login-btn {
            color: #8b5cf6;
            font-weight: 700;
            font-size: 0.9375rem;
            padding: 0.75rem 1.75rem;
            border-radius: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid rgba(139, 92, 246, 0.2);
            background: rgba(139, 92, 246, 0.05);
        }
        
        .auth-buttons .login-btn:hover {
            background: rgba(139, 92, 246, 0.15);
            transform: translateY(-2px);
            border-color: #8b5cf6;
            box-shadow: 0 6px 16px rgba(139, 92, 246, 0.2);
        }
        
        .auth-buttons .register-btn {
            padding: 0.75rem 1.75rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            color: white;
            border-radius: 1rem;
            font-weight: 800;
            font-size: 0.9375rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 16px rgba(139, 92, 246, 0.4);
            border: 2px solid transparent;
        }
        
        .auth-buttons .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(139, 92, 246, 0.5);
            filter: brightness(1.1);
        }
        
        .mobile-menu-btn {
            padding: 0.75rem;
            border-radius: 1rem;
            color: #475569;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid rgba(139, 92, 246, 0.2);
            background: rgba(139, 92, 246, 0.05);
        }
        
        .mobile-menu-btn:hover {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(217, 70, 239, 0.15) 100%);
            color: #8b5cf6;
            border-color: #8b5cf6;
            transform: scale(1.05);
        }
        
        .responsive-nav-link {
            display: block;
            padding: 1rem 1.25rem;
            border-left: 4px solid transparent;
            font-size: 0.9375rem;
            font-weight: 700;
            color: #475569;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 0.5rem 0.75rem;
            border-radius: 1rem;
        }
        
        .responsive-nav-link:hover {
            background: linear-gradient(90deg, rgba(139, 92, 246, 0.15) 0%, rgba(217, 70, 239, 0.05) 100%);
            border-left-color: #8b5cf6;
            color: #8b5cf6;
            padding-left: 1.5rem;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
        }
        
        .responsive-nav-link.active {
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            border-left-color: transparent;
            color: white;
            font-weight: 800;
            box-shadow: 0 6px 16px rgba(139, 92, 246, 0.3);
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .mobile-menu {
            animation: slideDown 0.4s ease-out;
        }
        
        .mobile-user-card {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(217, 70, 239, 0.15) 100%);
            border: 2px solid rgba(139, 92, 246, 0.2);
            box-shadow: 0 6px 16px rgba(139, 92, 246, 0.15);
        }
        
        .mobile-user-avatar {
            width: 3.5rem;
            height: 3.5rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            box-shadow: 0 6px 12px rgba(139, 92, 246, 0.4);
        }
        
        .mobile-auth-btn {
            font-weight: 800;
            font-size: 0.9375rem;
            padding: 1rem;
            border-radius: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-auth-btn.login {
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
            border: 2px solid rgba(139, 92, 246, 0.3);
        }
        
        .mobile-auth-btn.login:hover {
            background: rgba(139, 92, 246, 0.2);
            border-color: #8b5cf6;
            transform: translateY(-2px);
        }
        
        .mobile-auth-btn.register {
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            color: white;
            box-shadow: 0 8px 16px rgba(139, 92, 246, 0.4);
        }
        
        .mobile-auth-btn.register:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(139, 92, 246, 0.5);
        }

        /* Enhanced dropdown styling */
        .dropdown-item-custom {
            display: block;
            width: auto;
            margin: 0.25rem 0.5rem;
            padding: 0.6rem 0.75rem;
            border-radius: 0.75rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            color: #64748b !important;
            text-decoration: none !important;
            font-weight: 600;
        }

        .dropdown-item-custom:hover {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(217, 70, 239, 0.1) 100%) !important;
            color: #8b5cf6 !important;
            transform: translateX(4px);
        }

        .logout-hover:hover {
            background: #fef2f2 !important;
            color: #dc2626 !important;
            box-shadow: inset 0 0 0 1px rgba(220, 38, 38, 0.05);
        }
    </style>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="brand-icon rounded-2xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <span class="brand-text">Luminosa</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex items-center">
                    @auth
                        @if(auth()->user()->isCustomer())
                            <a href="{{ route('customer.dashboard') }}" class="nav-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                                {{ __('Dashboard') }}
                            </a>
                            <a href="{{ route('customer.appointments.index') }}" class="nav-link {{ request()->routeIs('customer.appointments.*') ? 'active' : '' }}">
                                {{ __('My Appointments') }}
                            </a>
                            <a href="{{ route('customer.appointments.create') }}" class="nav-link {{ request()->routeIs('customer.appointments.create') ? 'active' : '' }}">
                                {{ __('Book Appointment') }}
                            </a>
                        @elseif(auth()->user()->isStaff())
                            <a href="{{ route('staff.dashboard') }}" class="nav-link {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">
                                {{ __('Dashboard') }}
                            </a>
                            <a href="{{ route('staff.appointments') }}" class="nav-link {{ request()->routeIs('staff.appointments*') ? 'active' : '' }}">
                                {{ __('Appointments') }}
                            </a>
                            <a href="{{ route('staff.availability') }}" class="nav-link {{ request()->routeIs('staff.availability') ? 'active' : '' }}">
                                {{ __('My Availability') }}
                            </a>
                        @elseif(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                {{ __('Dashboard') }}
                            </a>
                            <a href="{{ route('admin.appointments.index') }}" class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                                {{ __('Appointments') }}
                            </a>
                            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                                {{ __('Services') }}
                            </a>
                            <a href="{{ route('admin.staff.index') }}" class="nav-link {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                                {{ __('Staff') }}
                            </a>
                            <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                                {{ __('Customers') }}
                            </a>
                            <a href="{{ route('admin.reports') }}" class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                                {{ __('Reports') }}
                            </a>
                            <a href="{{ route('admin.activity-log.index') }}" class="nav-link {{ request()->routeIs('admin.activity-log.*') ? 'active' : '' }}" style="white-space: nowrap;">
                                {{ __('Activity Log') }}
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="user-dropdown-btn group">
                            <div class="flex items-center gap-3">
                                <div class="user-avatar rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold text-sm">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </span>
                                </div>
                                
                                <span class="whitespace-nowrap truncate max-w-[150px]">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>

                            <svg class="ml-2 h-4 w-4 fill-current opacity-60 group-hover:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-2 py-1.5 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            {{ __('Account Settings') }}
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="dropdown-item-custom">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('My Profile') }}
                            </div>
                        </x-dropdown-link>

                        <div class="border-t border-gray-100 my-1"></div>

                        <button
                            type="button"
                            @click="openLogoutModal()"
                            class="dropdown-item-custom logout-hover w-full text-left">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                {{ __('Log Out') }}
                            </div>
                        </button>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                            @csrf
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <div class="hidden sm:flex sm:items-center sm:ml-6 auth-buttons gap-3">
                <a href="{{ route('login') }}" class="login-btn">Login</a>
                <a href="{{ route('register') }}" class="register-btn">Register</a>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="mobile-menu-btn">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden mobile-menu bg-white bg-opacity-95 backdrop-blur-xl border-t border-gray-100">
        @auth
            @if(auth()->user()->isCustomer())
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('customer.dashboard') }}" class="responsive-nav-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('customer.appointments.index') }}" class="responsive-nav-link {{ request()->routeIs('customer.appointments.*') ? 'active' : '' }}">
                        {{ __('My Appointments') }}
                    </a>
                    <a href="{{ route('customer.appointments.create') }}" class="responsive-nav-link {{ request()->routeIs('customer.appointments.create') ? 'active' : '' }}">
                        {{ __('Book Appointment') }}
                    </a>
                </div>
            @elseif(auth()->user()->isStaff())
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('staff.dashboard') }}" class="responsive-nav-link {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('staff.appointments') }}" class="responsive-nav-link {{ request()->routeIs('staff.appointments*') ? 'active' : '' }}">
                        {{ __('Appointments') }}
                    </a>
                    <a href="{{ route('staff.availability') }}" class="responsive-nav-link {{ request()->routeIs('staff.availability') ? 'active' : '' }}">
                        {{ __('My Availability') }}
                    </a>
                </div>
            @elseif(auth()->user()->isAdmin())
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="responsive-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('admin.appointments.index') }}" class="responsive-nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                        {{ __('Appointments') }}
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="responsive-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        {{ __('Services') }}
                    </a>
                    <a href="{{ route('admin.staff.index') }}" class="responsive-nav-link {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                        {{ __('Staff') }}
                    </a>
                    <a href="{{ route('admin.customers.index') }}" class="responsive-nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                        {{ __('Customers') }}
                    </a>
                    <a href="{{ route('admin.reports') }}" class="responsive-nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        {{ __('Reports') }}
                    </a>
                    <a href="{{ route('admin.activity-log.index') }}" class="responsive-nav-link {{ request()->routeIs('admin.activity-log.*') ? 'active' : '' }}">
                        {{ __('Activity Log') }}
                    </a>
                </div>
            @endif

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="mobile-user-card px-5 py-4 mx-3 rounded-2xl">
                    <div class="flex items-center gap-4">
                        <div class="mobile-user-avatar rounded-2xl flex items-center justify-center">
                            <span class="text-white font-bold text-xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <div class="font-bold text-lg text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-600 font-medium">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="responsive-nav-link">
                        {{ __('Profile') }}
                    </a>

                    <!-- Authentication -->
                    <button
                        type="button"
                        @click="openLogoutModal()"
                        class="responsive-nav-link w-full text-left">
                        {{ __('Log Out') }}
                    </button>
                </div>
            </div>
        @else
            <div class="pt-4 pb-4 space-y-3 px-4">
                <a href="{{ route('login') }}" class="mobile-auth-btn login block text-center">
                    Login
                </a>
                <a href="{{ route('register') }}" class="mobile-auth-btn register block text-center">
                    Register
                </a>
            </div>
        @endauth
    </div>
</nav>

<!-- ===================== LOGOUT MODAL (outside nav to avoid stacking context) ===================== -->
<div id="logout-modal" style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center;">

    <!-- Backdrop -->
    <div id="logout-backdrop"
         onclick="closeLogoutModal()"
         style="position:absolute; inset:0; background:rgba(15,10,40,0.55); backdrop-filter:blur(8px); -webkit-backdrop-filter:blur(8px); transition: opacity 0.3s ease; opacity:0;">
    </div>

    <!-- Card -->
    <div id="logout-card"
         style="position:relative; z-index:10; width:100%; max-width:420px; margin:0 1rem; border-radius:1.5rem; overflow:hidden; background:white; box-shadow:0 25px 60px rgba(0,0,0,0.25); transition: opacity 0.3s ease, transform 0.3s ease; opacity:0; transform: scale(0.9) translateY(16px);">

        <!-- Gradient top bar -->
        <div style="height:5px; background:linear-gradient(135deg,#8b5cf6 0%,#a855f7 50%,#d946ef 100%);"></div>

        <div style="padding:2rem 2rem 2rem;">
            <!-- Icon -->
            <div style="display:flex; justify-content:center; margin-bottom:1.25rem;">
                <div style="width:4rem; height:4rem; border-radius:1rem; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#8b5cf6,#d946ef); box-shadow:0 8px 20px rgba(139,92,246,0.4);">
                    <svg style="width:2rem; height:2rem; color:white;" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </div>
            </div>

            <!-- Text -->
            <div style="text-align:center; margin-bottom:1.75rem;">
                <h3 style="font-size:1.5rem; font-weight:900; color:#0f172a; letter-spacing:-0.02em; margin-bottom:0.5rem;">Log Out?</h3>
                <p style="font-size:0.875rem; color:#64748b; font-weight:500; line-height:1.6;">
                    You're about to log out of your account.<br>Are you sure you want to continue?
                </p>
            </div>

            <!-- Buttons -->
            <div style="display:flex; gap:0.75rem;">
                <button
                    onclick="closeLogoutModal()"
                    style="flex:1; padding:0.75rem 1.25rem; border-radius:1rem; font-weight:700; font-size:0.875rem; background:#f1f5f9; color:#475569; border:2px solid #e2e8f0; cursor:pointer; transition:background 0.2s;"
                    onmouseover="this.style.background='#e2e8f0'"
                    onmouseout="this.style.background='#f1f5f9'">
                    Cancel
                </button>
                <button
                    onclick="document.getElementById('logout-form').submit()"
                    style="flex:1; padding:0.75rem 1.25rem; border-radius:1rem; font-weight:700; font-size:0.875rem; color:white; border:none; cursor:pointer; background:linear-gradient(135deg,#8b5cf6,#d946ef); box-shadow:0 8px 20px rgba(139,92,246,0.35); transition:transform 0.2s, box-shadow 0.2s;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 28px rgba(139,92,246,0.5)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 20px rgba(139,92,246,0.35)'">
                    Yes, Log Out
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openLogoutModal() {
        var modal = document.getElementById('logout-modal');
        var backdrop = document.getElementById('logout-backdrop');
        var card = document.getElementById('logout-card');
        modal.style.display = 'flex';
        // Force reflow before animating
        modal.offsetHeight;
        backdrop.style.opacity = '1';
        card.style.opacity = '1';
        card.style.transform = 'scale(1) translateY(0)';
        document.body.style.overflow = 'hidden';
    }

    function closeLogoutModal() {
        var backdrop = document.getElementById('logout-backdrop');
        var card = document.getElementById('logout-card');
        backdrop.style.opacity = '0';
        card.style.opacity = '0';
        card.style.transform = 'scale(0.9) translateY(16px)';
        setTimeout(function() {
            document.getElementById('logout-modal').style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }
</script>