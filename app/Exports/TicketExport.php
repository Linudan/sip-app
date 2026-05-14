<?php

namespace App\Exports;

use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TicketExport extends ExcelExport implements WithStyles
{
    public function styles(Worksheet $sheet)
    {
        // Первая строка (заголовки) – жирным шрифтом
        return [1 => ['font' => ['bold' => true]]];
    }
}
