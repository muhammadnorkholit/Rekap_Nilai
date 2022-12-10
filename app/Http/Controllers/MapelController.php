<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mapel = DB::table('mapel')->simplePaginate(20);
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
                'mapel'=>'required',
                'kode_mapel'=>'required|unique:mapel,kode_mapel'
            ]
        );

        $mapel = Str::upper(Request()->mapel);
        $kode = Request()->kode_mapel;

      

        // insert data to database
        DB::table('mapel')->insert([
            'mapel'=>$mapel,
            'kode_mapel'=>$kode
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
        $mapel = DB::table('mapel')->where('id',$id)->first();
        return view('admin.mapel.edit',compact('mapel'));
       
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
                'mapel'=>'required',
                'kode_mapel'=>'required|unique:mapel,kode_mapel,'.$id
            ]
        );

        $mapel = Str::upper(Request()->mapel);
        $kode = Request()->kode_mapel;

      

        // insert data to database
        DB::table('mapel')->where('id',$id)->update([
            'mapel'=>$mapel,
            'kode_mapel'=>$kode
        ]);

        return redirect('/admin/panel/mapel')->with('alert','Berhasil Mengedit Mapel');
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
