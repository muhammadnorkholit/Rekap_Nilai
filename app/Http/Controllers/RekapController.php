<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekap = [];

        if(Request()->has('filter')){
              $siswa = DB::table('siswa')->join("jurusan","siswa.id_jurusan","jurusan.id")->where("siswa.id",Request()->id)->first();
        $rekap = DB::table('data_rekap')
        ->where('kelas',$siswa->kelas)
        ->where('mapel',Request()->mapel)
        ->where('jurusan',$siswa->jurusan)
        ->where('no_kelas',$siswa->no_kelas)
        ->orderBy('nama','asc')->get();
      


            if(count($rekap) == 0){
                return redirect()->back()->with('alert','Data rekap tidak ditemukan');
            }

        }

            
        
        $mapel = DB::table('mapel')->get();
        $jurusan = DB::table('jurusan')->get();
        $siswa = DB::table('siswa')->select("kelas","no_kelas","jurusan","siswa.id")->join("jurusan","siswa.id_jurusan","jurusan.id")->groupBy("id_jurusan")->groupBy("kelas")->groupBy("no_kelas")->get();
        return view('admin.rekap.index',compact('rekap','mapel','jurusan',"siswa"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function print()
     {
                $rekap = [];

        if(Request()->has('filter')){
            $rekap = DB::table('data_rekap')
            ->where('kelas',Request()->kelas)
            ->where('mapel',Request()->mapel)
            ->where('jurusan',Request()->jurusan)
            ->orderBy('nama','asc');

            if(Request()->has('nokelas')){
                $rekap->where('no_kelas',Request()->nokelas);
            }
            $rekap = $rekap->get();

        }

            
        
        $mapel = DB::table('mapel')->get();
        $jurusan = DB::table('jurusan')->get();
        $siswa = DB::table('siswa')->select("kelas","no_kelas","jurusan","siswa.id")->join("jurusan","siswa.id_jurusan","jurusan.id")->groupBy("id_jurusan")->groupBy("kelas")->groupBy("no_kelas")->get();
        return view('admin.rekap.print',compact('rekap','mapel','jurusan',"siswa"));
     }


    public function create()
    {
         $jurusan = DB::table('jurusan')->get();
         $mapel = DB::table('mapel')->get();
         $siswa = DB::table('siswa')->get();
        return view('admin.rekap.create',compact('mapel','siswa','jurusan'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rekap')->where('id',$id)->delete();
        return redirect()->back()->with('alert','Data Berhasil Dihapus');
    }
}
