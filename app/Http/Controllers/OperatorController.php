<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Hash;


class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operator = DB::table('users')->where('role', 'operator')->get();
        return view('admin.operator.index',compact('operator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.operator.create');
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
                'username'=>'required',
                'password'=>'required',
            ]
        );

        $nama = Str::upper(Request()->nama);
        $username = Request()->username;
        $password = Request()->password;
        $role = Request()->role;

      

        // insert data to database
        DB::table('users')->insert([
            'nama'=>$nama,
            'username'=>$username,
            'password'=>Hash::make('$nama'),
            'role'=>$role,
        ]);

        return redirect('/admin/panel/operator')->with('alert','Berhasil Menambah Operator');
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
        $operator = DB::table('users')->where('id',$id)->first();
        return view('admin.operator.edit',compact('operator'));
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
        DB::table('users')->where('id',$id)->delete();
        return redirect('/admin/panel/operator')->with('alert','Berhasil Menghapus operator');
    }
}
