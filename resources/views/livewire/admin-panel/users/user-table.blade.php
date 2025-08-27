<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 d:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase text-nowrap bg-gray-50 d:bg-gray-700 d:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        {{session('lang') == 'en' ? 'ID' : 'الرقم'}}
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        {{session('lang') == 'en' ? 'Full name' : 'الاسم'}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{session('lang') == 'en' ? 'Email' : 'البريد الالكتروني'}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{session('lang') == 'en' ? 'Role' : 'الدور'}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{session('lang') == 'en' ? 'Joined Date' : 'تاريخ الانضمام'}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">{{session('lang') == 'en' ? 'Actions' : 'الإجراءات'}}</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr class="bg-white border-b d:bg-gray-800 d:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 text-base">
                            {{ $record->id }}
                        </td>
                        <td class="px-6 py-4 font-bold text-black text-base text-nowrap">
                            {{ $record->name }}
                        </td>
                        <td class="px-6 py-4 text-black text-base text-nowrap">
                            {{ $record->email }}
                        </td>
                        <td class="px-6 py-4 text-black text-base text-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                @if($record->role->name == 'admin') bg-purple-100 text-purple-800 
                                @elseif($record->role->name == 'user') bg-blue-100 text-blue-800 
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($record->role->name ?? 'user') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-black text-base text-nowrap">
                            {{ $record->created_at }}
                        </td>
                        <td class="px-6 py-6 flex justify-start items-center space-x-2">
                            {{-- <button wire:click="toggleStatus({{ $record->id }})"
                                class="text-blue-600 hover:text-blue-700 mr-3">
                                {{ $record->email_verified_at ? (session('lang') == 'en' ? 'Deactivate' : 'إلغاء تفعيل') : (session('lang') == 'en' ? 'Activate' : 'تفعيل') }}
                            </button> --}}
                            <button wire:click="$dispatch('confirmDelete', {{ $record->id }})"
                                class="text-red-600 hover:text-red-700">
                                {{ session('lang') == 'en' ? 'Delete' : 'حذف' }}
                            </button>
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
                    title: '{{session("lang") == "en" ? "Are you sure?" : "هل أنت متأكد؟"}}',
                    text: "{{session('lang') == 'en' ? 'This action cannot be undone!' : 'لا يمكن التراجع عن هذا الإجراء!'}}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: '{{session("lang") == "en" ? "Yes, delete it!" : "نعم، احذف!"}}',
                    cancelButtonText: '{{session("lang") == "en" ? "Cancel" : "إلغاء"}}'
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
                    '{{session("lang") == "en" ? "Deleted!" : "تم الحذف!"}}',
                    '{{session("lang") == "en" ? "The user has been deleted." : "تم حذف المستخدم."}}',
                    'success'
                );
            });

            Livewire.on('status-updated', () => {
                Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: '{{session("lang") == "en" ? "Status changed successfully!" : "تم تغيير الحالة بنجاح!"}}',
                        showConfirmButton: false,
                        timer: 1500
                    }
                );
            });
        });
    </script>
</div>