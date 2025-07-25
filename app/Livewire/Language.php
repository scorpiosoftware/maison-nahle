<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Livewire\Component;

class Language extends Component
{
    public function setArabic()
    {
        session()->forget('lang');
        session()->put('lang', 'ar');
        App::setLocale(session('lang'));
        return redirect(request()->header('Referer'));
    }

    public function setEnglish()
    {
        session()->forget('lang');
        session()->put('lang', 'en');
        App::setLocale(session('lang'));
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.language');
    }
}
