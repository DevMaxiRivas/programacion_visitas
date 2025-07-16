<x-filament::page>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <button type="submit">Guardar</button>
    </form>
</x-filament::page>