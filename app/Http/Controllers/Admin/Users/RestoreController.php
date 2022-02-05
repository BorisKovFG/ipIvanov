<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RestoreController extends Controller
{
    public function __invoke($id)
    {
        User::withTrashed()->findorFail($id)->restore();
        return redirect()->route('admin.users.index');
    }
}
