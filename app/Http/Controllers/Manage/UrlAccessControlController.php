<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUrlAccessControlRequest;
use App\Services\UrlAccessControlService;

class UrlAccessControlController extends Controller
{

    public function __construct(UrlAccessControlService $urlAccessControlService)
    {
        $this->urlAccessControlService = $urlAccessControlService;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUrlAccessControlRequest $request)
    {
        return $this->urlAccessControlService->update($request->all());
    }

}
