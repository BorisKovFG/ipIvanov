<?php

namespace App\Imports;

use App\Models\Fertilizer;
//use Illuminate\Support\Collection;
//use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class FertilizersImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsOnError
{
    use Importable, SkipsFailures, SkipsErrors;

    public function model(array $row): Fertilizer
    {
        return new Fertilizer([
            'name' => $row['naimenovanie'],
            'norm_nitrogen' => $row['norma_azot'],
            'norm_phosphorus' => $row['norma_fosfor'],
            'norm_potassium' => $row['norma_kalii'],
            'culture_group_id' => $row['kultura_id'],
            'region' => $row['raion'],
            'price' => $row['stoimost'],
            'description' => $row['opisanie'],
            'purpose' => $row['naznacenie'],
        ]);
    }

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|unique:fertilizers,name',
            'norma_azot' => 'nullable|min:0',
            'norma_fosfor' => 'nullable|min:0',
            'norma_kalii' => 'nullable|min:0',
            'kultura_id' => 'nullable|exists:culture_groups,id',
            'raion' => 'nullable',
            'stoimost' => 'required|numeric|min:0',
            'opisanie' => 'nullable',
            'naznacenie' => 'nullable',
        ];
    }

    /**
     * @return array
     */
}

//    public function collection(Collection $collection)
//    {
//        foreach ($collection as $row) {
//            if ($row->filter()->isNotEmpty()) {
//                Fertilizer::firstOrCreate([
//                    'name' => $row['naimenovanie'],
//                    'norm_nitrogen' => $row['norma_azot'],
//                    'norm_phosphorus' => $row['norma_fosfor'],
//                    'norm_potassium' => $row['norma_kalii'],
//                    'culture_group_id' => $row['kultura_id'],
//                    'region' => $row['raion'],
//                    'price' => $row['stoimost'],
//                    'description' => $row['opisanie'],
//                    'purpose' => $row['naznacenie'],
//                ]);
//            }
//        }
//    }
