<div class="table-responsive py-4">
    <table id="datatable-fasilitas" class="table table-flush">
        <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Nama Laboratorium</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Kapasitas</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Fasilitas</th>
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
                        <a href="/images/lab/<?= $item['foto_lab'] ?>" class="gambarlab">
                            <img src="/images/lab/<?= $item['foto_lab'] ?>" alt="<?= $item['nama_lab']; ?>" width="200px" style="border-radius: 1rem;">
                        </a>
                    </td>
                    <td class="text-center align-middle"><?= $item['nama_lab']; ?></td>
                    <td class="text-center align-middle"><?= $item['kategori_lab']; ?></td>
                    <td class="text-center align-middle"><?= $item['kapasitas']; ?></td>
                    <td class="text-center align-middle">Rp. <?= number_format($item['harga'], 0, ',', '.'); ?>/Jam</td>
                    <td class="text-center align-middle">
                        <?php
                        $faray = explode(",", $item['fasilitas']);
                        foreach ($fasilitas as $fas) {
                            foreach ($faray as $far) {
                                if ($far == $fas['id']) { ?>
                                    <?= $fas['nama'] ?> <span class="text-primary font-weight-bold">(<?= $fas['jumlah'] ?>)</span>,
                        <?php
                                }
                            }
                        }
                        ?></td>
                    <td class="text-center align-middle">
                        <a href="#" class="btn bunder text-success" onclick="edit(<?= $item['id'] ?>)"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn bunder text-danger" onclick="hapus(<?= $item['id'] ?>)"><i class="fas fa-trash"></i></a>
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
            "columnDefs": [{
                "targets": [3, 6],
                "class": "wrapok",
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