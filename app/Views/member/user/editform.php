<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalLabel">Reset Password</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-user" action="edit/<?= $id ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="row mb-4">
                        <div class="col-5">
                            <img src="/images/avatar/<?= $avatar ?>" alt="<?= $username ?>" class="img-fluid mb-4" id="displaypic" style="border-radius: 8px; background-size: cover;">
                            <div class="from-group">
                                <div class="invalid-feedback" id="errorfoto_lab"></div>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="file-upload"><?= $avatar ?></label>
                                    <input type="file" class="custom-file-input" id="file-upload" name="avatar" accept="image/*" onchange="document.getElementById('displaypic').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control" value="<?= $nama ?>" />
                                        <div class="invalid-feedback" id="errornama"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="<?= $email ?>" />
                                        <div class="invalid-feedback" id="erroremail"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" value="<?= $username ?>" />
                                        <div class="invalid-feedback" id="errorusername"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="LAKI-LAKI" <?= ($jenis_kelamin == 'LAKI-LAKI' ? 'selected="selected"' : '') ?>>Laki-laki</option>
                                            <option value="PEREMPUAN" <?= ($jenis_kelamin == 'PEREMPUAN' ? 'selected="selected"' : '') ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="telepon">Telepon</label>
                                        <input type="text" id="telepon" name="telepon" class="form-control" value="<?= $telepon ?>" />
                                        <div class="invalid-feedback" id="errortelepon"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="2"><?= $alamat ?></textarea>
                                        <div class="invalid-feedback" id="erroralamat"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?= $tempat_lahir ?>" />
                                        <div class="invalid-feedback" id="errortempat_lahir"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" aria-describedby="tanggal_lahir" value="<?= $tanggal_lahir ?>">
                                        <div class="invalid-feedback" id="errortanggal_lahir"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="justify-content-end" style="display: flex;">
                        <input type="hidden" id="avalama" name="avalama" value="<?= $avatar ?>" />
                        <button type="submit" id="submit" class="btn btn-success mb-3">Edit</button>
                        <button type="button" class="btn btn-default mb-3" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
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

        $('#edit-user').submit(function(e) {
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

                        if (res.error.email) {
                            $('#email').addClass('is-invalid');
                            $('#erroremail').html(res.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#erroremail').html('');
                        }

                        if (res.error.username) {
                            $('#username').addClass('is-invalid');
                            $('#errorusername').html(res.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#errorusername').html('');
                        }

                        if (res.error.jenis_kelamin) {
                            $('#jenis_kelamin').addClass('is-invalid');
                            $('#errorjenis_kelamin').html(res.error.jenis_kelamin);
                        } else {
                            $('#jenis_kelamin').removeClass('is-invalid');
                            $('#errorjenis_kelamin').html('');
                        }

                        if (res.error.telepon) {
                            $('#telepon').addClass('is-invalid');
                            $('#errortelepon').html(res.error.telepon);
                        } else {
                            $('#telepon').removeClass('is-invalid');
                            $('#errortelepon').html('');
                        }

                        if (res.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('#erroralamat').html(res.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('#erroralamat').html('');
                        }

                        if (res.error.tempat_lahir) {
                            $('#tempat_lahir').addClass('is-invalid');
                            $('#errortempat_lahir').html(res.error.tempat_lahir);
                        } else {
                            $('#tempat_lahir').removeClass('is-invalid');
                            $('#errortempat_lahir').html('');
                        }

                        if (res.error.tanggal_lahir) {
                            $('#tanggal_lahir').addClass('is-invalid');
                            $('#errortanggal_lahir').html(res.error.tanggal_lahir);
                        } else {
                            $('#tanggal_lahir').removeClass('is-invalid');
                            $('#errortanggal_lahir').html('');
                        }
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            type: 'success',
                            text: res.sukses,
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result) {
                                window.location.replace("<?= base_url('member/user/') ?>/<?= session()->get('username') ?>");
                            }
                        })
                        $('#edit-modal').modal('hide');
                        $('#edit-user').trigger('reset');
                    }
                }
            });
        });
    });
</script>