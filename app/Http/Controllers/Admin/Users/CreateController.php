<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;


class CreateController extends Controller
{
    public function __invoke()
    {
        $user = new User();
        $roles = Role::all();
        return view('admin.users.create', compact( 'user', 'roles'));
    }
}
