<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\FilterRequest;
use App\Models\User;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        if (!empty($data) && $data['status'] === 'deleted') { // TODO find better answer for this if
            $users = User::onlyTrashed()->get();
        } else {
            $users = User::all();
        }
        return view('admin.users.index', compact('users'));
    }
}
