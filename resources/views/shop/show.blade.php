@extends('layouts.home')
@section('content')
    @livewire('image-slider', [
        'images' => $record->images,
    ])
    
    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
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
            [
                'path' => '',
                'name_en' => $record->name_en,
                'name_ar' => $record->name_ar,
            ],
        ]">
    </div>

    <div class="mx-auto max-w-7xl p-4 mt-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Image Gallery Section -->
            <div class="relative" x-data="{ 
                currentImage: '{{ URL::to('storage/' . $record->main_image_url) }}',
                isZoomed: false,
                changeImage(newSrc) {
                    this.currentImage = newSrc;
                }
            }">
                <!-- Main Image Container -->
                <div class="relative aspect-square w-full bg-white rounded-xl overflow-hidden shadow-sm border border-gray-200 group"
                     @mousemove="isZoomed && handleMouseMove($event)"
                     @mouseleave="isZoomed = false"
                     @mouseenter="isZoomed = true">
                    
                    <img :src="currentImage"
                         class="w-full h-full object-contain transition-all duration-300 cursor-zoom-in"
                         :class="{ 'scale-150': isZoomed }"
                         alt="Main product image"
                         id="mainImage" />
                    
                    <!-- Zoom Indicator -->
                    <div class="absolute bottom-4 right-4 bg-black/80 text-white px-3 py-1.5 rounded-full text-sm flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                        </svg>
                        {{ session('lang') == 'en' ? 'Hover to zoom' : 'مرر للتكبير' }}
                    </div>
                </div>

                <!-- Thumbnail Grid -->
                <div class="mt-6">
                    <div class="grid grid-cols-4 sm:grid-cols-5 lg:grid-cols-4 xl:grid-cols-5 gap-3">
                        <!-- Main Image Thumbnail -->
                        <button @click="changeImage('{{ URL::to('storage/' . $record->main_image_url) }}')"
                                class="relative aspect-square group cursor-pointer rounded-lg overflow-hidden border-2 transition-all duration-200"
                                :class="currentImage === '{{ URL::to('storage/' . $record->main_image_url) }}' ? 'border-gray-900 ring-2 ring-gray-200' : 'border-gray-200 hover:border-gray-400'">
                            <img src="{{ URL::to('storage/' . $record->main_image_url) }}"
                                 class="w-full h-full object-cover transition-all duration-200 group-hover:scale-105"
                                 alt="Product thumbnail">
                        </button>

                        <!-- Additional Images -->
                        @foreach ($record->images as $image)
                            <button @click="changeImage('{{ URL::to('storage/' . $image->image_url) }}')"
                                    class="relative aspect-square group cursor-pointer rounded-lg overflow-hidden border-2 transition-all duration-200"
                                    :class="currentImage === '{{ URL::to('storage/' . $image->image_url) }}' ? 'border-gray-900 ring-2 ring-gray-200' : 'border-gray-200 hover:border-gray-400'">
                                <img src="{{ URL::to('storage/' . $image->image_url) }}"
                                     class="w-full h-full object-cover transition-all duration-200 group-hover:scale-105"
                                     alt="Product thumbnail">
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Info Section -->
            <div class="bg-white rounded-xl p-6 lg:p-8 shadow-sm border border-gray-200">
                <!-- Product Title -->
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                    {!! session('lang') == 'en' ? $record->name_en : $record->name_ar !!}
                </h1>

                <!-- Rating and Wishlist -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2">
                        <div class="flex text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $product_rate >= $i ? 'fill-current' : 'fill-gray-300' }}"
                                     viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <span class="text-sm text-gray-500">({{ $product_rate }}/5)</span>
                    </div>
                    <livewire:heart :record="$record">
                </div>

                <!-- Price and Stock -->
                <div class="mb-6">
                    <div class="flex items-center gap-4 mb-3">
                        @if ($record->offer_price)
                            <span class="text-3xl font-bold text-gray-900">
                                {{ session('lang') == 'en' ? '$' : '$' }} {{ number_format($record->offer_price) }}
                            </span>
                            <span class="text-xl text-gray-500 line-through">
                                {{ session('lang') == 'en' ? '$' : '$' }} {{ number_format($record->price) }}
                            </span>
                            <span class="bg-red-100 text-red-800 text-sm font-medium px-2.5 py-0.5 rounded">
                                {{ round(100 - ($record->offer_price / $record->price * 100)) }}% OFF
                            </span>
                        @else
                            <span class="text-3xl font-bold text-gray-900">
                                {{ session('lang') == 'en' ? '$' : '$' }} {{ number_format($record->price) }}
                            </span>
                        @endif
                    </div>
                    
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $record->status == 'in_stock' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ session('lang') == 'en'
                            ? ($record->status == 'in_stock' ? 'In Stock' : 'Out of Stock')
                            : ($record->status == 'in_stock' ? 'متوفر' : 'إنتهى') }}
                    </span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        {{ session('lang') == 'en' ? 'Description' : 'وصف' }}
                    </h3>
                    <div class="prose prose-sm max-w-none text-gray-600">
                        {!! session('lang') == 'en' ? $record->description_en : $record->description_ar !!}
                    </div>
                </div>

                <!-- Categories -->
                @if($record->categories->count() > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">
                            {{ session('lang') == 'en' ? 'Categories' : 'الفئات' }}
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($record->categories as $category)
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors cursor-pointer">
                                    {!! session('lang') == 'en' ? $category->name_en : $category->name_ar !!}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Add to Cart Section -->
                @livewire('product-details', ['record' => $record])
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mt-12 bg-white rounded-xl p-6 lg:p-8 shadow-sm border border-gray-200" x-data="{ reviewsOpen: true }">
            <div class="flex items-center justify-between mb-6 cursor-pointer" @click="reviewsOpen = !reviewsOpen">
                <h2 class="text-2xl font-bold text-gray-900">
                    {{ session('lang') == 'en' ? 'Customer Reviews' : 'آراء العملاء' }}
                </h2>
                <svg class="w-6 h-6 text-gray-400 transition-transform duration-200" 
                     :class="{ 'rotate-180': reviewsOpen }" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div x-show="reviewsOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0">
                
                <!-- Review Form -->
                <form action="{{ route('add-review') }}" method="POST" class="mb-8 p-6 bg-gray-50 rounded-lg">
                    @csrf
                    <input type="hidden" name="id" value="{{ $record->id }}">

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                {{ session('lang') == 'en' ? 'Your Rating' : 'تقييمك' }}
                            </label>
                            <div class="flex gap-1" x-data="{ rating: 0, hover: 0 }">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button"
                                            @click="rating = {{ $i }}"
                                            @mouseenter="hover = {{ $i }}"
                                            @mouseleave="hover = 0"
                                            class="text-2xl transition-colors duration-150"
                                            :class="(hover >= {{ $i }} || rating >= {{ $i }}) ? 'text-yellow-400' : 'text-gray-300'">
                                        ★
                                    </button>
                                    <input type="radio" name="rate" value="{{ $i }}" class="hidden" 
                                           :checked="rating === {{ $i }}" required>
                                @endfor
                            </div>
                        </div>

                        <div>
                            <label for="comment" class="block text-sm font-medium text-gray-900 mb-2">
                                {{ session('lang') == 'en' ? 'Your Review' : 'رأيك' }}
                            </label>
                            <textarea id="comment" name="comment" rows="4"
                                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent resize-none"
                                      placeholder="{{ session('lang') == 'en' ? 'Share your experience with this product...' : 'شاركنا تجربتك مع هذا المنتج...' }}"
                                      required></textarea>
                        </div>

                        <button type="submit"
                                class="bg-gray-900 text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors duration-200 font-medium">
                            {{ session('lang') == 'en' ? 'Submit Review' : 'إرسال التقييم' }}
                        </button>
                    </div>
                </form>

                <!-- Reviews List -->
                <div class="space-y-6">
                    @forelse ($comments as $comment)
                        <div class="border-l-4 border-gray-900 pl-4 py-4 bg-gray-50 rounded-r-lg">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <div class="flex text-yellow-400">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="text-sm {{ $i <= $comment->rate ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                        @endfor
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $comment->user->name ?? 'Anonymous' }}</span>
                                </div>
                                <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700 leading-relaxed">{{ $comment->comment }}</p>
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p>{{ session('lang') == 'en' ? 'No reviews yet. Be the first to review this product!' : 'لا توجد مراجعات بعد. كن أول من يراجع هذا المنتج!' }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleMouseMove(event) {
            const container = event.currentTarget;
            const image = container.querySelector('img');
            const rect = container.getBoundingClientRect();
            
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;
            
            image.style.transformOrigin = `${xPercent}% ${yPercent}%`;
        }
    </script>
@endsection