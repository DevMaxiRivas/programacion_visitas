<?php

namespace App\Filament\Imports;

use App\Models\Cliente;
use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Facades\Log;

class ClienteImporter extends Importer
{
    protected static ?string $model = Cliente::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('codigo')
                ->requiredMapping()
                ->numeric()
                ->label('Código del Cliente')
                ->example('12')
                ->rules(['required', 'integer', 'unique:clientes,codigo']),
            ImportColumn::make('razon_social')
                ->requiredMapping()
                ->rules(['required', 'string', 'unique:clientes,razon_social'])
                ->example('Empresa S.A.'),
            ImportColumn::make('vendedor')
                ->label('Código del Vendedor')
                ->requiredMapping()
                ->rules(['required', 'integer'])
                ->example('32')
                ->relationship(resolveUsing: function (string $state): ?User {
                    return User::query()
                        ->where('codigo_empleado', $state)
                        ->first();
                }),
        ];
    }

    public function resolveRecord(): ?Cliente
    {
        // return Cliente::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Cliente();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your cliente import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
