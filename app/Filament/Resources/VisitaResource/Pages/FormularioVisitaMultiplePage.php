<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use App\Models\Cliente;
use App\Models\Visita;
use App\Validation\Messages;
use Closure;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Log;

class FormularioVisitaMultiplePage extends Page implements HasForms
{
    use InteractsWithForms;
    protected static string $resource = VisitaResource::class;

    protected static string $view = 'filament.resources.visita-resource.pages.formulario-visita-multiple-page';

    public $data;

    // protected static string|null $slug = 'formulario-visita-multiple';

    // public $form;

    // public function mount(): void
    // {
    //     $this->form = $this->obtenerFormulario();
    // }

    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('name')->required(),
        ];
    } 
    
    // protected function getFormSchema(): array
    // {
    //     return [
    //         Repeater::make('visitas')
    //             ->schema([
    //                 Select::make('cliente_id')
    //                     ->label('Cliente')
    //                     ->relationship('cliente', 'razon_social')
    //                     ->searchable()
    //                     ->preload()
    //                     ->live()
    //                     ->afterStateUpdated(
    //                         function (Get $get, callable $set) {
    //                             Log::info("Actual: " . $get('cliente_id'));
    //                             $set('vendedor_id', Cliente::find($get('cliente_id'))->vendedor_id ?? null);
    //                         }
    //                     )
    //                     ->required()
    //                     ->validationMessages(Messages::getMessagesForFields(['required' => []], 'cliente')),
    //                 Hidden::make('vendedor_id'),
    //                 DatePicker::make('fecha_visita')
    //                     ->default(now()->format('Y-m-d'))
    //                     ->rules([
    //                         fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
    //                             if (
    //                                 empty($get('id')) &&
    //                                 !empty($get('fecha_visita')) &&
    //                                 $get('fecha_visita') < now()->format('Y-m-d')
    //                             ) {
    //                                 $fail("La fecha de visita debe ser posterior a la fecha actual.");
    //                             }
    //                         },
    //                     ])
    //                     ->required()
    //                     ->validationMessages(Messages::getMessagesForFields(['required' => []], 'fecha de visita'))
    //                     ->label('Fecha de visita'),
    //                 Toggle::make('agregar_indicaciones')
    //                     ->label('Agregar indicaciones')
    //                     ->live()
    //                     ->default(false),
    //                 RichEditor::make('indicaciones')
    //                     ->label('Indicaciones')
    //                     ->visible(fn(Get $get) => $get('agregar_indicaciones'))
    //                     ->columnSpanFull()
    //                     ->toolbarButtons([
    //                         'blockquote',
    //                         'bold',
    //                         'bulletList',
    //                         'h2',
    //                         'h3',
    //                         'italic',
    //                         'link',
    //                         'orderedList',
    //                         'redo',
    //                         'strike',
    //                         'underline',
    //                         'undo',
    //                     ]),
    //             ])
    //             ->columns(2),
    //     ];
    // }

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Repeater::make('visitas')
    //                 ->schema([
    //                     Select::make('cliente_id')
    //                         ->label('Cliente')
    //                         ->relationship('cliente', 'razon_social')
    //                         ->searchable()
    //                         ->preload()
    //                         ->live()
    //                         ->afterStateUpdated(
    //                             function (Get $get, callable $set) {
    //                                 Log::info("Actual: " . $get('cliente_id'));
    //                                 $set('vendedor_id', Cliente::find($get('cliente_id'))->vendedor_id ?? null);
    //                             }
    //                         )
    //                         ->required()
    //                         ->validationMessages(Messages::getMessagesForFields(['required' => []], 'cliente')),
    //                     TextInput::make('vendedor_id'),
    //                     DatePicker::make('fecha_visita')
    //                         ->default(now()->format('Y-m-d'))
    //                         ->rules([
    //                             fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
    //                                 if (
    //                                     empty($get('id')) &&
    //                                     !empty($get('fecha_visita')) &&
    //                                     $get('fecha_visita') < now()->format('Y-m-d')
    //                                 ) {
    //                                     $fail("La fecha de visita debe ser posterior a la fecha actual.");
    //                                 }
    //                             },
    //                         ])
    //                         ->required()
    //                         ->validationMessages(Messages::getMessagesForFields(['required' => []], 'fecha de visita'))
    //                         ->label('Fecha de visita'),
    //                     Toggle::make('agregar_indicaciones')
    //                         ->label('Agregar indicaciones')
    //                         ->live()
    //                         ->default(false),
    //                     RichEditor::make('indicaciones')
    //                         ->label('Indicaciones')
    //                         ->visible(fn(Get $get) => $get('agregar_indicaciones'))
    //                         ->columnSpanFull()
    //                         ->toolbarButtons([
    //                             'blockquote',
    //                             'bold',
    //                             'bulletList',
    //                             'h2',
    //                             'h3',
    //                             'italic',
    //                             'link',
    //                             'orderedList',
    //                             'redo',
    //                             'strike',
    //                             'underline',
    //                             'undo',
    //                         ]),
    //                 ])
    //                 ->columns(2),
    //         ])->columns(1);
    // }

    protected function obtenerFormulario()
    {
        // return ComponentContainer::make()
        //     ->schema($this->getFormSchema());
        return $this->getFormSchema();
    }

    // public function render(): View
    // {
    //     return view(static::$view, [
    //         'form' => $this->obtenerFormulario(),
    //     ]);
    // }

    public function save(): void
    {
        $data = $this->form->getState();
        // Process the form data (e.g., save to database)
        // You can access the form data using $data array
        // Example:
        // YourResourceName::create($data);

        $this->notify('success', 'Form submitted successfully!');
    }
}
