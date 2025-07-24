<?php

namespace App\Livewire;

use App\Models\Social;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SocialTable extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $showModal = false;
    public $editingId = null;
    
    // Form properties
    public $name = '';
    public $icon;
    public $iconFile;
    public $url = '';
    public $is_active = true;
    
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'iconFile' => 'nullable|image|max:1024', // 1MB max
        'is_active' => 'boolean',
    ];

    protected $messages = [
        'name.required' => 'The social media name is required.',
        'url.required' => 'The URL is required.',
        'url.url' => 'Please provide a valid URL.',
        'iconFile.image' => 'The icon must be an image.',
        'iconFile.max' => 'The icon size must not exceed 1MB.',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->editingId = null;
        $this->showModal = true;
    }

    public function openEditModal($id)
    {
        $social = Social::findOrFail($id);
        $this->editingId = $id;
        $this->name = $social->name;
        $this->icon = $social->icon;
        $this->url = $social->url;
        $this->is_active = $social->is_active;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'url' => $this->url,
            'is_active' => $this->is_active,
        ];

        // Handle file upload
        if ($this->iconFile) {
            // Delete old icon if editing
            if ($this->editingId && $this->icon) {
                Storage::disk('public')->delete($this->icon);
            }
            
            $data['icon'] = $this->iconFile->store('social-icons', 'public');
        }

        if ($this->editingId) {
            $social = Social::findOrFail($this->editingId);
            $social->update($data);
            session()->flash('message', 'Social media updated successfully!');
        } else {
            Social::create($data);
            session()->flash('message', 'Social media created successfully!');
        }

        $this->closeModal();
    }

    public function delete($id)
    {
        $social = Social::findOrFail($id);
        
        // Delete associated icon file
        if ($social->icon) {
            Storage::disk('public')->delete($social->icon);
        }
        
        $social->delete();
        session()->flash('message', 'Social media deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $social = Social::findOrFail($id);
        $social->update(['is_active' => !$social->is_active]);
        
        $status = $social->is_active ? 'activated' : 'deactivated';
        session()->flash('message', "Social media {$status} successfully!");
    }

    private function resetForm()
    {
        $this->name = '';
        $this->icon = null;
        $this->iconFile = null;
        $this->url = '';
        $this->is_active = true;
        $this->editingId = null;
    }

    public function render()
    {
        $socials = Social::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('url', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.social-table', compact('socials'));
    }
}