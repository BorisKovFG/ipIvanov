<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class ContractController extends Controller
{
    public function __invoke(Client $client)
    {
        $phpWord = new PhpWord();

        $section = $phpWord->addSection();

        $section->addText('Справка', [
            'size' => 18, 'color' => '#000', 'bold' => true
        ]);
        $section->addText('');

        $section->addText('Подтверждает действительность заключение договора от ' .  $client->agreement_date .  ' с компанией ' . $client->name .
            ' на сумму ' . $client->delivery_cost, [
            'size' => 13, 'color' => '#545454', 'italic' => true
        ]);
        $section->addText('');

        $section->addText(date('d-m-Y', time()));

        $section->addText('С уважением, ИП Иванов. А. С.');

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('spravka.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('spravka.docx'));
    }
}
