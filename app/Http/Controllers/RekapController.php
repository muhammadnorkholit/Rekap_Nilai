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
        $tahun_ajaran = Request()->tahun_ajaran;

          if (Request()->get('filter') && Request()->get('tahun_ajaran') && Request()->get('id') ) {
        $siswa = DB::table('siswa')->join("jurusan","siswa.id_jurusan","jurusan.id")->where("siswa.id",Request()->id)->first();
        $rekap = DB::table('data_rekap')
        ->where('tingkatan',$siswa->tingkatan)
        ->where('mapel',Request()->mapel)
        ->where('jurusan',$siswa->jurusan)
        ->where('no_kelas',$siswa->no_kelas)
        ->where('id_ajaran',$tahun_ajaran)->get();


            if(count($rekap) == 0){
                return redirect()->back()->with('alert','Data rekap tidak ditemukan');
            }

        }
        // else{
        //         return redirect('/admin/panel/rekap')->with('alert','Data rekap tidak ditemukan');

        // }



        $mapel = DB::table('mapel')->get();
        $jurusan = DB::table('jurusan')->get();
        $siswa = DB::table('siswa')->select("tingkatan","no_kelas","jurusan","siswa.id")->join("jurusan","siswa.id_jurusan","jurusan.id")->groupBy("id_jurusan")->groupBy("tingkatan")->groupBy("no_kelas")->get();
         $tahun_ajaran = DB::table('tahun_ajaran')->groupBy('tahun')->orderBy('id')->get();

        return view('admin.rekap.index',compact('tahun_ajaran','rekap','mapel','jurusan',"siswa"));
    }
    

     public function print()
     {
                $rekap = [];

        if(Request()->has('filter')){
            $rekap = DB::table('data_rekap')
            ->where('tingkatan',Request()->kelas)
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
        $siswa = DB::table('siswa')->select("tingkatan","no_kelas","jurusan","siswa.id")->join("jurusan","siswa.id_jurusan","jurusan.id")->groupBy("id_jurusan")->groupBy("tingkatan")->groupBy("no_kelas")->get();
        
        // return view('admin.rekap.print',compact('rekap','mapel','jurusan',"siswa"));


        // return view('admin.rekap.print',compact('rekap','mapel','jurusan',"siswa"));

         $tahun_ajaran = DB::table('tahun_ajaran')->orderBy('id')->get();

        return view('admin.rekap.print',compact('rekap','mapel','jurusan',"siswa",'tahun_ajaran'));

     }


    public function create()
    {
         $mapel = DB::table('mapel')->get();
         $siswa = DB::table('siswa')->get();
         $tahun = DB::table('tahun_ajaran')->get();
        return view('admin.rekap.create',compact('mapel','siswa', 'tahun'));

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
            'siswa'=>'required',
            'mapel'=>'required',
            'total_jawaban_b'=>'required',
            'total_jawaban_s'=>'required',
            'rata_rata'=>'required'
        ]);
        $siswa = Request()->siswa;
        $mapel = Request()->mapel;
        $tahun = Request()->tahun;
        $total_jawaban_b = Request()->total_jawaban_b;
        $total_jawaban_s = Request()->total_jawaban_s;
        $rata_rata = Request()->rata_rata;

        $month = date('m');
        if($month <= '06'){
            $tahun = date('Y',strtotime("-1 Year"))."/".date('Y');;
            $semester = "genap";
        }else{
             $tahun = date('Y')."/".date('Y',strtotime("+1 year"));
            $semester = "ganjil";
        }
        $id_ajaran = Tahun_Ajaran::where('tahun',$tahun)->where('semester',$semester)->first()->id;

        if(!$id_ajaran)return;

        DB::table('rekap')->insert([
            'id_siswa'=>$siswa,
            'id_mapel'=>$mapel,
            'id_ajaran'=>$id_ajaran,
            'total_jawaban_b'=>$total_jawaban_b,
            'total_jawaban_s'=>$total_jawaban_s,
            'rata_rata'=>$rata_rata,
        ]);
        // dd($request);
        return redirect('/admin/panel/rekap')->with('alert','Berhasil menambah data rekap');
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
