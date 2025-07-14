<x-filament-panels::page>
    <form wire:submit="cambiarUser">
        {{-- <input type="number" wire:model="user"> --}}
        <select wire:model="user" name="user" id="user">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Cambiar</button>
    </form>
    @livewire(\App\Filament\Widgets\CalendarWidget::class, ['user' => $user])
</x-filament-panels::page>
