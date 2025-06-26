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
        $data['vendedor_id'] = Cliente::find($data['cliente_id'])->vendedor_id ?? auth()->id();
        return static::getModel()::create($data);
    }
}
