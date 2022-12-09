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
                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Tambah Siswa</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">


                            <form action="/admin/panel/siswa" method="POST">
                                @csrf
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h4><b>Nama</b></h4>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Nama" type="text" name="nama">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4><b>Nisn</b></h4>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Nisn" type="text" name="nisn">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4><b>No Peserta</b></h4>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-number"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="no peserta" type="text" name="no_peserta">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4><b>Kelas</b></h4>
                                        <div class="form-group d-flex m-2 p-2">
                                            <div class="custom-control custom-radio m-1">
                                                <input name="kelas" class="custom-control-input" id="x" checked type="radio" value="x">
                                                <label class="custom-control-label" for="x">x</label>
                                            </div>
                                            <div class="custom-control custom-radio m-1">
                                                <input name="kelas" class="custom-control-input" id="xi" type="radio" value="xi">
                                                <label class="custom-control-label" for="xi">xi</label>
                                            </div>
                                            <div class="custom-control custom-radio m-1">
                                                <input name="kelas" class="custom-control-input" id="xii" type="radio" value="xii">
                                                <label class="custom-control-label" for="xii">xii</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4><b>No kelas</b></h4>
                                        <div class="form-group d-flex m-2 p-2">
                                            <div class="custom-control custom-radio m-1">
                                                <input name="no_kelas" class="custom-control-input" id="1" checked="" type="radio" value="1">
                                                <label class="custom-control-label" for="1">1</label>
                                            </div>
                                            <div class="custom-control custom-radio m-1">
                                                <input name="no_kelas" class="custom-control-input" id="2" type="radio" value="2">
                                                <label class="custom-control-label" for="2">2</label>
                                            </div>
                                            <div class="custom-control custom-radio m-1">
                                                <input name="no_kelas" class="custom-control-input" id="3" type="radio" value="3">
                                                <label class="custom-control-label" for="3">3</label>
                                            </div>
                                            <div class="custom-control custom-radio m-1">
                                                <input name="no_kelas" class="custom-control-input" id="4" type="radio" value="4">
                                                <label class="custom-control-label" for="4">4</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4><b>Jurusan</b></h4>
                                                <select class="form-control" data-toggle="select" name="jurusan">
                                                    @foreach ($jurusan as $j)
                                                        <option value="{{ $j->id }}"> {{ $j->jurusan }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary " type="submit" >Tambah</button>

                            </form>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
