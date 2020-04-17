<?php

namespace App\Exports;

use App\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class LaporanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Laporan::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NIM',
            'Plat Nomor',
            'Kode Proses',
            'Masui',
            'Keluar',
            'Created At',
            'Updated At'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
