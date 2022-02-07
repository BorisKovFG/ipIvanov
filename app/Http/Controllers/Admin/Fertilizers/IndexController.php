<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Filters\Admin\FertilizerFilter;
use App\Http\Requests\Admin\Fertilizer\IndexRequest;
use App\Models\Fertilizer;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter($data)]);
        $fertilizers = Fertilizer::filter($filter)->get();
//        $query = Fertilizer::query();
//        if (isset($data['status'])) {
//            $query->onlyTrashed();
//            $fertilizers = $query->get();
//        } else {
//            $fertilizers = Fertilizer::all();
//        }
        return view('admin.fertilizers.index', compact('fertilizers'));
    }
}
