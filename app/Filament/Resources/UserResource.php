<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\ClienteRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Imports
use App\Filament\Imports\UserImporter;
use Filament\Tables\Actions\ImportAction;

use App\Enums\EnumsRoles;
use Filament\Navigation\NavigationItem;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Usuarios';

    protected static ?string $navigationLabel = 'Usuarios';

    protected static ?string $pluralLabel = 'Usuarios';

    protected static ?string $slug = 'usuarios';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'Usuario';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cuil')
                    ->label('CUIL')
                    ->numeric()
                    ->maxLength(11)
                    ->unique(ignoreRecord: true)
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => bcrypt($state))
                    ->visible(fn($record) => empty($record->id)),
                Forms\Components\Select::make('rol')
                    ->options(EnumsRoles::class)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rol')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Correo Electrónico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('cuil')
                    ->label('CUIL')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_empleado')
                    ->label('Código de Empleado')
                    ->default('N/A')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ClienteRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/crear'),
            'edit' => Pages\EditUser::route('/{record}/editar'),
        ];
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make(self::getNavigationLabel())
                ->hidden(fn() => !User::actual()->rol->is_admin())  // Ocultar si el usuario no es admin
                ->icon(self::$navigationIcon)
                ->url(self::getUrl()),
        ];
    }
}
