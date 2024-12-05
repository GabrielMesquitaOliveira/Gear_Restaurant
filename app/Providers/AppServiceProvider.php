<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\ServiceProvider;

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
        PanelsRenderHook::GLOBAL_SEARCH_BEFORE;
        FilamentColor::register([
            'danger' => Color::hex('#D20F39'), // Red
            'gray' => Color::Slate,
            'info' => Color::hex('#1E66F5'),  // Blue
            'primary' => [
                '50'  => '#fcf3fa',
                '100' => '#fbe8f7',
                '200' => '#f8d2f0',
                '300' => '#f3aee2',
                '400' => '#ea76cb',
                '500' => '#e054b6',
                '600' => '#ce3498',
                '700' => '#b2247d',
                '800' => '#942067',
                '900' => '#7b2057',
                '950' => '#4b0c32',
            ],
            'success' => Color::hex('#40A02B'), // Green
            'warning' => Color::hex('#DF8E1D'), // Yellow
        ]);

        Filament::registerNavigationGroups([
            'Gestão de Produtos',
            'Gestão de Operações',
            'Gestão de Cadastros',
        ]);
    }
}
