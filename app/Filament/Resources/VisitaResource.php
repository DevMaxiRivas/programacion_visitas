<?php

namespace App\Filament\Resources;

use App\Enums\EnumVisitaEstado;
use App\Filament\Resources\VisitaResource\Pages;
use App\Filament\Resources\VisitaResource\RelationManagers;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Visita;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Illuminate\Support\HtmlString;

// Mensajes de validación
use App\Validation\Messages;

use Filament\Navigation\NavigationItem;

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
                ->live()
                ->afterStateUpdated(
                    function (Get $get, callable $set) {
                        $set('vendedor_id', Cliente::find($get('cliente_id'))->vendedor_id ?? null);
                    }
                )
                ->required()
                ->validationMessages(Messages::getMessagesForFields(['required' => []], 'cliente')),
            Forms\Components\Hidden::make('vendedor_id'),
            Forms\Components\DatePicker::make('fecha_visita')
                ->default(now()->format('Y-m-d'))
                ->rules([
                    fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                        if (
                            empty($get('id')) &&
                            !empty($get('fecha_visita')) &&
                            $get('fecha_visita') < now()->format('Y-m-d')
                        ) {
                            $fail("La fecha de visita debe ser posterior a la fecha actual.");
                        }
                    },
                ])
                ->required()
                ->validationMessages(Messages::getMessagesForFields(['required' => []], 'fecha de visita'))
                ->label('Fecha de visita'),
            Forms\Components\Select::make('estado')
                ->label('Estado')
                ->options(EnumVisitaEstado::class)
                ->default(EnumVisitaEstado::PENDIENTE)
                ->required()
                ->validationMessages(Messages::getMessagesForFields(['required' => []], 'estado')),
            Forms\Components\RichEditor::make('indicaciones')
                ->label('Indicaciones')
                ->columnSpanFull()
                ->toolbarButtons([
                    'blockquote',
                    'bold',
                    'bulletList',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ]),
            Forms\Components\FileUpload::make('url_archivos')
                ->label('Archivos Adjuntos')
                ->storeFileNamesIn('nombres_archivos_originales')
                ->multiple()
                ->acceptedFileTypes(['application/pdf'])
                ->maxSize(20480) // 20 MB
                ->disk('local')
                ->directory(function (Get $get) {
                    return 'visitas\\archivos\\' . Cliente::find($get('cliente_id'))->codigo ?? 'sin_cliente';
                })
                ->columnSpanFull(),
            Forms\Components\FileUpload::make('url_imagenes')
                ->label('Imagenes Adjuntas')
                ->storeFileNamesIn('nombres_imagenes_originales')
                ->multiple()
                ->acceptedFileTypes(['image/*'])
                ->maxSize(20480) // 20 MB
                ->disk('local')
                ->directory(function (Get $get) {
                    return 'visitas\\imagenes\\' . Cliente::find($get('cliente_id'))->codigo ?? 'sin_cliente';
                })
                ->downloadable()
                ->columnSpanFull()
                ->previewable(false),
            Forms\Components\RichEditor::make('observaciones')
                ->label('Observaciones')
                ->columnSpanFull()
                ->toolbarButtons([
                    'blockquote',
                    'bold',
                    'bulletList',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ]),
            Forms\Components\Hidden::make('id')
        ];

        if (!User::actual()->rol->is_admin()) {
            $campos_a_desactivar = [
                0,
                2,
                4
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
            ->query(Visita::obtener_visitas())
            ->columns([
                Tables\Columns\TextColumn::make('cliente.razon_social')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_visita')
                    ->label('Fecha de Visita')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                    ->label('Estado')
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('vendedor.name')
                    ->label('Vendedor')
                    ->sortable(),
            ])
            ->defaultSort('fecha_visita', 'desc')
            ->filters([
                //
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
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Visita::contar_visitas_pendientes();
    }
}
