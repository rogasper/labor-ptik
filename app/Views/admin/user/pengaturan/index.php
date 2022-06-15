<?= $this->extend('layouts/admin/index') ?>
<?= $this->section('content') ?>
<div class="container-fluid mt--8">
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
            url: "<?= base_url('admin/user/table') ?>",
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