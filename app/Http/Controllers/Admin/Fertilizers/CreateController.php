<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\CultureGroup;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $cultureGroups = CultureGroup::all();
        $fertilizer = new Fertilizer(); //i do not know it is right or not to use exemplar to polimorfizm for one form
        return view('admin.fertilizers.create', compact('cultureGroups', 'fertilizer'));
    }
}
