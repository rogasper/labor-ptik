<?= $this->extend('layouts/admin/index') ?>
<?= $this->section('content') ?>
<div class="container-fluid mt--8">
    <?php
    if (session()->getFlashdata('sukses') != '') {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><?= session()->getFlashdata('sukses'); ?></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <!-- <div class="alert alert-success" role="alert">
        <strong>Success!</strong> This is a success alert—check it out!
    </div> -->
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
            url: "<?= base_url('admin/userconfirm/table') ?>",
            dataType: "json",
            success: function(res) {
                $('#viewdata').html(res.data);
            }
        });
    }




    $(document).ready(function() {
        tampilData();
    })
</script>
<?= $this->endSection() ?>