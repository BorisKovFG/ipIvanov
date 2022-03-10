<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Jobs\ImportFertilizersJob;
use Exception;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function __invoke(ImportRequest $request)
    {
        $data = $request->validated();
        $listOfFertilizers = $data['import_fertilizers'];
        $listOfFertilizersPath = Storage::put('/fertilizers', $listOfFertilizers);
        try {
            ImportFertilizersJob::dispatchNow($listOfFertilizersPath);
        } catch (Exception $e) {
            return redirect()->route('admin.fertilizers.index')->with('status', $e->getMessage());
        }
        return redirect()->route('admin.fertilizers.index')->with('status', 'Данные импортируются');
    }
}
