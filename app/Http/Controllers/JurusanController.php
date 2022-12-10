<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = DB::table('jurusan')->simplePaginate(20);

        return view('admin.jurusan.index',compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('admin.jurusan.create');
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
                'jurusan'=>'required',
            ]
        );

        $jurusan = Str::upper(Request()->jurusan);

      

        // insert data to database
        DB::table('jurusan')->insert([
            'jurusan'=>$jurusan,
        ]);

        return redirect('/admin/panel/jurusan')->with('alert','Berhasil Menambah jurusan');


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
        $jurusan = DB::table('jurusan')->where('id',$id)->first();
        return view('admin.jurusan.edit',compact('jurusan'));
       
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
                'jurusan'=>'required',
            ]
        );

        $jurusan = Str::upper(Request()->jurusan);


     

        // insert data to database
        DB::table('jurusan')->where('id',$id)->update([
            'jurusan'=>$jurusan,
        ]);

        return redirect('/admin/panel/jurusan')->with('alert','Berhasil Mengedit jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jurusan')->where('id',$id)->delete();
        return redirect('/admin/panel/jurusan')->with('alert','Berhasil Menghapus jurusan');

    }
}
