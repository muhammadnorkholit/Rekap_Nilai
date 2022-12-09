<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RekapImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importRekap(Request $request)
    {
       
        Excel::import(new RekapImport, $request->file('file')->store('files'));
        return  redirect()->back();
    }
}
