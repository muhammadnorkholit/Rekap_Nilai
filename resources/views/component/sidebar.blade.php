<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="/admin/panel">
                <img src="{{ asset('assets') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/panel">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/panel/siswa" role="button" aria-expanded="false"
                            aria-controls="navbar-examples">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/panel/printRekap" role="button" aria-expanded="false"
                            aria-controls="navbar-components">
                            <i class="fa fa-print text-info"></i>
                            <span class="nav-link-text">Print Rekap Nilai</span>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/admin/panel/rekap" role="button" aria-expanded="false"
                            aria-controls="navbar-components">
                            <i class="ni ni-book-bookmark text-info"></i>
                            <span class="nav-link-text">Rekap Nilai</span>
                        </a>
                    </li>
                    @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/siswa" role="button" aria-expanded="false"
                                aria-controls="navbar-examples">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Siswa</span>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/mapel" role="button" aria-expanded="false"
                                aria-controls="navbar-components">
                                <i class="ni ni-books text-info"></i>
                                <span class="nav-link-text">Mapel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/jurusan" role="button" aria-expanded="false"
                                aria-controls="navbar-components">
                                <i class="ni ni-atom text-info"></i>
                                <span class="nav-link-text">Jurusan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/operator" role="button" aria-expanded="false"
                                aria-controls="navbar-components">
                                <i class="ni ni-settings text-info"></i>
                                <span class="nav-link-text">Operator</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
