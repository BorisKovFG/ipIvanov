<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CultureGroup\StoreRequest;
use App\Models\Client;
use App\Models\CultureGroup;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $cultureGroup = CultureGroup::firstOrCreate($data);
        return redirect()->route('admin.culturegroups.show', compact('cultureGroup'));
    }
}
