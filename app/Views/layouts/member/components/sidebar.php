<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="/">
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
                        <a class="nav-link <?= ($nav == 'dashboard' ? 'active' : '') ?>" href="/">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($nav == 'sewa' ? 'active' : '') ?>" href="/sewa">
                            <i class="ni ni-app text-info"></i>
                            <span class="nav-link-text">Sewa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($nav == 'tim' ? 'active' : '') ?>" href="/tim">
                            <i class="ni ni-support-16 text-warning"></i>
                            <span class="nav-link-text">Tim</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($nav == 'kontak' ? 'active' : '') ?>" href="/kontak">
                            <i class="ni ni-badge text-danger"></i>
                            <span class="nav-link-text">Kontak</span>
                        </a>
                    </li>
                    <?php if (session()->get('role') == 'member') : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($nav == 'riwayat' ? 'active' : '') ?>" href="/member/riwayat/<?= session()->get('id') ?>">
                                <i class="ni ni-single-copy-04 text-pink"></i>
                                <span class="nav-link-text">Riwayat</span>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</nav>