<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\CultureGroup;
use App\Models\Fertilizer;
use App\Models\User;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke($id)
    {

        Fertilizer::withTrashed()->findorFail($id)->restore();
        return redirect()->route('admin.fertilizers.index');    }
}
