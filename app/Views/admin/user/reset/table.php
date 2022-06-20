<div class="table-responsive py-4">
    <table id="datatable-fasilitas" class="table table-flush">
        <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Nama Pengguna</th>
                <th class="text-center">Email</th>
                <th class="text-center">Status</th>
                <th class="text-center">Permintaan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($list as $item) { ?>
                <tr>
                    <td class="text-center align-middle"><?= $no++; ?></td>
                    <td class="text-center align-middle">
                        <a href="/images/avatar/<?= $item['avatar'] ?>" class="gambarlab">
                            <img src="/images/avatar/<?= $item['avatar'] ?>" alt="<?= $item['nama']; ?>" width="180px" style="border-radius: 1rem; background-size: cover;">
                        </a>
                    </td>
                    <td class="text-center align-middle"><?= $item['nama']; ?></td>
                    <td class="text-center align-middle"><?= $item['email']; ?></td>
                    <td class="text-center align-middle"><?= ($item['is_verified'] == 1 ? '<span class="badge badge-pill badge-success">verified</span>' : '<span class="badge badge-pill badge-danger">not verified</span>') ?></td>
                    <td class="text-center align-middle"><?= ($item['request_reset'] == 1 ? '<span class="badge badge-lg badge-primary">Meminta Reset Password</span>' : '') ?></td>
                    <td class="text-center align-middle">
                        <a href="/admin/userreset/<?= $item['username'] ?>/confirm" class="btn bunder text-success" data-toggle="tooltip" data-placement="top" title="Konfirmasi Reset Password"><i class="fas fa-check"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        var options = {
            keys: !0,
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
                "targets": [0, 1, 3],
                "orderable": false
            }],
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
            }
        }
        var table = $('#datatable-fasilitas').DataTable(options);
    });
</script>