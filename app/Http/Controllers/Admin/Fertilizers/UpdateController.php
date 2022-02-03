<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke()
    {
        return view('admin.fertilizers.index');
    }
}
