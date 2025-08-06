@extends('layouts.home')
@section('content')
    <!-- Universal Mobile Filter Drawer -->
    <div id="filter-drawer"
        class="fixed top-0 left-0 z-50 w-full max-w-sm h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white shadow-xl"
        tabindex="-1" aria-labelledby="filter-drawer-label">

        <!-- Header with Close Button -->
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
            <h5 id="filter-drawer-label" class="text-lg font-semibold text-gray-900">
                {{ session('lang') == 'en' ? 'Filter Products' : 'تصفية المنتجات' }}
            </h5>
            <button type="button" data-drawer-hide="filter-drawer" aria-controls="filter-drawer"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="sr-only">Close filter</span>
            </button>
        </div>

        <!-- Filter Form -->
        <div class="space-y-4 custom-scrollbar overflow-y-auto">
            <form action="{{ route('filter.products') }}" method="POST">
                @csrf
                @method('POST')

                <!-- Sort By Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        {{ session('lang') == 'en' ? 'Sort By' : 'ترتيب' }}
                    </label>
                    <select name="sorting"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                        <option value="asc">{{ session('lang') == 'en' ? 'Ascending' : 'تصاعدي' }}</option>
                        <option value="desc" @if (request()->input('sorting') == 'desc') selected @endif>
                            {{ session('lang') == 'en' ? 'Descending' : 'تنازلي' }}
                        </option>
                        <option value="low_price" @if (request()->input('sorting') == 'low_price') selected @endif>
                            {{ session('lang') == 'en' ? 'Price - Low to High' : 'السعر من الارخص للاعلى' }}
                        </option>
                        <option value="high_price" @if (request()->input('sorting') == 'high_price') selected @endif>
                            {{ session('lang') == 'en' ? 'Price - High to Low' : 'السعر الاعلى الى الادنى' }}
                        </option>
                    </select>
                </div>

                <!-- Categories Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h6 class="text-sm font-medium text-gray-900 mb-3">
                        {{ session('lang') == 'en' ? 'Categories' : 'فئات' }}
                    </h6>
                    <div class="space-y-2 max-h-32 overflow-y-auto">
                        @foreach ($categories as $cat)
                            <label
                                class="flex items-center cursor-pointer border transition-all duration-300 hover:underline">
                                {{-- <input type="checkbox" value="{{ $cat->id }}" name="categories[]"
                                    class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-900 focus:ring-2"
                                    @if (!empty(request()->input('categories'))) @foreach (request()->input('categories') as $index)
                                            @if ($index == $cat->id) checked @break @endif
                                    @endforeach
                        @endif> --}}
                                <span class="ml-2 text-sm text-gray-700">
                                    <a
                                        href="/catalog/categories/{{ Str::slug($cat->name_en) }}">{{ session('lang') == 'en' ? $cat->name_en : $cat->name_ar }}</a>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Brands Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h6 class="text-sm font-medium text-gray-900 mb-3">
                        {{ session('lang') == 'en' ? 'Brands' : 'العلامات التجارية' }}
                    </h6>
                    <div class="space-y-2 max-h-32 overflow-y-auto">
                        @foreach ($brands as $brand)
                            <label
                                class="flex items-center cursor-pointer border transition-all duration-300 hover:underline">
                                {{-- <input type="checkbox" value="{{ $brand->id }}" name="brands[]"
                                    class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-900 focus:ring-2"
                                    @if (!empty(request()->input('brands'))) @foreach (request()->input('brands') as $b)
                                            @if ($b == $brand->id) checked @break @endif
                                    @endforeach
                        @endif> --}}
                                <span class="ml-2 text-sm text-gray-700">
                                    <a href="/catalog/brands/{{ Str::slug($brand->name_en) }}">
                                        {{ session('lang') == 'en' ? $brand->name_en : $brand->name_ar }}</a>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Stores Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h6 class="text-sm font-medium text-gray-900 mb-3">
                        {{ session('lang') == 'en' ? 'Sections' : 'المتاجر' }}
                    </h6>
                    <div class="space-y-2 max-h-32 overflow-y-auto">
                        @foreach ($sections as $section)
                            <label
                                class="flex items-center cursor-pointer border transition-all duration-300 hover:underline">
                                {{-- <input type="checkbox" value="{{ $section->id }}" name="sections[]"
                                    class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-900 focus:ring-2"
                                    @if (!empty(request()->input('sections'))) @foreach (request()->input('sections') as $b)
                                            @if ($b == $section->id) checked @break @endif
                                    @endforeach
                        @endif> --}}
                                <span class="ml-2 text-sm text-gray-700">
                                    <a
                                        href="/catalog/sections/{{ Str::slug($section->name) }}">{{ session('lang') == 'en' ? $section->name : $section->name_ar }}</a>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <h6 class="text-sm font-medium text-gray-900 mb-3">
                        {{ session('lang') == 'en' ? 'Branches' : 'الاقسام' }}
                    </h6>
                    <div class="space-y-2 max-h-32 overflow-y-auto ">
                        @foreach ($branches as $branch)
                            <label
                                class="flex items-center cursor-pointer border transition-all duration-300 hover:underline">
                                {{-- <input type="checkbox" value="{{ $branch->id }}" name="branch"
                                    class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-900 focus:ring-2"
                                    @if (!empty(request()->input('sections'))) @foreach (request()->input('sections') as $b)
                                            @if ($b == $branch->id) checked @break @endif
                                    @endforeach
                        @endif> --}}
                                <span class="ml-2 text-sm text-gray-700">
                                    <a href="/catalog/branches/{{ Str::slug($branch->name) }}">
                                        {{ session('lang') == 'en' ? $branch->name : $branch->name_ar }}</a>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <!-- Branches Section -->
                {{-- <div class="bg-gray-50 rounded-lg p-4">
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        {{ session('lang') == 'en' ? 'Branches' : 'الاقسام' }}
                    </label>
                    <select name="branch"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                        <option value="">{{ session('lang') == 'en' ? 'All Branches' : 'جميع الاقسام' }}</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" @if (!empty(request()->input('branch')) && request()->input('branch') == $branch->id) selected @endif>
                                {{ session('lang') == 'en' ? $branch->name : $branch->name_ar }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <!-- Price Range Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h6 class="text-sm font-medium text-gray-900 mb-3">
                        {{ session('lang') == 'en' ? 'Price Range ($)' : 'نطاق السعر ($)' }}
                    </h6>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">
                                {{ session('lang') == 'en' ? 'Min Price' : 'السعر الادنى' }}
                            </label>
                            <input type="number" step="any" min="0" name="min_price"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm"
                                placeholder="{{ session('lang') == 'en' ? 'From' : 'من' }}"
                                @if (!empty(request()->input('min_price'))) value="{{ request()->input('min_price') }}" @endif>
                        </div>
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">
                                {{ session('lang') == 'en' ? 'Max Price' : 'السعر الاقصى' }}
                            </label>
                            <input type="number" step="any" min="0" name="max_price"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm"
                                placeholder="{{ session('lang') == 'en' ? 'To' : 'الى' }}"
                                @if (!empty(request()->input('max_price'))) value="{{ request()->input('max_price') }}" @endif>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-2 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 bg-gray-900 text-white py-3 px-4 rounded-md font-medium hover:bg-gray-800 transition-colors duration-200">
                        {{ session('lang') == 'en' ? 'Apply Filters' : 'تطبيق التصفية' }}
                    </button>
                    <a href="{{ route('shop.index') }}"
                        class="flex-1 bg-gray-100 text-gray-700 py-3 px-4 rounded-md font-medium hover:bg-gray-200 transition-colors duration-200 text-center">
                        {{ session('lang') == 'en' ? 'Clear' : 'مسح' }}
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <div class="py-4">
                    <livewire:breadcrumb :links="[
                        [
                            'path' => '/',
                            'name_en' => 'Home',
                            'name_ar' => 'الصفحة الرئيسية',
                        ],
                        [
                            'path' => '/shop',
                            'name_en' => 'Catalog',
                            'name_ar' => 'المنتجات',
                        ],
                    ]">
                </div>

                <!-- Filter Button and Results Count -->
                <div class="pb-4 flex items-center justify-between">
                    <button
                        class="inline-flex items-center gap-2 bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-200"
                        type="button" data-drawer-target="filter-drawer" data-drawer-show="filter-drawer"
                        data-drawer-backdrop="false" aria-controls="filter-drawer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z" />
                        </svg>
                        {{ session('lang') == 'en' ? 'Filter Products' : 'تصفية المنتجات' }}
                    </button>

                    <div class="text-sm text-gray-500">
                        {{ session('lang') == 'en' ? 'Showing' : 'عرض' }}
                        <span class="font-medium text-gray-900">{{ $products->count() }}</span>
                        {{ session('lang') == 'en' ? 'products' : 'منتج' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if ($products->count() <= 0)
                <div class="text-center py-16">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">
                        {{ session('lang') == 'en' ? 'No products found' : 'لم يتم العثور على منتجات' }}
                    </h3>
                    <p class="text-gray-500">
                        {{ session('lang') == 'en' ? 'Try adjusting your filters or search terms' : 'جرب تعديل المرشحات أو مصطلحات البحث' }}
                    </p>
                </div>
            @else
                <!-- Responsive Grid: 1 col mobile, 2 cols tablet, 3 cols desktop -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $item)
                        @livewire('product', ['item' => $item], key($item->id))
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if ($products->hasPages())
            <div class="bg-white border-t border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="flex justify-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Quick View Modal -->
    <livewire:quick-view-product />

    <!-- Custom Scrollbar Styles -->
    <style>
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #d1d5db #f3f4f6;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 2px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 2px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
    </style>
@endsection
