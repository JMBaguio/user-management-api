<!-- resources/views/components/dashboard-stats.blade.php -->
@props([
    'totalListings' => 0,
    'itemsSold' => 0,
    'itemsDonated' => 0,
    'revenue' => 0,
])

<div class="dashboard-stats">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Dashboard</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Welcome back! Here's your business overview.</p>
        </div>
        
        <!-- Date Filter -->
        <div class="mt-4 sm:mt-0">
            <select class="text-sm rounded-lg border border-gray-300 bg-white dark:bg-gray-800 dark:border-gray-700 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>Last 7 days</option>
                <option>Last 30 days</option>
                <option>Last 90 days</option>
                <option selected>All time</option>
            </select>
        </div>
    </div>

    <!-- Desktop View - Grid Layout -->
    <div class="hidden sm:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Listings -->
        <div class="stat-card group">
            <div class="stat-icon-wrapper">
                <div class="stat-icon bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div class="stat-glow bg-blue-500/10"></div>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Total Listings</h3>
                <p class="stat-value">{{ $totalListings }}</p>
            </div>
        </div>

        <!-- Items Sold -->
        <div class="stat-card group">
            <div class="stat-icon-wrapper">
                <div class="stat-icon bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div class="stat-glow bg-green-500/10"></div>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Items Sold</h3>
                <p class="stat-value">{{ $itemsSold }}</p>
            </div>
        </div>

        <!-- Items Donated -->
        <div class="stat-card group">
            <div class="stat-icon-wrapper">
                <div class="stat-icon bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <div class="stat-glow bg-purple-500/10"></div>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Items Donated</h3>
                <p class="stat-value">{{ $itemsDonated }}</p>
            </div>
        </div>

        <!-- Revenue -->
        <div class="stat-card group">
            <div class="stat-icon-wrapper">
                <div class="stat-icon bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="stat-glow bg-amber-500/10"></div>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Revenue</h3>
                <p class="stat-value">₱{{ number_format($revenue, 2) }}</p>
            </div>
        </div>
    </div>

    <!-- Mobile View - List Layout -->
    <div class="sm:hidden space-y-4">
        <!-- Time Filter for Mobile -->
        <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">All time</span>
        </div>

        <!-- Stats List -->
        <div class="space-y-3">
            <!-- Total Listings -->
            <div class="mobile-stat-item">
                <div class="flex items-center justify-between py-3">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Total Listings</span>
                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $totalListings }}</span>
                </div>
            </div>

            <!-- Items Sold -->
            <div class="mobile-stat-item">
                <div class="flex items-center justify-between py-3">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Items Sold</span>
                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $itemsSold }}</span>
                </div>
            </div>

            <!-- Items Donated -->
            <div class="mobile-stat-item">
                <div class="flex items-center justify-between py-3">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Items Donated</span>
                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $itemsDonated }}</span>
                </div>
            </div>

            <!-- Revenue -->
            <div class="mobile-stat-item">
                <div class="flex items-center justify-between py-3">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Revenue</span>
                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">₱{{ number_format($revenue, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Desktop Styles */
    .stat-card {
        @apply bg-white dark:bg-gray-800 rounded-2xl border border-gray-200/80 dark:border-gray-700/80 p-6 transition-all duration-500 ease-out relative overflow-hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.03);
    }
    
    .stat-card::before {
        content: '';
        @apply absolute inset-0 bg-gradient-to-br from-white/50 to-transparent dark:from-gray-800/50 opacity-0 transition-opacity duration-500;
    }
    
    .stat-card:hover {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08), 0 4px 10px -2px rgba(0, 0, 0, 0.04);
        @apply transform -translate-y-2 border-gray-300/80 dark:border-gray-600/80;
    }
    
    .stat-card:hover::before {
        @apply opacity-100;
    }
    
    .stat-icon-wrapper {
        @apply relative mb-4;
    }
    
    .stat-icon {
        @apply w-14 h-14 rounded-xl flex items-center justify-center transition-all duration-500 relative z-10;
        box-shadow: 0 4px 12px -2px rgba(0, 0, 0, 0.08);
    }
    
    .stat-glow {
        @apply absolute -inset-2 rounded-2xl opacity-0 blur-md transition-all duration-500;
    }
    
    .stat-card:hover .stat-glow {
        @apply opacity-100;
    }
    
    .stat-card:hover .stat-icon {
        transform: scale(1.05);
        box-shadow: 0 8px 20px -4px rgba(0, 0, 0, 0.12);
    }
    
    .stat-label {
        @apply text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2 tracking-wide uppercase;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
    }
    
    .stat-value {
        @apply text-3xl sm:text-4xl font-bold text-gray-900 dark:text-gray-100 transition-colors duration-300;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    
    .stat-card:hover .stat-value {
        @apply text-gray-800 dark:text-white;
    }

    /* Mobile Styles */
    .mobile-stat-item {
        @apply border-b border-gray-100 dark:border-gray-800 last:border-b-0;
    }

    .mobile-stat-item:last-child {
        @apply border-b-0;
    }

    /* Enhanced animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    .stat-card {
        animation: fadeInUp 0.6s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
        opacity: 0;
    }
    
    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }
    
    /* Mobile animations */
    @keyframes mobileSlideIn {
        from {
            opacity: 0;
            transform: translateX(-10px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .mobile-stat-item {
        animation: mobileSlideIn 0.4s ease-out forwards;
        opacity: 0;
    }
    
    .mobile-stat-item:nth-child(1) { animation-delay: 0.1s; }
    .mobile-stat-item:nth-child(2) { animation-delay: 0.2s; }
    .mobile-stat-item:nth-child(3) { animation-delay: 0.3s; }
    .mobile-stat-item:nth-child(4) { animation-delay: 0.4s; }
    
    /* Smooth dark mode transitions */
    .dashboard-stats * {
        @apply transition-colors duration-300;
    }

    /* Optimize for reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .stat-card,
        .mobile-stat-item {
            animation: none;
            opacity: 1;
        }
    }
</style>
@endpush