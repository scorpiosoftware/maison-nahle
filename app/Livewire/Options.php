<?php

namespace App\Livewire;

use App\Models\Option;
use Livewire\Component;

class Options extends Component
{
    public $show_popup = false;

    public function mount()
    {
        // Add null check to prevent errors if no options exist
        $option = Option::first();
        $this->show_popup = $option ? $option->show_popup : false;
    }

    public function render()
    {
        return view('livewire.options');
    }

    // This method is automatically called when show_popup property changes
    public function updatedShowPopup()
    {
        try {
            $option = Option::first();

            if ($option) {
                $option->update(['show_popup' => $this->show_popup]);
            } else {
                Option::create(['show_popup' => $this->show_popup]);
            }
        } catch (\Exception $e) {
            // Revert the UI if database update fails
            $this->show_popup = !$this->show_popup;
            session()->flash('error', 'Failed to update popup setting.');
        }
    }

    // Optional: Add methods to explicitly enable/disable
    public function enablePopup()
    {
        $this->show_popup = true;
        // The updatedShowPopup() method will be called automatically
    }

    public function disablePopup()
    {
        $this->show_popup = false;
        // The updatedShowPopup() method will be called automatically
    }
}
