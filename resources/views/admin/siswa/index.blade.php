@extends('layout.dash')

@section('content')
    <div data-notify="container"
        class="alert {{ Session::has('alert') ? 'show' : '' }} alert-dismissible alert-success alert-notify animated fadeInDown"
        role="alert" data-notify-position="top-center">
        <span class="alert-icon ni ni-bell-55" data-notify="icon"></span>
        <div class="alert-text" <="" div=""> <span class="alert-title" data-notify="title"> Pemberitahuan</span>
            <span data-notify="message">{{ Session::get('alert') }}</span>
        </div>
    </div>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Siswa</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin/panel"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/admin/panel">Dashboards</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">

        <form class="d-block mb-2" style="text-align: end" action="/admin/panel/siswaImport" enctype="multipart/form-data"
            method="post">
            @csrf
            <input type="file" name="file" onchange="form.submit()" class="d-none" id="import">
            <label for="import" class="text-white m-0 btn btn-success mr-1">Import</label>
        </form>

        <div class="card bg-default shadow" id="filter">
            <div class="card-header  bg-transparent border-0">
                <h2 class="text-white">Filter siswa </h2>
                <form class="d-block " action="/admin/panel/siswa" method="get">
                    <div class="row  w-100 align-items-end">
                        <div class="col-3 p-1 my-2 pr-0">
                            <label class="text-white" for="">Jurusan</label>
                            <select name="jurusan" class="form-control m-0" id="">
                                <option value="" holder>Pilih Jurusan</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->jurusan }}">{{ $j->jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 p-1 my-2 pr-0">
                            <label class="text-white" for="">No Kelas <small> (kosongi jika tidak
                                    ada)</small></label>
                            <select name="nokelas" class="form-control m-0" id="">
                                <option value="" holder>Pilih No Kelas </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-3 p-1 my-2 pr-0">
                            <label class="text-white" for="">Kelas</label>
                            <select name="kelas" class="form-control m-0" id="">
                                <option value="" holder>Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>

                        <div class="col-3 p-1 my-2">
                            <button name="filter" value="true" class="btn btn-primary m-0">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (count($siswa) == 0 && Request()->has('filter'))
            <div class="card p-2">
                <h3 class="text-center m-0 text-gray-50">Tidak ada data siswa berdasarkan filter </h3>
            </div>
        @endif
        @if (count($siswa) > 0)
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <a href="/admin/panel/siswa/create" class="btn btn-primary">Tambah data</a>
                    <form class="d-inline-block" action="/admin/panel/siswa/export" method="post">
                        <button type="submit" class="btn btn-primary">Export
                        </button>
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
                                        <a class="btn btn-info" href="/admin/panel/siswa/{{ $s->id }}/edit"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#hapus{{ $s->id }}"><i class="fa fa-trash"></i></button>
                                    </td>

                                    {{-- delete --}}
                                    <form action="/admin/panel/siswa/{{ $s->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal fade" id="hapus{{ $s->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                role="document">
                                                <div class="modal-content bg-gradient-danger">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-title-notification">
                                                            {{ $s->nama }}</h6>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="py-3 text-center">
                                                            <i class="ni ni-bell-55 ni-3x"></i>
                                                            <h4 class="heading mt-4">Anda yakin akan hapus,
                                                                {{ $s->nama }} ??</h4>
                                                            <p>Data yang sudah di hapus tidak akan bisa di
                                                                kembalikan!!
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-white">Hapus</button>
                                                        <button type="button" class="btn btn-link text-white ml-auto"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    {{-- delete --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>
@endsection
