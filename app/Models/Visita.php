<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Enums\EnumVisitaEstado;
use App\Validation\Messages;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Builder;

// Filament
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;

class Visita extends Model
{
    use HasFactory;

    protected $table = 'visitas';

    protected $fillable = [
        'vendedor_id',
        'cliente_id',
        'fecha_visita',
        'fecha_visita_reprogramada',
        'hora_visita',
        'url_archivos',
        'nombres_archivos_originales',
        'url_imagenes',
        'nombres_imagenes_originales',
        'observaciones',
        'indicaciones',
        'estado'
    ];

    protected $casts = [
        'url_archivos' => 'array',
        'nombres_archivos_originales' => 'array',
        'url_imagenes' => 'array',
        'nombres_imagenes_originales' => 'array',
        'estado' => EnumVisitaEstado::class,
    ];

    protected $dates = [
        'fecha_visita',
        'fecha_visita_reprogramada',
    ];

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function lista_imagenes(): array
    {
        return $this->nombres_imagenes_originales ?? [];
    }
    public function lista_archivos(): array
    {
        return $this->nombres_archivos_originales ?? [];
    }

    public function es_visible(): bool
    {
        // Verifica si la visita es visible para el usuario actual
        if (User::actual()->id === $this->vendedor_id) {
            return true;
        }

        // Si la visita no es del vendedor actual, no es visible
        return false;
    }

    public function es_editable(): bool
    {
        // Verifica si la visita está pendiente o en proceso
        if (
            User::actual()->id === $this->vendedor_id &&
            ($this->estado === EnumVisitaEstado::PENDIENTE ||
            $this->estado === EnumVisitaEstado::REPROGRAMADA) &&
            now()->format('Y-m-d') >= $this->fecha_visita
        ) {
            return true;
        }

        // Si la visita ya está completada o cancelada, no es editable
        return false;
    }

    public static function obtener_visitas()
    {
        $query = Visita::query();

        // Filtra las visitas por estado aprobado
        if (User::actual()->rol->is_admin()) {
            return $query;
        }

        return $query->where('vendedor_id', User::actual()->id);
    }

    public static function contar_visitas_pendientes()
    {
        $query = Visita::where('estado', EnumVisitaEstado::PENDIENTE);

        if (User::actual()->rol->is_admin()) {
            return $query->count();
        }

        return $query->where('vendedor_id', User::actual()->id)->count();
    }

    public static function obtener_visitas_por_estado($query, $estado)
    {
        return $query->where('estado', $estado);
    }

    // Filament

    public static function obtener_columnas_tabla(): array
    {
        return [
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
        ];
    }

    public static function obtener_filtros_tabla(): array
    {
        $filtros = [
            Forms\Components\DatePicker::make('fecha_visita_desde')
                ->placeholder(fn($state): string => 'Dec 18, ' . now()->subYear()->format('Y'))
                ->label('Visita desde'),
            Forms\Components\DatePicker::make('fecha_visita_hasta')
                ->label('Visita hasta')
                ->placeholder(fn($state): string => now()->format('M d, Y')),
        ];

        if (User::actual()->rol->is_admin()) {
            $filtros[] = Forms\Components\Select::make('vendedor')
                ->label('Vendedor')
                ->relationship('vendedor', 'name')
                ->searchable();
        }

        return $filtros;
    }

    public static function obtener_query_filtro($query, array $data): Builder
    {
        $query = $query
            ->when(
                $data['fecha_visita_desde'] ?? null,
                fn(Builder $query, $date): Builder => $query->whereDate('fecha_visita', '>=', $date),
            )
            ->when(
                $data['fecha_visita_hasta'] ?? null,
                fn(Builder $query, $date): Builder => $query->whereDate('fecha_visita', '<=', $date),
            );

        if (User::actual()->rol->is_admin()) {
            return $query->when(
                $data['vendedor'] ?? null,
                fn(Builder $query, $vendedor): Builder => $query->where('vendedor_id', $vendedor),
            );
        }

        return $query;
    }

    public static function obtener_indicadores_filtro(array $data): array
    {
        $indicators = [];
        if ($data['vendedor'] ?? null) {
            $indicators['vendedor'] = 'Vendedor ' . User::find($data['vendedor'])->name;
        }
        if ($data['fecha_visita_desde'] ?? null) {
            $indicators['fecha_visita_desde'] = 'Fecha desde ' . Carbon::parse($data['fecha_visita_desde'])->toFormattedDateString();
        }
        if ($data['fecha_visita_hasta'] ?? null) {
            $indicators['fecha_visita_hasta'] = 'Fecha hasta ' . Carbon::parse($data['fecha_visita_hasta'])->toFormattedDateString();
        }

        return $indicators;
    }

    protected static function obtener_componentes_formulario(): array
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
                ->live()
                ->required()
                ->validationMessages(Messages::getMessagesForFields(['required' => []], 'estado')),
            Forms\Components\DatePicker::make('fecha_visita_reprogramada')
                ->default(now()->format('Y-m-d'))
                ->label('Fecha de visita reprogramada')
                ->visible(
                    function (Get $get) {
                        return $get('estado') == (string)EnumVisitaEstado::REPROGRAMADA->value;
                    } 
                ),
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
                5
            ];

            foreach ($campos_a_desactivar as $campo) {
                $listaComponentesFormulario[$campo]->disabled();
            }
        }


        return $listaComponentesFormulario;
    }
}
