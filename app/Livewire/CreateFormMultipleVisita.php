<?php

namespace App\Livewire;

use App\Models\Visita;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

// Filament
use Filament\Forms;

use Exception;

class CreateFormMultipleVisita extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    // public Post $post;
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
                    Forms\Components\Repeater::make('visitas')
                        ->schema(
                            Visita::obtener_componentes_formulario_rapido()
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

    protected function datos_validos()
    {
        if (empty($this->form->getState()['visitas'])) {
            session()->flash('alert', 'Debe registrar al menos una visita');
            $this->form->fill();
            return false;
        }

        if ($this->hay_fechas_repetidos($this->form->getState()['visitas'])) {
            session()->flash('alert', 'Se encontraron visitas al mismo cliente para el mismo día más de una vez');
            return false;
        }

        return true;
    }


    public function create(): void
    {
        if(!$this->datos_validos()) return;

        if (!$this->registrar_visitas($this->form->getState()['visitas'])) {
            session()->flash('alert', 'Ocurrio un error al registrar los datos');
        } else {
            session()->flash('alert', 'Se registraron los datos correctamente');
            $this->form->fill();
        }
    }

    protected function registrar_visitas(array $data): bool
    {
        try {
            foreach ($data as $visita) {
                unset($visita['agregar_indicaciones']);
                Visita::create($visita);
            }
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function render()
    {
        return view('livewire.create-form-multiple-visita');
    }
}
