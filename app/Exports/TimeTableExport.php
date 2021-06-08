<?php

namespace App\Exports;
use Illuminate\Support\Collection;
use App\Models\TimeTable;
use Maatwebsite\Excel\Concerns\FromCollection;

class TimeTableExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TimeTable::all();
    }
}
