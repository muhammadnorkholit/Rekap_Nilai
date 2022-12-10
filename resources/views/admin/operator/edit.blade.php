@extends('layout.dash')

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Operator</h6>
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
                            <h3 class="mb-0">Ubah Opertaor</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            
                            <form action="/admin/panel/operator/{{ $operator->id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <!-- Input groups with icon -->
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4><b>Nama</b></h4>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input value="{{$operator->nama}}" class="form-control" placeholder="Nama Mapel" name="nama" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                       
                                        <div class="form-group">
                                            <h4><b>Username</b></h4>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                    <input value="{{$operator->username}} class="form-control" placeholder="username" name="username" type="text">
                                            </div>
                                            </div>

                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4><b>Password</b></h4>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                        <input value="{{$operator->password}} class="form-control" placeholder="password" name="password" type="text">
                                                </div>
                                            </div>
                                        </div>
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