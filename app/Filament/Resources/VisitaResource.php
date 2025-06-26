<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitaResource\Pages;
use App\Filament\Resources\VisitaResource\RelationManagers;

use App\Models\Visita;
use App\Models\User;
use App\Models\Cliente;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Get;

class VisitaResource extends Resource
{
    protected static ?string $model = Visita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\Select::make('cliente_id')
                    ->label('Cliente')
                    ->relationship('cliente', 'razon_social')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('fecha')
                    ->default(now())
                    ->label('Fecha de Visita')
                    ->required(),
                Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'completada' => 'Completada',
                        'cancelada' => 'Cancelada',
                    ])
                    ->default('pendiente')
                    ->required(),
                Forms\Components\RichEditor::make('indicaciones')
                    ->label('Indicaciones')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('url_archivos')
                    ->label('Archivos Adjuntos')
                    ->multiple()
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->maxSize(10240) // 10 MB
                    ->enableReordering()
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->directory('visitas')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('url_imagenes')
                    ->label('Imagenes Adjuntos')
                    ->multiple()
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->maxSize(10240) // 10 MB
                    ->enableReordering()
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->directory('visitas')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('observaciones')
                    ->label('Observaciones')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitas::route('/'),
            'create' => Pages\CreateVisita::route('/crear'),
            'edit' => Pages\EditVisita::route('/{record}/editar'),
        ];
    }
}
