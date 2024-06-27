<?php

namespace App\Services;

use App\Repositories\ClientRepository;

class ClientService
{
    protected ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
       $this->clientRepository = $clientRepository;
    }

    public function paginate(int $perPage, array $filters = [])
    {
        if (isset($filters['cpf'])) {
            $filters['cpf'] = preg_replace('/\D/', '', $filters['cpf']);
        }

        $filteredFilters = FilterService::filter($filters, [
            'nome' => 'name'
        ]);

        return $this->clientRepository->paginate($perPage, $filteredFilters);
    }

    public function store(array $storeClientRequest)
    {
        $this->clientRepository->store($storeClientRequest);

        return redirect()->route('clients.index')
            ->with('message', 'Cliente cadastrado com sucesso!')
            ->with('type', 'success');
    }

    public function update(int $id, array $updateClientRequest)
    {
        $this->clientRepository->update($id, $updateClientRequest);

        return redirect()->back()->with('message', 'Cliente editado com sucesso!')->with('type', 'success');
    }
   
    public function delete(object $client)
    {
        if ($this->clientRepository->hasSaleItems($client->id)) {
            return redirect()->back()
                ->with('message', 'Não é possível excluir o cliente pois existem itens de venda associados a ele.')
                ->with('type', 'danger');
        }

        $this->clientRepository->delete($client->id);

        return redirect()->route('clients.index')
            ->with('message', 'Cliente excluído com sucesso!')
            ->with('type', 'success');
    }

    public function all()
    {
        return $this->clientRepository->all();
    }

    public function getTotalClients()
    {
        return $this->clientRepository->getTotalClients();
    }
}
