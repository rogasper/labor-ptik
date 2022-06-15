<div class="table-responsive py-4">
    <table id="datatable-fasilitas" class="table table-flush">
        <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th>Nama Fasilitas</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($list as $item) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $item['nama']; ?></td>
                    <td class="text-center"><?= $item['jumlah']; ?></td>
                    <td class="text-center">
                        <a href="#" class="btn bunder text-success" onclick="edit(<?= $item['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn bunder text-danger" onclick="hapus(<?= $item['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
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
            }]
        }
        var table = $('#datatable-fasilitas').DataTable(options);
    });
</script>