<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    
    <!-- Toggle Button -->
    <div class="flex items-center space-x-3 p-4 bg-white rounded-lg shadow-sm border">
        <label for="show_popup_toggle" class="text-sm font-medium text-gray-700">
            Show Popup
        </label>
        
        <!-- Toggle Switch -->
        <div class="relative inline-block w-12 h-6">
            <input 
                type="checkbox" 
                id="show_popup_toggle"
                {{ $show_popup ? 'checked' : '' }}
                wire:model.live="show_popup"
                class="absolute w-full h-full opacity-0 cursor-pointer peer z-10"
            >
            <div class="w-12 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 cursor-pointer"></div>
        </div>
        
        <!-- Status Text -->
        <span class="text-sm text-gray-500">
            {{ $show_popup ? 'Enabled' : 'Disabled' }}
        </span>
    </div>
    
    <!-- Optional: Display current state for debugging -->
    @if($show_popup)
        <div class="mt-4 p-3 bg-green-50 border border-green-200 rounded-lg">
            <p class="text-green-800 text-sm">✓ Popup is currently enabled</p>
        </div>
    @else
        <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
            <p class="text-red-800 text-sm">✗ Popup is currently disabled</p>
        </div>
    @endif
</div>