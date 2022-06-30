<?= $this->extend('layouts/member/index') ?>
<?= $this->section('style') ?>
<style>
    input[type="time"]::-webkit-calendar-picker-indicator {
        display: none;
    }
</style>
<?= $this->endSection() ?>
<!-- Main content -->
<?= $this->section('content') ?>
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 550px; background-image: url(../../images/lab/software.jpg); background-size: cover; background-position: center;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-6"></span>
    <!-- Header container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-white display-2"><?= $list['nama_lab'] ?></h1>
                <h1 class="text-white display-3"><?= $list['kategori_lab'] ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--9 pb-6 mb-6">
    <div class="row">
        <div class="col">
            <?php
            if (session()->getFlashdata('warning') != '') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
                    <span class="alert-text"><?= session()->getFlashdata('warning'); ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row pb-3">
                                <div class="col">
                                    <h3 class="h3">Fasilitas</h3>
                                    <p class="text-primary font-weight-bold">-
                                        <?php
                                        $faray = explode(",", $list['fasilitas']);
                                        foreach ($fasilitas as $fas) {
                                            foreach ($faray as $far) {
                                                if ($far == $fas['id']) { ?>
                                                    <?= $fas['nama'] ?> <span>(<?= $fas['jumlah'] ?>)</span>,
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col">
                                    <h3 class="h3">Kapasitas</h3>
                                    <p class="text-primary font-weight-bold"><?= $list['kapasitas'] ?> Orang</p>
                                </div>
                                <div class="col">
                                    <h3 class="h3">Penyewa</h3>
                                    <p class="text-primary font-weight-bold"><?= session()->get('nama') ?></p>
                                </div>
                                <div class="col">
                                    <h3 class="h3">Harga Sewa</h3>
                                    <p class="text-primary font-weight-bold">Rp. <?= number_format($list['harga'], 0, ',', '.'); ?>/Jam</p>
                                </div>
                                <div class="col">
                                    <h3 class="h3">Civitas</h3>
                                    <p class="text-primary font-weight-bold"><?= (session()->get('civitas') == 1 ? 'UNS' : 'NON-UNS') ?></p>
                                </div>
                            </div>
                            <form action="/member/booking" method="POST">
                                <div class="row pb-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h3 class="h3" for="exampleDatepicker">Tanggal Sewa</h3>
                                            <input class="form-control datepicker" name="tanggal_sewa" placeholder="Select date" type="date" id="tanggal_sewa" required>
                                            <div class="invalid-feedback" id="errortanggal_sewa"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h3 class="h3" for="exampleDatepicker">Jam Mulai</h3>
                                            <input class="form-control timepicker" min="07:00" max="21:00" id="start_time" name="start_time" placeholder="Select date" type="time" required />
                                            <div class="invalid-feedback" id="errorstart_time"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h3 class="h3" for="exampleDatepicker">Jam Selesai</h3>
                                            <input class="form-control timepicker pickerend" min="07:00" max="21:00" id="end_time" name="end_time" placeholder="Select date" type="time" required />
                                            <div class="invalid-feedback" id="errorend_time"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" name="users_id" value="<?= session()->get('id') ?>">
                                        <input type="hidden" name="labs_id" value="<?= $list['id'] ?>">
                                        <input type="hidden" name="total_harga" id="total_harga">
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4 border-left border-darker">
                            <h1 class="display-3 text-center">Total Harga</h1>
                            <p class="h1 text-primary text-right" id="hargasewa">Rp. <?= number_format($list['harga'], 0, ',', '.'); ?></p>
                            <p class="h1 text-primary text-right border-bottom border-primary" id="berapajam">0</p>
                            <p class="h1 text-primary font-weight-bold text-right" id="harga_total">0</p>
                            <div class="row text-center mt-6">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-8" id="sewabtn" disabled>Sewa</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    let civitas = <?= session()->get('civitas') ?>;
    $(document).ready(function() {
        var selectTime = function() {
            priceCal();
        };

        $('#start_time').timepicker({
            timeFormat: 'HH:mm',
            minTime: new Date(0, 0, 0, 7, 0, 0),
            maxTime: new Date(0, 0, 0, 21, 0, 0),
            dynamic: false,
            dropdown: true,
            scrollbar: true,
            startHour: 6,
            startTime: new Date(0, 0, 0, 7, 0, 0),
            interval: 30,
            change: selectTime,
        });
        $('#end_time').timepicker({
            timeFormat: 'HH:mm',
            minTime: new Date(0, 0, 0, 7, 0, 0),
            maxTime: new Date(0, 0, 0, 21, 0, 0),
            dynamic: false,
            dropdown: true,
            scrollbar: true,
            startHour: 6,
            startTime: new Date(0, 0, 0, 7, 0, 0),
            interval: 30,
            change: selectTime,
        });
    });

    $(function() {
        $('#start_time').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia'
        });
    });
    $(function() {
        $('#end_time').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia'
        });
    });
    // const Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timerProgressBar: true,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     didOpen: (toast) => {
    //         toast.addEventListener('mouseenter', Swal.stopTimer)
    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
    //     }
    // })

    function priceCal() {
        //declares
        let price = <?= $list['harga'] ?>;
        var hourStart = $('#start_time').timepicker('getTime');
        var hourEnd = $('#end_time').timepicker('getTime');

        var totalHours = (hourEnd - hourStart) / 60 / 1000; //we get total minutes
        totalHours = totalHours / 60;
        $('#berapajam').text(totalHours);
        let totalHarga = totalHours * price;
        let separtor;
        let number_string = totalHarga.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        if (civitas == 1) {
            $('#harga_total').text('Rp. ' + 0);
            $('#total_harga').val(0);
        } else {
            $('#harga_total').text('Rp. ' + rupiah);
            $('#total_harga').val(totalHarga);

        }
        if (totalHours <= 0) {
            // Toast.fire({
            //     title: 'Minimal sewa 30 menit',
            //     type: 'error',
            // })
            $('#start_time').addClass('is-invalid');
            $('#errorstart_time').css('display', 'block');
            $('#errorstart_time').html('Minimal sewa 30 menit');
            $('#sewabtn').attr('disabled', true);
        } else {
            $('#start_time').removeClass('is-invalid');
            $('#errorstart_time').html('');
            $('#sewabtn').attr('disabled', false);
            if (totalHours > 5) {
                $('#end_time').addClass('is-invalid');
                $('#errorend_time').css('display', 'block');
                $('#errorend_time').html('Maksimal sewa 5 jam');
                $('#sewabtn').attr('disabled', true);
            } else {
                $('#end_time').removeClass('is-invalid');
                $('#errorend_time').html('');
                $('#sewabtn').attr('disabled', false);
            }
        }
        // console.log(hourStart);
        // console.log(totalHarga);
    }

    var today = new Date();
    var dd = today.getDate() + 1;
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    var fortnightAway = new Date(Date.now() + 12096e5);

    var twoWeek = fortnightAway.toISOString().split('T')[0];
    // console.log(twoWeek);
    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    let tanggalSewa = document.getElementById("tanggal_sewa");
    tanggalSewa.setAttribute("min", today);
    tanggalSewa.setAttribute("max", twoWeek);
    tanggalSewa.addEventListener('change', function() {
        var e = document.getElementById("tanggal_sewa");
        if (e.value < today) {
            // Toast.fire({
            //     title: 'Pemesanan satu hari sebelum digunakan',
            //     type: 'error',
            // })
            $('#tanggal_sewa').addClass('is-invalid');
            $('#errortanggal_sewa').css('display', 'block');
            $('#errortanggal_sewa').html('Pemesanan satu hari sebelum digunakan');
            $('#sewabtn').attr('disabled', true);
        } else {
            $('#tanggal_sewa').removeClass('is-invalid');
            $('#errortanggal_sewa').html('');
            $('#sewabtn').attr('disabled', false);
        }
    });
    const picker = document.getElementById('tanggal_sewa');
    picker.addEventListener('change', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([6, 0].includes(day)) {
            e.target.setCustomValidity('week-end not allowed')
            $('#tanggal_sewa').addClass('is-invalid');
            $('#errortanggal_sewa').css('display', 'block');
            $('#errortanggal_sewa').html('Sabtu-minggu Libur');
            $('#sewabtn').attr('disabled', true);
        } else {
            e.target.setCustomValidity('');
            $('#tanggal_sewa').removeClass('is-invalid');
            $('#errortanggal_sewa').html('');
            $('#sewabtn').attr('disabled', false);
        }
    });
</script>
<?= $this->endSection() ?>