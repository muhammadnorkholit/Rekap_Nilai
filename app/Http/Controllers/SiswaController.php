<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $siswa = DB::table('siswa')
        ->select('jurusan','siswa.*')
        ->join('jurusan','siswa.id_jurusan','jurusan.id')->get();
        return view('admin.siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = DB::table('jurusan')->get();
        return view('admin.siswa.create',compact('jurusan'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Request()->validate([
            'nama'=>'required',
            'nisn'=>'required|unique:siswa,nisn',
            'kelas'=>'required',
            'jurusan'=>'required',
            'no_kelas'=>'required',
            'no_peserta'=>'required'
        ]);
        $nama = Str::upper(Request()->nama);

        $nisn = Request()->nisn;
        $kelas = Request()->kelas;
        $nokelas = Request()->no_kelas;
        $idJurusan = Request()->jurusan;
        $no_peserta = Request()->no_peserta;


        DB::table('siswa')->insert([
            'nama'=>$nama,
            'nisn'=>$nisn,
            'kelas'=>$kelas,
            'id_jurusan'=>$idJurusan,
            'no_kelas'=>$nokelas,
            'no_peserta'=>$no_peserta
        ]);
        // dd($request);
        return redirect('/admin/panel/siswa')->with('alert','Siswa Berhasil Ditambahkan');

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
          Request()->validate([
            'nama'=>'required',
            'nisn'=>'required|unique:siswa,nisn,'.$id,
            'kelas'=>'required',
            'jurusan'=>'required',
            'nopeserta'=>'required'
        ]);

        $nama = Str::upper(Request()->nama);
        $nisn = Request()->nisn;
        $kelas = Request()->kelas;
        $nokelas = Request()->nokelas;
        $idJurusan = Request()->jurusan;
        $nopeserta = Request()->nopeserta;


        DB::table('siswa')->where('id',$id)->update([
              'nama'=>'required',
            'nisn'=>'required|unique:siswa,nisn',
            'kelas'=>'required',
            'jurusan'=>'required',
            'no_kelas'=>$nokelas,
            'no_peserta'=>$nopeserta
        ]);
        return redirect('/siswa')->with('alert','Siswa Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('siswa')->where('id',$id)->delete();
        return redirect('/siswa')->with('alert','Siswa Berhasil Di Hapus');

    }
}
