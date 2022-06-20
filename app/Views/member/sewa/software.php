<?= $this->extend('layouts/member/index') ?>
<!-- Main content -->
<?= $this->section('content') ?>
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 360px; background-image: url(../../images/lab/software.jpg); background-size: cover; background-position: center;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-6"></span>
    <!-- Header container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-white display-2 mt-5"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--4">
    <div class="row">
        <!-- Search form -->
        <div class="col">
            <form class="navbar-search-light" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <!-- Card image -->
                <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h2 class="card-title mb-3 display-4 mt--7 text-white">Ruangan A</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="card-text">Kapasitas</p>
                            <h3 class="text-primary font-weight-bold mt--3">50 Orang</h3>
                            <p class="card-text">Harga Sewa</p>
                            <h3 class="text-primary font-weight-bold mt--3">Rp. 50.000/Jam</h3>
                        </div>
                        <div class="col-6 d-flex align-items-end justify-content-end">
                            <a href="#" class="btn btn-primary">Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>

</script>
<?= $this->endSection() ?>