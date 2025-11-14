<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Admin Dashboard') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Monitor platform performance and manage content
                </p>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                <i class="far fa-calendar-alt mr-1"></i>{{ now()->format('F j, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Users Card -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border-l-4 border-blue-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Total Users</h3>
                                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                                    {{ $stats['total_users'] }}</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-user-plus mr-1 text-green-500"></i>
                                    <span>+{{ $stats['new_users_today'] }} today</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.users.index') }}"
                                class="inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200">
                                Manage Users
                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Total Products Card -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border-l-4 border-green-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Total Items</h3>
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                                    {{ $stats['total_products'] }}</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-box mr-1 text-green-500"></i>
                                    <span>+{{ $stats['new_products_today'] }} today</span>
                                </div>
                            </div>
                            <div
                                class="p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300">
                                <i class="fas fa-boxes text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.products.index') }}"
                                class="inline-flex items-center text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 transition-colors duration-200">
                                Manage Items
                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Total Donation Card -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border-l-4 border-purple-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Total Donations
                                </h3>
                                <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">
                                    {{ $stats['total_products_sold'] }}</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-chart-line mr-1 text-purple-500"></i>
                                    <span>Total sales performance</span>
                                </div>
                            </div>
                            <div
                                class="p-3 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.donations.index') }}"
                                class="inline-flex items-center text-sm font-medium text-purple-600 dark:text-purple-300 hover:text-amber-800 dark:hover:text-amber-300 transition-colors duration-200">
                                Manage Donations
                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <!-- Products Sold Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border-l-4 border-purple-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Items Sold</h3>
                                <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $stats['total_products_sold'] }}</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-chart-line mr-1 text-purple-500"></i>
                                    <span>Total sales performance</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Sales Overview</span>
                        </div>
                    </div>
                </div> --}}

                <!-- Reported Users Card -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border-l-4 border-amber-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Pending Reports
                                </h3>
                                <p class="text-3xl font-bold text-amber-600 dark:text-amber-400">
                                    {{ $stats['pending_reports'] }}</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-exclamation-triangle mr-1 text-amber-500"></i>
                                    <span>{{ $stats['active_listings'] }} active listings</span>
                                </div>
                            </div>
                            <div
                                class="p-3 rounded-full bg-amber-100 dark:bg-amber-900 text-amber-600 dark:text-amber-300">
                                <i class="fas fa-flag text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.reports.index') }}"
                                class="inline-flex items-center text-sm font-medium text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 transition-colors duration-200">
                                Manage Reports
                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Analytics Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Monthly Sales Chart -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                                <i class="fas fa-chart-line text-blue-500 mr-2"></i> Monthly Sales Performance
                            </h3>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="far fa-calendar mr-1"></i> {{ now()->format('Y') }}
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Track your monthly sales revenue and
                            growth</p>
                    </div>
                    <div class="p-6">
                        <canvas id="monthlySalesChart" class="w-full h-64"></canvas>
                    </div>
                </div>

                <!-- Quick Stats Sidebar -->
                <div class="space-y-6">
                    <!-- Revenue Summary -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                                <i class="fas fa-chart-pie text-purple-500 mr-2"></i> Revenue Summary
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">This Month</span>
                                <span class="text-lg font-bold text-green-600 dark:text-green-400">
                                    ₱{{ number_format($currentMonthRevenue, 2) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Last Month</span>
                                <span class="text-lg font-bold text-blue-600 dark:text-blue-400">
                                    ₱{{ number_format($lastMonthRevenue, 2) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Growth</span>
                                <span
                                    class="text-sm font-bold {{ $revenueGrowth >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $revenueGrowth >= 0 ? '+' : '' }}{{ number_format($revenueGrowth, 1) }}%
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Top Categories -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                                <i class="fas fa-tags text-green-500 mr-2"></i> Top Categories
                            </h3>
                        </div>
                        <div class="p-6 space-y-3">
                            @foreach ($topCategories as $category)
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $category->name }}</span>
                                    <span class="text-sm font-bold text-gray-800 dark:text-gray-200">
                                        {{ $category->products_count }} products
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <section class="mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">

                    <!-- Header -->
                    <div
                        class="p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                                <i class="fas fa-chart-bar text-green-500 mr-2"></i> Sales Reports & Analytics
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Combined view of yearly performance and monthly breakdown
                            </p>
                        </div>
                        <div class="mt-4 md:mt-0 flex space-x-3">
                            <a href="{{ route('admin.sales.yearly-report') }}"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:ring-2 focus:ring-green-500 shadow-md transition">
                                <i class="fas fa-file-pdf mr-2"></i> EXPORT YEARLY
                            </a>
                        </div>
                    </div>

                    <!-- Yearly Summary -->
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                        <h4 class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                            <i class="fas fa-calendar-alt text-blue-500 mr-2"></i> Yearly Sales Reports & Analytics
                            Summary -
                            {{ now()->format('Y') }}
                        </h4>

                        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-600">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-100 dark:bg-gray-600">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Month</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Products Sold</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Total Revenue</th>
                                        <th class="px-6 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach ($yearlySalesSummary as $summary)
                                        <tr
                                            class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                <div class="flex items-center">
                                                    <i class="fas fa-calendar-day text-gray-400 mr-2"></i>
                                                    {{ $salesMonths[$summary->month - 1] }}
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                    <i class="fas fa-box mr-1"></i>{{ $summary->total_products }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                <div class="flex items-center">
                                                    <i class="fas fa-peso-sign text-gray-400 mr-1"></i>
                                                    {{ number_format($summary->total_sales, 2) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <a href="{{ route('admin.sales.monthly-report', $summary->month) }}"
                                                    class="inline-flex items-center px-3 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:ring-2 focus:ring-red-500 transition">
                                                    <i class="fas fa-file-pdf mr-1"></i> PDF
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <td class="px-6 py-3 text-sm font-bold text-gray-900 dark:text-gray-100">Annual
                                            Total</td>
                                        <td class="px-6 py-3 text-sm font-bold text-gray-900 dark:text-gray-100">
                                            {{ $yearlySalesSummary->sum('total_products') }}
                                        </td>
                                        <td class="px-6 py-3 text-sm font-bold text-gray-900 dark:text-gray-100">
                                            ₱{{ number_format($yearlySalesSummary->sum('total_sales'), 2) }}
                                        </td>
                                        <td class="px-6 py-3"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Monthly Filter + Detailed Breakdown -->
                    <div x-data="{ activeMonth: '' }" class="p-6">
                        <h4 class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                            <i class="fas fa-filter text-indigo-500 mr-2"></i> Filter by Month
                        </h4>

                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach ($monthlySalesDetails as $month => $details)
                                <button
                                    @click="activeMonth = activeMonth === '{{ $month }}' ? '' : '{{ $month }}'"
                                    class="px-4 py-2 rounded-md text-sm font-medium border transition-colors duration-200"
                                    :class="activeMonth === '{{ $month }}'
                                        ?
                                        'bg-indigo-600 text-white border-indigo-600 shadow-sm' :
                                        'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300 border-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600'">
                                    <i class="fas fa-calendar-check mr-1"></i> {{ $details['month_name'] }}
                                </button>
                            @endforeach
                        </div>

                        <template x-for="(details, month) in {{ json_encode($monthlySalesDetails) }}"
                            :key="month">
                            <div x-show="activeMonth === month" x-transition
                                class="border dark:border-gray-700 rounded-lg overflow-hidden shadow-sm bg-white dark:bg-gray-800">
                                <div class="px-6 py-4 border-b dark:border-gray-700 flex justify-between items-center">
                                    <div>
                                        <h4
                                            class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                                            <i class="fas fa-chart-line text-purple-500 mr-2"></i>
                                            <span x-text="details.month_name"></span> Summary
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            <span x-text="details.total_products"></span> Products Sold •
                                            ₱<span
                                                x-text="Number(details.total_sales).toLocaleString(undefined, { minimumFractionDigits: 2 })"></span>
                                            Total Sales
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <a :href="'/admin/sales/monthly-export/' + month"
                                            class="inline-flex items-center px-3 py-1 bg-red-600 rounded-md text-xs font-semibold text-white uppercase tracking-widest hover:bg-blue-700 transition duration-150 shadow-sm">
                                            <i class="fas fa-file-pdf mr-1"></i> Export
                                        </a>
                                    </div>
                                </div>

                                <div class="overflow-x-auto rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Product</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Seller</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Category</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Price</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date Sold</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                            <template x-for="product in details.products" :key="product.id">
                                                <tr
                                                    class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                                    <td
                                                        class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        <i class="fas fa-cube text-gray-400 mr-2"></i>
                                                        <span x-text="product.name"></span>
                                                    </td>
                                                    <td
                                                        class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                        <i class="fas fa-user-circle mr-2 text-gray-400"></i>
                                                        <span
                                                            x-text="product.user.fname + ' ' + product.user.lname"></span>
                                                    </td>
                                                    <td
                                                        class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                                            <i class="fas fa-tag mr-1"></i>
                                                            <span x-text="product.category.name"></span>
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="px-4 py-3 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                        ₱<span
                                                            x-text="Number(product.price).toLocaleString(undefined, { minimumFractionDigits: 2 })"></span>
                                                    </td>
                                                    <td
                                                        class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                        <i class="far fa-calendar-alt mr-2"></i>
                                                        <span
                                                            x-text="new Date(product.created_at).toLocaleDateString('en-PH', { month: 'short', day: 'numeric', year: 'numeric' })"></span>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>
            </section>



            {{-- <!-- Recent Activity Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Recent Reports -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                            <i class="fas fa-flag text-amber-500 mr-2"></i> Recent User Reports
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Latest user-reported issues requiring attention</p>
                    </div>
                    <div class="p-0">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Reporter</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Reported User</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Reason</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($recentReports as $report)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xs font-bold">
                                                        {{ substr($report->reporter->fname, 0, 1) }}{{ substr($report->reporter->lname, 0, 1) }}
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="font-medium">{{ $report->reporter->fname }} {{ $report->reporter->lname }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $report->reportedUser->fname }} {{ $report->reportedUser->lname }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                <div class="max-w-xs truncate">{{ $report->reason }}</div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $report->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                                       ($report->status === 'resolved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                                    <i class="mr-1 fas {{ $report->status === 'pending' ? 'fa-clock' : 
                                                       ($report->status === 'resolved' ? 'fa-check' : 'fa-times') }}"></i>
                                                    {{ ucfirst($report->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 text-right">
                            <a href="{{ route('admin.reports.index') }}" class="text-sm font-medium text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 transition-colors duration-200">
                                View All Reports <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Products -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                            <i class="fas fa-box-open text-green-500 mr-2"></i> Recently Added Products
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">New products listed on the platform</p>
                    </div>
                    <div class="p-0">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Seller</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($recentProducts as $product)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xs font-bold">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="font-medium">{{ $product->name }}</p>
                                                        <p class="text-xs text-gray-500">{{ $product->category->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->user->fname }} {{ $product->user->lname }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                <div class="flex items-center">
                                                    <i class="fas fa-peso-sign text-gray-400 mr-1"></i>
                                                    {{ number_format($product->price, 2) }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : 
                                                       ($product->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                    <i class="mr-1 fas {{ $product->status === 'active' ? 'fa-check-circle' : 
                                                       ($product->status === 'pending' ? 'fa-clock' : 'fa-times-circle') }}"></i>
                                                    {{ ucfirst($product->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 text-right">
                            <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 transition-colors duration-200">
                                Manage All Products <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('monthlySalesChart').getContext('2d');
        const monthlySalesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($salesMonths),
                datasets: [{
                    label: 'Sales Revenue (₱)',
                    data: @json($salesData),
                    borderColor: 'rgba(79, 70, 229, 1)',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgba(79, 70, 229, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(tooltipItem) {
                                return '₱' + tooltipItem.raw.toLocaleString('en-PH', {
                                    minimumFractionDigits: 2
                                });
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Month',
                            color: '#6B7280',
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(107, 114, 128, 0.1)'
                        },
                        title: {
                            display: true,
                            text: 'Sales Revenue (₱)',
                            color: '#6B7280',
                            font: {
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString('en-PH');
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                }
            }
        });

        // Toggle function for monthly details
        function toggleMonthDetails(monthId) {
            const content = document.getElementById(monthId);
            const monthNumber = monthId.split('-')[1];
            const icon = document.getElementById('icon-' + monthNumber);

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</x-app-layout>
