<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand " href="/admin/panel" style="font-size: 1.5rem;font-weight:800">
                RekapIN
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
                        <a class="nav-link" href="/admin/panel/printRekap" role="button" aria-expanded="false"
                            aria-controls="navbar-components">
                            <i class="fa fa-print text-primary"></i>
                            <span class="nav-link-text">Print Rekap Nilai</span>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/admin/panel/rekap" role="button" aria-expanded="false"
                            aria-controls="navbar-components">
                            <i class="ni ni-book-bookmark text-primary"></i>
                            <span class="nav-link-text">Data Rekap Nilai</span>
                        </a>
                    </li>
                    @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/jenis-ujian" role="button" aria-expanded="false"
                                aria-controls="navbar-examples">
                                <i class="ni ni-ungroup text-primary"></i>
                                <span class="nav-link-text">Jenis Ujian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/siswa" role="button" aria-expanded="false"
                                aria-controls="navbar-examples">
                                <i class="ni ni-ungroup text-primary"></i>
                                <span class="nav-link-text">Siswa</span>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/mapel" role="button" aria-expanded="false"
                                aria-controls="navbar-components">
                                <i class="ni ni-books text-primary"></i>
                                <span class="nav-link-text">Mapel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/jurusan" role="button" aria-expanded="false"
                                aria-controls="navbar-components">
                                <i class="ni ni-atom text-primary"></i>
                                <span class="nav-link-text">Jurusan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/tahun_ajaran" role="button" aria-expanded="false"
                                aria-controls="navbar-components">
                                <i class="ni ni-calendar-grid-58  text-primary"></i>
                                <span class="nav-link-text">Tahun Ajaran</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/panel/operator" role="button" aria-expanded="false"
                                aria-controls="navbar-components">
                                <i class="ni ni-settings text-primary"></i>
                                <span class="nav-link-text">Operator</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
