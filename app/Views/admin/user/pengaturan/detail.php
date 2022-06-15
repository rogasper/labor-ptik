<?= $this->extend('layouts/admin/index') ?>
<?= $this->section('content') ?>
<div class="container-fluid mt--8">
    <div class="row">
        <div class="col m-3">
            <div class="card p-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/images/avatar/<?= $user['avatar'] ?>" alt="<?= $user['username'] ?>" class="img-fluid mb-4" style="border-radius: 8px; background-size: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Nama</h3>
                                    <p><?= $user['nama'] ?></p>
                                    <h3>Email</h3>
                                    <p><?= $user['email'] ?></p>
                                    <h3>Username</h3>
                                    <p><?= $user['username'] ?></p>
                                    <h3>Jenis Kelamin</h3>
                                    <p><?= $user['jenis_kelamin'] ?></p>
                                    <h3>Civitas</h3>
                                    <p><?= ($user['civitas'] == 1 ? 'UNS' : 'NO-UNS') ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h3>Telepon</h3>
                                    <p><?= $user['telepon'] ?></p>
                                    <h3>Alamat</h3>
                                    <p><?= $user['alamat'] ?></p>
                                    <h3>Tempat Tanggal Lahir</h3>
                                    <?php $date = date_create($user['tanggal_lahir']) ?>
                                    <p><?= $user['tempat_lahir'] ?>, <?= date_format($date, "d F Y") ?></p>
                                    <h3>Status</h3>
                                    <p><?= ($user['is_verified'] == 1 ? '<span class="badge badge-pill badge-success">verified</span>' : '<span class="badge badge-pill badge-danger">not verified</span>') ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <a href="#" class="btn btn-warning mr-4" id="resetBtn">Reset Password</a>
                            <a href="#" class="btn btn-success mr-4" id="editBtn">Edit</a>
                            <a href="/admin/user" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="viewmodal" style="display:none;">
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#resetBtn').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('admin/user/resetform') ?>/<?= $user['id'] ?>",
                type: "POST",
                dataType: "json",
                success: function(res) {
                    // if ($('.modal.fade').length === 0) {
                    // }
                    $('#viewmodal').html(res.data).show();
                    $('#reset-modal').modal('show');
                }
            });
        });
        $('#editBtn').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('admin/user/editform') ?>/<?= $user['username'] ?>",
                dataType: "json",
                success: function(res) {
                    // if ($('.modal.fade').length === 0) {
                    // }
                    $('#viewmodal').html(res.data).show();
                    $('#edit-modal').modal('show');
                }
            });
        });
    })
</script>
<?= $this->endSection() ?>