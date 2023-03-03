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
                        <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>

                            </ol>
                        </nav>
                    </div>

                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Siswa</h5>
                                        <h1 class=" font-weight-bold mb-0">{{ $countSiswa }}</h1>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-single-02"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Mapel</h5>
                                        <h1 class=" font-weight-bold mb-0">{{ $countMapel }}</h1>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-books"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Jurusan</h5>
                                        <span class="h1 font-weight-bold mb-0">{{ $countJurusan }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-atom"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Operator</h5>
                                        <span class="h1 font-weight-bold mb-0">{{ $countOperator }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-6">
                        <div class="row flex-nowrap overflow-hidden">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <h6 class="surtitle">Peringkat 10 Terbesar</h6>
                                                <h5 class="h3 mb-0">{{ $rekapX[0]->kelas }} {{ $rekapX[0]->jurusan }}
                                                    {{ $rekapX[0]->no_kelas }}
                                                </h5>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                                            <div class="d-none" id="data-chart">{{ $rekapX }}</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">

                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h6 class="surtitle">Peringkat 10 Terbesar</h6>
                                        <h5 class="h3 mb-0">{{ $rekapX[0]->kelas }} {{ $rekapX[0]->jurusan }}
                                            {{ $rekapX[0]->no_kelas }}
                                        </h5>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chart-bars-2" class="chart-canvas"></canvas>
                                    <div class="d-none" id="data-chart-2">{{ $rekapX }}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">

                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h6 class="surtitle">Peringkat 10 Terbesar</h6>
                                        <h5 class="h3 mb-0">{{ $rekapX[0]->kelas }} {{ $rekapX[0]->jurusan }}
                                            {{ $rekapX[0]->no_kelas }}
                                        </h5>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chart-bars-2" class="chart-canvas"></canvas>
                                    <div class="d-none" id="data-chart-2">{{ $rekapX }}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- message section --}}
        {{-- <div class=" position-fixed right-0 bottom-0 w-25">
            <button data-toggle="collapse" data-target="#message"
                onclick="console.log(this.classList.toggle('ni-bold-up'),this.classList.toggle('ni-bold-down'))"
                class="ni ni-bold-up btn btn-success mb-3 position-absolute right-25"
                style="top: -2.4rem;z-index:9999"></button>
            <div id="message" class="card  m-0  collapse navbar-collapse  p-4 border-0 rounded-0">
                <div class=" p-0 card-header d-flex justify-content-between align-items-center">
                    <h2>Pemberitahuan</h2>

                </div>
                <div class="card-body p-0">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, facere odio consequatur assumenda
                    placeat
                    tempora sit totam aut, voluptates, sint ipsum inventore culpa omnis eveniet! Veniam esse eveniet alias
                    cupiditate!
                </div>
            </div>
        </div> --}}


    </div>
@endsection
