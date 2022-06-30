<?= $this->extend('layouts/components/common') ?>
<?= $this->section('content') ?>
<!-- Navbar -->
<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="ni ni-building text-white mt-1"></i>
            <span class="text-white mt-1 font-weight-bold">LABOR PTIK</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-5">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Buat Akun Baru</h1>
                        <p class="text-lead text-white">dapatkan akses lebih mudah dengan cara mendaftar menjadi member Labor PTIK</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <?php
                if (isset($validation)) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><?= $validation->getErrors()  ?></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="card bg-secondary border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h1>Daftar Akun</h1>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <span class="text-muted">Sudah punya akun? <a href="/login">Masuk</a></span>
                            </div>
                        </div>
                        <form role="form" action="/register" method="POST" id="form-add" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Nama</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input class="form-control" type="text" id="nama" name="nama">
                                </div>
                                <div class="invalid-feedback" id="errornama"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Telpon</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button mr-2"></i> +62</span>
                                    </div>
                                    <input class="form-control" type="number" id="telepon" name="telepon">
                                </div>
                                <div class="invalid-feedback" id="errortelepon"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Alamat</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                    </div>
                                    <textarea class="form-control" rows="2" name="alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Tanggal Lahir</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                                <div class="invalid-feedback" id="errortanggal_lahir"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                    <option value="LAKI-LAKI">Laki-laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Email</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" type="email" id="email" name="email">
                                </div>
                                <div class="invalid-feedback" id="erroremail"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Nama Pengguna</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input class="form-control" type="text" id="username" name="username">
                                </div>
                                <div class="invalid-feedback" id="errorusername"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Sandi</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" type="password" id="password" name="password">
                                </div>
                                <div class="invalid-feedback" id="errorpassword"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Ulang Sandi</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" type="password" id="repassword" name="repassword">
                                </div>
                                <div class="invalid-feedback" id="errorrepassword"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Buat akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#form-add').submit(function(e) {
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
                            $('#errornama').css('display', 'block');
                            $('#errornama').html(res.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('#errornama').html('');
                        }

                        if (res.error.tanggal_lahir) {
                            $('#tanggal_lahir').addClass('is-invalid');
                            $('#errortanggal_lahir').css('display', 'block');
                            $('#errortanggal_lahir').html(res.error.tanggal_lahir);
                        } else {
                            $('#tanggal_lahir').removeClass('is-invalid');
                            $('#errortanggal_lahir').html('');
                        }

                        if (res.error.telepon) {
                            $('#telepon').addClass('is-invalid');
                            $('#errortelepon').css('display', 'block');
                            $('#errortelepon').html(res.error.telepon);
                        } else {
                            $('#telepon').removeClass('is-invalid');
                            $('#errortelepon').html('');
                        }

                        if (res.error.email) {
                            $('#email').addClass('is-invalid');
                            $('#erroremail').css('display', 'block');
                            $('#erroremail').html(res.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#erroremail').html('');
                        }

                        if (res.error.password) {
                            $('#password').addClass('is-invalid');
                            $('#errorpassword').css('display', 'block');
                            $('#errorpassword').html(res.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#errorpassword').html('');
                        }

                        if (res.error.repassword) {
                            $('#repassword').addClass('is-invalid');
                            $('#errorrepassword').css('display', 'block');
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
                        }).then(function() {
                            window.location = "/login"
                        })
                    }
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>