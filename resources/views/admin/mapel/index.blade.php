@extends('layout.dash')

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Mapel</h6>
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
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <a href="/admin/panel/mapel/create" class="btn btn-primary">Tambah data</a>

                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark" style="color: text-white;">
                                <tr>
                                    <th scope="col" class="sort">No</th>
                                    <th scope="col" class="sort">Nama Mapel</th>
                                    <th scope="col" class="sort">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($mapel as $m)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td>
                                            {{ $m->mapel }}
                                        </td>
                                        <td>
                                            <a href="/admin/panel/mapel/{{ $m->id }}/edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href=""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $mapel->links() }}

            </div>
        </div>
    </div>
@endsection
