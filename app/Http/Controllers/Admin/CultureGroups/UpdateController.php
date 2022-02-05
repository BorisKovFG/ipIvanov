<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CultureGroup\UpdateRequest;
use App\Models\CultureGroup;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CultureGroup $cultureGroup)
    {
        $data = $request->validated();
        $cultureGroup->update($data);
        return redirect()->route('admin.culturegroups.show', compact('cultureGroup'));
    }
}
