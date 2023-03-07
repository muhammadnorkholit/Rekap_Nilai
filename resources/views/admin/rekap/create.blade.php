@extends('layout.dash')

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Rekap</h6>
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
        <div class="row">
            <div class="col">
                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Tambah Data Rekap</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">


                            <form action="/admin/panel/rekap" method="POST">
                                @csrf
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h4><b>Siswa</b></h4>
                                            <select class="form-control" data-toggle="select" name="siswa">
                                                <option value="" holder>Pilih Siswa</option>
                                                @foreach ($siswa as $s)
                                                    <option value="{{ $s->id }}"> {{ $s->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h4><b>Mapel</b></h4>
                                            <select class="form-control" data-toggle="select" name="mapel">
                                                <option value="" holder>Pilih mapel</option>
                                                @foreach ($mapel as $m)
                                                    <option value="{{ $m->id }}"> {{ $m->mapel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h4><b>Jawaban Benar</b></h4>
                                            <input class="form-control" placeholder="Jawaban Benar" type="number"
                                                name="total_jawaban_b">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h4><b>Jawaban Salah</b></h4>
                                            <input class="form-control" placeholder="Jawaban Salah" type="number"
                                                name="total_jawaban_s">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h4><b>Rata Rata</b></h4>
                                            <input class="form-control" placeholder="Rata Rata" type="text"
                                                name="rata_rata">
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">Tambah</button>

                            </form>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
