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
        if (isset($data['agreement_date'])) {
            $data['agreement_date']['begin'] = date('Y-m-d', strtotime($data['agreement_date']['begin']));
            $data['agreement_date']['end'] = date('Y-m-d', strtotime($data['agreement_date']['end']));
        }
        $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);
        $clients = Client::filter($filter)->get();
        return view('admin.clients.index', compact('clients'));
    }
}
