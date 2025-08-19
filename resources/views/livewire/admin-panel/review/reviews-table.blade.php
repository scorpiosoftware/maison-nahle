<div>
    <div class="relative m-4 md:flex justify-between items-center">
        <div class="w-full max-w-md ">
       
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only d:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 d:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="search" 
                    wire:model.live='search'
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 d:bg-gray-700 d:border-gray-600 d:placeholder-gray-400 d:text-white d:focus:ring-blue-500 d:focus:border-blue-500"
                    placeholder="..." />
  
            </div>
        </div>



    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 d:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase text-nowrap bg-gray-50 d:bg-gray-700 d:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        {{ session('lang') == 'en' ? 'name' : 'الاسم' }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ session('lang') == 'en' ? 'Product' : 'اسم المنتج' }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ session('lang') == 'en' ? 'Comment' : 'التعليق' }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ session('lang') == 'en' ? 'rate' : 'التقييم' }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">{{ session('lang') == 'en' ? 'Actions' : 'تعديل' }}</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr class="bg-white border-b d:bg-gray-800 d:border-gray-700">
                        <td class="px-6 py-4 font-bold text-black text-base text-nowrap">
                            {{ $record->customer }}
                        </td>
                        <td class="px-6 py-4  text-black text-base text-nowrap">
                            {{ $record->product->name_en }}
                        </td>
                        <td class="px-6 py-4  overflow-x-auto text-black text-base text-nowrap">
                            {{ $record->comment }}
                        </td>
                        <td class="px-6 py-4  overflow-x-auto text-black text-base text-nowrap">
                            {{ $record->rate }}
                        </td>
                        <td class="px-6 py-6 flex justify-start items-center">
                            <button wire:click="$dispatch('confirmDelete', {{ $record->id }})"
                                class=" text-red-600 hover:text-red-700">{{ session('lang') == 'en' ? 'Delete' : 'حذف' }}</button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <nav aria-label="Page navigation example" class="p-4">
            {{ $records->links() }}
        </nav>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('confirmDelete', id => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteConfirmed', {
                            id: id
                        });
                    }
                });
            });

            Livewire.on('recordDeleted', () => {
                Swal.fire(
                    'Deleted!',
                    'The record has been deleted.',
                    'success'
                );
            });

            Livewire.on('status-updated', () => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Status changed successfully!',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        });
    </script>
</div>
