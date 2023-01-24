<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RekapImport;
use App\Imports\JurusanImport;
use App\Imports\MapelImport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importRekap(Request $request)
    {
       if (!Request()->has('file')) {
        return redirect()->back()->with('alert','File Harus Di pilih');
       }
       $import = new RekapImport;
        Excel::import($import, $request->file('file')->store('files'));


        if($import->getMessage()){
            return redirect()->back()->with('alert',$import->getMessage());
        }


        return  redirect()->back()->with('alert2','Berhasil Mengimport Data '." <br>
          Total Data Import :".$import->totalRows()." Data <br> Total Data Berhasil Di Import :".$import->rowsSuccess())." Data"
;
    }
    public function importMapel(Request $request)
    {
        if (!Request()->has('file')) {
            return redirect()->back()->with('alert','File Harus Di pilih');
           }
        Excel::import(new MapelImport, $request->file('file')->store('files'));
               return  redirect()->back()->with('alert','Berhasil Mengimport');
    }
    public function importJurusan(Request $request)
    {
        if (!Request()->has('file')) {
            return redirect()->back()->with('alert','File Harus Di pilih');
           }
        Excel::import(new JurusanImport, $request->file('file')->store('files'));
              return  redirect()->back()->with('alert','Berhasil Mengimport');
    }
    public function importSiswa(Request $request)
    {
        if (!Request()->has('file')) {
            return redirect()->back()->with('alert','File Harus Di pilih');
           }
        Excel::import(new SiswaImport, $request->file('file')->store('files'));
              return  redirect()->back()->with('alert','Berhasil Mengimport');
    }
}
