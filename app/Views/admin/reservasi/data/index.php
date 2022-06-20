<?= $this->extend('layouts/admin/index') ?>
<?= $this->section('content') ?>
<div class="container-fluid mt--8">
    <?php
    if (session()->getFlashdata('sukses') != '') {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><?= session()->getFlashdata('sukses'); ?></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <!-- <div class="alert alert-success" role="alert">
        <strong>Success!</strong> This is a success alert—check it out!
    </div> -->
    <div class="row">
        <div class="col">
            <!-- Fullcalendar -->
            <div class="card card-calendar">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <div class="row">
                        <div class="col-lg-6 mt-3 mt-lg-0 text-lg-left">
                            <h6 class="fullcalendar-title h2 text-primary d-inline-block mb-0">
                                Full calendar
                            </h6>
                            <h5 class="h3 mb-0">Kalendar</h5>
                        </div>
                        <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                            <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                                <i class="fas fa-angle-left"></i>
                            </a>
                            <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="agendaWeek">Agenda</a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="listWeek">List</a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month">Bulan</a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek">Minggu</a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay">Hari</a>
                        </div>
                    </div>
                </div>

                <!-- Card body -->
                <div class="card-body p-0">
                    <div id="jadwalsewa"></div>
                </div>
            </div>
        </div>
    </div>
    <h1>Semua Data Sewa</h1>
    <div class="row mt-3">
        <div class="col">
            <div id="viewdata" class="card"></div>
        </div>
    </div>
</div>
</div>

<div id="viewmodal" style="display:none;">
</div>

<div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="edit-event-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold">Sewa</h3>
                        <p id="edit-event--title"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold">Penyewa</h3>
                        <p id="edit-event--description"></p>
                    </div>
                    <div class="col">
                        <h3 class="font-weight-bold">Kode Sewa</h3>
                        <p id="edit-event--kode"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold">Mulai</h3>
                        <p id="edit-event--mulai"></p>
                    </div>
                    <div class="col">
                        <h3 class="font-weight-bold">Selesai</h3>
                        <p id="edit-event--selesai"></p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-link ml-auto" data-dismiss="modal">
                        Close
                    </button>
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
    function tampilData() {
        $('#viewdata').html('');
        $.ajax({
            url: "<?= base_url('admin/reservasi/table') ?>",
            dataType: "json",
            success: function(res) {
                $('#viewdata').html(res.data);
            }
        });
    }

    function edit(id) {
        $.ajax({
            url: "<?= base_url('admin/reservasi/form') ?>/" + id,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#confirm-modal').modal('show');
                const getBulanForm = document.querySelectorAll('.bulanform');
                // console.log(getBulanForm[0].innerHTML);
                getBulanForm.forEach(element => {
                    let mo = element.innerHTML;
                    mo = mo.split(" ");
                    switch (mo[1]) {
                        case 'January':
                            mo[1] = 'Januari';
                            break;
                        case 'February':
                            mo[1] = 'Februari';
                            break;
                        case 'March':
                            mo[1] = 'Maret';
                            break;
                        case 'May':
                            mo[1] = 'Mei';
                            break;
                        case 'June':
                            mo[1] = 'Juni';
                            break;
                        case 'July':
                            mo[1] = 'Juli';
                            break;
                        case 'August':
                            mo[1] = 'Agustus';
                            break;
                        case 'October':
                            mo[1] = 'Oktober';
                            break;
                        case 'December':
                            mo[1] = 'Desember';
                            break;
                        default:
                            break;
                    }

                    mo = mo.join(' ');
                    element.innerHTML = mo
                });
            }
        });
    }



    $(document).ready(function() {
        tampilData();
    })

    let bgColor = ['bg-red', 'bg-orange', 'bg-green', 'bg-blue', 'bg-warning', 'bg-purple', 'bg-yellow'];
    var sewa = <?php echo json_encode($list) ?>;
    sewa.forEach((element, index) => {
        let tanggal1 = element['tanggal_sewa'].split(" ");
        let tanggal2 = tanggal1;
        let start_time = element['start_time'];
        let end_time = element['end_time'];
        tanggal1.pop();
        tanggal1.push(start_time);
        tanggal1 = tanggal1.join(" ");
        tanggal2.pop();
        tanggal2.push(start_time);
        tanggal2 = tanggal2.join(" ");
        let start = tanggal1;
        let end = tanggal2;
        element['start'] = tanggal1;
        element['end'] = tanggal2;
        element['title'] = element['nama_lab'] + ' - ' + element['kategori_lab'];
        element['className'] = bgColor.at(index);
    });

    var Fullcalendar = (function() {

        // Variables

        var $calendar = $('#jadwalsewa');

        //
        // Methods
        //

        // Init
        function init($this) {

            // Calendar events

            var events = sewa,


                // Full calendar options
                // For more options read the official docs: https://fullcalendar.io/docs

                options = {
                    locale: 'id',
                    defaultView: 'listWeek',
                    header: {
                        right: '',
                        center: '',
                        left: 'today'
                    },
                    buttonIcons: {
                        prev: 'calendar--prev',
                        next: 'calendar--next',
                    },
                    theme: false,
                    selectable: true,
                    selectHelper: true,
                    height: 500,
                    events: events,

                    dayClick: function(date) {
                        var isoDate = moment(date).toISOString();
                        $('#new-event').modal('show');
                        $('.new-event--title').val('');
                        $('.new-event--start').val(isoDate);
                        $('.new-event--end').val(isoDate);
                    },

                    viewRender: function(view) {
                        var calendarDate = $this.fullCalendar('getDate');
                        var calendarMonth = calendarDate.month();

                        //Set data attribute for header. This is used to switch header images using css
                        // $this.find('.fc-toolbar').attr('data-calendar-month', calendarMonth);

                        //Set title in page header
                        $('.fullcalendar-title').html(view.title);
                    },

                    // Edit calendar event action

                    eventClick: function(event, element) {
                        // $('#edit-event input[value=' + event.className + ']').prop('checked', true);
                        $('#edit-event').modal('show');
                        $('.edit-event--id').val(event.id);
                        // $('.edit-event--title').val(event.title);
                        document.getElementById('edit-event--title').innerHTML = event.title;
                        document.getElementById('edit-event--description').innerHTML = event.nama;
                        document.getElementById('edit-event--kode').innerHTML = event.kode;
                        document.getElementById('edit-event--mulai').innerHTML = event.start_time;
                        document.getElementById('edit-event--selesai').innerHTML = event.end_time;
                    }
                };

            // Initalize the calendar plugin
            $this.fullCalendar(options);


            //
            // Calendar actions
            //


            //Calendar views switch
            $('body').on('click', '[data-calendar-view]', function(e) {
                e.preventDefault();

                $('[data-calendar-view]').removeClass('active');
                $(this).addClass('active');

                var calendarView = $(this).attr('data-calendar-view');
                $this.fullCalendar('changeView', calendarView);
            });


            //Calendar Next
            $('body').on('click', '.fullcalendar-btn-next', function(e) {
                e.preventDefault();
                $this.fullCalendar('next');
            });


            //Calendar Prev
            $('body').on('click', '.fullcalendar-btn-prev', function(e) {
                e.preventDefault();
                $this.fullCalendar('prev');
            });
        }


        //
        // Events
        //

        // Init
        if ($calendar.length) {
            init($calendar);
        }

    })();
</script>
<?= $this->endSection() ?>