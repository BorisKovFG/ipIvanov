<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CultureGroup;


class DestroyController extends Controller
{
    public function __invoke(CultureGroup $cultureGroup)
    {
        if ($cultureGroup->fertilizers()->count() !== 0) {
            redirect()->route('admin.culturegroups.index');
        } else {
            $cultureGroup->delete();
        }
        return redirect()->route('admin.culturegroups.index');
    }
}
