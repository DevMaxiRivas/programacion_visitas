<?php

namespace App\Filament\Auth;

use Dom\Text;
use Filament\Pages\Auth\Login;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Validation\ValidationException;

use Filament\Actions\Action;

class CustomLogin extends Login
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getCuilFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getCuilFormComponent(): Component
    {
        return TextInput::make('cuil')
            ->label("CUIL")
            ->numeric()
            ->maxLength(11)
            ->minLength(11)
            ->placeholder("Ej. 123456789012")
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.cuil' => "CUIL o contraseña incorrectos",
        ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'cuil' => $data['cuil'],
            'password' => $data['password'],
        ];
    }

    public function getTitle(): string | Htmlable
    {
        // return __('filament-panels::pages/auth/login.title');
        return "Inicio de Sesión";
    }

    public function getHeading(): string | Htmlable
    {
        return "Ingrese sus credenciales";
    }

    public function registerAction(): Action
    {
        return Action::make('register')
            ->link()
            ->label("Registrese")
            ->url(filament()->getRegistrationUrl());
    }
}