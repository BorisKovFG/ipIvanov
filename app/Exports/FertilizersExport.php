<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class FertilizersExport implements FromView, ShouldAutoSize, WithStyles
{
    public $fertilizers;

    public function __construct($fertilizers)
    {
        $this->fertilizers = $fertilizers;
    }

    public function view(): View
    {
        return view('admin.fertilizers.export', [
            'fertilizers' => $this->fertilizers
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
