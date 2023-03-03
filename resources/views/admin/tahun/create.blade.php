@extends('layout.dash')

@section('content')
    <div data-notify="container"
        class="alert {{ Session::has('error') ? 'show' : '' }} alert-dismissible alert-danger alert-notify animated fadeInDown"
        role="alert" data-notify-position="top-center">
        <span class="alert-icon ni ni-bell-55" data-notify="icon"></span>
        <div class="alert-text" <="" div=""> <span class="alert-title" data-notify="title"> Pemberitahuan</span>
            <span data-notify="message">{{ Session::get('error') }}</span>
        </div>
    </div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Tahun Ajaran</h6>
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
                            <h3 class="mb-0">Tambah Siswa</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">


                            <form action="/admin/panel/tahun_ajaran " method="POST">
                                @csrf
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h4><b>Tahun</b></h4>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input class="form-control tapel" value="{{ old('tahun') }}"
                                                    placeholder="0000/0000" type="text" name="tahun">
                                            </div>
                                            @error('tahun')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4><b>Semester</b></h4>
                                        <div class="form-group d-flex m-2 p-2">
                                            <div class="custom-control custom-radio m-1">
                                                <input {{ old('semester') == 'ganjil' ? 'checked' : '' }} name="semester"
                                                    class="custom-control-input" id="x" type="radio"
                                                    value="ganjil">
                                                <label class="custom-control-label" for="x">Ganjil</label>
                                            </div>
                                            <div class="custom-control custom-radio m-1">
                                                <input {{ old('semester') == 'genap' ? 'checked' : '' }} name="semester"
                                                    class="custom-control-input" id="xi" type="radio"
                                                    value="genap">
                                                <label class="custom-control-label" for="xi">Genap</label>
                                            </div>
                                        </div>
                                        @error('semester')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <button class="btn btn-primary " type="submit">Tambah</button>

                            </form>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
