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
            url: "<?= base_url('admin/paymentreservasi/table') ?>",
            dataType: "json",
            success: function(res) {
                $('#viewdata').html(res.data);
            }
        });
    }

    function edit(id) {
        $.ajax({
            url: "<?= base_url('admin/paymentreservasi/form') ?>/" + id,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#confirm-modal').modal('show');
                const getBulanForm = document.querySelectorAll('.bulanform');
                // console.log(getBulanForm[0].innerHTML);
                getBulanForm.forEach(element => {
                    let mo = element.innerHTML;
                    mo = mo.split(" ");
                    switch (mo[1]) {
                        case 'January':
                            mo[1] = 'Januari';
                            break;
                        case 'February':
                            mo[1] = 'Februari';
                            break;
                        case 'March':
                            mo[1] = 'Maret';
                            break;
                        case 'May':
                            mo[1] = 'Mei';
                            break;
                        case 'June':
                            mo[1] = 'Juni';
                            break;
                        case 'July':
                            mo[1] = 'Juli';
                            break;
                        case 'August':
                            mo[1] = 'Agustus';
                            break;
                        case 'October':
                            mo[1] = 'Oktober';
                            break;
                        case 'December':
                            mo[1] = 'Desember';
                            break;
                        default:
                            break;
                    }

                    mo = mo.join(' ');
                    element.innerHTML = mo
                });
            }
        });
    }



    $(document).ready(function() {
        tampilData();
    })
</script>
<?= $this->endSection() ?>