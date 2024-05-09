<?php

namespace App\Filament\Resources\ClientsResource\Pages;

use App\Filament\Resources\ClientsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClients extends ManageRecords
{
    protected static string $resource = ClientsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
