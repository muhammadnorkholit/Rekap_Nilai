<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Ujian;
use Illuminate\Http\Request;

class JenisUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Jenis_Ujian::paginate(20);
         return view('admin.jenis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate(
            [
                'jenis' => 'required',
            ],
            [
                'Nama Jenis UJian Tidak Boleh kosong'
            ]
        );

        $jenis = (Request()->jenis);

        // insert data to database
        Jenis_Ujian::create([
            'jenis' => $jenis,
        ]);

        return redirect('/admin/panel/jenis-ujian')->with('alert','Berhasil Menambah Jenis Ujian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis_Ujian  $jenis_Ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis_Ujian $jenis_Ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis_Ujian  $jenis_Ujian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis_Ujian::find($id);
        return view('admin.jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis_Ujian  $jenis_Ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis_Ujian $jenis_Ujian)
    {
        Request()->validate(
            [
                'jenis' => 'required',
            ],
            [
                'Nama Jenis UJian Tidak Boleh kosong'
            ]
        );

        $jenis = (Request()->jenis);

        // insert data to database
        $jenis_Ujian->update([
            'jenis' => $jenis,
        ]);


        return redirect('/admin/panel/jenis-ujian')->with('alert', 'Berhasil Mengedit jenis ujian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis_Ujian  $jenis_Ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_Ujian = Jenis_Ujian::find($id)->delete();
        return redirect()->back()->with('alert', 'jenis ujian Berhasil Di Hapus');
    }
}
