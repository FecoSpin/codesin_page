<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class emailExport extends Controller
{
    //
    public function export() {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\emailExport, 'emails.xlsx');
    }
}
