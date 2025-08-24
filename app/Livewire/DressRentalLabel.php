<?php

namespace App\Livewire;

use Livewire\Component;

class DressRentalLabel extends Component
{
    public $currentMessage = 0;
    public $messages = [];

    public function mount()
    {
        $this->setupMessages();
    }

    public function setupMessages()
    {
        if (session('lang') == 'ar') {
            $this->messages = [
                'تأجير فساتين مايزون ناهل - أناقة لكل المناسبات',
                'فساتين راقية للإيجار - مايزون ناهل',
                'استأجري فستان أحلامك - مايزون ناهل',
                'تشكيلة حصرية من فساتين الإيجار'
            ];
        } else {
            $this->messages = [
                'Maison Nahle Dress Rentals - Elegance for Every Occasion',
                'Premium Dress Rentals - Maison Nahle',
                'Rent Your Dream Dress - Maison Nahle',
                'Exclusive Collection of Rental Dresses'
            ];
        }
    }

    public function nextMessage()
    {
        $this->currentMessage = ($this->currentMessage + 1) % count($this->messages);
    }

    public function render()
    {
        return view('livewire.dress-rental-label');
    }
}