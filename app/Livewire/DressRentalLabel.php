<?php

namespace App\Livewire;

use App\Models\Option;
use Livewire\Component;

class DressRentalLabel extends Component
{
    public $currentMessage = 0;
    public $messages = [];

    public $option;
    
    public function mount()
    {
        $this->option = Option::first();
        $this->setupMessages();
    }

    public function setupMessages()
    {
        $lang = session('lang', 'en'); // Default to English if no session lang
        
        // Get label_messages from option (expecting format: [['en' => '...', 'ar' => '...'], ...])
        $labelMessages = $this->option?->label_messages ?? [];
        
        if (!empty($labelMessages) && is_array($labelMessages)) {
            // Extract messages for the current language
            $this->messages = array_map(function($message) use ($lang) {
                if (is_array($message) && isset($message[$lang])) {
                    return $message[$lang];
                }
                // Fallback: if it's an old format (simple string array), return as is
                return is_string($message) ? $message : '';
            }, $labelMessages);
            
            // Filter out empty messages
            $this->messages = array_filter($this->messages, function($message) {
                return !empty(trim($message));
            });
        }
        
        // Fallback messages if no messages found or all are empty
        if (empty($this->messages)) {
            if ($lang == 'ar') {
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
        
        // Reset current message index if needed
        if ($this->currentMessage >= count($this->messages)) {
            $this->currentMessage = 0;
        }
    }

    public function nextMessage()
    {
        if (count($this->messages) > 0) {
            $this->currentMessage = ($this->currentMessage + 1) % count($this->messages);
        }
    }

    public function getCurrentMessage()
    {
        return $this->messages[$this->currentMessage] ?? '';
    }

    // Method to refresh messages when language changes
    public function refreshMessages()
    {
        $this->setupMessages();
    }

    public function render()
    {
        return view('livewire.dress-rental-label');
    }
}