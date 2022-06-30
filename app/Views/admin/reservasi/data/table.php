<div class="table-responsive py-4">
    <table id="datatable-fasilitas" class="table table-flush">
        <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Order</th>
                <th class="text-center">Nama Pengguna</th>
                <th class="text-center">Laboratorium</th>
                <th class="text-center">Status</th>
                <th class="text-center">Tanggal Sewa</th>
                <th class="text-center">Jam</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($list as $item) { ?>
                <tr>
                    <td class="text-center align-middle"><?= $no++; ?></td>
                    <td class="text-center align-middle"><?= $item['kode']; ?></td>
                    <td class="text-center align-middle"><?= $item['nama']; ?></td>
                    <td class="text-center align-middle"><?= $item['nama_lab']; ?></td>
                    <td class="text-center align-middle">
                        <?php if ($item['status'] == 'pending') { ?>
                            <span class="badge badge-pill badge-lg badge-warning"><?= $item['status']; ?></span>
                        <?php } elseif ($item['status'] == 'cancel') { ?>
                            <span class="badge badge-pill badge-lg badge-danger"><?= $item['status']; ?></span>
                        <?php } else { ?>
                            <span class="badge badge-pill badge-lg badge-success"><?= $item['status']; ?></span>
                        <?php } ?>
                    </td>
                    <?php $date = date_create($item['tanggal_sewa']);
                    $start_time = date_create($item['start_time']);
                    $end_time = date_create($item['end_time']);
                    ?>
                    <td class="text-center align-middle bulan"><?= date_format($date, "d F Y"); ?></td>
                    <td class="text-center align-middle"><?= date_format($start_time, "H:i"); ?> - <?= date_format($end_time, "H:i"); ?></td>
                    <td class="text-center align-middle">Rp. <?= number_format($item['total_harga'], 0, ',', '.'); ?></td>
                    <td class="text-center align-middle">
                        <a href="#" onclick="edit('<?= $item['id'] ?>')" class="btn bunder text-success" data-toggle="tooltip" data-placement="top" title="Detail Pemesanan"><i class="fas fa-file-invoice"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    const getBulan = document.querySelectorAll('.bulan');
    // console.log(getBulan[0].innerHTML);
    getBulan.forEach(element => {
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
    // let getBulanContent = getBulan.textContent.split(" ");

    // getBulan.textContent = getBulanContent;
    $(document).ready(function() {
        var options = {
            dom: 'Bfrtip',
            buttons: ['excel'],
            // select: {
            //     style: "multi"
            // },
            language: {
                paginate: {
                    previous: "<i class='fas fa-angle-left'>",
                    next: "<i class='fas fa-angle-right'>"
                }
            },
            "columnDefs": [{
                    "targets": [0, 1, 3, 4],
                    "orderable": false
                }, {
                    "targets": [4],
                    "className": "select-filter"
                },
                {
                    "targets": [5],
                    "className": "select-filter-month"
                },
            ],
            "fnDrawCallback": function() {
                $('.gambarlab').magnificPopup({
                    type: 'image',
                    removalDelay: 300,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300,
                        easing: 'ease-in-out',
                        opener: function(openerElement) {
                            return openerElement.is('img') ? openerElement : openerElement.find('img');
                        }
                    }
                });
            },
        }
        var table = $('#datatable-fasilitas').DataTable(options);
        $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-default');
        // $('#mySelect').on('change', function() {
        //     var selectedValue = $(this).val();
        //     table.search(selectedValue).draw();
        // });
        // $('#mySelectMonth').on('change', function() {
        //     var selectedValue = $(this).val();
        //     table.search(selectedValue).draw();
        // });
        table.columns('.select-filter').every(function() {
            var that = this;

            // Create the select list and search operation
            var select = $('<select />').addClass('ml-1')
                .appendTo(
                    this.header()
                )
                .on('change', function() {
                    that
                        .search($(this).val())
                        .draw();
                });
            select.append($('<option value="">All</option>'));

            // Get the search data for the first column and add to the select list
            this
                .cache('search')
                .sort()
                .unique()
                .each(function(d) {
                    select.append($('<option value="' + d + '">' + d + '</option>'));
                });
        });
        table.columns('.select-filter-month').every(function() {
            var that = this;

            // Create the select list and search operation
            var select = $('<select />').addClass('ml-1')
                .appendTo(
                    this.header()
                )
                .on('change', function() {
                    that
                        .search($(this).val())
                        .draw();
                });
            var bulanan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            select.append($('<option value="">All</option>'));

            bulanan.forEach(element => {
                select.append($('<option value="' + element + '">' + element + '</option>'));
            })

            // // Get the search data for the first column and add to the select list
            // this
            //     .cache('search')
            //     .sort()
            //     .unique()
            //     .each(function(d) {
            //         select.append($('<option value="' + d + '">' + d + '</option>'));
            //     });
        });
    });
</script>