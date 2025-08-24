<x-app-layout>
    <div class="container mx-auto px-4 py-6 min-h-screen bg-gray-50 dark:bg-gray-900">
        
        <!-- Header Section -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div class="mb-4 lg:mb-0">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ session('lang') == 'en' ? 'Analytics Dashboard' : 'لوحة التحليلات' }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">
                    {{ session('lang') == 'en' ? 'Comprehensive business insights and performance metrics' : 'رؤى شاملة للأعمال ومقاييس الأداء' }}
                </p>
            </div>

            <!-- Controls -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <!-- Date Range Filter -->
                <form action="{{ route('dashboard.index') }}" method="get" class="flex items-center gap-3">
                    <select name="period" class="form-select bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                        <option value="7">{{ session('lang') == 'en' ? 'Last 7 days' : 'آخر 7 أيام' }}</option>
                        <option value="30" {{ request('period') == '30' ? 'selected' : '' }}>{{ session('lang') == 'en' ? 'Last 30 days' : 'آخر 30 يوم' }}</option>
                        <option value="90" {{ request('period') == '90' ? 'selected' : '' }}>{{ session('lang') == 'en' ? 'Last 90 days' : 'آخر 90 يوم' }}</option>
                        <option value="365" {{ request('period') == '365' ? 'selected' : '' }}>{{ session('lang') == 'en' ? 'Last year' : 'آخر سنة' }}</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm transition-colors duration-200 shadow-sm">
                        {{ session('lang') == 'en' ? 'Apply' : 'تطبيق' }}
                    </button>
                </form>

                <!-- Export Button -->
                <button onclick="exportData()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg text-sm transition-colors duration-200 shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    {{ session('lang') == 'en' ? 'Export' : 'تصدير' }}
                </button>
            </div>
        </div>

        <!-- Key Performance Indicators -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Revenue -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            {{ session('lang') == 'en' ? 'Total Revenue' : 'إجمالي الإيرادات' }}
                        </p>
                        <div class="flex items-center mt-2">
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white">
                                ${{ number_format($totalRevenue ?? 0) }}
                            </h3>
                            @php
                                $revenueChange = $revenueChangePercent ?? 0;
                                $isPositive = $revenueChange >= 0;
                            @endphp
                            <span class="ml-3 px-2 py-1 text-xs font-medium rounded-full {{ $isPositive ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $isPositive ? '+' : '' }}{{ number_format($revenueChange, 1) }}%
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ session('lang') == 'en' ? 'vs previous period' : 'مقارنة بالفترة السابقة' }}
                        </p>
                    </div>
                    <div class="p-3 rounded-lg bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Orders Completed -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            {{ session('lang') == 'en' ? 'Orders Completed' : 'الطلبات المكتملة' }}
                        </p>
                        <div class="flex items-center mt-2">
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white">
                                {{ number_format($ordersCompleted ?? 0) }}
                            </h3>
                            @php
                                $ordersChange = $ordersChangePercent ?? 0;
                                $isPositive = $ordersChange >= 0;
                            @endphp
                            <span class="ml-3 px-2 py-1 text-xs font-medium rounded-full {{ $isPositive ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $isPositive ? '+' : '' }}{{ number_format($ordersChange, 1) }}%
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ session('lang') == 'en' ? 'vs previous period' : 'مقارنة بالفترة السابقة' }}
                        </p>
                    </div>
                    <div class="p-3 rounded-lg bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Average Order Value -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            {{ session('lang') == 'en' ? 'Avg Order Value' : 'متوسط قيمة الطلب' }}
                        </p>
                        <div class="flex items-center mt-2">
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white">
                                ${{ number_format($avgOrderValue ?? 0) }}
                            </h3>
                            @php
                                $aovChange = $aovChangePercent ?? 0;
                                $isPositive = $aovChange >= 0;
                            @endphp
                            <span class="ml-3 px-2 py-1 text-xs font-medium rounded-full {{ $isPositive ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $isPositive ? '+' : '' }}{{ number_format($aovChange, 1) }}%
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ session('lang') == 'en' ? 'vs previous period' : 'مقارنة بالفترة السابقة' }}
                        </p>
                    </div>
                    <div class="p-3 rounded-lg bg-gradient-to-r from-purple-500 to-purple-600 text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Conversion Rate -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            {{ session('lang') == 'en' ? 'Conversion Rate' : 'معدل التحويل' }}
                        </p>
                        <div class="flex items-center mt-2">
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white">
                                {{ number_format($conversionRate ?? 0, 1) }}%
                            </h3>
                            @php
                                $conversionChange = $conversionChangePercent ?? 0;
                                $isPositive = $conversionChange >= 0;
                            @endphp
                            <span class="ml-3 px-2 py-1 text-xs font-medium rounded-full {{ $isPositive ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $isPositive ? '+' : '' }}{{ number_format($conversionChange, 1) }}%
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ session('lang') == 'en' ? 'vs previous period' : 'مقارنة بالفترة السابقة' }}
                        </p>
                    </div>
                    <div class="p-3 rounded-lg bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Revenue Trend Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ session('lang') == 'en' ? 'Revenue Trend' : 'اتجاه الإيرادات' }}
                    </h3>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ session('lang') == 'en' ? 'Revenue' : 'الإيرادات' }}</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ session('lang') == 'en' ? 'Target' : 'الهدف' }}</span>
                        </div>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            <!-- Orders Status Pie Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ session('lang') == 'en' ? 'Orders Status' : 'حالة الطلبات' }}
                    </h3>
                </div>
                <div class="h-80 flex items-center justify-center">
                    <canvas id="ordersChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Traffic Sources & Customer Analytics -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Traffic Sources -->
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ session('lang') == 'en' ? 'Traffic Sources' : 'مصادر الزيارات' }}
                    </h3>
                </div>
                <div class="space-y-4">
                    @php
                        $trafficSources = [
                            ['name' => 'Facebook', 'visitors' => $facebook ?? 0, 'color' => 'bg-blue-500', 'icon' => 'facebook'],
                            ['name' => 'Instagram', 'visitors' => $instagram ?? 0, 'color' => 'bg-pink-500', 'icon' => 'instagram'],
                            ['name' => 'WhatsApp', 'visitors' => $whatsapp ?? 0, 'color' => 'bg-green-500', 'icon' => 'whatsapp'],
                            ['name' => 'Google', 'visitors' => $google ?? 0, 'color' => 'bg-red-500', 'icon' => 'google'],
                            ['name' => 'TikTok', 'visitors' => $tiktok ?? 0, 'color' => 'bg-gray-800', 'icon' => 'tiktok'],
                            ['name' => 'Snapchat', 'visitors' => $snapchat ?? 0, 'color' => 'bg-yellow-500', 'icon' => 'snapchat']
                        ];
                        $totalTraffic = array_sum(array_column($trafficSources, 'visitors'));
                    @endphp

                    @foreach($trafficSources as $source)
                        @php
                            $percentage = $totalTraffic > 0 ? ($source['visitors'] / $totalTraffic) * 100 : 0;
                        @endphp
                        <div class="flex items-center justify-between p-4 rounded-lg border border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full {{ $source['color'] }} flex items-center justify-center text-white text-sm font-bold mr-4">
                                    {{ strtoupper(substr($source['name'], 0, 2)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $source['name'] }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ number_format($source['visitors']) }} {{ session('lang') == 'en' ? 'visitors' : 'زائر' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-32 bg-gray-200 dark:bg-gray-700 rounded-full h-2 mr-4">
                                    <div class="{{ $source['color'] }} h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ number_format($percentage, 1) }}%</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Customer Insights -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ session('lang') == 'en' ? 'Customer Insights' : 'رؤى العملاء' }}
                </h3>
                <div class="space-y-6">
                    <!-- Total Customers -->
                    <div class="text-center p-4 rounded-lg bg-blue-50 dark:bg-blue-900/30">
                        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ number_format($totalCustomers ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ session('lang') == 'en' ? 'Total Customers' : 'إجمالي العملاء' }}</p>
                    </div>

                    <!-- New Customers -->
                    <div class="text-center p-4 rounded-lg bg-green-50 dark:bg-green-900/30">
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ number_format($newCustomers ?? 0) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ session('lang') == 'en' ? 'New This Period' : 'جديد هذه الفترة' }}</p>
                    </div>

                    <!-- Customer Satisfaction -->
                    <div class="text-center p-4 rounded-lg bg-yellow-50 dark:bg-yellow-900/30">
                        <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ number_format($customerSatisfaction ?? 0, 1) }}%</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ session('lang') == 'en' ? 'Satisfaction Rate' : 'معدل الرضا' }}</p>
                    </div>

                    <!-- Top Customer -->
                    <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">{{ session('lang') == 'en' ? 'Top Customer' : 'أفضل عميل' }}</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $topCustomerName ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">${{ number_format($topCustomerValue ?? 0) }} {{ session('lang') == 'en' ? 'lifetime value' : 'القيمة الإجمالية' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Performance Metrics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Recent Activity -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ session('lang') == 'en' ? 'Recent Activity' : 'النشاط الأخير' }}
                    </h3>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                        {{ session('lang') == 'en' ? 'View all' : 'عرض الكل' }}
                    </a>
                </div>

                <div class="space-y-4 max-h-96 overflow-y-auto">
                    @forelse($recentActivities ?? [] as $activity)
                        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full {{ $activity['type'] == 'order' ? 'bg-green-100 text-green-600' : ($activity['type'] == 'payment' ? 'bg-blue-100 text-blue-600' : 'bg-yellow-100 text-yellow-600') }} dark:bg-opacity-30 flex items-center justify-center">
                                    @if($activity['type'] == 'order')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @elseif($activity['type'] == 'payment')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $activity['title'] }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $activity['description'] }}</p>
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-gray-500 dark:text-gray-400">{{ session('lang') == 'en' ? 'No recent activity' : 'لا يوجد نشاط حديث' }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Performance Metrics -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ session('lang') == 'en' ? 'Performance Metrics' : 'مقاييس الأداء' }}
                </h3>
                <div class="space-y-4">
                    <!-- Response Time -->
                    <div class="flex items-center justify-between p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ session('lang') == 'en' ? 'Avg Response Time' : 'متوسط وقت الاستجابة' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $avgResponseTime ?? '2.3' }} {{ session('lang') == 'en' ? 'hours' : 'ساعة' }}</p>
                            </div>
                        </div>
                        <span class="text-green-600 dark:text-green-400 font-semibold">{{ session('lang') == 'en' ? 'Good' : 'جيد' }}</span>
                    </div>

                    <!-- Order Fulfillment -->
                    <div class="flex items-center justify-between p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ session('lang') == 'en' ? 'Order Fulfillment' : 'تنفيذ الطلبات' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $fulfillmentRate ?? '94.8' }}% {{ session('lang') == 'en' ? 'success rate' : 'معدل نجاح' }}</p>
                            </div>
                        </div>
                        <span class="text-green-600 dark:text-green-400 font-semibold">{{ session('lang') == 'en' ? 'Excellent' : 'ممتاز' }}</span>
                    </div>

                    <!-- Return Rate -->
                    <div class="flex items-center justify-between p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ session('lang') == 'en' ? 'Return Rate' : 'معدل الإرجاع' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $returnRate ?? '2.1' }}% {{ session('lang') == 'en' ? 'of orders' : 'من الطلبات' }}</p>
                            </div>
                        </div>
                        <span class="text-green-600 dark:text-green-400 font-semibold">{{ session('lang') == 'en' ? 'Low' : 'منخفض' }}</span>
                    </div>

                    <!-- Customer Retention -->
                    <div class="flex items-center justify-between p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ session('lang') == 'en' ? 'Customer Retention' : 'الاحتفاظ بالعملاء' }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $retentionRate ?? '78.5' }}% {{ session('lang') == 'en' ? 'returning customers' : 'عملاء عائدون' }}</p>
                            </div>
                        </div>
                        <span class="text-green-600 dark:text-green-400 font-semibold">{{ session('lang') == 'en' ? 'Good' : 'جيد' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Trend Chart
            const revenueCtx = document.getElementById('revenueChart');
            if (revenueCtx) {
                new Chart(revenueCtx.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($revenueChartLabels ?? ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']) !!},
                        datasets: [{
                            label: '{{ session("lang") == "en" ? "Revenue" : "الإيرادات" }}',
                            data: {!! json_encode($revenueChartData ?? [120000, 190000, 300000, 500000, 200000, 300000]) !!},
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4,
                            fill: true
                        }, {
                            label: '{{ session("lang") == "en" ? "Target" : "الهدف" }}',
                            data: {!! json_encode($targetChartData ?? [150000, 200000, 250000, 300000, 350000, 400000]) !!},
                            borderColor: 'rgb(34, 197, 94)',
                            backgroundColor: 'rgba(34, 197, 94, 0.1)',
                            tension: 0.4,
                            borderDash: [5, 5]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return '$' + value.toLocaleString();
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Orders Status Pie Chart
            const ordersCtx = document.getElementById('ordersChart');
            if (ordersCtx) {
                new Chart(ordersCtx.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: [
                            '{{ session("lang") == "en" ? "Completed" : "مكتمل" }}',
                            '{{ session("lang") == "en" ? "Pending" : "معلق" }}',
                            '{{ session("lang") == "en" ? "Cancelled" : "ملغي" }}',
                            '{{ session("lang") == "en" ? "Processing" : "قيد المعالجة" }}'
                        ],
                        datasets: [{
                            data: {!! json_encode($ordersStatusData ?? [65, 20, 5, 10]) !!},
                            backgroundColor: [
                                'rgb(34, 197, 94)',
                                'rgb(251, 191, 36)',
                                'rgb(239, 68, 68)',
                                'rgb(59, 130, 246)'
                            ],
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20
                                }
                            }
                        }
                    }
                });
            }
        });

        // Export function
        function exportData() {
            alert('{{ session("lang") == "en" ? "Export functionality will be implemented based on your requirements" : "سيتم تنفيذ وظيفة التصدير بناءً على متطلباتك" }}');
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom scrollbar */
        .overflow-y-auto::-webkit-scrollbar {
            width: 6px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: transparent;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: rgba(156, 163, 175, 0.5);
            border-radius: 3px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: rgba(156, 163, 175, 0.7);
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Hover effects */
        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Animation for metrics */
        @keyframes slideInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slideInUp 0.5s ease-out;
        }

        /* Gradient backgrounds */
        .bg-gradient-to-r {
            background-image: linear-gradient(to right, var(--tw-gradient-stops));
        }
    </style>
</x-app-layout>