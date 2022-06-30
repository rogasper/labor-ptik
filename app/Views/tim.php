<?= $this->extend('layouts/member/index') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <div class="py-6 pb-9 bg-default">
        <div class="container">
            <div class="header-body">
                <h2 class="display-3 text-white">Tim Kami</h3>
                    <p class="lead text-white">
                        Ini adalah tim di balik website yang sedang anda kunjungi saat ini. Kami bekerja dengan maksimal dalam pembuatan website ini agar anda semua dapat dengan nyaman mengakses website ini.
                    </p>
                    <label></label>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="/images/ahmad.jpg" alt="Ahmad" style="padding: 3%; object-fit: cover; height: 400px;">
                                <div class="container">
                                    <h2>Ahmad Nur Kholily</h2>
                                    <p class="title">K3519005</p>
                                    <p>Bandung, Jawa Barat, Indonesia</p>
                                    <p>ahmad@student.uns.ac.id</p>
                                    <p><a href="https://www.instagram.com/sirzechs_sama_/" class="btn btn-primary">Go to My Instagram</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <img src="/images/royan.jpg" alt="Royan" style="padding: 3%; object-fit: cover; height: 400px;">
                                <div class="container">
                                    <h2>Royan Gagas Pradana</h2>
                                    <p class="title">K35190</p>
                                    <p>Banyumas, Jawa Tengah, Indonesia</p>
                                    <p>royan@student.uns.ac.id</p>
                                    <p><a href="https://www.instagram.com/rogasper/" class="btn btn-primary">Go to My Instagram</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <img src="/images/eva.jpeg" alt="Efa" style="padding: 3%; object-fit: cover; height: 400px;">
                                <div class="container">
                                    <h2>Efa Setiyani</h2>
                                    <p class="title">K35190</p>
                                    <p>Purbalingga, Jawa Tengah, Indonesia</p>
                                    <p>efa@student.uns.ac.id</p>
                                    <p><a href="https://www.instagram.com/efa_72/" class="btn btn-primary">Go to My Instagram</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>