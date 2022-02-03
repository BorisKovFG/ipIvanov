<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\CultureGroup;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        $cultureGroups = CultureGroup::all();
        return view('admin.fertilizers.edit', compact('fertilizer', 'cultureGroups'));
    }
}
