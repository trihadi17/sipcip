<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black"
        data-image="<?= base_url('assets'); ?>../../assets/img/lgin.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="post" action="<?= base_url('auth'); ?>">
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">

                                    <img src="<?= base_url('assets'); ?>../../assets/img/riau.png"
                                        style="height:50%;width:50%;">
                                    <h4 class="card-title">DINAS SOSIAL PROVINSI RIAU</h4>
                                </div>
                                <p class="category text-center">
                                    <strong>SISTEM INFORMASI PENGAJUAN CUTI DAN IZIN PEGAWAI
                                    </strong>
                                </p>
                                <?= $this->session->flashdata('message'); ?>
                                <div class="card-content">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" style="margin-top:12px;">person_pin</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip"
                                                value="<?= set_value('nip'); ?>">
                                            <small class=" text-danger"><?= form_error('nip'); ?> </small>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" style="margin-top:12px;">lock_outline</i>
                                        </span>
                                        <div class=" form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            <small class="text-danger"><?= form_error('password'); ?> </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">MASUK</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://dinsos.riau.go.id/web/">
                                Dinas Sosial Provinsi Riau
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                    document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.creative-tim.com/">TEKNIK INFORMATIKA</a>, KERJA PRAKTEK
                </p>
            </div>
        </footer>
    </div>
</div>