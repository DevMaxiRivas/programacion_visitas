<?php

namespace App\Providers\Filament;

use App\Filament\Auth\CustomLogin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// Calendar
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;

// Configuraciones menu superior derecho
use App\Filament\Pages\Settings;
use Filament\Navigation\MenuItem;

class PanelPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('panel')
            ->sidebarCollapsibleOnDesktop()
            ->brandLogo(asset('imagenes/logo_hierronort.png'))
            ->darkModeBrandLogo(asset('imagenes/logo-hierronort-white.png'))
            ->brandLogoHeight("4rem")
            ->path('panel')
            ->login(CustomLogin::class)
            ->loginRouteSlug('iniciar-sesion')
            // ->registration()
            // ->registrationRouteSlug('registro')
            ->passwordReset()
            ->passwordResetRouteSlug('restablecer-contraseña')
            ->colors([
                'primary' => '#C62828',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('3s')
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(
                FilamentFullCalendarPlugin::make()
                ->selectable()
            )
            ->userMenuItems([
            MenuItem::make()
                ->label('Mi perfil')
                ->url('#')
                ->icon('heroicon-o-cog-6-tooth'),
            // ...
        ]);
        ;
    }
}
