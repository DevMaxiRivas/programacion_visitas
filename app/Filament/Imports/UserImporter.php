<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Usuario';

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->label('Nombre y Apellido')
                ->requiredMapping()
                ->rules(['required'])
                ->example('Juan Perez'),
            ImportColumn::make('email')
                ->label('Correo Electrónico')
                ->requiredMapping()
                ->rules(['required', 'email'])
                ->example('juanperez@correo.com'),
            ImportColumn::make('cuil')
                ->label('CUIL')
                ->rules(['required', 'numeric', 'digits:11', 'unique:users,cuil'])
                ->requiredMapping()
                ->numeric()
                ->example('20304050602'),
            ImportColumn::make('rol')
                ->requiredMapping()
                ->rules(['required'])
                ->example('admin o vendedor')
        ];
    }

    public function resolveRecord(): ?User
    {
        return User::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'password' => bcrypt($this->data['cuil']),
        ]);

    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Tu importación de usuarios ha finalizado y ' . number_format($import->successful_rows) . ' ' . str('fueron importadas')->plural($import->successful_rows) . ' filas.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('filas')->plural($failedRowsCount) . ' no pudieron ser importadas.';
        }

        return $body;
    }
}
