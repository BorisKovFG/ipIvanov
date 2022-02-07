<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CultureGroup\IndexRequest;
use App\Models\CultureGroup;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        if (!empty($data) && $data['status'] === 'deleted') { // TODO find better answer for this if
            $cultureGroups = CultureGroup::onlyTrashed()->get();
        }
        else {
            $cultureGroups = CultureGroup::all();
        }
        return view('admin.culturegroups.index', compact('cultureGroups'));
    }
}
