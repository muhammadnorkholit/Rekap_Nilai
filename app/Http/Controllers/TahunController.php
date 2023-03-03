<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = DB::table('tahun_ajaran')->get();
        return view('admin.tahun.index', compact('tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tahun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate([
            'tahun'=>'required|unique:tahun_ajaran,tahun,',
            'semester'=>'required',
        ]);

        $tahun = Request()->tahun;
        $semester = Request()->semester;
   $ada = DB::table('tahun_ajaran')->where('semester',$semester)->where('tahun',$tahun)->count();
        if($ada > 0){
        return redirect()->back()->with('error','Tahun Ajaran Sudah Ada');
        }
        DB::table('tahun_ajaran')->insert([

            'tahun'=>$tahun,
            'semester'=>$semester,  
        ]);
        // dd($request);
        return redirect('/admin/panel/tahun_ajaran')->with('alert','Tahun Ajaran Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tahun = DB::table('tahun_ajaran')->where('id', $id)->first();
        return view('admin.tahun.edit', compact('tahun'));
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
        Request()->validate([
            'tahun'=>'required',
            'semester'=>'required',
        ]);

        $tahun = Request()->tahun;
        $semester = Request()->semester;
        $ada = DB::table('tahun_ajaran')->where('semester',$semester)->where('tahun',$tahun)->count();
        if($ada > 0){
        return redirect()->back()->withInput()->with('error','Tahun Ajaran Sudah Ada');
        }
        DB::table('tahun_ajaran')->where('id', $id)->update([

            'tahun'=>$tahun,
            'semester'=>$semester,  
        ]);
        // dd($request);
        return redirect('/admin/panel/tahun_ajaran')->with('alert','Tahun Ajaran Berhasil DiUbah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tahun_ajaran')->where('id',$id)->delete();
        return redirect()->back()->with('alert','Tahun Ajaran Berhasil Di Hapus');
    }
}
