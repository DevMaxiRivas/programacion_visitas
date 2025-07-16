<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitaResource\Pages;
use App\Filament\Widgets\CalendarWidget;
use App\Models\Cliente;
use App\Models\Visita;
use App\Validation\Messages;
use Closure;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;

class VisitaResource extends Resource
{
    protected static ?string $model = Visita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema(Visita::obtener_componentes_formulario());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Visita::obtener_visitas())
            ->columns(
                Visita::obtener_columnas_tabla()
            )
            ->defaultSort('fecha_visita', 'desc')
            ->filters([
                Tables\Filters\Filter::make('fecha_visita')
                    ->form(Visita::obtener_filtros_tabla())
                    ->query(
                        function (Builder $query, array $data): Builder {
                            return Visita::obtener_query_filtro($query, $data);
                        }
                    )
                    ->indicateUsing(
                        function (array $data): array {
                            return Visita::obtener_indicadores_filtro($data);
                        }
                    ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('cliente.razon_social')
                    ->label('Cliente'),
                TextEntry::make('vendedor.name')
                    ->label('Vendedor'),
                TextEntry::make('estado')
                    ->label('Estado'),
                TextEntry::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime(),
                TextEntry::make('fecha_visita')
                    ->label('Fecha de Visita')
                    ->date(),
                TextEntry::make('fecha_visita_reprogramada')
                    ->label('Fecha de Visita Reprogramada')
                    ->date()
                    ->visible(fn($record) => !empty($record->fecha_visita_reprogramada)),
                TextEntry::make('updated_at')
                    ->label('Fecha de Actualización')
                    ->dateTime(),
                TextEntry::make('indicaciones')
                    ->label('Indicaciones')
                    ->html()
                    ->columnSpanFull(),
                TextEntry::make('observaciones')
                    ->label('Observaciones')
                    // ->html()
                    ->formatStateUsing(fn(string $state): HtmlString => new HtmlString($state))
                    ->columnSpanFull(),
                TextEntry::make('url_imagenes')
                    ->label('Cantidad de Archivos Adjuntos')
                    ->formatStateUsing(fn(string $state): string => $state ? count(explode(',', $state)) : '0')
                    ->default('0'),
                TextEntry::make('url_archivos')
                    ->label('Cantidad de Archivos Adjuntos')
                    ->formatStateUsing(fn(string $state): string => $state ? count(explode(',', $state)) : '0')
                    ->default('0'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitas::route('/'),
            'create' => Pages\CreateVisita::route('/crear'),
            'view' => Pages\ViewVisita::route('/{record}'),
            'edit' => Pages\EditVisita::route('/{record}/editar'),
            'lista_archivos' => Pages\ListaArchivos::route('/{record}/archivos'),
            // 'calendario' => Pages\VerCalendario::route('/calendario'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Visita::contar_visitas_pendientes();
    }

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         // CalendarWidget::class,
    //         FilamentFullCalendarPlugin::make()
    //             ->selectable()
    //     ];
    // }
}
