<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate-slide-in">
            <div>
                <h2 class="font-display text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600">
                   Services Management
                </h2>
                <p class="mt-1 text-sm text-gray-600">Manage and organize your service offerings</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn-gradient group">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-5 h-5 transition-transform group-hover:rotate-90 duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                    Add New Service
                </span>
            </a>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --violet-500: #8b5cf6;
            --violet-600: #7c3aed;
            --violet-700: #6d28d9;
            --fuchsia-500: #d946ef;
            --fuchsia-600: #c026d3;
            --fuchsia-700: #a21caf;
            
            --gradient-main: linear-gradient(135deg, #8b5cf6 0%, #d946ef 50%, #7c3aed 100%);
            --gradient-glass: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(217, 70, 239, 0.1) 100%);
            --gradient-hover: linear-gradient(135deg, rgba(139, 92, 246, 0.2) 0%, rgba(217, 70, 239, 0.2) 100%);
        }
        
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .font-display {
            font-family: 'Outfit', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #ffffff;
            min-height: 100vh;
        }
        
        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(139, 92, 246, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(217, 70, 239, 0.03) 0%, transparent 50%);
            pointer-events: none;
            animation: gradient-shift 15s ease infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
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
                box-shadow: 0 0 20px rgba(139, 92, 246, 0.4), 0 0 40px rgba(217, 70, 239, 0.2);
            }
            50% {
                box-shadow: 0 0 30px rgba(139, 92, 246, 0.6), 0 0 60px rgba(217, 70, 239, 0.4);
            }
        }
        
        .animate-slide-in {
            animation: slide-in 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .animate-scale-in {
            animation: scale-in 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Glass Morphism Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px) saturate(120%);
            -webkit-backdrop-filter: blur(10px) saturate(120%);
            border: 1px solid rgba(139, 92, 246, 0.15);
            box-shadow: 
                0 4px 20px rgba(139, 92, 246, 0.06),
                0 1px 4px rgba(217, 70, 239, 0.03);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 
                0 8px 32px rgba(139, 92, 246, 0.1),
                0 2px 8px rgba(217, 70, 239, 0.06);
            border-color: rgba(139, 92, 246, 0.25);
        }
        
        /* Premium Gradient Button */
        .btn-gradient {
            position: relative;
            display: inline-flex;
            align-items: center;
            padding: 14px 32px;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 50%, #7c3aed 100%);
            background-size: 200% auto;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 
                0 4px 16px rgba(139, 92, 246, 0.3),
                0 2px 8px rgba(217, 70, 239, 0.2);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .btn-gradient::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .btn-gradient:hover {
            background-position: right center;
            box-shadow: 
                0 8px 32px rgba(139, 92, 246, 0.4),
                0 4px 16px rgba(217, 70, 239, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-gradient:hover::before {
            opacity: 1;
        }
        
        /* Table Styling */
        .premium-table {
            background: #ffffff;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 92, 246, 0.1);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 
                0 4px 20px rgba(139, 92, 246, 0.05),
                0 1px 4px rgba(0, 0, 0, 0.02);
        }
        
        .premium-table thead {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.04) 0%, rgba(217, 70, 239, 0.04) 100%);
            border-bottom: 1px solid rgba(139, 92, 246, 0.08);
        }
        
        .premium-table thead th {
            padding: 20px 24px;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #6d28d9;
        }
        
        .premium-table tbody tr {
            border-bottom: 1px solid rgba(139, 92, 246, 0.04);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            background: #ffffff;
        }
        
        .premium-table tbody tr:hover {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.02) 0%, rgba(217, 70, 239, 0.02) 100%);
            transform: scale(1.005);
        }
        
        .premium-table tbody td {
            padding: 20px 24px;
        }
        
        /* Category Badge */
        .category-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(217, 70, 239, 0.1) 100%);
            color: #7c3aed;
            border: 1px solid rgba(139, 92, 246, 0.2);
            text-transform: capitalize;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .category-badge:hover {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.2) 0%, rgba(217, 70, 239, 0.2) 100%);
            border-color: rgba(139, 92, 246, 0.4);
            transform: scale(1.05);
        }
        
        /* Status Toggle */
        .status-toggle {
            position: relative;
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 12px;
            border: 1px solid;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
        }
        
        .status-toggle.active {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
            color: #047857;
            border-color: rgba(16, 185, 129, 0.3);
        }
        
        .status-toggle.active:hover {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(5, 150, 105, 0.2) 100%);
            border-color: rgba(16, 185, 129, 0.5);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }
        
        .status-toggle.inactive {
            background: linear-gradient(135deg, rgba(107, 114, 128, 0.08) 0%, rgba(75, 85, 99, 0.08) 100%);
            color: #4b5563;
            border-color: rgba(107, 114, 128, 0.2);
        }
        
        .status-toggle.inactive:hover {
            background: linear-gradient(135deg, rgba(107, 114, 128, 0.15) 0%, rgba(75, 85, 99, 0.15) 100%);
            border-color: rgba(107, 114, 128, 0.4);
        }
        
        .status-toggle::before {
            content: '';
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            margin-right: 8px;
            left: 10px;
        }
        
        .status-toggle.active::before {
            background: #10b981;
            animation: pulse-dot 2s ease-in-out infinite;
        }
        
        .status-toggle.inactive::before {
            background: #9ca3af;
        }
        
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Action Buttons */
        .action-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }
        
        .action-link::before {
            content: '';
            position: absolute;
            inset: 0;
            background: currentColor;
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .action-link:hover::before {
            opacity: 0.1;
        }
        
        .action-link span {
            position: relative;
            z-index: 1;
        }
        
        .action-edit {
            color: #7c3aed;
        }
        
        .action-delete {
            color: #dc2626;
        }
        
        .action-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px currentColor;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        /* Price Display */
        .price-display {
            font-weight: 700;
            font-size: 1rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Empty State */
        .empty-state {
            background: #ffffff;
            backdrop-filter: blur(10px);
            border: 2px dashed rgba(139, 92, 246, 0.15);
            border-radius: 24px;
            padding: 80px 40px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.04);
        }
        
        .empty-state:hover {
            border-color: rgba(139, 92, 246, 0.3);
            background: #ffffff;
            box-shadow: 0 8px 32px rgba(139, 92, 246, 0.08);
        }
        
        .empty-state-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(217, 70, 239, 0.1) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        /* Service Card Grid (Alternative View) */
        .service-card {
            position: relative;
            background: #ffffff;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 92, 246, 0.1);
            border-radius: 20px;
            padding: 28px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(139, 92, 246, 0.04);
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #8b5cf6 0%, #d946ef 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 
                0 8px 32px rgba(139, 92, 246, 0.1),
                0 2px 8px rgba(217, 70, 239, 0.06);
            border-color: rgba(139, 92, 246, 0.25);
        }
        
        .service-card:hover::before {
            transform: scaleX(1);
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(139, 92, 246, 0.05);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #c026d3 100%);
        }
        
        /* Stagger Animation */
        .stagger-item {
            animation: fade-in-up 0.6s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        }
        
        .stagger-item:nth-child(1) { animation-delay: 0.1s; }
        .stagger-item:nth-child(2) { animation-delay: 0.15s; }
        .stagger-item:nth-child(3) { animation-delay: 0.2s; }
        .stagger-item:nth-child(4) { animation-delay: 0.25s; }
        .stagger-item:nth-child(5) { animation-delay: 0.3s; }
        .stagger-item:nth-child(n+6) { animation-delay: 0.35s; }
        
        /* Bookings Count */
        .bookings-count {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.08) 0%, rgba(217, 70, 239, 0.08) 100%);
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.875rem;
            color: #7c3aed;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if($services->count() > 0)
            <div class="premium-table animate-fade-in-up">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="text-left">Service Name</th>
                            <th class="text-left">Category</th>
                            <th class="text-left">Duration</th>
                            <th class="text-left">Price</th>
                            <th class="text-left">Status</th>
                            <th class="text-left">Bookings</th>
                            <th class="text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr class="stagger-item">
                                <td>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900 mb-1">{{ $service->name }}</div>
                                        <div class="text-xs text-gray-500">{{ Str::limit($service->description, 50) }}</div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="category-badge">
                                        {{ $service->category }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <div class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                        <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $service->formatted_duration }}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="price-display">{{ $service->formatted_price }}</span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <form action="{{ route('admin.services.toggle', $service) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="status-toggle {{ $service->is_active ? 'active' : 'inactive' }}">
                                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="bookings-count">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path>
                                        </svg>
                                        {{ $service->appointments_count }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.services.edit', $service) }}" class="action-link action-edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure? This will delete the service permanently.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-link action-delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                {{ $services->links() }}
            </div>
        @else
            <div class="empty-state animate-scale-in">
                <div class="empty-state-icon">
                    <svg class="w-10 h-10 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"></path>
                    </svg>
                </div>
                <h3 class="font-display text-2xl font-bold text-gray-900 mb-2">No services yet</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">Start building your service catalog by creating your first offering. Services help you organize and manage your business.</p>
                <a href="{{ route('admin.services.create') }}" class="btn-gradient group">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5 transition-transform group-hover:rotate-90 duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                        Create Your First Service
                    </span>
                </a>
            </div>
        @endif
    </div>
</x-app-layout>