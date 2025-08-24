<div>
    <!-- Modal Backdrop - Enhanced with better interaction -->
    <div x-data="{ show: @entangle('showModal') }"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-black/60 backdrop-blur-md flex items-center justify-center p-2 sm:p-4"
         @click="show = false"
         @keydown.escape.window="show = false">
    </div>

    <!-- Modal Content - Improved layout and interactions -->
    <div x-data="{ show: @entangle('showModal'), zoomed: false }"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="fixed inset-0 z-50 flex items-center justify-center p-2 sm:p-4 pointer-events-none">
        
        @if($product)
        <div class="relative w-full max-w-7xl bg-white rounded-xl sm:rounded-2xl shadow-2xl overflow-hidden pointer-events-auto max-h-[95vh] sm:max-h-[90vh] flex flex-col">
            <!-- Close Button - More prominent and responsive -->
            <button @click="show = false" 
                    class="absolute top-2 right-2 sm:top-4 sm:right-4 z-10 bg-white/90 hover:bg-white text-gray-600 hover:text-gray-900 rounded-full p-1.5 sm:p-2 shadow-lg transition-all duration-200 hover:scale-110 backdrop-blur-sm">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Custom Scrollbar Styles -->
            <style>
                .custom-scrollbar {
                    scrollbar-width: thin;
                    scrollbar-color: #d1d5db #f3f4f6;
                }
                .custom-scrollbar::-webkit-scrollbar {
                    width: 6px;
                }
                .custom-scrollbar::-webkit-scrollbar-track {
                    background: #f3f4f6;
                    border-radius: 3px;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb {
                    background: #d1d5db;
                    border-radius: 3px;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                    background: #9ca3af;
                }
                .description-scrollbar {
                    scrollbar-width: thin;
                    scrollbar-color: #e5e7eb #f9fafb;
                }
                .description-scrollbar::-webkit-scrollbar {
                    width: 4px;
                }
                .description-scrollbar::-webkit-scrollbar-track {
                    background: #f9fafb;
                    border-radius: 2px;
                }
                .description-scrollbar::-webkit-scrollbar-thumb {
                    background: #e5e7eb;
                    border-radius: 2px;
                }
                .description-scrollbar::-webkit-scrollbar-thumb:hover {
                    background: #d1d5db;
                }
            </style>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 h-full overflow-hidden">
                <!-- Product Images - Enhanced with zoom capability and responsive -->
                <div class="flex flex-col p-2 sm:p-3 lg:p-4 border-b lg:border-b-0 lg:border-r border-gray-100 overflow-y-auto custom-scrollbar">
                    <!-- Main Image with zoom effect - Takes most of the space -->
                    <div class="w-full h-[300px] sm:h-[400px] lg:h-[500px] xl:h-[600px] overflow-hidden rounded-lg sm:rounded-xl bg-gray-50 cursor-zoom-in mb-2 sm:mb-3 flex items-center justify-center flex-shrink-0"
                         @click="zoomed = !zoomed">
                        <img src="{{ URL::to('storage/' . $selectedImage) }}" 
                             alt="{{ session('lang') == 'en' ? $product->name_en : $product->name_ar }}"
                             class="w-full h-full object-contain transition-transform duration-300 p-1 sm:p-2"
                             :class="{ 'scale-150': zoomed }">
                    </div>

                    <!-- Zoom Indicator -->
                    <p class="text-xs text-gray-500 text-center mb-2 flex-shrink-0">
                        {{ session('lang') == 'en' ? 'Click image to zoom' : 'انقر للتكبير' }}
                    </p>

                    <!-- Thumbnail Gallery - Compact and responsive -->
                    <div class="grid grid-cols-4 sm:grid-cols-5 lg:grid-cols-6 gap-1 sm:gap-1.5 flex-shrink-0">
                        <button wire:click="selectImage('{{ $product->main_image_url }}')"
                                class="aspect-square rounded-md sm:rounded-lg overflow-hidden border-2 transition-all duration-200 {{ $selectedImage === $product->main_image_url ? 'border-indigo-500 ring-1 sm:ring-2 ring-indigo-200' : 'border-transparent hover:border-gray-300' }}">
                            <img src="{{ URL::to('storage/' . $product->main_image_url) }}" 
                                 class="w-full h-full object-cover">
                        </button>
                        @foreach($product->images as $image)
                            <button wire:click="selectImage('{{ $image->image_url }}')"
                                    class="aspect-square rounded-md sm:rounded-lg overflow-hidden border-2 transition-all duration-200 {{ $selectedImage === $image->url ? 'border-indigo-500 ring-1 sm:ring-2 ring-indigo-200' : 'border-transparent hover:border-gray-300' }}">
                                <img src="{{ URL::to('storage/' . $image->image_url) }}" 
                                     class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Product Details - Better spacing, typography and responsive -->
                <div class="flex flex-col p-3 sm:p-4 lg:p-6 overflow-y-auto custom-scrollbar">
                    <!-- Product Name and Category -->
                    <div class="mb-3 sm:mb-4">
                        <span class="text-xs sm:text-sm font-medium text-indigo-600 block mb-1">
                            {{-- {{ $product->category->{session('lang') == 'en' ? 'name_en' : 'name_ar'} }} --}}
                        </span>
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 leading-tight">
                            @if (session('lang') == 'en')
                                {{ $product->name_en }}
                            @else
                                {{ $product->name_ar }}
                            @endif
                        </h2>
                    </div>

                    <!-- Rating and Availability -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 mb-3 sm:mb-4">
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ $i <= $product->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                            {{-- <span class="text-gray-500 text-xs sm:text-sm ml-1">({{ $product->reviews_count }})</span> --}}
                        </div>
                        <span class="text-xs sm:text-sm font-medium px-2 py-1 rounded-full {{ $product->status == 'in_stock' ? 'text-white bg-black' : 'text-red-700 bg-red-100' }}">
                            {{ $product->status == 'in_stock' ? 
                                (session('lang') == 'en' ? 'In Stock' : 'متوفر') : 
                                (session('lang') == 'en' ? 'Out of Stock' : 'غير متوفر') }}
                        </span>
                    </div>

                    <!-- Product Description - Better readability with custom scrollbar -->
                    <div class="mb-4 sm:mb-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-2">
                            {{ session('lang') == 'en' ? 'Description' : 'الوصف' }}
                        </h3>
                        <div class="prose prose-sm max-w-none bg-gray-50 rounded-lg p-3 sm:p-4 max-h-32 sm:max-h-40 overflow-y-auto description-scrollbar">
                            <div class="text-gray-600 text-sm leading-relaxed">
                                @if (session('lang') == 'en')
                                    {!! $product->description_en !!}
                                @else
                                    {!! $product->description_ar !!}
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Pricing - More emphasis and responsive -->
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg border border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                            @if($product->offer_price > 0)
                                <div class="flex flex-col">
                                    <span class="text-xl sm:text-2xl font-bold text-black">
                                        {{ session('lang') == 'en' ? '$' : '$' }} {{ $product->getFormattedOfferPrice() }}
                                    </span>
                                    <span class="text-sm sm:text-base text-gray-500 line-through">
                                        {{ session('lang') == 'en' ? '$' : '$' }} {{ $product->getFormattedPrice() }}
                                    </span>
                                </div>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full self-start">
                                    {{ round(100 - ($product->offer_price / $product->price * 100)) }}% OFF
                                </span>
                            @else
                                <span class="text-xl sm:text-2xl font-bold text-black">
                                    {{ session('lang') == 'en' ? '$' : '$' }} {{ $product->getFormattedPrice() }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Quantity Selector - Improved interaction and responsive -->
                    <div class="mb-4 sm:mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ session('lang') == 'en' ? 'Quantity' : 'الكمية' }}
                        </label>
                        <div class="flex items-center w-full sm:max-w-xs">
                            <button wire:click="decrementQuantity" 
                                    class="flex-1 sm:flex-none px-3 py-2.5 sm:py-2 text-gray-600 hover:bg-gray-100 rounded-l-lg border border-gray-300 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                    {{ $quantity <= 1 ? 'disabled' : '' }}>
                                <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </button>
                            <div class="flex-1 sm:flex-none px-4 py-1 text-center border-t border-b border-gray-300 text-gray-900 bg-white font-medium min-w-0">
                                {{ $quantity }}
                            </div>
                            <button wire:click="incrementQuantity"
                                    class="flex-1 sm:flex-none px-3 py-2.5 sm:py-2 text-gray-600 hover:bg-gray-100 rounded-r-lg border border-gray-300 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                    {{ $product->in_stock && $quantity >= $product->stock_quantity ? 'disabled' : '' }}>
                                <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                        </div>
                        {{-- @if($product->status == 'in_stock')
                            <p class="mt-2 text-xs sm:text-sm text-gray-500">
                                {{ session('lang') == 'en' ? 'Available:' : 'متاح:' }} 
                                <span class="font-medium">{{ $product->stock_quantity }}</span>
                            </p>
                        @endif --}}
                    </div>

                    <!-- Action Buttons - More prominent and responsive -->
                    <div class="mt-auto flex flex-col gap-2 sm:gap-3">
                        <button x-data
                                @click="$dispatch('add-item-to-cart', { id: {{ $product->id }}, quantity: {{ $quantity }} })"
                                class="w-full flex items-center justify-center gap-2 bg-white text-black border font-semibold py-3 sm:py-3.5 px-4 sm:px-6 rounded-lg shadow-lg hover:from-indigo-700 hover:to-indigo-600 transition-all duration-300 hover:shadow-xl hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 text-sm sm:text-base"
                                {{ $product->status != 'in_stock' ? 'disabled' : '' }}>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ session('lang') == 'en' ? 'Add to Cart' : 'أضف إلى السلة' }}
                        </button>
                        <a href="{{ route('shop.show', ['id' => $product->id, 'slug' => Str::slug($product->name_en)]) }}"
                           class="w-full flex items-center justify-center gap-2 text-center border border-gray-300 text-gray-700 font-semibold py-3 sm:py-3.5 px-4 sm:px-6 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 hover:scale-[1.02] text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ session('lang') == 'en' ? 'View Full Details' : 'عرض التفاصيل الكاملة' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>