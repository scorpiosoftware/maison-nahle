<?php

namespace App\Livewire\AdminPanel\Users;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public $search = '';
    
    public function getRecords($inputs = [])
    {
        $records = new User();

        if (!empty($inputs['search'])) {
            $records = $records->where(function($query) use ($inputs) {
                $query->where('name', 'like', '%' . $inputs['search'] . '%')
                      ->orWhere('email', 'like', '%' . $inputs['search'] . '%');
            });
        }

        return $records->paginate(10);
    }
    
    public function delete($id)
    {
        $record = User::find($id);
        if ($record) {
            $record->delete();
            $this->dispatch('recordDeleted'); // optional feedback
        }
    }
    
    #[\Livewire\Attributes\On('deleteConfirmed')]
    public function deleteConfirmed($id)
    {
        $this->delete($id);
    }
    
    public function render()
    {
        return view('livewire.admin-panel.users.user-table', [
            'records' => $this->getRecords(['search' => $this->search])
        ]);
    }
}