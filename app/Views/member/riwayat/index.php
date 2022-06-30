<?= $this->extend('layouts/member/index') ?>
<!-- Main content -->
<?= $this->section('content') ?>
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-image: url(../../images/avatar/<?= session()->get('avatar') ?>); background-size: cover; background-position: center;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-6"></span>
    <!-- Header container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-white display-2"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--5 pb-6">
    <?php foreach ($list as $item) { ?>
        <div class="row">
            <div class="col">
                <div class="card" id="<?= $item['kode'] ?>">
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-md-8">
                                <div class="row pb-3">
                                    <div class="col">
                                        <h3 class="h3">Nama Lab</h3>
                                        <p class="text-primary font-weight-bold">
                                            <?= $item['nama_lab'] ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <h3 class="h3">Kategori Lab</h3>
                                        <p class="text-primary font-weight-bold">
                                            <?= $item['kategori_lab'] ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <h3 class="h3">Kode Pemesanan</h3>
                                        <p class="text-primary font-weight-bold">
                                            <?= $item['kode'] ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <h3 class="h3">Harga</h3>
                                        <p class="text-primary font-weight-bold">Rp.
                                            <?= number_format($item['total_harga'], 0, ',', '.'); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col">
                                        <h3 class="h3">Kapasitas</h3>
                                        <p class="text-primary font-weight-bold"><?= $item['kapasitas'] ?> Orang</p>
                                    </div>
                                    <div class="col">
                                        <h3 class="h3">Penyewa</h3>
                                        <p class="text-primary font-weight-bold"><?= $item['nama'] ?></p>
                                    </div>
                                    <div class="col">
                                        <h3 class="h3">Email</h3>
                                        <p class="text-primary font-weight-bold"><?= $item['email'] ?></p>
                                    </div>
                                    <div class="col">
                                        <h3 class="h3">Civitas</h3>
                                        <p class="text-primary font-weight-bold"><?= ($item['civitas'] == 1 ? 'UNS' : 'NON-UNS') ?></p>
                                    </div>
                                </div>
                                <?php
                                $date = date_create($item['tanggal_sewa']);
                                $start_time = date_create($item['start_time']);
                                $end_time = date_create($item['end_time']);
                                ?>
                                <div class="row pb-3">
                                    <div class="col-md-3">
                                        <h3 class="h3" for="exampleDatepicker">Tanggal Sewa</h3>
                                        <p class="text-primary font-weight-bold bulan"><?= date_format($date, "d F Y"); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h3 class="h3" for="exampleDatepicker">Jam Mulai</h3>
                                        <p class="text-primary font-weight-bold"><?= date_format($start_time, "H:i"); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h3 class="h3" for="exampleDatepicker">Jam Selesai</h3>
                                        <p class="text-primary font-weight-bold"><?= date_format($end_time, "H:i"); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h3 class="h3" for="exampleDatepicker">Status</h3>
                                        <p class="text-primary font-weight-bold text-capitalize"><?= $item['status'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php if ($item['status'] == 'lunas') { ?>
                                    <img src=" https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= $item['kode'] ?>" alt="kode" class="img-fluid d-block m-auto p-auto">
                                    <div class="row text-center mt-4">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary px-6" onclick="printDiv(<?= $item['kode'] ?>)">Cetak</button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <img src=" https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= $item['kode'] ?>" alt="kode" class="img-fluid d-block m-auto p-auto">
                                    <div class="row text-center mt-4">
                                        <div class="col">
                                            <?php if (session()->get('civitas') == 0) { ?>
                                                <a href="https://wa.me/+62895401515612?text=ini+bukti+transfer+saya+untuk+kode+pesanan+<?= $item['kode'] ?>" class="btn btn-success px-6">Kirim Bukti Transfer</a>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success px-6" disabled>Tunggu Konfirmasi</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <?= $pager->links('default', 'bootstrap_pagination') ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    function printDiv(id) {
        let withCss = `
        <style>
        .card {
  position: relative;

  display: flex;
  flex-direction: column;

  min-width: 0;

  word-wrap: break-word;

  border: 1px solid rgba(0, 0, 0, 0.05);
  border-radius: 0.375rem;
  background-color: #fff;
  background-clip: border-box;
}
.card-body {
  padding: 1.5rem;

  flex: 1 1 auto;
}
.row {
  display: flex;

  margin-right: -15px;
  margin-left: -15px;

  flex-wrap: wrap;
}
.pt-3,
.py-3 {
  padding-top: 1rem !important;
}
.col-md-8, .col-md-4{
    position: relative;

  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}
.col {
  max-width: 100%;

  flex-basis: 0;
  flex-grow: 1;
}
.h3 {
  font-size: 1.0625rem;
}
.text-primary {
  color: #5e72e4 !important;
}
.font-weight-bold {
  font-weight: 600 !important;
}
.form-group {
  margin-bottom: 1.5rem;
}
.text-center {
  text-align: center !important;
}
.btn {
  font-size: 0.875rem;

  position: relative;

  transition: all 0.15s ease;
  letter-spacing: 0.025em;
  text-transform: none;

  will-change: transform;
}
.btn-primary {
  color: #fff;
  border-color: #5e72e4;
  background-color: #5e72e4;
  box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
}
.px-6 {
  padding-right: 4.5rem !important;
}
        </style>
        `;
        let printId = id;
        console.log(withCss.concat(printId));
        var prtContent = document.getElementById(printId);
        console.log(printId.innerHTML);
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(withCss.concat(printId.innerHTML));
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }

    const getBulan = document.querySelectorAll('.bulan');
    // console.log(getBulan[0].innerHTML);
    getBulan.forEach(element => {
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
</script>
<?= $this->endSection() ?>