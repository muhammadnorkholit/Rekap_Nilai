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
     $siswa = [];
     if (Request()->has('filter')) {
        
         $siswa = DB::table('siswa')
         ->select('jurusan','siswa.*')
         ->join('jurusan','siswa.id_jurusan','jurusan.id')
           ->where('kelas',Request()->kelas)
            ->where('jurusan',Request()->jurusan)
            ->orderBy('nama','asc');

            if(Request()->has('nokelas')){
                $siswa->where('no_kelas',Request()->nokelas);
            }
            
            $siswa = $siswa->get();
              if(count($siswa) == 0){
                return redirect()->back()->with('alert','Data siswa tidak ditemukan');
            }
        }

        $jurusan = DB::table('jurusan')->get();
        return view('admin.siswa.index',compact('siswa','jurusan'));
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
         $jurusan = DB::table('jurusan')->get();
         $siswa = DB::table('siswa')->where('id',$id)->first();
        return view('admin.siswa.edit',compact('jurusan','siswa'));
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
            'no_kelas'=>'required',
            'no_peserta'=>'required'
        ]);
        $nama = Str::upper(Request()->nama);

        $nisn = Request()->nisn;
        $kelas = Request()->kelas;
        $nokelas = Request()->no_kelas;
        $idJurusan = Request()->jurusan;
        $no_peserta = Request()->no_peserta;


        DB::table('siswa')->where('id',$id)->update([
        'nama'=>$nama,
            'nisn'=>$nisn,
            'kelas'=>$kelas,
            'id_jurusan'=>$idJurusan,
            'no_kelas'=>$nokelas,
            'no_peserta'=>$no_peserta
        ]);
        return redirect('/admin/panel/siswa')->with('alert','Siswa Berhasil Diedit');
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
        return redirect()->back()->with('alert','Siswa Berhasil Di Hapus');

    }
}
