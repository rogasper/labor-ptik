<?= $this->extend('layouts/admin/index') ?>
<?= $this->section('content') ?>
<div class="container-fluid mt--8">
    <a href="#" class="btn btn-secondary" id="tambah-modal">Tambah <?= ucfirst($nav); ?></a>
    <div class="row mt-3">
        <div class="col">
            <div id="viewdata" class="card"></div>
        </div>
    </div>
</div>

<div id="viewmodal" style="display:none;">
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    function tampilData() {
        $('#viewdata').html('');
        $.ajax({
            url: "<?= base_url('admin/fasilitas/table') ?>",
            dataType: "json",
            success: function(res) {
                $('#viewdata').html(res.data);
            }
        });
    }

    function edit(id) {
        $.ajax({
            url: "<?= base_url('admin/fasilitas/form') ?>/" + id,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#fasilitas-modal-edit').modal('show');
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus Data',
            text: `Apakah Anda yakin ingin menghapus?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.dismiss !== 'cancel') {
                $.ajax({
                    type: "delete",
                    url: "<?= base_url('admin/fasilitas') ?>/" + id,
                    dataType: "json",
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            type: 'success',
                            confirmButtonText: 'Ok'
                        });
                        tampilData();
                    }
                });
            }
        });
    }
    $(document).ready(function() {
        tampilData();
        $('#tambah-modal').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('admin/fasilitas/form') ?>",
                dataType: "json",
                success: function(res) {
                    // if ($('.modal.fade').length === 0) {
                    // }
                    $('#viewmodal').html(res.data).show();
                    $('#fasilitas-modal').modal('show');
                }
            });
        });

    })
</script>
<?= $this->endSection() ?>