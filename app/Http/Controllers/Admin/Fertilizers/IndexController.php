<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fertilizers = Fertilizer::all();
        return view('admin.fertilizers.index', compact('fertilizers'));
    }
}
