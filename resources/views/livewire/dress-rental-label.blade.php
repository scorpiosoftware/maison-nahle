{{-- Compact navbar label for dress rentals --}}
<div class="bg-black text-white py-1 px-4 text-center relative overflow-hidden">
    
    {{-- Animated background effect --}}
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent opacity-5 transform -skew-x-12 animate-pulse"></div>
    
    {{-- Content container --}}
    <div class="relative flex items-center justify-center space-x-2">
        
        {{-- Small dress icon --}}
        <svg class="w-4 h-4 flex-shrink-0 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C10.9 2 10 2.9 10 4V6H8L6 8V22H18V8L16 6H14V4C14 2.9 13.1 2 12 2ZM12 4V6H12V4ZM8 8H16V20H8V8Z"/>
        </svg>
        
        {{-- Dynamic message --}}
        <span class="text-sm font-medium tracking-wide transition-all duration-700 ease-in-out text-white {{ session('lang') == 'ar' ? 'font-arabic' : '' }}"
              wire:key="message-{{ $currentMessage }}">
            {{ $messages[$currentMessage] }}
        </span>
        
        {{-- Small indicator dots --}}
        <div class="flex space-x-1 ml-2">
            @foreach($messages as $index => $message)
                <div class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $currentMessage == $index ? 'bg-white' : 'bg-gray-400' }}"></div>
            @endforeach
        </div>
    </div>

    {{-- Auto-rotate script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setInterval(function() {
                @this.call('nextMessage');
            }, 4000); // Auto-advance every 4 seconds
        });
    </script>
</div>