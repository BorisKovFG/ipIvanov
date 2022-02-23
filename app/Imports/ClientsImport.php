<?php

namespace App\Imports;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ClientsImport implements ToCollection, WithHeadingRow
{

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row->filter()->isNotEmpty()) {
                $date = Date::excelToDateTimeObject($row['data_dogovora'])->format('Y-m-d');
                $client = Client::firstOrCreate([
                    'name' => $row['naimenovanie'],
                    'agreement_date' => $date,
                    'delivery_cost' => $row['stoimost_postavki'],
                    'region' => $row['region'],
                ]);
                print_r($client->id . ":" . $client->name . " imported \n");
            }
        }
        print_r("Import has finished\n");
    }
}
