<?php

namespace App\Providers;

use App\Models\Carousel;
use App\Models\Social;
use Illuminate\Support\Facades\Schema as FacadesSchema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Nette\Schema\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $logo_url = Carousel::first()->logo_url ?? 'default-logo.png';
        $socials = Social::all();
        View::share('logo', $logo_url);
        View::share('socials', $socials);
        FacadesSchema::defaultStringLength(191);
    }
}
