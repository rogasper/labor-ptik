<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>LABOR PTIK</title>
    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../../assets/css/argon.css?v=1.1.0" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!--fullcalendar plugin files -->
    <link rel="stylesheet" href="../assets/vendor/fullcalendar/dist/fullcalendar.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" /> -->
    <link rel="stylesheet" href="../../assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <?= $this->renderSection('css') ?>
</head>

<body>
    <!-- Sidenav -->
    <?= $this->include('layouts/admin/components/sidebar') ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?= $this->include('layouts/admin/components/topbar') ?>

        <!-- Page content -->
        <?= $this->renderSection('content') ?>
        <?= $this->include('layouts/admin/components/footer') ?>
    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="../../assets/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="../../assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <!-- Datatable -->
    <script src="../../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script> -->
    <script src="../assets/vendor/moment/min/moment.min.js"></script>
    <script src="../assets/vendor/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../assets/vendor/fullcalendar/dist/locale-all.js"></script>
    <script src="../../assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <!-- <script src="../../assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script> -->
    <script src="../../assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <!-- <script src="../../assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script> -->
    <script src="../../assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- Argon JS -->
    <script src="../../assets/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="../../assets/js/demo.min.js"></script>

    <?= $this->renderSection('script') ?>
</body>

</html>