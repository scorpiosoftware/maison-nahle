<?php

namespace App\Livewire;

use App\Models\Option;
use Livewire\Component;

class SettingsManager extends Component
{
   public $labelMessages = [];
    public $newLabelEn = '';
    public $newLabelAr = '';
    public $editingIndex = null;
    public $editingLabelEn = '';
    public $editingLabelAr = '';

    public $option; // Assuming you pass the Option model instance

    public function mount()
    {
        $this->option = Option::first(); // Fetch the first Option record

        // Initialize with existing data or empty array
        $this->labelMessages = $this->option?->label_messages ?? [];
    }

   public function addLabel()
    {
        if (trim($this->newLabelEn) !== '' || trim($this->newLabelAr) !== '') {
            $this->labelMessages[] = [
                'en' => trim($this->newLabelEn),
                'ar' => trim($this->newLabelAr)
            ];
            $this->newLabelEn = '';
            $this->newLabelAr = '';
            $this->saveData();
        }
    }
    public function editLabel($index)
    {
        $this->editingIndex = $index;
        $this->editingLabelEn = $this->labelMessages[$index]['en'] ?? '';
        $this->editingLabelAr = $this->labelMessages[$index]['ar'] ?? '';
    }
    public function updateLabel()
    {
        if ($this->editingIndex !== null && (trim($this->editingLabelEn) !== '' || trim($this->editingLabelAr) !== '')) {
            $this->labelMessages[$this->editingIndex] = [
                'en' => trim($this->editingLabelEn),
                'ar' => trim($this->editingLabelAr)
            ];
            $this->cancelEdit();
            $this->saveData();
        }
    }

    public function cancelEdit()
    {
        $this->editingIndex = null;
        $this->editingLabelEn = '';
        $this->editingLabelAr = '';
    }

    public function deleteLabel($index)
    {
        unset($this->labelMessages[$index]);
        $this->labelMessages = array_values($this->labelMessages); // Reindex array
        $this->saveData();
    }

    private function saveData()
    {
        // Here you would typically save to your model
        // For example: $this->model->update(['label_messages' => $this->labelMessages]);
        if ($this->option) {

            $this->option->update(['label_messages' => $this->labelMessages]);
        }
        // Emit event to parent component if needed
        $this->dispatch('labelMessagesUpdated', $this->labelMessages);
    }
    public function render()
    {
        return view('livewire.settings-manager');
    }
}
