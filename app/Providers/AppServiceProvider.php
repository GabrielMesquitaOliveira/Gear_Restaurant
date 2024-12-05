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
        FilamentColor::register([
            'danger' => Color::hex('#D20F39'), // Red
            'gray' => Color::Neutral,
            'info' => Color::hex('#1E66F5'),  // Blue
            'primary' => Color::hex('#F0217E'),
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
