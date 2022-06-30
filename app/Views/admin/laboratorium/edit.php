<div class="modal fade" id="fasilitas-modal-edit" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalLabel">Laboratorium</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt--4">
                <form id="form-fasilitas-edit" action="laboratorium/<?= $id_lab ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="nama_lab">Nama Laboratorium</label>
                                <input type="text" id="nama_lab" name="nama_lab" class="form-control" value="<?= $nama_lab ?>" />
                                <div class="invalid-feedback" id="errornama_lab"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="kapasitas">Kapasitas</label>
                                <input type="number" id="kapasitas" name="kapasitas" class="form-control" value="<?= $kapasitas ?>" />
                                <div class="invalid-feedback" id="errorkapasitas"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="kategori_lab">Kategori Laboratorium</label>
                                <select class="form-control" id="kategori_lab" name="kategori_lab">
                                    <option value="Software Engineering" <?= ($kategori_lab == 'Software Engineering' ? 'selected="selected"' : '') ?>>Software Engineering</option>
                                    <option value="Multimedia Studio" <?= ($kategori_lab == 'Multimedia Studio' ? 'selected="selected"' : '') ?>>Multimedia Studio</option>
                                    <option value="Computer Network and Instrumentation" <?= ($kategori_lab == 'Computer Network and Instrumentation' ? 'selected="selected"' : '') ?>>Computer Network and Instrumentation</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="harga">Harga</label>
                                <input type="number" id="harga" name="harga" class="form-control" value="<?= $harga ?>" />
                                <div class="invalid-feedback" id="errorharga"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Fasilitas</label>
                                <select class="bootstrap-select strings" name="fasilitas[]" data-width="100%" data-live-search="true" multiple required>
                                    <?php foreach ($fasilitaslist as $row) : ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="errorfasilitas"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="from-group">
                                <label class="form-label">Foto</label>
                                <div class="invalid-feedback" id="errorfoto_lab"></div>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="file-upload"><?= $foto_lab ?></label>
                                    <input type="file" class="custom-file-input" id="file-upload" name="foto_lab" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-end" style="display: flex;">
                        <input type="hidden" id="foto_lablama" name="foto_lablama" value="<?= $foto_lab ?>" />
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
        $('input[type="file"]').change(function() {
            var ext = this.value.match(/\.(.+)$/)[1];
            switch (ext) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                    $('#uploadButton').attr('disabled', false);
                    break;
                default:
                    Toast.fire({
                        title: "Hanya file gambar",
                        type: 'error',
                    })
                    this.value = '';
            }
        });

        var item = <?= $fasilitas_edit ?>;
        // var val1 = item.replace("[", "");
        // var val2 = val1.replace("]", "");
        var item = item.toString();
        // console.log(item);
        $.each(item.split(", "), function(i, e) {
            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
            $(".strings").selectpicker('refresh');

        });

        $('.bootstrap-select').selectpicker();

        $('#file-upload').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#file-upload')[0].files[0].name;
            $(this).prev('label').text(file);
        })
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        $('#form-fasilitas-edit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.error) {
                        if (res.error.nama_lab) {
                            $('#nama_lab').addClass('is-invalid');
                            $('#errornama_lab').html(res.error.nama_lab);
                        } else {
                            $('#nama_lab').removeClass('is-invalid');
                            $('#errornama').html('');
                        }

                        if (res.error.kapasitas) {
                            $('#kapasitas').addClass('is-invalid');
                            $('#errorkapasitas').html(res.error.kapasitas);
                        } else {
                            $('#kapasitas').removeClass('is-invalid');
                            $('#errorkapasitas').html('');
                        }

                        if (res.error.harga) {
                            $('#harga').addClass('is-invalid');
                            $('#errorharga').html(res.error.harga);
                        } else {
                            $('#harga').removeClass('is-invalid');
                            $('#errorharga').html('');
                        }

                        if (res.error.fasilitas) {
                            $('#fasilitas').addClass('is-invalid');
                            $('#errorfasilitas').html(res.error.fasilitas);
                        } else {
                            $('#fasilitas').removeClass('is-invalid');
                            $('#errorfasilitas').html('');
                        }

                        if (res.error.foto_lab) {
                            // $('#file_upload').addClass('is-invalid');
                            // $('#errorfoto_lab').html(res.error.foto_lab);
                            Toast.fire({
                                title: res.error.foto_lab,
                                type: 'error',
                            })
                        } else {
                            $('#foto_lab').removeClass('is-invalid');
                            $('#errorfoto_lab').html('');
                        }
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            type: 'success',
                            text: res.sukses,
                            confirmButtonText: 'Ok'
                        })
                        $('#fasilitas-modal-edit').modal('hide');
                        $('#form-fasilitas-edit').trigger('reset');
                        tampilData();
                    }
                }
            });
        });
    });
</script>