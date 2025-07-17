<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Visita;
use App\Validation\Messages;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

// Filament
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;

use Closure;
use Exception;
use Illuminate\Validation\Rule;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    // public Post $post;
    public Visita $visita;

    public function mount(): void
    {
        $this->form->fill();
    }

    // public function form(Form $form): Form
    // {
    //     return $form
    //         ->schema(
    //             [
    //                 Forms\Components\Select::make('cliente_id')
    //                     ->label('Cliente')
    //                     ->relationship('cliente', 'razon_social')
    //                     ->searchable()
    //                     ->preload()
    //                     ->live()
    //                     ->afterStateUpdated(
    //                         function (Get $get, callable $set) {
    //                             $set('vendedor_id', Cliente::find($get('cliente_id'))->vendedor_id ?? null);
    //                         }
    //                     )
    //                     ->required()
    //                     ->validationMessages(Messages::getMessagesForFields(['required' => []], 'cliente')),
    //                 Forms\Components\TextInput::make('vendedor_id'),
    //                 Forms\Components\DatePicker::make('fecha_visita')
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
    //                     ->label('Fecha de visita')
    //             ]
    //         )
    //         ->statePath('data')
    //         ->model(Visita::class)
    //     ;
    // }

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\Repeater::make('visitas')
                        ->schema(
                            [
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
                                            if (
                                                empty($get('id')) &&
                                                !empty($get('fecha_visita')) &&
                                                Visita::where('fecha_visita', $get('fecha_visita'))->where('cliente_id', $get('cliente_id'))->exists()
                                            ) {
                                                $fail("Este cliente ya se encuentra con una visita programada para esa fecha");
                                            }
                                        },
                                    ])
                                    ->required()
                                    ->validationMessages(Messages::getMessagesForFields(['required' => []], 'fecha de visita'))
                                    ->label('Fecha de visita'),
                                Forms\Components\Toggle::make('agregar_indicaciones')
                                    ->label('Agregar indicaciones')
                                    ->live()
                                    ->default(false),
                                Forms\Components\RichEditor::make('indicaciones')
                                    ->label('Indicaciones')
                                    ->visible(fn(Get $get) => $get('agregar_indicaciones'))
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
                            ]
                        )
                        ->columns(2),
                ]
            )->columns(1)
            ->statePath('data')
            ->model(Visita::class);
    }

    protected function hay_fechas_repetidos(array $data)
    {
        $array_validador = array_map(function ($visita) {
            return $visita['cliente_id'] . '-' . $visita['fecha_visita'];
        }, $data);

        // Comprobar si hay duplicados
        if (count($array_validador) > count(array_unique($array_validador))) {
            return true;
        }

        return false;
    }

    public function create(): void
    {
        if($this->hay_fechas_repetidos($this->form->getState()['visitas']))
        {
            session()->flash('alert', 'Se encontraron visitas al mismo cliente para el mismo día más de una vez');
            return;
        }

        if(!$this->registrar_visitas($this->form->getState()['visitas'])){
            session()->flash('alert', 'Ocurrio un error al registrar los datos');
        } else {
            session()->flash('alert', 'Se registraron los datos correctamente');
            $this->form->fill();   
        }
    }

    protected function registrar_visitas(array $data): bool
    {
        Log::info('Registrar Visita');
        try {
            foreach($data as $visita)
            {
                unset($visita['agregar_indicaciones']);
                Visita::create($visita);
            }
        }catch(Exception $e){
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('livewire.create-post');
    }
}
