<x-app-layout>
    <x-slot name="header">
         <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
               {{ __('Staff Dashboard') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --indigo-500: #6366f1;
            --indigo-600: #4f46e5;
            --indigo-700: #4338ca;
            --purple-500: #a855f7;
            --purple-600: #9333ea;
            --blue-500: #3b82f6;
            --green-500: #10b981;
            --yellow-500: #f59e0b;
            
            --gradient-hero: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%);
            --gradient-luxury: linear-gradient(135deg, #4338ca 0%, #7c3aed 50%, #4338ca 100%);
        }
        
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .font-display {
            font-family: 'Sora', -apple-system, BlinkMacSystemFont, sans-serif;
            letter-spacing: -0.02em;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #ffffff;
        }
        
        /* Premium Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(79, 70, 229, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(147, 51, 234, 0.03) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }
        
        /* Sophisticated Animations */
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes scale-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }
            100% {
                background-position: 200% center;
            }
        }
        
        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4);
            }
            50% {
                box-shadow: 0 0 0 8px rgba(79, 70, 229, 0);
            }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .animate-slide-in {
            animation: slide-in 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .animate-scale-in {
            animation: scale-in 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Hero Welcome Card */
        .hero-card {
            position: relative;
            background: var(--gradient-hero);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 
                0 20px 60px -15px rgba(79, 70, 229, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }
        
        .hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            padding: 40px;
        }
        
        /* Premium Stat Cards */
        .stat-card {
            position: relative;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            padding: 32px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
            box-shadow: 
                0 4px 20px -4px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--card-gradient);
            opacity: 0;
            transform: scaleX(0);
            transform-origin: left;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 
                0 20px 60px -15px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            border-color: rgba(0, 0, 0, 0.08);
        }
        
        .stat-card:hover::before {
            opacity: 1;
            transform: scaleX(1);
        }
        
        .stat-card-blue {
            --card-gradient: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
        }
        
        .stat-card-green {
            --card-gradient: linear-gradient(90deg, #10b981 0%, #059669 100%);
        }
        
        .stat-card-yellow {
            --card-gradient: linear-gradient(90deg, #f59e0b 0%, #d97706 100%);
        }
        
        .stat-card-purple {
            --card-gradient: linear-gradient(90deg, #a855f7 0%, #9333ea 100%);
        }
        
        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }
        
        .stat-icon::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 18px;
            background: currentColor;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(-5deg);
        }
        
        .stat-card:hover .stat-icon::before {
            opacity: 0.1;
            transform: scale(1);
        }
        
        .stat-number {
            font-family: 'Sora', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.03em;
        }
        
        /* Quick Action Cards */
        .action-card {
            position: relative;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 18px;
            padding: 24px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 2px 12px -4px rgba(0, 0, 0, 0.04);
        }
        
        .action-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--action-gradient);
            opacity: 0;
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .action-card:hover {
            transform: translateX(4px);
            box-shadow: 0 8px 32px -8px rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.08);
        }
        
        .action-card:hover::before {
            opacity: 1;
        }
        
        .action-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .action-card:hover .action-icon {
            transform: scale(1.1);
        }
        
        /* Schedule Cards */
        .schedule-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 
                0 4px 20px -4px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        
        .schedule-header {
            padding: 32px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
        }
        
        .schedule-body {
            padding: 32px;
        }
        
        .appointment-item {
            position: relative;
            padding: 20px;
            border-radius: 14px;
            background: rgba(79, 70, 229, 0.02);
            border: 1px solid rgba(79, 70, 229, 0.08);
            margin-bottom: 16px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .appointment-item:last-child {
            margin-bottom: 0;
        }
        
        .appointment-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%);
            border-radius: 3px 0 0 3px;
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .appointment-item:hover {
            background: rgba(79, 70, 229, 0.04);
            border-color: rgba(79, 70, 229, 0.15);
            transform: translateX(4px);
        }
        
        .appointment-item:hover::before {
            opacity: 1;
        }
        
        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            border-radius: 10px;
            text-transform: capitalize;
            border: 1px solid;
        }
        
        .status-badge.pending {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%);
            color: #d97706;
            border-color: rgba(251, 191, 36, 0.2);
        }
        
        .status-badge.confirmed {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(37, 99, 235, 0.08) 100%);
            color: #2563eb;
            border-color: rgba(59, 130, 246, 0.2);
        }
        
        .status-badge.in_progress {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.08) 0%, rgba(147, 51, 234, 0.08) 100%);
            color: #9333ea;
            border-color: rgba(168, 85, 247, 0.2);
        }
        
        .status-badge.completed {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(5, 150, 105, 0.08) 100%);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.2);
        }
        
        /* Action Buttons */
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9px;
            border: 1px solid;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            letter-spacing: 0.01em;
        }
        
        .action-btn-confirm {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%);
            color: #2563eb;
            border-color: rgba(59, 130, 246, 0.2);
        }
        
        .action-btn-confirm:hover {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(37, 99, 235, 0.15) 100%);
            border-color: rgba(59, 130, 246, 0.35);
            box-shadow: 0 4px 16px -4px rgba(59, 130, 246, 0.3);
            transform: translateY(-1px);
        }
        
        .action-btn-start {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.1) 100%);
            color: #d97706;
            border-color: rgba(245, 158, 11, 0.2);
        }
        
        .action-btn-start:hover {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15) 0%, rgba(217, 119, 6, 0.15) 100%);
            border-color: rgba(245, 158, 11, 0.35);
            box-shadow: 0 4px 16px -4px rgba(245, 158, 11, 0.3);
            transform: translateY(-1px);
        }
        
        .action-btn-complete {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.2);
        }
        
        .action-btn-complete:hover {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(5, 150, 105, 0.15) 100%);
            border-color: rgba(16, 185, 129, 0.35);
            box-shadow: 0 4px 16px -4px rgba(16, 185, 129, 0.3);
            transform: translateY(-1px);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 64px 32px;
        }
        
        .empty-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(147, 51, 234, 0.08) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }
        
        /* Performance Card */
        .performance-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            padding: 32px;
            box-shadow: 
                0 4px 20px -4px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        
        .performance-stat {
            text-align: center;
            padding: 24px;
            border-radius: 16px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid;
        }
        
        .performance-stat:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 32px -8px rgba(0, 0, 0, 0.1);
        }
        
        .performance-stat-blue {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.06) 0%, rgba(37, 99, 235, 0.06) 100%);
            border-color: rgba(59, 130, 246, 0.1);
        }
        
        .performance-stat-green {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.06) 0%, rgba(5, 150, 105, 0.06) 100%);
            border-color: rgba(16, 185, 129, 0.1);
        }
        
        .performance-stat-yellow {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.06) 0%, rgba(217, 119, 6, 0.06) 100%);
            border-color: rgba(245, 158, 11, 0.1);
        }
        
        .performance-stat-purple {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.06) 0%, rgba(147, 51, 234, 0.06) 100%);
            border-color: rgba(168, 85, 247, 0.1);
        }
        
        .performance-number {
            font-family: 'Sora', sans-serif;
            font-size: 2.25rem;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.03em;
        }
        
        /* Status Indicator */
       .status-indicator {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 0.9375rem;
    cursor: pointer;
    border: 1px solid transparent;
    backdrop-filter: blur(8px);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

/* Hover effect for the whole button */
.status-indicator:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    filter: brightness(1.1);
}
        
        .status-toggle-btn {
    appearance: none;
    border: 1px solid rgba(255, 255, 255, 0.4);
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff !important;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    backdrop-filter: blur(10px);
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}
        
        .status-toggle-btn::after {
            content: 'Click to toggle';
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }
        
        .status-toggle-btn::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid rgba(0, 0, 0, 0.9);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }
        
        .status-toggle-btn:hover::after {
            opacity: 1;
            top: -50px;
        }
        
        .status-toggle-btn:hover::before {
            opacity: 1;
            top: -14px;
        }
        
   /* Glass Style for Available (Green) */
