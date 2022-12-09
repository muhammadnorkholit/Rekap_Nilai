<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RekapImport;
use App\Imports\JurusanImport;
use App\Imports\MapelImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importRekap(Request $request)
    {
       
        Excel::import(new RekapImport($request->mapel), $request->file('file')->store('files'));
        return  redirect()->back();
    }
    public function importMapel(Request $request)
    {
       
        Excel::import(new MapelImport, $request->file('file')->store('files'));
        return  redirect()->back();
    }
    public function importJurusan(Request $request)
    {
       
        Excel::import(new JurusanImport, $request->file('file')->store('files'));
        return  redirect()->back();
    }
}
