<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="/admin">
                <!-- <img src="../../assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
                <i class="ni ni-building text-primary mt-1"></i>
                <span class="text-primary mt-1 font-weight-bold">LABOR PTIK</span>
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
                        <a class="nav-link <?= ($nav == 'dashboard' ? 'active' : '') ?> " href="/admin">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item <?= ($nav == 'reservasi' ? 'active' : '') ?>">
                        <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">Reservasi</span>
                        </a>
                        <div class="collapse" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="../../pages/dashboards/dashboard.html" class="nav-link">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/dashboards/alternative.html" class="nav-link">Alternative</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($nav == 'user-atur' || $nav == 'user-konfir' || $nav == 'user-reset' ? 'active' : '') ?>" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-user">
                            <i class="ni ni-single-02 text-green"></i>
                            <span class="nav-link-text">User</span>
                        </a>
                        <div class="collapse" id="navbar-user">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item <?= ($nav == 'user-atur'  ? 'active' : '') ?>">
                                    <a href="/admin/user" class="nav-link">Pengaturan User</a>
                                </li>
                                <li class="nav-item <?= ($nav == 'user-konfir' ? 'active' : '') ?>">
                                    <a href="/admin/userconfirm" class="nav-link">Konfirmasi Akun</a>
                                </li>
                                <li class="nav-item <?= ($nav == 'user-reset' ? 'active' : '') ?>">
                                    <a href="/admin/userreset" class="nav-link">Permintaan Reset</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($nav == 'laboratorium' || $nav == 'fasilitas' ? 'active' : '') ?>" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">Manajemen</span>
                        </a>
                        <div class="collapse" id="navbar-components">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item <?= ($nav == 'laboratorium' ? 'active' : '') ?>">
                                    <a href="/admin/laboratorium" class="nav-link">Laboratorium</a>
                                </li>
                                <li class="nav-item <?= ($nav == 'fasilitas' ? 'active' : '') ?>">
                                    <a href="/admin/fasilitas" class="nav-link">Fasilitas</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>