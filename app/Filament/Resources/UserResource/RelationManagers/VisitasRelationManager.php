<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Visita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitasRelationManager extends RelationManager
{
    protected static string $relationship = 'visitas';

    public function form(Form $form): Form
    {
        return $form
            ->schema(Visita::obtener_componentes_formulario());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('cliente.razon_social')
            ->columns([
                Tables\Columns\TextColumn::make('cliente.razon_social'),
                Tables\Columns\TextColumn::make('fecha_visita')
                ->date(),
                Tables\Columns\TextColumn::make('estado')
                ->badge(),
                ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
