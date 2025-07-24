<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 relative">
            {{ session('message') }}
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                <span class="sr-only">Close</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <!-- Header with Search and Create Button -->
    <div class="bg-white rounded-lg shadow-sm border mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                <h2 class="text-xl font-semibold text-gray-900">Social Media Management</h2>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                            placeholder="Search social media..." 
                            wire:model.live="search"
                        >
                    </div>
                    <button 
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        wire:click="openCreateModal"
                    >
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Social Media
                    </button>
                </div>
            </div>
        </div>

        <!-- Social Media Cards -->
        <div class="p-6">
            @forelse($socials as $social)
                <div class="bg-white border border-gray-200 rounded-lg p-6 mb-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <!-- Icon -->
                            <div class="flex-shrink-0">
                                @if($social->icon)
                                    <img src="{{ $social->icon_url }}" alt="{{ $social->name }}" class="h-12 w-12 rounded-lg object-cover">
                                @else
                                    <div class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Info -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-3">
                                    <h3 class="text-lg font-medium text-gray-900 truncate">{{ $social->name }}</h3>
                                    <button 
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $social->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}"
                                        wire:click="toggleStatus({{ $social->id }})"
                                    >
                                        {{ $social->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </div>
                                <div class="mt-1 flex items-center space-x-4">
                                    <a href="{{ $social->url }}" target="_blank" class="text-sm text-blue-600 hover:text-blue-500 flex items-center">
                                        {{ Str::limit($social->url, 50) }}
                                        <svg class="ml-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                    <span class="text-sm text-gray-500">
                                        {{ $social->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center space-x-2">
                            <button 
                                class="inline-flex items-center p-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                wire:click="openEditModal({{ $social->id }})"
                                title="Edit"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button  disabled
                                class="inline-flex items-center p-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                wire:click="delete({{ $social->id }})"
                                onclick="return confirm('Are you sure you want to delete this social media?')"
                                title="Delete"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-8l-4 4m0 0l-4-4m4 4V3" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No social media records found</h3>
                    @if($search)
                        <p class="mt-1 text-sm text-gray-500">Try adjusting your search terms</p>
                    @else
                        <p class="mt-1 text-sm text-gray-500">Get started by adding your first social media link</p>
                    @endif
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($socials->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $socials->links() }}
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 " aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 min-h-screen transition-opacity" wire:click="closeModal"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form wire:submit.prevent="save">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title">
                                        {{ $editingId ? 'Edit Social Media' : 'Add New Social Media' }}
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <!-- Name Field -->
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">
                                                Name <span class="text-red-500">*</span>
                                            </label>
                                            <input 
                                                type="text" 
                                                id="name"
                                                wire:model="name"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-300 @enderror"
                                                placeholder="e.g., Facebook, Twitter, Instagram"
                                            >
                                            @error('name')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- URL Field -->
                                        <div>
                                            <label for="url" class="block text-sm font-medium text-gray-700">
                                                URL <span class="text-red-500">*</span>
                                            </label>
                                            <input 
                                                type="url" 
                                                id="url"
                                                wire:model="url"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('url') border-red-300 @enderror"
                                                placeholder="https://..."
                                            >
                                            @error('url')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Icon Upload -->
                                        <div>
                                            <label for="iconFile" class="block text-sm font-medium text-gray-700">Icon</label>
                                            <input 
                                                type="file" 
                                                id="iconFile"
                                                wire:model="iconFile"
                                                accept="image/*"
                                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('iconFile') border-red-300 @enderror"
                                            >
                                            @error('iconFile')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            
                                            <!-- Preview current icon -->
                                            @if($editingId && $icon && !$iconFile)
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Current icon:</p>
                                                    <img src="{{ asset('storage/' . $icon) }}" alt="Current icon" class="mt-1 h-12 w-12 rounded-lg object-cover">
                                                </div>
                                            @endif
                                            
                                            <!-- Preview new icon -->
                                            @if($iconFile)
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Preview:</p>
                                                    <img src="{{ $iconFile->temporaryUrl() }}" alt="Preview" class="mt-1 h-12 w-12 rounded-lg object-cover">
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Status Field -->
                                        <div class="flex items-center">
                                            <input 
                                                id="is_active"
                                                type="checkbox" 
                                                wire:model="is_active"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                            >
                                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button 
                                type="submit" 
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                <span wire:loading.remove>
                                    {{ $editingId ? 'Update' : 'Create' }}
                                </span>
                                <span wire:loading class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    {{ $editingId ? 'Updating...' : 'Creating...' }}
                                </span>
                            </button>
                            <button 
                                type="button" 
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                wire:click="closeModal"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Loading indicator -->
    <div wire:loading.delay class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
    </div>
</div>