.status-available {
    background: rgba(16, 185, 129, 0.2);
    color: #ffffff;
    border-color: rgba(16, 185, 129, 0.4);
}
        
        .status-available.status-toggle-btn:hover {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(5, 150, 105, 0.15) 100%);
            border-color: rgba(16, 185, 129, 0.35);
            box-shadow: 0 4px 16px -4px rgba(16, 185, 129, 0.3);
            transform: scale(1.05);
        }
        
        .status-available::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 10px #10b981;
    animation: pulse-glow 2s ease-in-out infinite;
}
        .status-unavailable {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.3);
}
        
        .status-unavailable.status-toggle-btn:hover {
            background: linear-gradient(135deg, rgba(107, 114, 128, 0.12) 0%, rgba(75, 85, 99, 0.12) 100%);
            border-color: rgba(107, 114, 128, 0.35);
            box-shadow: 0 4px 16px -4px rgba(107, 114, 128, 0.3);
            transform: scale(1.05);
        }
        
        .status-toggle-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-1px);
}
        .status-unavailable::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
}
        
        .status-toggle-btn:active {
            transform: scale(0.98);
        }
        
        /* Count Badge */
        .count-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 600;
            border: 1px solid;
        }
        
        /* Link Hover */
        .link-elegant {
            color: #9333ea;
            font-weight: 600;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .link-elegant:hover {
            color: #7c3aed;
            gap: 10px;
        }
        
        /* Stagger Animations */
        .stagger-item {
            animation: fade-in-up 0.7s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        }
        
        .stagger-item:nth-child(1) { animation-delay: 0.05s; }
        .stagger-item:nth-child(2) { animation-delay: 0.1s; }
        .stagger-item:nth-child(3) { animation-delay: 0.15s; }
        .stagger-item:nth-child(4) { animation-delay: 0.2s; }
        .stagger-item:nth-child(5) { animation-delay: 0.25s; }
        .stagger-item:nth-child(6) { animation-delay: 0.3s; }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #fafafa;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%);
            border-radius: 10px;
            border: 2px solid #fafafa;
        }

        /* Service Tags */
        .service-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(147, 51, 234, 0.08) 100%);
            color: #4f46e5;
            border: 1px solid rgba(79, 70, 229, 0.15);
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Welcome Section -->
        <div class="hero-card mb-8 animate-fade-in-up">
            <div class="hero-content">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="font-display text-3xl font-bold text-white mb-2">
                            Welcome back, {{ auth()->user()->name }}!
                        </h3>
                        <p class="text-indigo-100 text-lg font-medium mb-1">{{ $staff->specialization }}</p>
                        <p class="text-indigo-200 text-sm">{{ now()->format('l, F d, Y') }}</p>
                    </div>
                    <form action="{{ route('staff.toggle-availability') }}" method="POST">
                        @csrf
                        <button type="submit" class="status-indicator status-toggle-btn {{ $staff->is_available ? 'status-available' : 'status-unavailable' }}">
                            {{ $staff->is_available ? 'Available' : 'Unavailable' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid md:grid-cols-4 gap-6 mb-8">
            <div class="stat-card stat-card-blue stagger-item">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-3">Today's Total</p>
                        <p class="stat-number text-blue-600">{{ $stats['today_total'] }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%); color: #3b82f6;">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Appointments Scheduled</p>
            </div>

            <div class="stat-card stat-card-green stagger-item">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-3">Completed Today</p>
                        <p class="stat-number text-green-600">{{ $stats['today_completed'] }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%); color: #10b981;">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Successfully Finished</p>
            </div>

            <div class="stat-card stat-card-yellow stagger-item">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-3">Pending Today</p>
                        <p class="stat-number text-yellow-600">{{ $stats['today_pending'] }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.1) 100%); color: #f59e0b;">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Awaiting Service</p>
            </div>

            <div class="stat-card stat-card-purple stagger-item">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-3">This Week</p>
                        <p class="stat-number text-purple-600">{{ $stats['upcoming_total'] }}</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, rgba(168, 85, 247, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%); color: #a855f7;">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Next 7 Days</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid md:grid-cols-3 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
            <a href="{{ route('staff.appointments') }}" class="action-card" style="--action-gradient: linear-gradient(90deg, #4f46e5 0%, #4338ca 100%);">
                <div class="action-icon" style="background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(67, 56, 202, 0.1) 100%); color: #4f46e5;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-1">All Appointments</h4>
                    <p class="text-sm text-gray-600">View complete schedule</p>
                </div>
            </a>

            <a href="{{ route('staff.availability') }}" class="action-card" style="--action-gradient: linear-gradient(90deg, #10b981 0%, #059669 100%);">
                <div class="action-icon" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%); color: #10b981;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-1">Manage Availability</h4>
                    <p class="text-sm text-gray-600">Set your working hours</p>
                </div>
            </a>

            <a href="{{ route('profile.edit') }}" class="action-card" style="--action-gradient: linear-gradient(90deg, #a855f7 0%, #9333ea 100%);">
                <div class="action-icon" style="background: linear-gradient(135deg, rgba(168, 85, 247, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%); color: #a855f7;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-1">My Profile</h4>
                    <p class="text-sm text-gray-600">Update your information</p>
                </div>
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <!-- Today's Schedule -->
            <div class="schedule-card animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="schedule-header">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-display text-xl font-bold text-gray-900 mb-1">Today's Schedule</h3>
                            <p class="text-sm text-gray-600">{{ now()->format('l, F d, Y') }}</p>
                        </div>
                        @if($todayAppointments->count() > 0)
                            <span class="count-badge" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%); color: #2563eb; border-color: rgba(59, 130, 246, 0.2);">
                                {{ $todayAppointments->count() }} appointments
                            </span>
                        @endif
                    </div>
                </div>
                <div class="schedule-body">
                    @forelse($todayAppointments as $appointment)
                        <div class="appointment-item">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h4 class="font-semibold text-gray-900">{{ $appointment->formatted_time }}</h4>
                                    </div>

                                    <!-- Services display -->
                                    <div class="ml-6 mb-2">
                                        @if($appointment->services && $appointment->services->count() > 0)
                                            @if($appointment->services->count() === 1)
                                                <p class="text-sm font-medium text-gray-700">{{ $appointment->services->first()->name }}</p>
                                            @else
                                                <div class="flex flex-wrap gap-1.5">
                                                    @foreach($appointment->services as $service)
                                                        <span class="service-tag">
                                                            {{ $service->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                                <p class="text-xs text-gray-500 mt-1.5">{{ $appointment->services->count() }} services · ₱{{ number_format($appointment->services->sum('price'), 2) }}</p>
                                            @endif
                                        @elseif($appointment->service)
                                            <p class="text-sm font-medium text-gray-700">{{ $appointment->service->name }}</p>
                                        @endif
                                    </div>

                                    <p class="text-sm text-gray-600 ml-6 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                                        </svg>
                                        {{ $appointment->customer->name }}
                                    </p>
                                </div>
                                <span class="status-badge {{ $appointment->status }}">
                                    {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                </span>
                            </div>
                            
                            @if($appointment->status !== 'completed' && $appointment->status !== 'cancelled')
                                <form action="{{ route('staff.appointments.status', $appointment) }}" method="POST" class="ml-6 flex flex-wrap gap-2 mt-3">
                                    @csrf
                                    @if($appointment->status === 'pending')
                                        <button type="submit" name="status" value="confirmed" class="action-btn action-btn-confirm">
                                            <span>✓</span>
                                            <span>Confirm</span>
                                        </button>
                                    @endif
                                    @if($appointment->status === 'confirmed' || $appointment->status === 'pending')
                                        <button type="submit" name="status" value="in_progress" class="action-btn action-btn-start">
                                            <span>▶</span>
                                            <span>Start Service</span>
                                        </button>
                                    @endif
                                    @if($appointment->status === 'in_progress')
                                        <button type="submit" name="status" value="completed" class="action-btn action-btn-complete">
                                            <span>✓</span>
                                            <span>Mark Complete</span>
                                        </button>
                                    @endif
                                </form>
                            @endif
                        </div>
                    @empty
                        <div class="empty-state">
                            <div class="empty-icon">
                                <svg class="w-10 h-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path>
                                </svg>
                            </div>
                            <p class="font-semibold text-gray-900 mb-1">No appointments today</p>
                            <p class="text-sm text-gray-500">Enjoy your day off!</p>
                        </div>
                    @endforelse
                </div>
                @if($todayAppointments->count() > 0)
                    <div class="p-4 bg-gray-50 border-t border-gray-100 text-center">
                        <a href="{{ route('staff.appointments') }}" class="link-elegant">
                            <span>View All Appointments</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Upcoming Appointments -->
            <div class="schedule-card animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="schedule-header">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-display text-xl font-bold text-gray-900 mb-1">Upcoming Appointments</h3>
                            <p class="text-sm text-gray-600">Next 7 days</p>
                        </div>
                        @if($upcomingAppointments->count() > 0)
                            <span class="count-badge" style="background: linear-gradient(135deg, rgba(168, 85, 247, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%); color: #9333ea; border-color: rgba(168, 85, 247, 0.2);">
                                {{ $upcomingAppointments->count() }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="schedule-body max-h-96 overflow-y-auto">
                    @forelse($upcomingAppointments as $appointment)
                        <div class="appointment-item">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path>
                                        </svg>
                                        <h4 class="font-semibold text-gray-900">{{ $appointment->formatted_date }}</h4>
                                    </div>

                                    <!-- Time row -->
                                    <p class="text-sm text-gray-500 ml-6 mb-2">{{ $appointment->formatted_time }}</p>

                                    <!-- Services display -->
                                    <div class="ml-6 mb-2">
                                        @if($appointment->services && $appointment->services->count() > 0)
                                            @if($appointment->services->count() === 1)
                                                <p class="text-sm font-medium text-gray-700">{{ $appointment->services->first()->name }}</p>
                                            @else
                                                <div class="flex flex-wrap gap-1.5">
                                                    @foreach($appointment->services as $service)
                                                        <span class="service-tag">
                                                            {{ $service->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                                <p class="text-xs text-gray-500 mt-1.5">{{ $appointment->services->count() }} services · ₱{{ number_format($appointment->services->sum('price'), 2) }}</p>
                                            @endif
                                        @elseif($appointment->service)
                                            <p class="text-sm font-medium text-gray-700">{{ $appointment->service->name }}</p>
                                        @endif
                                    </div>

                                    <p class="text-sm text-gray-600 ml-6 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                                        </svg>
                                        {{ $appointment->customer->name }}
                                    </p>
                                </div>
                                <span class="status-badge {{ $appointment->status }}">
                                    {{ ucfirst(str_replace('_', ' ', $appointment->status)) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <div class="empty-icon">
                                <svg class="w-10 h-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="font-semibold text-gray-900 mb-1">No upcoming appointments</p>
                            <p class="text-sm text-gray-500">Your schedule is clear for the week</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Performance Overview -->
        <div class="performance-card animate-fade-in-up" style="animation-delay: 0.5s;">
            <h3 class="font-display text-xl font-bold text-gray-900 mb-6">This Month's Performance</h3>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="performance-stat performance-stat-blue">
                    <p class="performance-number text-blue-600 mb-2">{{ $staff->appointments()->whereMonth('appointment_date', now()->month)->count() }}</p>
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Total Appointments</p>
                </div>
                <div class="performance-stat performance-stat-green">
                    <p class="performance-number text-green-600 mb-2">{{ $staff->appointments()->whereMonth('appointment_date', now()->month)->where('status', 'completed')->count() }}</p>
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Completed</p>
                </div>
                <div class="performance-stat performance-stat-yellow">
                    <p class="performance-number text-yellow-600 mb-2">{{ $staff->appointments()->whereMonth('appointment_date', now()->month)->where('status', 'pending')->count() }}</p>
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Pending</p>
                </div>
                <div class="performance-stat performance-stat-purple">
                    <p class="performance-number text-purple-600 mb-2">
                        {{ $staff->appointments()->whereMonth('appointment_date', now()->month)->count() > 0 ? round(($staff->appointments()->whereMonth('appointment_date', now()->month)->where('status', 'completed')->count() / $staff->appointments()->whereMonth('appointment_date', now()->month)->count()) * 100) : 0 }}%
                    </p>
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Completion Rate</p>
                </div>            </div>
        </div>
    </div>
</x-app-layout>