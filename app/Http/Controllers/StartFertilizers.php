<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class StartFertilizers extends Controller
{
    public function __invoke()
    {
        if (User::where('email', '=', 'start@poop.test')->first()) {
            return redirect()->route('home');
        }
        Artisan::call('start:fertilizers');
        return redirect()->route('home');
    }
}
