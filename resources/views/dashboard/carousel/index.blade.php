<x-app-layout>
    @if (session()->has('success'))
        <div id="alert-border-3"
            class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 d:text-green-400 d:bg-gray-800 d:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif

    <div>

        <div class="py-6 group">
            <h1
                class="text-3xl md:text-3xl font-extrabold bg-clip-text text-black bg-gradient-to-r from-blue-500 to-purple-600 inline-block transition-all duration-300 transform group-hover:scale-105 group-hover:translate-y-[-2px]">
                {{ session('lang') == 'en' ? 'Carousel' : 'قائمة الصور' }}
            </h1>
        </div>
        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 d:bg-gray-800 d:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/dashboard/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 d:text-gray-400 d:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        {{ session('lang') == 'en' ? 'Dashboard' : 'القائمة الرئيسية' }}
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span
                            class="ms-1 text-sm font-medium text-gray-500 md:ms-2 d:text-gray-400">{{ session('lang') == 'en' ? 'Edit' : 'تعديل' }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        {{-- End Breadcrumb  --}}
        <form id="uploadForm" class="pt-4" action="{{ route('carousel.update', $record->id) }}"
            enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <!-- Carousel Status Toggle Section -->
                <div class="grid grid-cols-1 gap-4 border-2 p-4 bg-gray-50 d:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 d:text-white">
                                {{ session('lang') == 'en' ? 'Carousel Status' : 'حالة عرض الصور' }}
                            </h3>
                            <p class="text-sm text-gray-500 d:text-gray-400">
                                {{ session('lang') == 'en' ? 'Enable or disable the carousel display' : 'تفعيل أو إلغاء تفعيل عرض الصور' }}
                            </p>
                        </div>
                        <div class="flex items-center">
                            <label class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" name="is_enabled" value="1" id="carousel-toggle" 
                                    class="sr-only peer" 
                                    {{ (isset($record) && $record->is_enable) || old('is_enabled') ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 d:peer-focus:ring-blue-800 rounded-full peer d:bg-gray-700 peer-checked:after:translate-x-10 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[-15px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all d:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-10 text-sm font-medium text-gray-900 d:text-gray-300">
                                    <span id="toggle-text">
                                        {{ session('lang') == 'en' ? 'Enabled' : 'مفعل' }}
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Status Indicator -->
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <div id="status-indicator" class="flex items-center">
                            <div class="w-3 h-3 rounded-full mr-2 rtl:mr-0 rtl:ml-2 
                                {{ (isset($record) && $record->is_enable) || old('is_enabled') ? 'bg-green-500' : 'bg-red-500' }}">
                            </div>
                            <span id="status-text" class="text-sm font-medium
                                {{ (isset($record) && $record->is_enable) || old('is_enabled') ? 'text-green-600' : 'text-red-600' }}">
                                @if((isset($record) && $record->is_enable) || old('is_enabled'))
                                    {{ session('lang') == 'en' ? 'Carousel is currently active' : 'عرض الصور مفعل حالياً' }}
                                @else
                                    {{ session('lang') == 'en' ? 'Carousel is currently inactive' : 'عرض الصور غير مفعل حالياً' }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 border-2 p-4 md:grid-cols-2">
                    <div class="grid grid-cols-1 gap-4 border-2 p-4 md:grid-cols-2 md:col-start-1 md:col-end-3">
                        <div class="w-full mt-2">
                            <div class="flex justify-between items-center">
                                <label for="logo_url"
                                    class="block mb-2 text-sm font-medium text-gray-900 d:text-white">{{ session('lang') == 'en' ? 'Logo' : 'الشعار' }}</label>
                            </div>
                            <div class="mt-4">
                                <input type="file" id="logo_url" name="logo_url"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 d:bg-gray-700 d:border-gray-600 d:placeholder-gray-400 d:text-white d:focus:ring-blue-500 d:focus:border-blue-500"
                                    placeholder="choose image" />
                            </div>
                        </div>

                        <div class="w-full mt-2">
                            <div class="flex justify-between items-center">
                                <label for="multiImageInput"
                                    class="block mb-2 text-sm font-medium text-gray-900 d:text-white">{{ session('lang') == 'en' ? 'Images' : 'الصور' }}</label>
                            </div>
                            <div class="mt-4" x-data="imageUploader()" x-init="init()">
                                <input id="multiImageInput" type="file" name="photos[]" multiple
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 d:bg-gray-700 d:border-gray-600 d:placeholder-gray-400 d:text-white d:focus:ring-blue-500 d:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="flex justify-center items-center md:col-start-1 md:col-end-3">
                            <div aria-controls="gallery" data-collapse-toggle="gallery"
                                class="cursor-pointer transition-all w-full text-center bg-blue-300 container mx-auto delay-75 hover:scale-95 py-2 rounded-lg">
                                {{ session('lang') == 'en' ? 'Gallery' : 'البوم الصور' }}
                            </div>
                        </div>
                        @if (!empty($record))
                            <div id="gallery" class="md:col-start-1 md:col-end-3 w-full mx-auto">
                                {{-- Main Image --}}
                                <input class="hidden" type="text" name="image" value="{{ $record->logo_url }}">

                                {{-- Logo Section --}}
                                @if (!empty($record?->logo_url))
                                    <div class="mb-6">
                                        <h4 class="text-lg font-semibold text-gray-700 mb-3">
                                            {{ session('lang') == 'en' ? 'Logo:' : 'الشعار:' }}</h4>
                                        <div class="flex justify-center">
                                            <div class="relative group">
                                                <img class="w-48 h-32 object-contain bg-gray-50 rounded-lg border shadow-sm transition-transform duration-200 hover:scale-105"
                                                    src="{{ URL::to('storage/' . $record->logo_url) }}" alt="Logo">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- Gallery Images --}}
                                @if (!empty($record?->images))
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-700 mb-3">
                                            {{ session('lang') == 'en' ? 'Gallery Images:' : 'صور المعرض:' }}
                                            <span
                                                class="text-sm font-normal text-gray-500">({{ count($record->images) }}
                                                {{ session('lang') == 'en' ? 'images' : 'صورة' }})</span>
                                        </h4>
                                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                            @foreach ($record->images as $image)
                                                <div class="relative group">
                                                    <img class="w-full h-32 object-cover rounded-lg border shadow-sm transition-transform duration-200 hover:scale-105"
                                                        src="{{ URL::to('storage/' . $image->url) }}"
                                                        alt="Gallery Image">
                                                    <div
                                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition-opacity duration-200 flex items-center justify-center">
                                                        <div
                                                            class="opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                                            <button type="button"
                                                                class="bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-2 transition-all duration-200">
                                                                <svg class="w-4 h-4 text-gray-600" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="flex justify-end items-center">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center d:bg-blue-600 d:hover:bg-blue-700 d:focus:ring-blue-800">{{ session('lang') == 'en' ? 'save' : 'حفظ' }}</button>
            </div>
        </form>

        <!-- Script moved at the end of the body or in a separate JS file -->
        <script>
            // Toggle functionality
            document.addEventListener('DOMContentLoaded', function() {
                const toggle = document.getElementById('carousel-toggle');
                const toggleText = document.getElementById('toggle-text');
                const statusIndicator = document.querySelector('#status-indicator .w-3');
                const statusText = document.getElementById('status-text');
                
                function updateToggleState(isEnabled) {
                    if (isEnabled) {
                        toggleText.textContent = '{{ session('lang') == 'en' ? 'Enabled' : 'مفعل' }}';
                        statusIndicator.className = statusIndicator.className.replace('bg-red-500', 'bg-green-500');
                        statusText.className = statusText.className.replace('text-red-600', 'text-green-600');
                        statusText.textContent = '{{ session('lang') == 'en' ? 'Carousel is currently active' : 'عرض الصور مفعل حالياً' }}';
                    } else {
                        toggleText.textContent = '{{ session('lang') == 'en' ? 'Disabled' : 'غير مفعل' }}';
                        statusIndicator.className = statusIndicator.className.replace('bg-green-500', 'bg-red-500');
                        statusText.className = statusText.className.replace('text-green-600', 'text-red-600');
                        statusText.textContent = '{{ session('lang') == 'en' ? 'Carousel is currently inactive' : 'عرض الصور غير مفعل حالياً' }}';
                    }
                }
                
                toggle.addEventListener('change', function() {
                    updateToggleState(this.checked);
                });
            });

            // Image uploader functionality
            function imageUploader() {
                return {
                    compressedFiles: [],
                    init() {
                        const input = document.getElementById('multiImageInput');
                        const form = document.getElementById('uploadForm');

                        input.addEventListener('change', async (event) => {
                            const files = Array.from(event.target.files);
                            this.compressedFiles = [];

                            for (const file of files) {
                                const compressed = await this.compressImage(file, 0.7);
                                if (compressed) {
                                    this.compressedFiles.push(compressed);
                                } else {
                                    console.warn("Skipping file due to compression error:", file.name);
                                }
                            }

                            if (this.compressedFiles.length > 0) {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Images compressed successfully',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        });
                    },

                    compressImage(file, quality = 0.7) {
                        return new Promise((resolve) => {
                            const reader = new FileReader();
                            reader.readAsDataURL(file);

                            reader.onload = (event) => {
                                const img = new Image();
                                img.src = event.target.result;

                                img.onload = () => {
                                    const canvas = document.createElement('canvas');
                                    canvas.width = img.width;
                                    canvas.height = img.height;

                                    const ctx = canvas.getContext('2d');
                                    ctx.drawImage(img, 0, 0);

                                    canvas.toBlob((blob) => {
                                        if (blob) {
                                            const compressed = new File([blob], file.name, {
                                                type: file.type,
                                                lastModified: Date.now()
                                            });
                                            resolve(compressed);
                                        } else {
                                            resolve(null);
                                        }
                                    }, file.type, quality);
                                };

                                img.onerror = () => {
                                    console.error("Error loading image:", file.name);
                                    resolve(null);
                                };
                            };

                            reader.onerror = () => {
                                console.error("Error reading file:", file.name);
                            };
                        });
                    }
                }
            }
        </script>
    </div>
</x-app-layout>