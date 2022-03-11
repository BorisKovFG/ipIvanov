<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Jobs\ImportFertilizersJob;
use App\Models\ImportStatus;
use Exception;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function __invoke(ImportRequest $request)
    {
        $data = $request->validated();
        $listOfFertilizers = $data['import_fertilizers'];
        $listOfFertilizersPath = Storage::put('/fertilizers', $listOfFertilizers);
        $userImported = auth()->user()->id;
        $importStatus = ImportStatus::create(['user_id' => $userImported]);
        ImportFertilizersJob::dispatchNow($listOfFertilizersPath, $importStatus);
        return redirect()->route('admin.fertilizers.index')->with('status', 'Данные импортируются');
    }
}
