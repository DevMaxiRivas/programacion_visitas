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

    protected static function obtenerComponentesFormulario(): array
    {
        $listaComponentesFormulario = [
            Forms\Components\Select::make('cliente_id')
                ->label('Cliente')
                ->relationship('cliente', 'razon_social')
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\DatePicker::make('fecha_visita')
                ->default(now()->format('Y-m-d'))
                ->minDate(now())
                ->required()
                ->label('Fecha de visita'),
            Forms\Components\Select::make('estado')
                ->label('Estado')
                ->options([
                    0 => 'Pendiente',
                    1 => 'Completada',
                    2 => 'Cancelada',
                ])
                ->default(0)
                ->required(),
            Forms\Components\RichEditor::make('indicaciones')
                ->label('Indicaciones')
                ->columnSpanFull(),
            Forms\Components\FileUpload::make('url_archivos')
                ->label('Archivos Adjuntos')
                ->multiple()
                ->acceptedFileTypes(['image/*', 'application/pdf'])
                ->maxSize(10240) // 10 MB
                ->disk('public')
                ->directory('visitas')
                ->columnSpanFull(),
            Forms\Components\FileUpload::make('url_imagenes')
                ->label('Imagenes Adjuntos')
                ->multiple()
                ->acceptedFileTypes(['image/*', 'application/pdf'])
                ->maxSize(10240) // 10 MB
                ->disk('public')
                ->directory('visitas')
                ->columnSpanFull(),
            Forms\Components\RichEditor::make('observaciones')
                ->label('Observaciones')
                ->columnSpanFull(),
            ];

            if(User::actual()->rol != 'admin') {
                $campos_a_desactivar = [
                    0,1,3
                ];

                foreach ($campos_a_desactivar as $campo) {
                    $listaComponentesFormulario[$campo]->disabled();
                }
            }


        return $listaComponentesFormulario;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema(self::obtenerComponentesFormulario());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente.razon_social')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_visita')
                    ->label('Fecha de Visita')
                    ->date()
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
