<?= $this->extend('layouts/components/common') ?>
<?= $this->section('content') ?>
<!-- Navbar -->
<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="ni ni-building text-white mt-1"></i>
            <span class="text-white mt-1 font-weight-bold">LABOR PTIK</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-info py-5 py-lg-5 pt-lg-8">
        <div class="container">
            <div class="header-body text-center mb-5">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Pemesanan Laboratorium Berhasil</h1>
                        <p class="text-lead text-white">
                            Mohon tunggu konfirmasi dari admin
                        </p>
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
    <!-- Page content -->
    <div class="container mt--9 pb-5">
        <div class="row">
            <div class="col text-center">
                <img src="/images/order-success.png" width="500px" alt="success" class="img-fluid" />
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="/member/riwayat/<?= $id ?>" class="btn btn-primary px-6">Riwayat Pesanan</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?= $this->endSection() ?>