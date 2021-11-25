<?php

namespace App\Exports;

use App\Models\Matriz;
use Maatwebsite\Excel\Concerns\FromCollection;


class MatrizExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Matriz::all();
    }
}
