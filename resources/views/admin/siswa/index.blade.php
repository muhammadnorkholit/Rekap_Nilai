@extends('layout.dash')

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Siswa</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboards</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <a href="/admin/panel/siswa/create" class="btn btn-primary">Tambah data</a>
                        <form class="d-inline-block" action="/admin/panel/siswa/import" method="post">
                            <button type="submit" class="btn btn-primary">Import
                                Siswa</button>
                        </form>
                        <form class="d-inline-block" action="/admin/panel/siswa/export" method="post">
                            <button type="submit" class="btn btn-primary">Export
                                Siswa</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark" style="color: text-white;">
                                <tr>
                                    <th scope="col" class="sort">No</th>
                                    <th scope="col" class="sort">Nama</th>
                                    <th scope="col" class="sort">Nisn</th>
                                    <th scope="col" class="sort">Kelas</th>
                                    <th scope="col" class="sort">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($siswa as $s)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="budget">
                                            <span class="fw-bold text-capitalize">{{ $s->nama }}</span>
                                        </td>
                                        <td class="budget">
                                            {{ $s->nisn }}

                                        </td>
                                        <td>
                                            {{ $s->kelas }} {{ $s->jurusan }} {{ $s->no_kelas }} 
                                        </td>
                                        <td>
                                            <a href="ubahSiswa"><i class="fa fa-edit" style="color:skyblue ;"></i></a>
                                            <a href=""><i class="fa fa-trash"
                                                    style="color:color rgb(64, 0, 0) ;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
