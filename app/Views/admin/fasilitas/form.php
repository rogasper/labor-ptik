<div class="modal fade" id="fasilitas-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalLabel">Fasilitas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt--4">
                <form id="form-fasilitas" action="fasilitas/insert" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="nama">Nama Fasilitas</label>
                                <input type="text" id="nama" name="nama" class="form-control" />
                                <div class="invalid-feedback" id="errornama"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="jumlah">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" class="form-control" />
                                <div class="invalid-feedback" id="errorjumlah"></div>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-end" style="display: flex;">
                        <button type="submit" id="submit" class="btn btn-success mb-3">Tambah</button>
                        <button type="button" class="btn btn-default mb-3" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#form-fasilitas').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.error) {
                        if (res.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('#errornama').html(res.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('#errornama').html('');
                        }

                        if (res.error.jumlah) {
                            $('#jumlah').addClass('is-invalid');
                            $('#errorjumlah').html(res.error.jumlah);
                        } else {
                            $('#jumlah').removeClass('is-invalid');
                            $('#errorjumlah').html('');
                        }
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            type: 'success',
                            text: res.sukses,
                            confirmButtonText: 'Ok'
                        })
                        $('#fasilitas-modal').modal('hide');
                        $('#form-fasilitas').trigger('reset');
                        tampilData();
                    }
                }
            });
        });
    });
</script>