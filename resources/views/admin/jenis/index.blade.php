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
                        <h6 class="h2 text-white d-inline-block mb-0">Jenis Ujian</h6>
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
                <div class="card shadow">
                    <div class="card-header bg-transparent border-0">
                        <a href="/admin/panel/jenis-ujian/create" class="btn btn-primary">Tambah data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-light table-flush">
                            <thead class="thead-light" style="color: text-white;">
                                <tr>
                                    <th scope="col" class="sort">No</th>
                                    <th scope="col" class="sort">Nama Jenis Ujian</th>
                                    <th scope="col" class="sort">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration + $data->perPage() * $data->currentPage() - $data->perPage() }}
                                        </th>
                                        <td>
                                            {{ $d->jenis }}
                                        </td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="/admin/panel/jenis-ujian/{{ $d->id }}/edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#hapus{{ $d->id }}"><i class="fa fa-trash"></i></button>
                                        </td>
                                        {{-- delete --}}
                                        <form action="/admin/panel/jenis-ujian/{{ $d->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal fade" id="hapus{{ $d->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                    role="document">
                                                    <div class="modal-content bg-gradient-danger">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modal-title-notification">
                                                                {{ $d->jenis }}</h6>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="py-3 text-center">
                                                                <i class="ni ni-bell-55 ni-3x"></i>
                                                                <h4 class="heading mt-4">Anda yakin akan hapus,
                                                                    {{ $d->jenis }} ??</h4>
                                                                <p>Data yang sudah di hapus tidak akan bisa di kembalikan!!
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-white"><i
                                                                    class="fa fa-trash"></i></button>
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
                        <div class="m-3 text-right">
                            <hr class="border-white ">
                            {{ $data->links() }}

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
