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
     $tahun_ajaran = Request()->tahun_ajaran;
     
     if (Request()->has('filter') && Request()->has('tahun_ajaran') && Request()->has('id') ) {
            $data = DB::table('siswa')->join("jurusan","siswa.id_jurusan","jurusan.id")->where("siswa.id",Request()->id)->first();
        $siswa = DB::table('siswa')
        ->select('jurusan','siswa.*')
         ->join('jurusan','siswa.id_jurusan','jurusan.id')
        ->where('tingkatan',$data->tingkatan)
        ->where('id_jurusan',$data->id)
        ->where('no_kelas',$data->no_kelas)
        ->orderBy('nama','asc')
        ->where('tahun_ajaran',$tahun_ajaran)->get();
        if(count($siswa) == 0){
                return redirect()->back()->with('alert','Data siswa tidak ditemukan');
            }
        }

        $jurusan = DB::table('jurusan')->get();
         $data = DB::table('siswa')->select("tingkatan","no_kelas","jurusan","siswa.id")->join("jurusan","siswa.id_jurusan","jurusan.id")->groupBy("id_jurusan")->groupBy("tingkatan")->groupBy("no_kelas")->get();
         $tahun_ajaran = DB::table('tahun_ajaran')->groupBy('tahun')->orderBy('id')->get();
        return view('admin.siswa.index',compact('siswa','jurusan',"data",'tahun_ajaran'));
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
        $month = date('m');
        if($month <= '06'){
            $tahun = date('Y',strtotime("-1 Year"))."/".date('Y');;
            $semester = "ganjil";
        }else{
             $tahun = date('Y')."/".date('Y',strtotime("+1 year"));
            $semester = "genap";
        }
        $id_Ajaran = DB::table('tahun_ajaran')->where('tahun',$tahun)->where('semester',$semester)->first()->id;
        if(!$id_Ajaran)return;
        DB::table('siswa')->insert([
            'nama'=>$nama,
            'nisn'=>$nisn,
            'tingkatan'=>$kelas,
            'id_jurusan'=>$idJurusan,
            'no_kelas'=>$nokelas,
            'no_peserta'=>$no_peserta,
            'tahun_ajaran'=>$tahun
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
            'tingkatan'=>$kelas,
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
