<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Luminosa Belleza') }} - @yield('title', 'Appointment Management')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=General+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=General+Sans:wght@300;400;500;600&display=swap');
        
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        body {
            font-family: 'General Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .font-display {
            font-family: 'Clash Display', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .brand-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .page-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .page-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        
        /* Alert Styles */
        .alert {
            border-radius: 1rem;
            padding: 1rem 1.25rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: start;
            gap: 0.75rem;
            animation: slideIn 0.3s ease-out;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.95) 0%, rgba(5, 150, 105, 0.95) 100%);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.3);
        }
        
        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.95) 0%, rgba(220, 38, 38, 0.95) 100%);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: 0 10px 25px -5px rgba(239, 68, 68, 0.3);
        }
        
        .alert-icon {
            flex-shrink: 0;
            width: 1.5rem;
            height: 1.5rem;
        }
        
        .alert-content {
            flex: 1;
        }
        
        .alert-title {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }
        
        .alert-message {
            font-weight: 500;
            opacity: 0.95;
        }
        
        .alert-list {
            margin-top: 0.75rem;
            margin-left: 1.25rem;
            list-style: disc;
            list-style-position: inside;
        }
        
        .alert-list li {
            margin-top: 0.25rem;
            font-weight: 500;
        }
        
        .alert-close {
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            cursor: pointer;
            opacity: 0.8;
            transition: opacity 0.2s;
        }
        
        .alert-close:hover {
            opacity: 1;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(241, 245, 249, 0.5);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #764ba2 0%, #667eea 100%);
        }
    </style>

    @stack('styles')

    <!-- Alpine.js via CDN (fallback to ensure dropdown works even when Vite/assets fail to load) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="font-sans antialiased">
    <div class="page-container">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="page-header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="py-8">
            @if (session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
                    <div class="alert alert-success" role="alert">
                        <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="alert-content">
                            <div class="alert-title">Success!</div>
                            <div class="alert-message">{{ session('success') }}</div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
                    <div class="alert alert-error" role="alert">
                        <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="alert-content">
                            <div class="alert-title">Error!</div>
                            <div class="alert-message">{{ session('error') }}</div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
                    <div class="alert alert-error" role="alert">
                        <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <div class="alert-content">
                            <div class="alert-title">Whoops! There were some problems with your input.</div>
                            <ul class="alert-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
</body>
</html>