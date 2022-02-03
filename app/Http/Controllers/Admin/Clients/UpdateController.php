<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Clients\UpdateRequest;
use App\Models\Client;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Client $client)
    {
        $data = $request->validated();
        $data['agreement_date'] = date('Y-m-d', strtotime($data['agreement_date']));
        $client->update($data);
        return redirect()->route('admin.clients.show', compact('client'));
    }
}
