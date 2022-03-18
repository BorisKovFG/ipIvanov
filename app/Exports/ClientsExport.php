<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ClientsExport implements FromView, ShouldAutoSize, WithStyles
{
    public $clients;

    public function __construct($clients)
    {
        $this->clients = $clients;
    }

    public function view(): View
    {
        return view('admin.clients.export', [
            'clients' => $this->clients
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
