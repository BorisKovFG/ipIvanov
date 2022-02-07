<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Filters\Admin\ClientFilter;
use App\Http\Requests\Admin\Clients\IndexRequest;
use App\Models\Client;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);
        $clients = Client::filter($filter)->get();
        return view('admin.clients.index', compact('clients'));
    }
}
