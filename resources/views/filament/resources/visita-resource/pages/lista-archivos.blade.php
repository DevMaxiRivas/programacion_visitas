<x-filament-panels::page>
    <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
        <thead class="divide-y divide-gray-200 dark:divide-white/5">
            <tr class="bg-gray-50 dark:bg-white/5">
                <th
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-page-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                wire:key="YZ2txgvzIr8XZY3PceMc.table.bulk-select-page.checkbox.IlsSyIlRik99kuKN"
                                x-bind:checked="const recordsOnPage = getRecordsOnPage()
                                
                                if (recordsOnPage.length & amp; & amp; areRecordsSelected(recordsOnPage)) {
                                    $el.checked = true
                                
                                    return 'checked'
                                }
                                
                                $el.checked = false
                                
                                return null"
                                x-on:click="toggleSelectRecordsOnPage">

                            <span class="sr-only">
                                Seleccionar/deseleccionar todos los elementos para las acciones masivas.
                            </span>

                        </label>
                    </div>
                </th>






                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-cliente.razon-social"
                    style=";">
                    <span aria-label="Cliente" role="button" tabindex="0"
                        wire:click="sortTable('cliente.razon_social')"
                        x-on:keydown.enter.prevent.stop="$wire.sortTable('cliente.razon_social')"
                        x-on:keydown.space.prevent.stop="$wire.sortTable('cliente.razon_social')"
                        class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-start">
                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                            Cliente
                        </span>

                        <svg class="fi-ta-header-cell-sort-icon h-5 w-5 shrink-0 transition duration-75 text-gray-400 dark:text-gray-500 group-hover:text-gray-500 group-focus-visible:text-gray-500 dark:group-hover:text-gray-400 dark:group-focus-visible:text-gray-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"></path>
                        </svg>

                    </span>
                </th>

                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-fecha-visita"
                    style=";">
                    <span aria-label="Fecha de Visita" role="button" tabindex="0"
                        wire:click="sortTable('fecha_visita')"
                        x-on:keydown.enter.prevent.stop="$wire.sortTable('fecha_visita')"
                        x-on:keydown.space.prevent.stop="$wire.sortTable('fecha_visita')"
                        class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-start">
                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                            Fecha de Visita
                        </span>

                        <svg class="fi-ta-header-cell-sort-icon h-5 w-5 shrink-0 transition duration-75 text-gray-400 dark:text-gray-500 group-hover:text-gray-500 group-focus-visible:text-gray-500 dark:group-hover:text-gray-400 dark:group-focus-visible:text-gray-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"></path>
                        </svg>

                    </span>
                </th>

                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-estado"
                    style=";">
                    <span aria-label="Estado" role="button" tabindex="0" wire:click="sortTable('estado')"
                        x-on:keydown.enter.prevent.stop="$wire.sortTable('estado')"
                        x-on:keydown.space.prevent.stop="$wire.sortTable('estado')"
                        class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-start">
                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                            Estado
                        </span>

                        <svg class="fi-ta-header-cell-sort-icon h-5 w-5 shrink-0 transition duration-75 text-gray-400 dark:text-gray-500 group-hover:text-gray-500 group-focus-visible:text-gray-500 dark:group-hover:text-gray-400 dark:group-focus-visible:text-gray-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"></path>
                        </svg>

                    </span>
                </th>

                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-vendedor.name"
                    style=";">
                    <span aria-label="Vendedor" role="button" tabindex="0" wire:click="sortTable('vendedor.name')"
                        x-on:keydown.enter.prevent.stop="$wire.sortTable('vendedor.name')"
                        x-on:keydown.space.prevent.stop="$wire.sortTable('vendedor.name')"
                        class="group flex w-full items-center gap-x-1 cursor-pointer whitespace-nowrap justify-start">
                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                            Vendedor
                        </span>

                        <svg class="fi-ta-header-cell-sort-icon h-5 w-5 shrink-0 transition duration-75 text-gray-400 dark:text-gray-500 group-hover:text-gray-500 group-focus-visible:text-gray-500 dark:group-hover:text-gray-400 dark:group-focus-visible:text-gray-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"></path>
                        </svg>

                    </span>
                </th>


                <th aria-label="Acciones" class="fi-ta-actions-header-cell w-1"></th>







            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
            <tr 
            x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('58'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '58'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.58"
            >
                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="58" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 58 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>
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
                                                AGROTECNICA FUEGUINA S.A.C.I.F.
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>
                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
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
                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.58.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/58"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--success-50);--c-400:var(--success-400);--c-600:var(--success-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-success">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Completada
                                                </span>
                                            </span>


                                        </span>

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
                </td>
                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/58"
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
                            <a href="http://webserver:8085/panel/visitas/58/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>
            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('71'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '71'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.71">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="71" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 71 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.71.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/71"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                ROCHA JULIO ERNESTO
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.71.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/71"
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

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.71.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/71"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--warning-50);--c-400:var(--warning-400);--c-600:var(--warning-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-warning">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Pendiente
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.71.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/71"
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
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/71"
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
                            <a href="http://webserver:8085/panel/visitas/71/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('85'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '85'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.85">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="85" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 85 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.85.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/85"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                CASTAÑEDA MIGUEL ANGEL
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.85.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/85"
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

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.85.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/85"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--danger-50);--c-400:var(--danger-400);--c-600:var(--danger-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-danger">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Cancelada
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.85.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/85"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                THAMES LUIS
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/85"
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
                            <a href="http://webserver:8085/panel/visitas/85/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('7'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '7'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.7">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="7" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 7 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.7.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/7"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                INGENIERO MEDINA SA
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.7.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/7"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                jul. 28, 2025
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.7.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/7"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--danger-50);--c-400:var(--danger-400);--c-600:var(--danger-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-danger">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Cancelada
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.7.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/7"
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
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/7"
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
                            <a href="http://webserver:8085/panel/visitas/7/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('44'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '44'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.44">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="44" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 44 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.44.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/44"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                CASTAÑEDA MIGUEL ANGEL
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.44.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/44"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                jul. 28, 2025
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.44.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/44"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--success-50);--c-400:var(--success-400);--c-600:var(--success-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-success">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Completada
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.44.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/44"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                THAMES LUIS
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/44"
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
                            <a href="http://webserver:8085/panel/visitas/44/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('48'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '48'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.48">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="48" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 48 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.48.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/48"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                BENAVIDEZ EVERARDO GUILLERMO
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.48.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/48"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                jul. 27, 2025
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.48.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/48"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--success-50);--c-400:var(--success-400);--c-600:var(--success-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-success">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Completada
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.48.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/48"
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
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/48"
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
                            <a href="http://webserver:8085/panel/visitas/48/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('10'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '10'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.10">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="10" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 10 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.10.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/10"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                LUIS DAGUM CONSTRUCCIONES SA
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.10.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/10"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                jul. 26, 2025
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.10.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/10"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--success-50);--c-400:var(--success-400);--c-600:var(--success-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-success">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Completada
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.10.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/10"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                THAMES LUIS
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/10"
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
                            <a href="http://webserver:8085/panel/visitas/10/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('19'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '19'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.19">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="19" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 19 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.19.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/19"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                ROMERO Y CIA SRL
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.19.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/19"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                jul. 25, 2025
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.19.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/19"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--success-50);--c-400:var(--success-400);--c-600:var(--success-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-success">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Completada
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.19.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/19"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                THAMES LUIS
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/19"
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
                            <a href="http://webserver:8085/panel/visitas/19/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('82'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '82'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.82">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="82" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 82 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.82.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/82"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                M.S. BANCHIK Y CIA S.R.L.
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.82.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/82"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                jul. 25, 2025
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.82.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/82"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--warning-50);--c-400:var(--warning-400);--c-600:var(--warning-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-warning">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Pendiente
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.82.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/82"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                CUELLAR EDUARDO
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/82"
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
                            <a href="http://webserver:8085/panel/visitas/82/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>





            </tr>





            <tr x-bind:class="{
                'hidden': false & amp; & amp;isGroupCollapsed(null),
                'bg-gray-50 dark:bg-white/5': isRecordSelected('21'),
                '[&amp;>*:first-child]:relative [&amp;>*:first-child]:before:absolute [&amp;>*:first-child]:before:start-0 [&amp;>*:first-child]:before:inset-y-0 [&amp;>*:first-child]:before:w-0.5 [&amp;>*:first-child]:before:bg-primary-600 [&amp;>*:first-child]:dark:before:bg-primary-500': isRecordSelected(
                    '21'),
            }"
                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                wire:key="YZ2txgvzIr8XZY3PceMc.table.records.21">




                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-selection-cell w-1">
                    <div class="px-3 py-4">
                        <label class="flex">
                            <input type="checkbox"
                                class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-gray-400 disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 fi-ta-record-checkbox"
                                wire:loading.attr="disabled"
                                wire:target="gotoPage,nextPage,previousPage,removeTableFilter,removeTableFilters,reorderTable,resetTableFiltersForm,sortTable,tableColumnSearches,tableFilters,tableRecordsPerPage,tableSearch"
                                value="21" x-model="selectedRecords">

                            <span class="sr-only">
                                Seleccionar/deseleccionar el elemento 21 para las acciones masivas.
                            </span>

                        </label>

                    </div>
                </td>





                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-cliente.razon-social"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.21.column.cliente.razon_social">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/21"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                AGROTECNICA FUEGUINA S.A.C.I.F.
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-fecha-visita"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.21.column.fecha_visita">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/21"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex ">

                                    <div class="flex max-w-max" style="">
                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5  ">


                                            <span
                                                class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "
                                                style="">
                                                jul. 24, 2025
                                            </span>


                                        </div>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-estado"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.21.column.estado">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/21"
                            class="flex w-full disabled:pointer-events-none justify-start text-start">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">


                                <div class="flex gap-1.5 flex-wrap ">

                                    <div class="flex w-max" style="">
                                        <span
                                            style="--c-50:var(--danger-50);--c-400:var(--danger-400);--c-600:var(--danger-600);"
                                            class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-danger">





                                            <span class="grid">
                                                <span class="truncate">
                                                    Cancelada
                                                </span>
                                            </span>


                                        </span>

                                    </div>




                                </div>



                            </div>

                        </a>

                    </div>
                </td>

                <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-vendedor.name"
                    wire:key="YZ2txgvzIr8XZY3PceMc.table.record.21.column.vendedor.name">
                    <div class="fi-ta-col-wrp">
                        <a href="http://webserver:8085/panel/visitas/21"
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
                </td>


                <td
                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                    <div class="whitespace-nowrap px-3 py-4">
                        <div class="fi-ta-actions flex shrink-0 items-center gap-3 justify-end">
                            <a href="http://webserver:8085/panel/visitas/21"
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
                            <a href="http://webserver:8085/panel/visitas/21/editar"
                                class="fi-link group/link relative inline-flex items-center justify-center outline-none fi-size-sm fi-link-size-sm gap-1 fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                    class="fi-link-icon h-4 w-4 text-custom-600 dark:text-custom-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                    </path>
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                    </path>
                                </svg>

                                <span
                                    class="font-semibold text-sm text-custom-600 dark:text-custom-400 group-hover/link:underline group-focus-visible/link:underline"
                                    style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                    Editar
                                </span>


                            </a>

                        </div>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</x-filament-panels::page>
