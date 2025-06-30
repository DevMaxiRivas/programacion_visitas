<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;

class CreateVisita extends CreateRecord
{
    protected static string $resource = VisitaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        // Guardar archivo 1
    if (isset($data['url_archivos'])) {
        foreach ($data['url_archivos'] as $file) {
            $filePath = $file->store('visitas', 'public'); // Guardar en el disco público
        }
    }

    // Guardar archivo 2
    if (isset($data['url_imagenes'])) {
        foreach ($data['url_imagenes'] as $file) {
            $filePath = $file->store('visitas', 'public'); // Guardar en el disco público
        }
    }

        return static::getModel()::create($data);
    }
}
