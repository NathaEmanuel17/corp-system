<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\SaleItem;

class ClientRepository extends BaseRepository
{
    public function __construct(protected Client $client)
    {
        parent::__construct($client);
    }

    public function hasSaleItems(int $clientId): bool
    {
        return SaleItem::whereHas('sale', function ($query) use ($clientId) {
            $query->where('client_id', $clientId);
        })->exists();
    }

    public function getTotalClients(): int
    {
        return Client::count();
    }
}
