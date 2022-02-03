<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        $fertilizer->delete();
        return redirect()->route('admin.fertilizers.index');
    }
}
