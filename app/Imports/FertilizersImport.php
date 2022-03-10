<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FertilizersImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row->filter()->isNotEmpty()) {
                $fertilizer = Fertilizer::firstOrCreate([
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
        }
        print_r("Import has finished\n");
    }
}
