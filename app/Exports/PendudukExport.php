<?php

namespace App\Exports;

use App\Models\Penduduk;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class PendudukExport extends DefaultValueBinder implements FromView, ShouldAutoSize, WithCustomValueBinder
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View{
        $data = Penduduk::all();
        return view('admin.data-excel', [
            'data' => $data
        ]);
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'B' => NumberFormat::FORMAT_NUMBER,
    //         'C' => NumberFormat::FORMAT_NUMBER,
    //     ];
    // }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }
    
}
