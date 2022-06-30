<div class="modal fade" id="reset-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalLabel">Reset Password</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt--4">
                <form id="reset-fasilitas" action="resetform/resetpassword/<?= $id ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="password">Password Baru</label>
                                <input type="password" id="password" name="password" class="form-control" />
                                <div class="invalid-feedback" id="errorpassword"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="repassword">Ulangi Password Baru</label>
                                <input type="password" id="repassword" name="repassword" class="form-control" />
                                <div class="invalid-feedback" id="errorrepassword"></div>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-end" style="display: flex;">
                        <button type="submit" id="submit" class="btn btn-success mb-3">Reset</button>
                        <button type="button" class="btn btn-default mb-3" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#reset-fasilitas').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.error) {
                        if (res.error.password) {
                            $('#password').addClass('is-invalid');
                            $('#errorpassword').html(res.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#errorpassword').html('');
                        }

                        if (res.error.repassword) {
                            $('#repassword').addClass('is-invalid');
                            $('#errorrepassword').html(res.error.repassword);
                        } else {
                            $('#repassword').removeClass('is-invalid');
                            $('#errorrepassword').html('');
                        }
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            type: 'success',
                            text: res.sukses,
                            confirmButtonText: 'Ok'
                        })
                        $('#reset-modal').modal('hide');
                        $('#edit-user').trigger('reset');
                    }
                }
            });
        });
    });
</script>