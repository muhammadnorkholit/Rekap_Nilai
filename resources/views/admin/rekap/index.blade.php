@extends('layout.dash')

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Rekap Nilai</h6>
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
        <div class="card bg-default shadow ">
            <div class="card-header  bg-transparent border-0">
                <h2 class="text-white">Filter Siswa</h2>
                <form class="d-block " action="/admin/panel/rekap" method="get">
                    <div class="row w-100 align-items-end">
                        <div class="col-auto pr-0">
                            <label for="">Mapel</label>
                            <select name="mapel" class="form-control m-0" id="">
                                <option value="" holder>Pilih Mapel</option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->mapel }}">{{ $m->mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto pr-0">
                            <label for="">No Kelas</label>
                            <select name="nokelas" class="form-control m-0" id="">
                                <option value="" holder>Pilih No Kelas</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-auto pr-0">
                            <label for="">Kelas</label>
                            <select name="kelas" class="form-control m-0" id="">
                                <option value="" holder>Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button name="filter" value="true" class="btn btn-primary m-0">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card bg-default shadow collapse align-items-start navbar-collapse" id="import">
            <div class="card-header  bg-transparent border-0">
                <h2 class="text-white">Filter Import</h2>
                <form class="d-block " action="/admin/panel/rekapImport" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row w-100 align-items-end">
                        <div class="col-lg-4 pr-0">
                            <label for="">Pilih Mapel</label>
                            <select name="mapel" class="form-control m-0" id="">
                                <option value="" holder>Pilih Mapel</option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->id }}">{{ $m->mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <label for="">Pilih File Nilai</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input   " name="file" id="importfile">
                                <label for="" class="custom-file-label">Pilih File</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary m-0">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if (count($rekap) > 0)
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <a href="/admin/panel/rekap/create" class="btn btn-primary">Tambah data</a>
                            <button data-target="#import" data-toggle="collapse" class="btn btn-primary">Import </button>

                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark" style="color: text-white;">
                                    <tr>
                                        <th scope="col" class="sort">No</th>
                                        <th scope="col" class="sort">Nama</th>
                                        <th scope="col" class="sort">Nisn</th>
                                        <th scope="col" class="sort">Kelas</th>
                                        <th scope="col" class="sort">Total Jawaban Benar</th>
                                        <th scope="col" class="sort">Total Jawaban Salah</th>
                                        <th scope="col" class="sort">Rata Rata</th>
                                        <th scope="col" class="sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($rekap as $r)
                                        <tr>
                                            <th scope="row">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="budget">
                                                {{ $r->nama }}
                                            </td>
                                            <td class="budget">
                                                {{ $r->nisn }}
                                            </td>
                                            <td>
                                                {{ $r->kelas }} <span
                                                    class="text-capitalize">{{ $r->jurusan }}</span>
                                                {{ $r->no_kelas }}
                                            </td>
                                            <td>
                                                {{ $r->total_jawaban_B }}
                                            </td>
                                            <td>
                                                {{ $r->total_jawaban_S }}
                                            </td>
                                            <td>
                                                {{ $r->rata_rata }}
                                            </td>
                                            <td>
                                                <a href="ubahSiswa"><i class="fa fa-edit"
                                                        style="color:skyblue ;"></i></a>
                                                <a href=""><i class="fa fa-trash"
                                                        style="color:color rgb(64, 0, 0) ;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $rekap->links() }}
                @endif

            </div>
        </div>
    </div>
@endsection
