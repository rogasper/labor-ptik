<?= $this->extend('layouts/member/index') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="py-6 pb-9 bg-default">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <section class="mb-4">
                    <h2 class="display-3 text-white">Hubungi Kami</h3>
                        <p class="lead text-white">
                            Jika ada keluhan atau saran yang berhubungan dengan Prodi PTIK FKIP UNS, Silahkan masukkan hal di kolom subjek dan dijelaskan di kolom pesan.
                        </p>
                        <label></label>
                        <div class="row">
                            <div class="col-md-9 mb-md-0 mb-5">
                                <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-white">
                                                <label for="name" class="">Nama</label>
                                                <input type="text" id="name" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-white">
                                                <label for="email" class="">Email</label>
                                                <input type="text" id="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <label></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-white">
                                                <label for="subject" class="">Subjek</label>
                                                <input type="text" id="subject" name="subject" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <label></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-white">
                                                <label for="message">Pesan</label>
                                                <textarea type="text" class="form-control md-textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <label></label>
                                <div class="text-center text-md-left">
                                    <a class="btn btn-primary text-white" onclick="document.getElementById('contact-form').submit();">Kirim</a>
                                </div>
                                <div class="status"></div>
                            </div>
                            <div class="col-md-3 flexBox text-center center-block">
                                <ul class="list-unstyled text-white">
                                    <label></label>
                                    <li><i class="text-white"></i>
                                        <p>Jl. A. Yani No.200, Dusun II, Pabelan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57161</p>
                                    </li>
                                    <li><i class="fas mt-4 fa-2x"></i>
                                        <p>(+62)271-6489395</p>
                                    </li>

                                    <li><i class="fas mt-4 fa-2x"></i>
                                        <p>ptik@fkip.uns.ac.id</p>
                                    </li>
                                    <li style="font-size: 2rem;">
                                        <a href="#" class="fa fa-facebook"></a>
                                        <a href="#" class="fa fa-twitter"></a>
                                        <a href="#" class="fa fa-instagram"></a>
                                        <a href="#" class="fa fa-youtube"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </section>
    <?= $this->endSection() ?>