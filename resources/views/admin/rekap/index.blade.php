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
                        <h6 class="h2 text-white d-inline-block mb-0">Rekap Nilai</h6>
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
        <div class="d-flex justify-content-end">
            <button data-target="#import" data-toggle="collapse" class="btn btn-success mb-2    ">Import </button>
            @if (Request()->has('filter'))
                <button data-target="#filter" data-toggle="collapse" class="btn btn-success mb-2">Filter </button>
            @endif
        </div>

        <div class="align-items-start card bg-default shadow collapse navbar-collapse {{ Request()->filter && count($rekap) > 0 ? '' : 'show' }} "
            id="filter">
            <div class="card-header w-100   bg-transparent border-0">
                <h2 class="text-white">Filter Rekap Nilai </h2>
                <form class="d-block " action="/admin/panel/rekap" method="get">
                    <div class="row m-0  w-100 align-items-end">
                        <div class="col-3 p-1 my-2 pr-0">
                            <label class="text-white" for="">Mapel</label>
                            <select name="mapel" class="form-control m-0" id="">
                                <option value="" holder>Pilih Mapel</option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->mapel }}">{{ $m->mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 p-1 my-2 pr-0">
                            <label class="text-white" for="">No Kelas <small>(kosongi jika tidak
                                    ada)</small></label>
                            <select name="nokelas" class="form-control m-0" id="">
                                <option value="" holder>Pilih No Kelas</option>
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
                        <div class="col-3 p-1 my-2 pr-0">
                            <label class="text-white" for="">Jurusan</label>
                            <select name="jurusan" class="form-control m-0" id="">
                                <option value="" holder>Pilih Jurusan</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->jurusan }}">{{ $j->jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 p-1 my-2">
                            <button name="filter" value="true" class="btn btn-primary m-0">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-default shadow collapse align-items-start navbar-collapse   " id="import">
            <div class="card-header  bg-transparent border-0">
                <h2 class="text-white">Filter Import</h2>
                <form class="d-block " action="/admin/panel/rekapImport" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row w-100 align-items-end">
                        <div class="col-lg-4 pr-0">
                            <label class="text-white" for="">Pilih Mapel</label>
                            <select name="mapel" class="form-control m-0" id="">
                                <option value="" holder>Pilih Mapel</option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->id }}">{{ $m->mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <label class="text-white" for="">Pilih File Nilai</label>
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



                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark" style="color: text-white;">
                                    <tr>
                                        <th scope="col" class="sort">No</th>
                                        <th scope="col" class="sort">Nama</th>
                                        <th scope="col" class="sort">Nisn</th>
                                        <th scope="col" class="sort">Kelas</th>
                                        <th scope="col" class="sort">Mapel</th>
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
                                                <span class="text-capitalize fw-bold">{{ $r->nama }}</span>
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
                                                {{ $r->mapel }}
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
                                                <a class="btn btn-info"
                                                    href="/admin/panel/rekap/edit/{{ $r->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#hapus{{ $r->id }}"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                            <form action="/admin/panel/rekap/{{ $r->id }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal fade" id="hapus{{ $r->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-notification"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                        role="document">
                                                        <div class="modal-content bg-gradient-danger">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title" id="modal-title-notification">
                                                                    {{ $r->nama }}</h6>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="py-3 text-center">
                                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                                    <h4 class="heading mt-4">Anda yakin akan hapus rekap
                                                                        nilai,
                                                                        {{ $r->nama }} ??</h4>
                                                                    <p>Data yang sudah di hapus tidak akan bisa di
                                                                        kembalikan!!
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-white"><i
                                                                        class="fa fa-trash"></i></button>
                                                                <button type="button"
                                                                    class="btn btn-link text-white ml-auto"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="m-3 text-right">
                            <hr class="border-white ">
                            {{ $rekap->links() }}


                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
