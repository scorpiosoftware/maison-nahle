<x-app-layout>
    @if (session()->has('success'))
        <div id="alert-border-3"
            class="flex items-center p-4 mb-6 text-green-800 border-l-4 border-green-400 bg-green-50 rounded-r-lg shadow-sm animate-in fade-in duration-300 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="text-sm font-medium">
                {{ session()->get('success') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" onclick="this.parentElement.remove()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    <!-- Header Section -->
    <div class="py-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">
            {{session('lang') == 'en' ? 'Orders' : 'الطلبات'}}
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">
            {{session('lang') == 'en' ? 'Manage orders' : 'إدارة الطلبات'}}
        </p>
    </div>

    <!-- Filters and Search Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex flex-col md:flex-row gap-6 items-end">
            <!-- Status Filter -->
            <div class="flex-1 max-w-sm">
                <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    {{session('lang') == 'en' ? 'Filter by Status' : 'تصفية حسب الحالة'}}
                </label>
                <form action="{{ route('invoice.index', 'status') }}" method="GET">
                    <select id="status" onchange="this.form.submit()" name="status"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="pending" @if (!empty($inputs['status']) and $inputs['status'] == 'pending') selected @endif>
                            {{session('lang') == 'en' ? 'Pending Orders' : 'الطلبات قيد الانتظار'}}
                        </option>
                        <option value="delivered" @if (!empty($inputs['status']) and $inputs['status'] == 'delivered') selected @endif>
                            {{session('lang') == 'en' ? 'Delivered Orders' : 'الطلبات المنجزة'}}
                        </option>
                        <option value="canceled" @if (!empty($inputs['status']) and $inputs['status'] == 'canceled') selected @endif>
                            {{session('lang') == 'en' ? 'Canceled Orders' : 'الطلبات الملغية'}}
                        </option>
                    </select>
                </form>
            </div>

            <!-- Search -->
            <div class="flex-1 max-w-md">
                <label for="search" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    {{session('lang') == 'en' ? 'Search Orders' : 'البحث في الطلبات'}}
                </label>
                <form action="{{ route('invoice.index','search') }}" method="GET">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search" name="search"
                            value="@if (!empty($inputs['search'])) {{ $inputs['search'] }} @endif"
                            class="block w-full pl-12 pr-20 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{session('lang') == 'en' ? 'Search by name, phone, or ID...' : 'البحث بالاسم أو الهاتف أو الرقم...'}}" />
                        <button type="submit"
                            class="absolute right-1 top-1 transform  bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-white transition-colors dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{session('lang') == 'en' ? 'Search' : 'بحث'}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b border-gray-200 dark:border-gray-600">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold">
                            {{session('lang') == 'en' ? 'Order ID' : 'رقم الطلب'}}
                        </th>
                        <th scope="col" class="px-6 py-4 font-semibold">
                            {{session('lang') == 'en' ? 'Customer' : 'العميل'}}
                        </th>
                        <th scope="col" class="px-6 py-4 font-semibold">
                            {{session('lang') == 'en' ? 'Phone' : 'الهاتف'}}
                        </th>
                        <th scope="col" class="px-6 py-4 font-semibold">
                            {{session('lang') == 'en' ? 'Total Amount' : 'المبلغ الإجمالي'}}
                        </th>
                        <th scope="col" class="px-6 py-4 font-semibold">
                            {{session('lang') == 'en' ? 'Order Date' : 'تاريخ الطلب'}}
                        </th>
                        <th scope="col" class="px-6 py-4 font-semibold">
                            {{session('lang') == 'en' ? 'Status' : 'الحالة'}}
                        </th>
                        <th scope="col" class="px-6 py-4 font-semibold">
                            {{session('lang') == 'en' ? 'Actions' : 'الإجراءات'}}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($records as $record)
                        <tr class="group bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-750 transition-colors duration-200">
                            <!-- Order ID -->
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900 dark:text-white text-base">
                                    #{{ $record->auto_nb }}
                                </div>
                            </td>

                            <!-- Customer Name -->
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900 dark:text-white text-base">
                                    {{ $record->customer_name }}
                                </div>
                            </td>

                            <!-- Phone -->
                            <td class="px-6 py-4">
                                <div class="text-gray-700 dark:text-gray-300 font-medium">
                                    {{ $record->phone }}
                                </div>
                            </td>

                            <!-- Total Amount -->
                            <td class="px-6 py-4">
                                <div class="font-bold text-green-600 dark:text-green-400 text-base">
                                    ${{ number_format($record->total_amount, 2) }}
                                </div>
                            </td>

                            <!-- Order Date -->
                            <td class="px-6 py-4">
                                <div class="text-gray-700 dark:text-gray-300 font-medium">
                                    {{ $record->order_date }}
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
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
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <!-- View Details -->
                                    <a href="{{ route('invoice.show', $record->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors focus:ring-2 focus:ring-blue-500 focus:outline-none dark:text-blue-400 dark:bg-blue-900 dark:hover:bg-blue-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{session('lang') == 'en' ? 'View' : 'عرض'}}
                                    </a>

                                    @if ($record->status != 'canceled' && $record->status != 'delivered')
                                        <!-- Confirm Order -->
                                        <a href="{{ route('invoice.edit', $record->id) }}"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-green-700 bg-green-100 rounded-lg hover:bg-green-200 transition-colors focus:ring-2 focus:ring-green-500 focus:outline-none dark:text-green-400 dark:bg-green-900 dark:hover:bg-green-800">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{session('lang') == 'en' ? 'Confirm' : 'تأكيد'}}
                                        </a>
                                    @endif

                                    @if ($record->status != 'canceled')
                                        <!-- Cancel Order -->
                                        <form action="{{ route('invoice.destroy', $record->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="inline-flex items-center px-3 py-2 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 transition-colors focus:ring-2 focus:ring-red-500 focus:outline-none dark:text-red-400 dark:bg-red-900 dark:hover:bg-red-800"
                                                onclick="return confirm('{{session('lang') == 'en' ? 'Are you sure you want to cancel this order?' : 'هل أنت متأكد من إلغاء هذا الطلب؟'}}')">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{session('lang') == 'en' ? 'Cancel' : 'إلغاء'}}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
            {{ $records->links() }}
        </div>
    </div>
</x-app-layout>