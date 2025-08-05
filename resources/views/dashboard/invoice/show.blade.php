<x-app-layout>
    <!-- Customer Information Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{session('lang') == 'en' ? 'Customer Information' : 'معلومات العميل'}}
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Customer Name' : 'اسم العميل'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Phone Number' : 'رقم الهاتف'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Full Address' : 'العنوان الكامل'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Order Date' : 'تاريخ الطلب'}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-semibold text-gray-900 text-nowrap dark:text-white">
                            {{ $record->customer_name }}
                        </td>
                        <td class="px-6 py-4 text-nowrap text-gray-700 dark:text-gray-300">
                            {{ $record->phone }}
                        </td>
                        <td class="px-6 py-4 text-nowrap text-gray-700 dark:text-gray-300">
                            {{ $record->country }} - {{ $record->city }} - {{ $record->street }}
                        </td>
                        <td class="px-6 py-4 text-nowrap text-gray-700 dark:text-gray-300">
                            {{ $record->order_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Order Items Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{session('lang') == 'en' ? 'Order Items' : 'عناصر الطلب'}}
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            {{session('lang') == 'en' ? 'Image' : 'الصورة'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Product' : 'المنتج'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Size' : 'المقاس'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Color' : 'اللون'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Quantity' : 'الكمية'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Price' : 'السعر'}}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($items as $item)
                        @if (!empty($item->product))
                            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-750 transition-colors duration-200">
                                <!-- Product Image -->
                                <td class="p-4">
                                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                        <img src="{{ URL::to('storage/' . $item->product->main_image_url) }}"
                                            class="w-full h-full object-cover" 
                                            alt="{{ session('lang') == 'en' ? $item->product->name_en : $item->product->name_ar }}">
                                    </div>
                                </td>

                                <!-- Product Name -->
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900 dark:text-white text-base">
                                        {{ session('lang') == 'en' ? $item->product->name_en : $item->product->name_ar }}
                                    </div>
                                </td>

                                <!-- Size -->
                                <td class="px-6 py-4">
                                    @if (!empty($item->size))
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            {{ $item->size }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500 text-sm">
                                            {{session('lang') == 'en' ? 'N/A' : 'غير محدد'}}
                                        </span>
                                    @endif
                                </td>

                                <!-- Color -->
                                <td class="px-6 py-4">
                                    @if (!empty($item->color))
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <!-- Color preview circle -->
                                            <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 shadow-sm" 
                                                 style="background-color: {{ $item->hex_code ?? $item->color }};"
                                                 title="{{ $item->color }}"></div>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                {{ $item->color }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500 text-sm">
                                            {{session('lang') == 'en' ? 'N/A' : 'غير محدد'}}
                                        </span>
                                    @endif
                                </td>

                                <!-- Quantity -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full dark:bg-blue-900 dark:text-blue-300">
                                            {{ $item->quantity }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-4">
                                    <div class="font-bold text-green-600 dark:text-green-400 text-base">
                                        ${{ number_format($item->subtotal, 2) }}
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Order Summary Footer -->
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
                <!-- Order Status -->
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{session('lang') == 'en' ? 'Status:' : 'الحالة:'}}
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                        @if ($record->status == 'delivered') 
                            bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                        @elseif ($record->status == 'pending') 
                            bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                        @else 
                            bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                        @endif">
                        @if ($record->status == 'delivered')
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @elseif ($record->status == 'pending')
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                        {{ ucfirst($record->status) }}
                    </span>
                </div>

                <!-- Total Amount -->
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                        {{session('lang') == 'en' ? 'Total:' : 'المجموع:'}}
                    </span>
                    <span class="text-xl font-bold text-green-600 dark:text-green-400">
                        ${{ number_format($record->total_amount, 2) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout><x-app-layout>
    <!-- Customer Information Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{session('lang') == 'en' ? 'Customer Information' : 'معلومات العميل'}}
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Customer Name' : 'اسم العميل'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Phone Number' : 'رقم الهاتف'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Full Address' : 'العنوان الكامل'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Order Date' : 'تاريخ الطلب'}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-semibold text-gray-900 text-nowrap dark:text-white">
                            {{ $record->customer_name }}
                        </td>
                        <td class="px-6 py-4 text-nowrap text-gray-700 dark:text-gray-300">
                            {{ $record->phone }}
                        </td>
                        <td class="px-6 py-4 text-nowrap text-gray-700 dark:text-gray-300">
                            {{ $record->country }} - {{ $record->city }} - {{ $record->street }}
                        </td>
                        <td class="px-6 py-4 text-nowrap text-gray-700 dark:text-gray-300">
                            {{ $record->order_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Order Items Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{session('lang') == 'en' ? 'Order Items' : 'عناصر الطلب'}}
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            {{session('lang') == 'en' ? 'Image' : 'الصورة'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Product' : 'المنتج'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Size' : 'المقاس'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Color' : 'اللون'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Quantity' : 'الكمية'}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap font-semibold">
                            {{session('lang') == 'en' ? 'Price' : 'السعر'}}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($items as $item)
                        @if (!empty($item->product))
                            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-750 transition-colors duration-200">
                                <!-- Product Image -->
                                <td class="p-4">
                                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                        <img src="{{ URL::to('storage/' . $item->product->main_image_url) }}"
                                            class="w-full h-full object-cover" 
                                            alt="{{ session('lang') == 'en' ? $item->product->name_en : $item->product->name_ar }}">
                                    </div>
                                </td>

                                <!-- Product Name -->
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900 dark:text-white text-base">
                                        {{ session('lang') == 'en' ? $item->product->name_en : $item->product->name_ar }}
                                    </div>
                                </td>

                                <!-- Size -->
                                <td class="px-6 py-4">
                                    @if (!empty($item->size))
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            {{ $item->size }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500 text-sm">
                                            {{session('lang') == 'en' ? 'N/A' : 'غير محدد'}}
                                        </span>
                                    @endif
                                </td>

                                <!-- Color -->
                                <td class="px-6 py-4">
                                    @if (!empty($item->color))
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <!-- Color preview circle -->
                                            <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 shadow-sm" 
                                                 style="background-color: {{ $item->hex_code }};"
                                                 title="{{ $item->color }}"></div>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                {{ $item->color }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500 text-sm">
                                            {{session('lang') == 'en' ? 'N/A' : 'غير محدد'}}
                                        </span>
                                    @endif
                                </td>

                                <!-- Quantity -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full dark:bg-blue-900 dark:text-blue-300">
                                            {{ $item->quantity }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-4">
                                    <div class="font-bold text-green-600 dark:text-green-400 text-base">
                                        ${{ number_format($item->subtotal, 2) }}
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Order Summary Footer -->
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
                <!-- Order Status -->
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{session('lang') == 'en' ? 'Status:' : 'الحالة:'}}
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                        @if ($record->status == 'delivered') 
                            bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                        @elseif ($record->status == 'pending') 
                            bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                        @else 
                            bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                        @endif">
                        @if ($record->status == 'delivered')
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @elseif ($record->status == 'pending')
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                        {{ ucfirst($record->status) }}
                    </span>
                </div>

                <!-- Total Amount -->
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                        {{session('lang') == 'en' ? 'Total:' : 'المجموع:'}}
                    </span>
                    <span class="text-xl font-bold text-green-600 dark:text-green-400">
                        ${{ number_format($record->total_amount, 2) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>