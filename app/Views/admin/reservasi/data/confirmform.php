<div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalLabel">DETAIL SEWA</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $date = date_create($tanggal_sewa);
                $start = date_create($start_time);
                $end = date_create($end_time);
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <h3>Kode Sewa</h3>
                        <p><?= $kode ?></p>
                        <h3>Jenis Laboratorium</h3>
                        <p><?= $kategori_lab ?></p>
                        <h3>Waktu Mulai</h3>
                        <p><?= date_format($start, "H:i"); ?></p>
                    </div>
                    <div class="col-md-3">
                        <h3>Nama Penyewa</h3>
                        <p><?= $nama ?></p>
                        <h3>Telepon</h3>
                        <p><?= $telepon ?></p>
                        <h3>Waktu Akhir</h3>
                        <p><?= date_format($end, "H:i"); ?></p>
                    </div>
                    <div class="col-md-3">
                        <h3>Nama Laboratorium</h3>
                        <p><?= $nama_lab ?></p>
                        <h3>Tanggal Sewa</h3>
                        <p class="bulanform"><?= date_format($date, "d F Y"); ?></p>
                        <h3>Status</h3>
                        <p><span class="badge badge-pill badge-lg badge-<?= ($status == 'cancel' ? 'danger' : 'warning') ?>"><?= $status; ?></span></p>
                    </div>
                    <div class="col-md-3">
                        <h3>Harga</h3>
                        <h1 class="font-weight-bold display-3">
                            Rp. <?= number_format($total_harga, 0, ',', '.'); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#file-upload').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#file-upload')[0].files[0].name;
            $(this).prev('label').text(file);
        })


    });
</script>