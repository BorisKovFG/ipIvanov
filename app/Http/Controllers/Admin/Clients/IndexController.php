<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Clients\FilterRequest;
use App\Models\Client;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        if (!empty($data) && $data['status'] === 'deleted') { // TODO find better answer for this if
            $clients = Client::onlyTrashed()->get();
        }
        else {
            $clients = Client::all();
        }
        return view('admin.clients.index', compact('clients'));
    }
}
