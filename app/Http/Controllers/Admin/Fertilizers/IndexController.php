<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Client;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        if (!empty($data) && $data['status'] === 'deleted') { // TODO find better answer for this if
            $fertilizers = Fertilizer::onlyTrashed()->get();
        } else {
            $fertilizers = Fertilizer::all();
        }
        return view('admin.fertilizers.index', compact('fertilizers'));
    }
}
