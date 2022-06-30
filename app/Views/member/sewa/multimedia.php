<?= $this->extend('layouts/member/index') ?>
<!-- Main content -->
<?= $this->section('content') ?>
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 360px; background-image: url(../../images/lab/multimedia.jpg); background-size: cover; background-position: center;">
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
            <form class="navbar-search-light" id="navbar-search-main" method="GET" action="">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control py-3" placeholder="Search" type="text" name="cari" value="<?= $kunci ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <?php
        $no = 1 + (10 * ($page - 1));
        foreach ($list as $item) :
        ?>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <!-- Card image -->
                    <img class="card-img-top" src="../../images/lab/<?= $item['foto_lab'] ?>" style="max-height: 160px; object-fit: cover;" alt="Image placeholder">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h2 class="card-title mb-3 display-4 mt--7 text-white"><?= $item['nama_lab'] ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">Kapasitas</p>
                                <h3 class="text-primary font-weight-bold mt--3"><?= $item['kapasitas'] ?> Orang</h3>
                                <p class="card-text">Harga Sewa</p>
                                <h3 class="text-primary font-weight-bold mt--3">Rp. <?= number_format($item['harga'], 0, ',', '.'); ?>/Jam</h3>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-end">
                                <a href="/member/sewa/<?= $item['id'] ?>" class="btn btn-primary">Booking</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="pagination mt-5">
                <?= $pager->Links('btcorona', 'bootstrap_pagination') ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>

</script>
<?= $this->endSection() ?>