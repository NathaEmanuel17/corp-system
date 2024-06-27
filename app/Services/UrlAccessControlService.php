<?php

namespace App\Services;

use App\Repositories\UrlAccessControlRepository;

class UrlAccessControlService
{
    public function __construct( protected UrlAccessControlRepository $urlAccessControlRepository)
    {
        $this->urlAccessControlRepository = $urlAccessControlRepository;
    }

    public function update(array $updateUrlAccessControlRequest)
    {
        $id = $updateUrlAccessControlRequest['id'];
        $this->urlAccessControlRepository->update($id, $updateUrlAccessControlRequest);

        return redirect()->back()->with('message', 'Permissões atualizadas com sucesso!')->with('type', 'success');
    }

    
}
