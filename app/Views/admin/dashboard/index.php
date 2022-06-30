<?= $this->extend('layouts/admin/index') ?>
<?= $this->section('content') ?>
<!-- Page content -->
<!-- Header -->
<div class="header bg-primary pb-6 mt--8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Total Sewa</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $totalOrder ?></span>
                                </div>
                                <div class="col-auto mt-3">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Total Member</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $totalMember ?></span>
                                </div>
                                <div class="col-auto mt-3">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Total Keuntungan</h5>
                                    <span class="h2 font-weight-bold mb-0">Rp. <?= number_format($uang[0]['total_harga'], 0, ',', '.'); ?></span>
                                </div>
                                <div class="col-auto mt-3">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Total Ruangan Lab</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $totalLab ?></span>
                                </div>
                                <div class="col-auto mt-3">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-5">
            <!--* Card header *-->
            <!--* Card body *-->
            <!--* Card init *-->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Surtitle -->
                    <h6 class="surtitle">Overview</h6>
                    <!-- Title -->
                    <h5 class="h3 mb-0">Total Sewa</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <!--* Card header *-->
            <!--* Card body *-->
            <!--* Card init *-->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Surtitle -->
                    <h6 class="surtitle">Performance</h6>
                    <!-- Title -->
                    <h5 class="h3 mb-0">Member Baru</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-bars" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!--* Card header *-->
            <!--* Card body *-->
            <!--* Card init *-->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Surtitle -->
                    <h6 class="surtitle">Performa</h6>
                    <!-- Title -->
                    <h5 class="h3 mb-0">Kategori Laboratorium</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-pie" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->section('script') ?>
<script>
    let monthCount = <?= $month ?>;
    let bulan = [];
    let jumlah = [];
    monthCount.forEach(element => {
        let angka = parseInt(element['MONTH']);
        let mo = dapatBulan(angka);
        bulan.push(mo);
        jumlah.push(element['COUNT']);
    });
    var SalesChart = (function() {
        // Variables

        var $chart = $("#chart-sales");

        // Methods

        function init($this) {
            var salesChart = new Chart($this, {
                type: "line",
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: Charts.colors.gray[200],
                                zeroLineColor: Charts.colors.gray[200],
                            },
                            ticks: {},
                        }, ],
                    },
                },
                data: {
                    labels: bulan,
                    datasets: [{
                        label: "Sewa",
                        data: jumlah,
                    }, ],
                },
            });

            // Save to jQuery object

            $this.data("chart", salesChart);
        }

        // Events

        if ($chart.length) {
            init($chart);
        }
    })();

    let monthMember = <?= $member ?>;
    let bulanMember = [];
    let jumlahMember = [];
    monthMember.forEach(element => {
        let angka = parseInt(element['MONTH']);
        let mo = dapatBulan(angka);
        bulanMember.push(mo);
        jumlahMember.push(element['COUNT']);
    });

    var BarsChart = (function() {
        //
        // Variables
        //

        var $chart = $("#chart-bars");

        //
        // Methods
        //

        // Init chart
        function initChart($chart) {
            // Create chart
            var ordersChart = new Chart($chart, {
                type: "bar",
                data: {
                    labels: bulanMember,
                    datasets: [{
                        label: "Member",
                        data: jumlahMember,
                    }, ],
                },
            });

            // Save to jQuery object
            $chart.data("chart", ordersChart);
        }

        // Init chart
        if ($chart.length) {
            initChart($chart);
        }
    })();

    // Kategori
    let kategorilab = ['Software Engineering', 'Computer Network and Instrumentation', 'Multimedia Studio'];
    let kategoriphp = <?= $kategori ?>;
    let dataSE = 0;
    let dataN = 0;
    let dataM = 0;
    let dataPie = [];
    kategoriphp.forEach(el => {
        switch (el['kategori_lab']) {
            case kategorilab[0]:
                let hitungse = parseInt(el['jumlah']);
                dataSE = dataSE + hitungse;
                break;
            case kategorilab[1]:
                let hitungn = parseInt(el['jumlah']);
                dataN = dataN + hitungn;
                break;
            case kategorilab[2]:
                let hitungm = parseInt(el['jumlah']);
                dataM = dataM + hitungm;
                break;
        }
    });

    dataPie.push(dataSE);
    dataPie.push(dataN);
    dataPie.push(dataM);

    var PieChart = (function() {
        // Variables

        var $chart = $("#chart-pie");

        // Methods

        function init($this) {
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100);
            };

            var pieChart = new Chart($this, {
                type: "pie",
                data: {
                    labels: kategorilab,
                    datasets: [{
                        data: dataPie,
                        backgroundColor: [
                            Charts.colors.theme["danger"],
                            Charts.colors.theme["warning"],
                            Charts.colors.theme["success"],
                        ],
                        label: "Dataset 1",
                    }, ],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: "top",
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                    },
                },
            });

            // Save to jQuery object

            $this.data("chart", pieChart);
        }

        // Events

        if ($chart.length) {
            init($chart);
        }
    })();


    function dapatBulan(angka) {
        switch (angka) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'Mei';
                break;
            case 5:
                return 'April';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
        }
    }
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>