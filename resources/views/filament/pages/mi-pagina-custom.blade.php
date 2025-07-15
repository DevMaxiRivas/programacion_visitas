<x-filament-panels::page>
    @if(!$vendedor->rol->is_admin())
        <h2>Asosciado a {{ $vendedor->name }}</h2>
    @endif


    <form wire:submit="cambiarUser">
        <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]"
            wire:key="MRCgmJcYajv58YZt02Y2.data.rol.Filament\Forms\Components\Select">
            <div data-field-wrapper="" class="fi-fo-field-wrp">
                <div class="grid gap-y-2">
                    <div class="flex items-center gap-x-3 justify-between ">
                        <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="data.rol">
                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                Vendedor
                            </span>
                        </label>
                    </div>
                    <div class="grid auto-cols-fr gap-y-2">
                        <div
                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-select">
                            <div class="fi-input-wrp-input min-w-0 flex-1">
                                <select wire:model="user" name="user" id="user" required
                                    class="fi-select-input block w-full border-none bg-transparent py-1.5 pe-8 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 ps-3">
                                    <option value="">
                                        Seleccione una opción
                                    </option>
                                    <option value={{ $user_actual->id }}>Todos</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if ($vendedor->id == $user->id) selected @endif>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <button
                                style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
                                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action"
                                type="submit">
                                <span class="fi-btn-label">
                                    Filtrar
                                </span>
                            </button>
                            {{-- <button type="submit" class="btn btn-primary">Cambiar</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @livewire(\App\Filament\Widgets\CalendarWidget::class, ['user' => $vendedor])
</x-filament-panels::page>
