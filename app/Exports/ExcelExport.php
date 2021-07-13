<?php

namespace App\Exports;

use App\Models\day_off;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return day_off::all();
    }
}
