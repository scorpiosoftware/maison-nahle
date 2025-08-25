<div class="max-w-6xl mx-auto p-6 bg-white">
    <div class="border border-black rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-black text-white px-6 py-4">
            <h2 class="text-xl font-bold">Label Messages Management (Arabic & English)</h2>
        </div>
        
        <!-- Add New Label Form -->
        <div class="p-6 border-b border-gray-300">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-bold text-black mb-2">English Message</label>
                    <input 
                        type="text" 
                        wire:model="newLabelEn"
                        wire:keydown.enter="addLabel"
                        placeholder="Enter English message..."
                        class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:ring-2 focus:ring-black"
                    >
                </div>
                <div>
                    <label class="block text-sm font-bold text-black mb-2">Arabic Message</label>
                    <input 
                        type="text" 
                        wire:model="newLabelAr"
                        wire:keydown.enter="addLabel"
                        placeholder="أدخل الرسالة العربية..."
                        dir="rtl"
                        class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:ring-2 focus:ring-black"
                    >
                </div>
            </div>
            <button 
                wire:click="addLabel"
                class="px-6 py-2 bg-black text-white rounded hover:bg-gray-800 transition-colors"
            >
                Add Label
            </button>
        </div>
        
        <!-- Labels Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-black">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                            English Message
                        </th>
                        <th class="px-4 py-3 text-right text-sm font-bold text-black uppercase tracking-wider">
                            Arabic Message
                        </th>
                        <th class="px-4 py-3 text-center text-sm font-bold text-black uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($labelMessages as $index => $label)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 text-sm text-black font-medium">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-4 py-4">
                                @if($editingIndex === $index)
                                    <input 
                                        type="text" 
                                        wire:model="editingLabelEn"
                                        wire:keydown.enter="updateLabel"
                                        wire:keydown.escape="cancelEdit"
                                        placeholder="English message..."
                                        class="w-full px-3 py-2 border border-black rounded text-sm focus:outline-none focus:ring-2 focus:ring-black"
                                    >
                                @else
                                    <span class="text-sm text-black">{{ $label['en'] ?? '' }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-right">
                                @if($editingIndex === $index)
                                    <input 
                                        type="text" 
                                        wire:model="editingLabelAr"
                                        wire:keydown.enter="updateLabel"
                                        wire:keydown.escape="cancelEdit"
                                        placeholder="الرسالة العربية..."
                                        dir="rtl"
                                        class="w-full px-3 py-2 border border-black rounded text-sm focus:outline-none focus:ring-2 focus:ring-black text-right"
                                    >
                                @else
                                    <span class="text-sm text-black" dir="rtl">{{ $label['ar'] ?? '' }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                @if($editingIndex === $index)
                                    <div class="flex justify-center gap-2">
                                        <button 
                                            wire:click="updateLabel"
                                            class="px-3 py-1 bg-black text-white text-sm rounded hover:bg-gray-800"
                                        >
                                            Save
                                        </button>
                                        <button 
                                            wire:click="cancelEdit"
                                            class="px-3 py-1 bg-gray-300 text-black text-sm rounded hover:bg-gray-400"
                                        >
                                            Cancel
                                        </button>
                                    </div>
                                @else
                                    <div class="flex justify-center gap-2">
                                        <button 
                                            wire:click="editLabel({{ $index }})"
                                            class="px-3 py-1 bg-gray-200 text-black text-sm rounded hover:bg-gray-300 border border-black"
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            wire:click="deleteLabel({{ $index }})"
                                            wire:confirm="Are you sure you want to delete this label?"
                                            class="px-3 py-1 bg-black text-white text-sm rounded hover:bg-gray-800"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                No label messages found. Add one above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Summary -->
        @if(count($labelMessages) > 0)
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-300">
                <p class="text-sm text-gray-600">
                    Total labels: <span class="font-bold text-black">{{ count($labelMessages) }}</span>
                </p>
            </div>
        @endif
    </div>
    
    <!-- JSON Preview (for debugging) -->
    <div class="mt-6 p-4 bg-gray-100 border border-gray-300 rounded">
        <h3 class="font-bold text-black mb-2">JSON Data Preview:</h3>
        <pre class="text-sm text-gray-700 overflow-x-auto">{{ json_encode($labelMessages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>
</div>