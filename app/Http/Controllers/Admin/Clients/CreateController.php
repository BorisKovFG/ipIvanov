<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;


class CreateController extends Controller
{
    public function __invoke()
    {
        $client = new Client();
        return view('admin.clients.create', compact( 'client'));
    }
}
