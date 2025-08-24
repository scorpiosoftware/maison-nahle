<div class="space-y-6">
    <script>
        // Enhanced Toast Message Configuration
        window.addEventListener('toast:addedToCart', event => {
            const detail = event.detail[0];

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: detail.icon || 'success',
                title: detail.message || 'Item added to cart!',
                text: detail.subtitle || 'Product successfully added to your shopping cart',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                width: '400px',
                padding: '1rem',
                background: '#ffffff',
                color: '#1f2937',
                iconColor: '#10b981',
                customClass: {
                    popup: 'enhanced-toast',
                    title: 'toast-title',
                    content: 'toast-content',
                    timerProgressBar: 'toast-progress',
                    closeButton: 'toast-close'
                },
                didOpen: (toast) => {
                    // Add custom animations
                    toast.style.animation = 'slideInRight 0.3s ease-out';

                    // Add hover pause functionality
                    toast.addEventListener('mouseenter', () => {
                        Swal.stopTimer();
                    });

                    toast.addEventListener('mouseleave', () => {
                        Swal.resumeTimer();
                    });

                    // Add action button if product info is available
                    if (detail.productName || detail.viewCart) {
                        const actionButton = document.createElement('button');
                        actionButton.innerHTML = `
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                        </svg>
                        View Cart
                    `;
                        actionButton.className = 'toast-action-btn';
                        actionButton.onclick = () => {
                            window.location.href = '/cart'; // Adjust URL as needed
                            Swal.close();
                        };

                        toast.querySelector('.swal2-content').appendChild(actionButton);
                    }
                },
                willClose: (toast) => {
                    toast.style.animation = 'slideOutRight 0.3s ease-in';
                }
            });
        });

        // Enhanced styles for the toast
        const toastStyles = `
        <style>
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
            
            .enhanced-toast {
                border-radius: 12px !important;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
                border: 1px solid #e5e7eb !important;
                backdrop-filter: blur(8px) !important;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            }
            
            .enhanced-toast:hover {
                transform: translateY(-2px) !important;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
                transition: all 0.2s ease-out !important;
            }
            
            .toast-title {
                font-size: 16px !important;
                font-weight: 600 !important;
                color: #111827 !important;
                margin-bottom: 4px !important;
            }
            
            .toast-content {
                font-size: 14px !important;
                color: #6b7280 !important;
                line-height: 1.4 !important;
            }
            
            .toast-progress {
                background: linear-gradient(90deg, #10b981, #059669) !important;
                height: 3px !important;
                border-radius: 0 0 12px 12px !important;
            }
            
            .toast-close {
                color: #9ca3af !important;
                font-size: 20px !important;
                transition: all 0.2s ease !important;
                background: transparent !important;
                border: none !important;
                width: 24px !important;
                height: 24px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
            }
            
            .toast-close:hover {
                color: #374151 !important;
                background: #f3f4f6 !important;
                border-radius: 50% !important;
                transform: scale(1.1) !important;
            }
            
            .toast-action-btn {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                padding: 8px 16px !important;
                margin-top: 12px !important;
                background: #111827 !important;
                color: white !important;
                border: none !important;
                border-radius: 8px !important;
                font-size: 14px !important;
                font-weight: 500 !important;
                cursor: pointer !important;
                transition: all 0.2s ease !important;
                text-decoration: none !important;
            }
            
            .toast-action-btn:hover {
                background: #374151 !important;
                transform: translateY(-1px) !important;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15) !important;
            }
            
            .enhanced-toast .swal2-icon.swal2-success {
                border-color: #10b981 !important;
                background: #f0fdf4 !important;
            }
            
            .enhanced-toast .swal2-icon.swal2-success .swal2-success-ring {
                border-color: #10b981 !important;
            }
            
            .enhanced-toast .swal2-icon.swal2-success .swal2-success-fix {
                background-color: #f0fdf4 !important;
            }
            
            .enhanced-toast .swal2-icon.swal2-success [class^='swal2-success-line'] {
                background-color: #10b981 !important;
            }

            /* Responsive adjustments */
            @media (max-width: 640px) {
                .enhanced-toast {
                    width: 90% !important;
                    max-width: 350px !important;
                    margin: 0 auto !important;
                }
                
                .toast-title {
                    font-size: 15px !important;
                }
                
                .toast-content {
                    font-size: 13px !important;
                }
            }
        </style>
    `;

        // Inject styles into the page
        if (!document.querySelector('#enhanced-toast-styles')) {
            const styleElement = document.createElement('div');
            styleElement.id = 'enhanced-toast-styles';
            styleElement.innerHTML = toastStyles;
            document.head.appendChild(styleElement);
        }

        // Additional toast variants for different actions
        window.addEventListener('toast:removedFromCart', event => {
            const detail = event.detail[0];

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: detail.message || 'Item removed from cart',
                text: 'Product has been removed from your shopping cart',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                timerProgressBar: true,
                width: '400px',
                padding: '1rem',
                background: '#ffffff',
                iconColor: '#3b82f6',
                customClass: {
                    popup: 'enhanced-toast',
                    title: 'toast-title',
                    content: 'toast-content',
                    timerProgressBar: 'toast-progress-info',
                    closeButton: 'toast-close'
                }
            });
        });

        window.addEventListener('toast:added', event => {
            const detail = event.detail[0];

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: detail.message || 'Added to wishlist!',
                text: 'Product saved to your wishlist',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                timerProgressBar: true,
                width: '400px',
                padding: '1rem',
                background: '#ffffff',
                iconColor: '#ec4899',
                customClass: {
                    popup: 'enhanced-toast',
                    title: 'toast-title',
                    content: 'toast-content',
                    timerProgressBar: 'toast-progress-pink',
                    closeButton: 'toast-close'
                }
            });
        });

        window.addEventListener('toast:removed', event => {
            const detail = event.detail[0];

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: detail.message || 'Removed from wishlist!',
                text: 'Product removed from your wishlist',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                timerProgressBar: true,
                width: '400px',
                padding: '1rem',
                background: '#ffffff',
                iconColor: '#ec4899',
                customClass: {
                    popup: 'enhanced-toast',
                    title: 'toast-title',
                    content: 'toast-content',
                    timerProgressBar: 'toast-progress-pink',
                    closeButton: 'toast-close'
                }
            });
        });

        window.addEventListener('toast:error', event => {
            const detail = event.detail[0];

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: detail.message || 'Something went wrong',
                text: detail.subtitle || 'Please try again',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000,
                timerProgressBar: true,
                width: '400px',
                padding: '1rem',
                background: '#ffffff',
                iconColor: '#ef4444',
                customClass: {
                    popup: 'enhanced-toast',
                    title: 'toast-title',
                    content: 'toast-content',
                    timerProgressBar: 'toast-progress-error',
                    closeButton: 'toast-close'
                }
            });
        });
    </script>

    <!-- Additional CSS for progress bar variants -->
    <style>
        .toast-progress-info {
            background: linear-gradient(90deg, #3b82f6, #2563eb) !important;
            height: 3px !important;
            border-radius: 0 0 12px 12px !important;
        }

        .toast-progress-pink {
            background: linear-gradient(90deg, #ec4899, #db2777) !important;
            height: 3px !important;
            border-radius: 0 0 12px 12px !important;
        }

        .toast-progress-error {
            background: linear-gradient(90deg, #ef4444, #dc2626) !important;
            height: 3px !important;
            border-radius: 0 0 12px 12px !important;
        }
    </style>
    @if (!empty($record->sizes) && $record->sizes->count() > 0 || !empty($record->colors) && $record->colors->count() > 0)
        <!-- Color and Size Selection Section -->
        <div class="bg-white/90 backdrop-blur-sm p-6 rounded-xl shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if(!empty($record->colors) && $record->colors->count() > 0)
                <!-- Color Selection -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-[#2B3467]">
                        {{ session('lang') == 'en' ? 'Pick Color' : 'اختر اللون' }}
                    </h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($record->colors as $color)
                            <div class="relative">
                                <input type="radio" wire:model.live="selectedColor" name="color_selection"
                                    value="{{ $color->id }}" id="color_{{ $color->id }}" required
                                    class="peer sr-only" />
                                <label for="color_{{ $color->id }}"
                                    class="block w-10 h-10 rounded-full cursor-pointer transition-all duration-300 
                                          peer-checked:ring-2 peer-checked:ring-[#2B3467] peer-checked:ring-offset-2
                                          hover:scale-110 hover:shadow-md"
                                    style="background-color: {{ $color->hex_code }}">
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>
                @endif


                @if(!empty($record->sizes) && $record->sizes->count() > 0)
                <!-- Size Selection -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-[#2B3467]">
                        {{ session('lang') == 'en' ? 'Pick Size' : 'اختر قياس' }}
                    </h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($record->sizes as $size)
                            <div class="relative">
                                <input type="radio" wire:model.live="selectedSize" name="size_selection"
                                    value="{{ $size->id }}" id="size_{{ $size->id }}" required
                                    class="peer sr-only" />
                                <label for="size_{{ $size->id }}"
                                    class="flex items-center justify-center w-12 h-12 rounded-lg cursor-pointer
                                          bg-white border-2 border-gray-200 transition-all duration-300
                                          peer-checked:border-gray-500 peer-checked:bg-gray-500 peer-checked:text-white
                                          hover:border-gray-500 hover:shadow-md">
                                    {{ $size->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>
                @endif
            </div>
        </div>
    @endif


    <!-- Quantity and Add to Cart Section -->
    <div class="bg-white/90 backdrop-blur-sm p-6 rounded-xl shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Quantity Selector -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-black">
                    {{ session('lang') == 'en' ? 'Quantity' : 'الكمية' }}
                </h3>
                <div class="flex items-center border-2 border-gray-200 rounded-lg overflow-hidden w-full max-w-xs">
                    <button type="button"
                        class="px-6 py-3 bg-gray-50 text-[text-black hover:bg-gray-100 transition-colors duration-300"
                        wire:click="decreaseQuantity">
                        −
                    </button>
                    <input type="number" wire:model.live="quantity" min="{{ $record->minimum_quantity }}"
                        max="{{ $record->maximum_quantity }}"
                        class="flex-1 text-center border-x border-gray-200 bg-white text-text-black focus:ring-0 focus:border-[#2B3467] py-3"
                        aria-label="Quantity">
                    <button type="button"
                        class="px-6 py-3 bg-gray-50 text-text-black hover:bg-gray-100 transition-colors duration-300"
                        wire:click="increaseQuantity">
                        +
                    </button>
                </div>
                <p class="text-sm text-gray-500">
                    {{ session('lang') == 'en' ? 'Maximum quantity:' : 'الحد الأقصى:' }}
                    {{ $record->maximum_quantity }}
                </p>
            </div>

            <!-- Add to Cart Button -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-black">
                    {{ session('lang') == 'en' ? 'Add to Cart' : 'أضف إلى السلة' }}
                </h3>
                <button type="button" wire:click="addToCart"
                    class="w-full bg-white text-black border px-8 py-3 rounded-lg 
                            transition-all duration-300 transform hover:scale-105 
                           hover:shadow-lg flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 576 512">
                        <path
                            d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg>
                    <span>{{ session('lang') == 'en' ? 'Add to Cart' : 'أضف إلى السلة' }}</span>
                </button>
            </div>
        </div>
    </div>
</div>
