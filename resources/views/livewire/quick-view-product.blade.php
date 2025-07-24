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
         class="fixed top-0 z-50 bg-black/60 backdrop-blur-md flex items-center justify-center p-4"
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
         class="fixed inset-0 z-50 flex items-center justify-center p-4 pointer-events-none">
        
        @if($product)
        <div class="relative w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden pointer-events-auto max-h-[90vh] flex flex-col">
            <!-- Close Button - More prominent -->
            <button @click="show = false" 
                    class="absolute top-4 right-4 z-10 bg-white/80 hover:bg-white text-gray-600 hover:text-gray-900 rounded-full p-2 shadow-md transition-all duration-200 hover:scale-110">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="grid md:grid-cols-2 gap-0 h-full overflow-y-auto">
                <!-- Product Images - Enhanced with zoom capability -->
                <div class="space-y-4 p-6 border-r border-gray-100">
                    <!-- Main Image with zoom effect -->
                    <div class="aspect-square w-full overflow-hidden rounded-xl bg-gray-50 cursor-zoom-in"
                         @click="zoomed = !zoomed">
                        <img src="{{ URL::to('storage/' . $selectedImage) }}" 
                             alt="{{ session('lang') == 'en' ? $product->name_en : $product->name_ar }}"
                             class="w-full h-full object-contain transition-transform duration-300"
                             :class="{ 'scale-150': zoomed }">
                    </div>

                    <!-- Thumbnail Gallery - Improved navigation -->
                    <div class="grid grid-cols-5 gap-2 mt-4">
                        <button wire:click="selectImage('{{ $product->main_image_url }}')"
                                class="aspect-square rounded-lg overflow-hidden border-2 transition-all duration-200 {{ $selectedImage === $product->main_image_url ? 'border-indigo-500 ring-2 ring-indigo-200' : 'border-transparent hover:border-gray-300' }}">
                            <img src="{{ URL::to('storage/' . $product->main_image_url) }}" 
                                 class="w-full h-full object-cover">
                        </button>
                        @foreach($product->images as $image)
                            <button wire:click="selectImage('{{ $image->image_url }}')"
                                    class="aspect-square rounded-lg overflow-hidden border-2 transition-all duration-200 {{ $selectedImage === $image->url ? 'border-indigo-500 ring-2 ring-indigo-200' : 'border-transparent hover:border-gray-300' }}">
                                <img src="{{ URL::to('storage/' . $image->image_url) }}" 
                                     class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Product Details - Better spacing and typography -->
                <div class="flex flex-col p-6 overflow-y-auto">
                    <!-- Product Name and Category -->
                    <div class="mb-4">
                        <span class="text-sm font-medium text-indigo-600">
                            {{-- {{ $product->category->{session('lang') == 'en' ? 'name_en' : 'name_ar'} }} --}}
                        </span>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            @if (session('lang') == 'en')
                                {{ $product->name_en }}
                            @else
                                {{ $product->name_ar }}
                            @endif
                        </h2>
                    </div>

                    <!-- Rating and Availability -->
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $product->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                            {{-- <span class="text-gray-500 text-sm ml-1">({{ $product->reviews_count }})</span> --}}
                        </div>
                        <span class="text-sm font-medium {{ $product->status == 'in_stock' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $product->status == 'in_stock' ? 
                                (session('lang') == 'en' ? 'In Stock' : 'متوفر') : 
                                (session('lang') == 'en' ? 'Out of Stock' : 'غير متوفر') }}
                        </span>
                    </div>

                    <!-- Product Description - Better readability -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-2">
                            {{ session('lang') == 'en' ? 'Description' : 'الوصف' }}
                        </h3>
                        <div class="prose prose-sm text-gray-600 max-w-none">
                            @if (session('lang') == 'en')
                                {!! $product->description_en !!}
                            @else
                                {!! $product->description_ar !!}
                            @endif
                        </div>
                    </div>

                    <!-- Pricing - More emphasis -->
                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-4">
                            @if($product->offer_price)
                                <div>
                                    <span class="text-2xl font-bold text-indigo-600">
                                        {{ session('lang') == 'en' ? 'IQD' : 'د.ع' }} {{ number_format($product->offer_price) }}
                                    </span>
                                    <span class="text-lg text-gray-500 line-through block">
                                        {{ session('lang') == 'en' ? 'IQD' : 'د.ع' }} {{ number_format($product->price) }}
                                    </span>
                                </div>
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ round(100 - ($product->offer_price / $product->price * 100)) }}% OFF
                                </span>
                            @else
                                <span class="text-2xl font-bold text-indigo-600">
                                    {{ session('lang') == 'en' ? 'IQD' : 'د.ع' }} {{ number_format($product->price) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Quantity Selector - Improved interaction -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ session('lang') == 'en' ? 'Quantity' : 'الكمية' }}
                        </label>
                        <div class="flex items-center max-w-xs">
                            <button wire:click="decrementQuantity" 
                                    class="px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-l-lg border border-gray-300 transition-colors duration-200 disabled:opacity-50"
                                    {{ $quantity <= 1 ? 'disabled' : '' }}>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </button>
                            <span class="px-4 py-2 text-center border-t border-b border-gray-300 text-gray-900 bg-gray-50">
                                {{ $quantity }}
                            </span>
                            <button wire:click="incrementQuantity"
                                    class="px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-r-lg border border-gray-300 transition-colors duration-200"
                                    {{ $product->in_stock && $quantity >= $product->stock_quantity ? 'disabled' : '' }}>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                        </div>
                        {{-- @if($product->status == 'in_stock')
                            <p class="mt-1 text-sm text-gray-500">
                                {{ session('lang') == 'en' ? 'Available:' : 'متاح:' }} 
                                <span class="font-medium">{{ $product->stock_quantity }}</span>
                            </p>
                        @endif --}}
                    </div>

                    <!-- Action Buttons - More prominent -->
                    <div class="mt-auto flex flex-col gap-3">
                        <button x-data
                                @click="$dispatch('add-item-to-cart', { id: {{ $product->id }}, quantity: {{ $quantity }} })"
                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-semibold py-3 px-6 rounded-lg shadow hover:from-indigo-700 hover:to-indigo-600 transition-all duration-300 hover:shadow-md disabled:opacity-50 disabled:cursor-not-allowed"
                                {{ $product->status != 'in_stock' ? 'disabled' : '' }}>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ session('lang') == 'en' ? 'Add to Cart' : 'أضف إلى السلة' }}
                        </button>
                        <a href="{{ route('shop.show', ['id' => $product->id, 'slug' => Str::slug($product->name_en)]) }}"
                           class="w-full flex items-center justify-center gap-2 text-center border border-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-lg shadow-sm hover:bg-gray-50 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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