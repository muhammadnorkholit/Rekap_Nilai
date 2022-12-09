<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mapel = DB::table('mapel')->get();
        return view('admin.mapel.index',compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mapel.create');
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
                'nama'=>'required',
            ]
        );

        $nama = Request()->nama;
        $namaPendek = Request()->nama_pendek;

      

        // insert data to database
        DB::table('mapel')->insert([
            'nama'=>$nama,
            'nama_pendek'=>$namaPendek,
        ]);

        return redirect('/admin/panel/mapel')->with('alert','Berhasil Menambah Mapel');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.mapel.edit');
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         Request()->validate(
            [
                'nama'=>'required',
            ]
        );

        $nama = Request()->nama;
        $namaPendek = Request()->nama_pendek;


     

        // insert data to database
        DB::table('mapel')->where('id',$id)->update([
            'nama'=>$nama,
            'nama_pendek'=>$namaPendek,
        ]);

        return redirect('/admin/panel/mapel')->with('alert','Berhasil Menambah Mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mapel')->where('id',$id)->delete();
        return redirect('/admin/panel/mapel')->with('alert','Berhasil Menghapus Mapel');

    }
}
