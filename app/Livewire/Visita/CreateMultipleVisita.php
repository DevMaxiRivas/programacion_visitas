<?php

namespace App\Livewire\Visita;

use App\Models\Cliente;
use App\Models\Visita;
use App\Validation\Messages;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreateMultipleVisita extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public Visita $visita;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Repeater::make('visitas')
                        ->schema(
                            [
                                Select::make('cliente_id')
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
                                TextInput::make('vendedor_id'),
                                DatePicker::make('fecha_visita')
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
                                Toggle::make('agregar_indicaciones')
                                    ->label('Agregar indicaciones')
                                    ->live()
                                    ->default(false),
                                RichEditor::make('indicaciones')
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

    public function create(): void
    {
        $data = $this->form->getState();
        
        $record = Visita::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.visita.create-visita');
    }

    // public function getCachedSubNavigation(): ?array
    // {
    //     return [
    //         'Crear visita',
    //     ];
    // }

    // public function getSubNavigationPosition(): ?string
    // {
    //     return 'before';
    // }
}
