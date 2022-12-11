<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapExport;

class ExportController extends Controller
{
    public function exportRekap()
    {
        return Excel::download(new RekapExport, Request()->kelas."_".str_replace(" ","_",Request()->jurusan)."_".Request()->nokelas."_Mapel_".Request()->mapel.'.xlsx');
    }
}
