<x-filament-panels::page>
    <form wire:submit="cambiarVendedor">
        {{-- <input type="number" wire:model="vendedor"> --}}
        <select wire:model="vendedor" name="vendedor" id="vendedor">
            @foreach (\App\Models\User::where('rol', 'vendedor')->get() as $vendedor)
                <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
            @endforeach
        </select>
        <button type="submit">Cambiar</button>
    </form>
    @livewire(\App\Filament\Widgets\CalendarWidget::class, ['vendedor' => $this->record])
</x-filament-panels::page>
w