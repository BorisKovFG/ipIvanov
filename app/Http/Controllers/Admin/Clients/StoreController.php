<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Clients\StoreRequest;
use App\Models\Client;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['agreement_date'] = date('Y-m-d', strtotime($data['agreement_date']));
        $client = Client::firstOrCreate($data);
        return redirect()->route('admin.clients.show', compact('client'));
    }
}
