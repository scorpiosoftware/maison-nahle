{{-- Blade-based dynamic language session integration --}}
<div 
  x-data="{
    open: false,
    selected: {
      code: '{{ session('lang', 'en') }}',
      label: '{{ session('lang') === 'ar' ? 'العربية' : 'English' }}',
      short: '{{ session('lang') === 'ar' ? 'AR' : 'EN' }}',
      src: '{{ session('lang') === 'ar' ? asset('media/flag/lebanon-flag.png') : asset('media/flag/english.png') }}'
    }
  }"
  class="relative"
  x-cloak
  @click.away="open = false"
>
  <!-- Toggle Button - Minimalist Design -->
  <button
    @click="open = !open"
    class="group flex items-center gap-2 px-3 py-2 bg-white border border-gray-200 rounded-lg hover:border-gray-300 hover:shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-opacity-20 min-w-[80px]"
  >
    <!-- Flag Icon -->
    {{-- <div class="w-4 h-4 rounded-sm overflow-hidden flex-shrink-0">
      <img :src="selected.src" :alt="selected.label" class="w-full h-full object-cover">
    </div> --}}
    
    <!-- Language Code -->
    <span x-text="selected.short" class="text-sm font-medium text-gray-700 group-hover:text-gray-900"></span>
    
    <!-- Chevron -->
    <svg 
      class="w-3 h-3 text-gray-400 group-hover:text-gray-600 transform transition-transform duration-200" 
      :class="{ 'rotate-180': open }" 
      fill="none" stroke="currentColor" viewBox="0 0 24 24"
    >
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </button>

  <!-- Dropdown Menu - Clean and Simple -->
  <div
    x-show="open"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 transform scale-95 translate-y-1"
    x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
    x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
    class="absolute top-full mt-1 w-full min-w-[120px] bg-white border border-gray-200 rounded-lg shadow-lg z-50 overflow-hidden"
  >
    <!-- English Option -->
    <button
      wire:click="setEnglish"
      @click="
        selected = { 
          code: 'en', 
          label: 'English', 
          short: 'EN',
          src: '{{ asset('media/flag/english.png') }}' 
        }; 
        open = false
      "
      class="w-full text-left px-3 py-2.5 hover:bg-gray-50 flex items-center gap-2 transition-colors duration-150 group"
      :class="{ 'bg-gray-50': selected.code === 'en' }"
    >
      {{-- <div class="w-4 h-4 rounded-sm overflow-hidden flex-shrink-0">
        <img src="{{ asset('media/flag/english.png') }}" alt="English" class="w-full h-full object-cover">
      </div> --}}
      <span class="text-sm text-gray-700 group-hover:text-gray-900">English</span>
      <div class="ml-auto" x-show="selected.code === 'en'">
        <svg class="w-3 h-3 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
        </svg>
      </div>
    </button>

    <!-- Arabic Option -->
    <button
      wire:click="setArabic"
      @click="
        selected = { 
          code: 'ar', 
          label: 'العربية', 
          short: 'AR',
          src: '{{ asset('media/flag/lebanon-flag.png') }}' 
        }; 
        open = false
      "
      class="w-full text-left px-3 py-2.5 hover:bg-gray-50 flex items-center gap-2 transition-colors duration-150 group"
      :class="{ 'bg-gray-50': selected.code === 'ar' }"
    >
      {{-- <div class="w-4 h-4 rounded-sm overflow-hidden flex-shrink-0">
        <img src="{{ asset('media/flag/lebanon-flag.png') }}" alt="العربية" class="w-full h-full object-cover">
      </div> --}}
      <span class="text-sm text-gray-700 group-hover:text-gray-900">العربية</span>
      <div class="ml-auto" x-show="selected.code === 'ar'">
        <svg class="w-3 h-3 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
        </svg>
      </div>
    </button>
  </div>
</div>