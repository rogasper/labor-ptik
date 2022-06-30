<?= $this->extend('layouts/member/index') ?>
<!-- Main content -->
<?= $this->section('content') ?>

<div class="main-content">
    <!-- Header -->
    <div class="header bg-primary pt-5 pb-7">
        <div class="container">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="pr-5 text-center">
                            <h1 class="display-2 text-white font-weight-bold mb-2">Laboratorium Komputer PTIK</h1>
                            <h2 class="display-4 text-white font-weight-light">Website Peminjaman Laboratorium Komputer Prodi PTIK</h2>
                            <p class="text-white mt-1">Klik tombol <b>"Sewa Lab"</b> untuk melanjutkan ke proses peminjaman lebih lanjut. Di kanan merupakan daftar hal yang bisa di pinjam.</p>
                            <div class="mt-5 text-center">
                                <a href="/register" class="btn btn-neutral my-2">Daftar Member</a>
                                <a href="/sewa" class="btn btn-default my-2">Sewa Lab</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row pt-5">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-3">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                        <h5 class="h3">Laboratorium RPL</h5>
                                        <p>Software Engineering Laboratory</p>
                                        <!-- <p>Untuk membuat dan mengembangkan perangkat lunak (<i>Software</i>).</p> -->
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow mb-4">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                        <h5 class="h3">Laboratorium TKJ</h5>
                                        <p>Computer Network and Instrumentation Laboratory</p>
                                        <!-- <p>Untuk uji coba jaringan kabel <i>(wired)</i> dan nirkabel <i>(wireless)</i>.</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pt-lg-5 pt-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow mb-4">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                        <h5 class="h3">Studio Multimedia</h5>
                                        <p>Multimedia Studio Laboratory</p>
                                        <!-- <p>Untuk Rekaman dan Editing Audio dan Video.</p> -->
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow mb-4">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                        <h5 class="h3">Alat-alat Laboratorium</h5>
                                        <p>Computer Laboratory Equipment</p>
                                        <!-- <p>Peminjaman berupa alat laboratorium (tidak dengan Lab).</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <section class="py-6 pb-9 bg-default">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <h2 class="display-3 text-white">Laboratorium Komputer PTIK</h3>
                    <p class="lead text-white">
                        Laboratorium komputer disediakan untuk memfasilitasi mahasiswa dalam mencari sumber belajar, referensi belajar baik itu jurnal publikasi, artikel ilmiah. Laboratorium dilengkapi dengan perangkat PC yang dapat digunakan oleh mahasiswa untuk menyelesaikan tugas teori maupun praktikum.
                        <br>
                        Laboratorium dapat digunakan pukul 07.00 sampai dengan pukul 21.00.
                    </p>
            </div>
        </div>
    </section>
    <section class="section section-lg pt-lg-0 mt--7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                                        <i class="ni ni-check-bold"></i>
                                    </div>
                                    <h4 class="h3 text-primary text-uppercase">Laboratorium Jaringan Komputer dan Instrumentasi</h4>
                                    <p class="description mt-3">Berikut merupakan hal yang berkaitan dengan Lab TKJ.</p>
                                    <div>
                                        <span class="badge badge-pill badge-primary">Switch</span>
                                        <span class="badge badge-pill badge-primary">Router</span>
                                        <span class="badge badge-pill badge-primary">Repeater</span>
                                        <span class="badge badge-pill badge-primary">Bridge</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape bg-gradient-success text-white rounded-circle mb-4">
                                        <i class="ni ni-istanbul"></i>
                                    </div>
                                    <h4 class="h3 text-success text-uppercase">Studio Multimedia</h4>
                                    <p class="description mt-3">Berikut merupakan hal yang berkaitan dengan Lab Mulmed.</p>
                                    <div>
                                        <span class="badge badge-pill badge-success">Camera</span>
                                        <span class="badge badge-pill badge-success">Microphone</span>
                                        <span class="badge badge-pill badge-success">Headset</span>
                                        <span class="badge badge-pill badge-success">Hardisk</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape bg-gradient-warning text-white rounded-circle mb-4">
                                        <i class="ni ni-planet"></i>
                                    </div>
                                    <h4 class="h3 text-warning text-uppercase">Laboratorium Rekayasa Perangkat Lunak (RPL)</h4>
                                    <p class="description mt-3">Berikut merupakan hal yang berkaitan dengan Lab RPL.</p>
                                    <div>
                                        <span class="badge badge-pill badge-warning">Monitor</span>
                                        <span class="badge badge-pill badge-warning">CPU</span>
                                        <span class="badge badge-pill badge-warning">Projector</span>
                                        <span class="badge badge-pill badge-warning">Printer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-md-2">
                    <img src="./images/lab/LabPro.jpeg" style="box-shadow: 20px 20px 20px;" class="img-fluid">
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="pr-md-5">
                        <h1>Laboratorium Software Engineering</h1>
                        <p>Laboratorium ini digunakan untuk mata kuliah:</p>
                        <ul>
                            <li>Robotika</li>
                            <li>Pemrograman Web</li>
                            <li>Pemrograman Desktop</li>
                            <li>Pemrograman Terstruktur</li>
                            <li>Rekayasa Perangkat Lunak</li>
                            <li>Algoritma dan Struktur Data</li>
                            <li>Pemrograman Perangkat Bergerak</li>
                            <li>Pemrograman Berorientasi Objek</li>
                            <li>Dsb.</li>
                        </ul>
                        <a href="/sewa/software" class="font-weight-bold text-warning mt-5">Halaman web lab RPL</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6">
                    <img src="./images/lab/LabMmd.jpeg" style="box-shadow: -20px 20px 20px;" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="pr-md-5">
                        <h1>Studio Multimedia</h1>
                        <p>Studio ini digunakan untuk mata kuliah:</p>
                        <ul>
                            <li>Fotografi</li>
                            <li>Teknik Animasi 2D</li>
                            <li>Pemrograman Game 2D</li>
                            <li>Teknik Animasi 3D</li>
                            <li>Pemrograman Game 3D</li>
                            <li>Desain Grafis Percetakan</li>
                            <li>Teknik Efek Visual Video</li>
                            <li>Teknik Pengolahan Audio Video</li>
                            <li>Dsb.</li>
                        </ul>
                        <a href="/sewa/multimedia" class="font-weight-bold text-success mt-5">Halaman web lab Mulmed</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-md-2">
                    <img src="./images/lab/LabJar.jpg" style="box-shadow: 20px 20px 20px;" class="img-fluid">
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="pr-md-5">
                        <h1>Laboratorium Jaringan</h1>
                        <p>Laboratorium ini digunakan untuk mata kuliah:</p>
                        <ul>
                            <li>Keamanan Cyber</li>
                            <li>Jaringan Nirkabel</li>
                            <li>Jaringan Sensor Nirkabel</li>
                            <li>Keamanan Jaringan Komputer</li>
                            <li>Administrasi Jaringan Komputer</li>
                            <li>Rancang Bangun Jaringan Komputer</li>
                            <li>Komunikasi Data dan Jaringan Komputer</li>
                            <li>Dsb.</li>
                        </ul>
                        <a href="/sewa/network" class="font-weight-bold text-primary mt-5">Halaman web lab TKJ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Footer -->
<footer class="py-5" id="footer-main">
    <div class="container">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Tim Kami</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Tim Kami</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?= $this->endSection() ?>