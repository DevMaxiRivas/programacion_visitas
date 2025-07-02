<x-filament-panels::page>
    <div class="overflow-x-auto">
        <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
            <thead class="divide-y divide-gray-200 dark:divide-white/5">
                <tr class="bg-gray-50 dark:bg-white/5">
                    <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6"
                        style=";">
                        <span aria-label="Nombre de Archivo" role="button" tabindex="0"
                            class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-start">
                            <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                Nombre de Archivo
                            </span>
                        </span>
                    </th>
                    {{-- <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6"
                        style=";">
                        <span aria-label="Accion" role="button" tabindex="0"
                            class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-start">
                            <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                Fecha de Visita
                            </span>
                        </span>
                    </th>
                    <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6"
                        style=";">
                        <span aria-label="Vendedor" role="button" tabindex="0"
                            class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-start">
                            <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                Vendedor
                            </span>
                        </span>
                    </th> --}}
                    <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6"
                        style=";">
                        <span aria-label="Acciones" role="button" tabindex="0"
                            class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-end">
                            <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                Acción
                            </span>
                        </span>
                    </th>
                    {{-- <th aria-label="Acciones" class="fi-ta-actions-header-cell w-1">Acción</th> --}}
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                @php
                    $i = 0;
                @endphp
            @foreach ($record->lista_imagenes() as $url => $nombre_imagen)
                <tr x-bind:class="{
                    'hidden': false & amp; & amp;isGroupCollapsed(null),
                    'bg-gray-50 dark:bg-white/5': isRecordSelected('58'),
                    '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                        '58'),
                }"
                    class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.records.58">
                    <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                        wire:key="YZ2txgvzIr8XZY3PceMc.table.record.58.column.cliente.razon_social">
                        <div class="fi-ta-col-wrp">
                            <a href="http://webserver:8085/panel/visitas/58"
                                class="flex w-full disabled:pointer-events-none justify-start text-start">
                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                    <div class="flex ">
                                        <div class="flex max-w-max" style="">
                                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">
                                                <span
                                                    class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                    style="">
                                                    {{ $nombre_imagen }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </td>
                    {{-- <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                        wire:key="YZ2txgvzIr8XZY3PceMc.table.record.58.column.fecha_visita">
                        <div class="fi-ta-col-wrp">
                            <a href="http://webserver:8085/panel/visitas/58"
                                class="flex w-full disabled:pointer-events-none justify-start text-start">
                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                    <div class="flex ">

                                        <div class="flex max-w-max" style="">
                                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                                <span
                                                    class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                    style="">
                                                    jul. 30, 2025
                                                </span>


                                            </div>

                                        </div>




                                    </div>



                                </div>

                            </a>

                        </div>
                    </td>
                    <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                        wire:key="YZ2txgvzIr8XZY3PceMc.table.record.58.column.vendedor.name">
                        <div class="fi-ta-col-wrp">
                            <a href="http://webserver:8085/panel/visitas/58"
                                class="flex w-full disabled:pointer-events-none justify-start text-start">
                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                    <div class="flex ">

                                        <div class="flex max-w-max" style="">
                                            <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                                <span
                                                    class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                    style="">
                                                    CURIOTTO FEDERICO
                                                </span>


                                            </div>

                                        </div>




                                    </div>



                                </div>

                            </a>

                        </div>
                    </td> --}}
                    <td
                        class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                        <div class="whitespace-nowrap px-3 py-4">
                            <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                                <a href="{{ route('visita.imagen', [$record, $i]) }}"
                                    class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1  fi-color-gray fi-ac-action fi-ac-link-action">
                                    <svg class="fi-link-icon h-4 w-4 text-gray-400 dark:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" data-slot="icon">
                                        <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span
                                        class="font-semibold text-sm text-gray-700 dark:text-gray-200 group-hover/link:underline group-focus-visible/link:underline"
                                        style="">
                                        Ver
                                    </span>
                                </a>
                                @php
                                    $i++;
                                @endphp
                                <a href="http://webserver:8085/panel/visitas/58/editar"
                                    class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                    {{-- <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                        class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" data-slot="icon">
                                        <path
                                            d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                        </path>
                                        <path
                                            d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                        </path>
                                    </svg> --}}

                                    {{-- <span
                                        class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                        style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                        Descargar
                                    </span> --}}
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament-panels::page>
