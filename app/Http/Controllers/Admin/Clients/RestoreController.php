<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;


class RestoreController extends Controller
{
    public function __invoke($id)
    {
        Client::withTrashed()->findorFail($id)->restore();
        return redirect()->route('admin.clients.index');    }
}
