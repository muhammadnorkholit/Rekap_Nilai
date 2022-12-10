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


        <div class="card bg-default shadow collapse navbar-collapse {{ Request()->filter && count($rekap) > 0 ? '' : 'show' }} "
            id="filter">
            <div class="card-header  bg-transparent border-0">
                <h2 class="text-white">Print Rekap Nilai </h2>
                <form class="d-block " action="/admin/panel/rekapExport" method="get">
                    <div class="row  w-100 align-items-end">
                        <div class="col-auto p-1 my-2 pr-0">
                            <label for="">Mapel</label>
                            <select name="mapel" class="form-control m-0" id="">
                                <option value="" holder>Pilih Mapel</option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->mapel }}">{{ $m->mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto p-1 my-2 pr-0">
                            <label for="">No Kelas</label>
                            <select name="nokelas" class="form-control m-0" id="">
                                <option value="" holder>Pilih No Kelas</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-auto p-1 my-2 pr-0">
                            <label for="">Kelas</label>
                            <select name="kelas" class="form-control m-0" id="">
                                <option value="" holder>Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="col-auto p-1 my-2 pr-0">
                            <label for="">Jurusan</label>
                            <select name="jurusan" class="form-control m-0" id="">
                                <option value="" holder>Pilih Jurusan</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->jurusan }}">{{ $j->jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto p-1 my-2">
                            <button name="filter" value="true" class="btn btn-primary m-0">Print</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
@endsection
