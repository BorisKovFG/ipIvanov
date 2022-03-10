<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['icon'] = Storage::disk('public')->put('/icons', $data['icon']);
        $user = User::firstOrCreate(['email' => $data['email']], $data);

        return redirect()->route('admin.users.show', compact('user'));
    }
}
