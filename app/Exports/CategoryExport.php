<?php

namespace App\Exports;

use App\Models\loaisapham;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return loaisapham::all();
    }
}
