<?php

namespace App\Export;

use App\Report;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    public function view(): View
    {
        return view('ExportReport', ['report' => Report::all()]);
    }
}
