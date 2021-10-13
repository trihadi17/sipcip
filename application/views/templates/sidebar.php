<div class="wrapper">
    <div class="sidebar" data-active-color="rose" data-background-color="black"
        data-image="<?= base_url('assets') ?>/../assets/img/sidebar-3.jpg">
        <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
        <div class="logo">
            <a href="" class="simple-text">
                Dinas Sosial
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="" class="simple-text">
                DS
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <?= $user['nama']; ?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">My Profile</a>
                            </li>
                            <li>
                                <a href="#">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="nav">
                <?php if ($this->session->userdata('role_id') == '1') : ?>
                <li class="active">
                    <a href="<?php echo base_url() . 'dashboard/admin' ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="collapse" href="#tablesExamples" aria-expanded="true">
                        <i class="material-icons">folder_open</i>
                        <p>Data Master
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="tablesExamples">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('bidang/index') ?>">Data Bidang</a>
                            </li>
                            <li>
                                <a href="<?= base_url('golongan/index') ?>">Data Golongan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('jabatan/index') ?>">Data Jabatan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('klasifikasi/index') ?>">Data Klasifikasi</a>
                            </li>
                            <li>
                                <a href="<?= base_url('pangkat/index') ?>">Data Pangkat</a>
                            </li>

                            <li>
                                <a href="<?= base_url('pegawai/tabel_pegawai') ?>">Data Pegawai</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuancuti/indexadmin' ?>">
                        <i class="material-icons">how_to_vote</i>
                        <p>Persetujuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuanizin/lihatizinpegawai' ?>">
                        <i class="material-icons">visibility</i>
                        <p>Lihat Pegawai Izin</p>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">sd_storage</i>
                        <p>Riwayat Cuti & Izin
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatpegawaikeseluruhan') ?>">Riwayat Cuti
                                    Pegawai</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatpegawaikeseluruhan') ?>">Riwayat Izin
                                    Pegawai</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="" data-target="#smallAlertModal" data-toggle="modal">
                        <i class="material-icons">power_settings_new</i>
                        <p>Logout</p>
                    </a>
                </li>



                <?php elseif ($this->session->userdata('role_id') == '2') : ?>

                <li class="active">
                    <a href="<?php echo base_url() . 'dashboard/pegawai' ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url() . 'pegawai/index' ?>">
                        <i class="material-icons">face</i>
                        <p>My Profil</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuancuti/index' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuanizin/index' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Izin</p>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">sd_storage</i>
                        <p>Riwayat Cuti & Izin
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatindividu') ?>">Riwayat Cuti</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatindividu') ?>">Riwayat Izin</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="" data-target="#smallAlertModal" data-toggle="modal">
                        <i class="material-icons">power_settings_new</i>
                        <p>Logout</p>
                    </a>
                </li>

                <?php elseif ($this->session->userdata('role_id') == '3') : ?>
                <li class="active">
                    <a href="<?php echo base_url() . 'dashboard/sekretaris' ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'pegawai/index' ?>">
                        <i class="material-icons">face</i>
                        <p>My Profil</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuancuti/indexsekabid' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuanizin/indexsekabid' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Izin</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuancuti/indexsekretaris' ?>">
                        <i class="material-icons">how_to_vote</i>
                        <p>Persetujuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuanizin/indexsekretaris' ?>">
                        <i class="material-icons">how_to_vote</i>
                        <p>Persetujuan Izin</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuanizin/lihatizinpegawai' ?>">
                        <i class="material-icons">visibility</i>
                        <p>Lihat Pegawai Izin</p>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">sd_storage</i>
                        <p>Riwayat Cuti & Izin
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatindividu') ?>">Riwayat Cuti</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatpegawaikeseluruhan') ?>">Riwayat Cuti
                                    Pegawai</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatindividu') ?>">Riwayat Izin</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatpegawaikeseluruhan') ?>">Riwayat Izin
                                    Pegawai</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="" data-target="#smallAlertModal" data-toggle="modal">
                        <i class="material-icons">power_settings_new</i>
                        <p>Logout</p>
                    </a>
                </li>

                <?php elseif ($this->session->userdata('role_id') == '4') : ?>
                <li class="active">
                    <a href="<?php echo base_url() . 'dashboard/kepegawaian' ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url() . 'pegawai/index' ?>">
                        <i class="material-icons">face</i>
                        <p>My Profil</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuancuti/indexsekabid' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuanizin/indexsekabid' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Izin</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuancuti/index' ?>">
                        <i class="material-icons">how_to_vote</i>
                        <p>Persetujuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuanizin/index' ?>">
                        <i class="material-icons">how_to_vote</i>
                        <p>Persetujuan Izin</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuanizin/lihatizin' ?>">
                        <i class="material-icons">visibility</i>
                        <p>Lihat Pegawai Izin</p>
                    </a>
                </li>



                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">sd_storage</i>
                        <p>Riwayat Cuti & Izin
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatindividu') ?>">Riwayat Cuti</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatpegawaibidang') ?>">Riwayat Cuti Pegawai</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatindividu') ?>">Riwayat Izin</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatpegawaibidang') ?>">Riwayat Izin Pegawai</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="" data-target="#smallAlertModal" data-toggle="modal">
                        <i class="material-icons">power_settings_new</i>
                        <p>Logout</p>
                    </a>
                </li>

                <?php elseif ($this->session->userdata('role_id') == '5') : ?>
                <li class="active">
                    <a href="<?php echo base_url() . 'dashboard/perencanaan' ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url() . 'pegawai/index' ?>">
                        <i class="material-icons">face</i>
                        <p>My Profil</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuancuti/indexsekabid' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'pengajuanizin/indexsekabid' ?>">
                        <i class="material-icons">playlist_add</i>
                        <p>Pengajuan Izin</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuancuti/index' ?>">
                        <i class="material-icons">how_to_vote</i>
                        <p>Persetujuan Cuti</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuanizin/index' ?>">
                        <i class="material-icons">how_to_vote</i>
                        <p>Persetujuan Izin</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url() . 'persetujuanizin/lihatizin' ?>">
                        <i class="material-icons">visibility</i>
                        <p>Lihat Pegawai Izin</p>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">sd_storage</i>
                        <p>Riwayat Cuti & Izin
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatindividu') ?>">Riwayat Cuti</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatcuti/riwayatpegawaibidang') ?>">Riwayat Cuti Pegawai</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatindividu') ?>">Riwayat Izin</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayatizin/riwayatpegawaibidang') ?>">Riwayat Izin Pegawai</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="" data-target="#smallAlertModal" data-toggle="modal">
                        <i class="material-icons">power_settings_new</i>
                        <p>Logout</p>
                    </a>
                </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>


    <!-- Modal Hapus -->
    <div class="modal fade" id="smallAlertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="material-icons">clear</i></button>
                </div>
                <div class="modal-body text-center">
                    <h5>Apakah Kamu Mau Keluar ?</h5>
                </div>
                <div class="modal-footer text-center">
                    <?php echo anchor('auth/logout/', '<div type="button" class="btn btn-danger btn-round">
                                                <i class="material-icons">power_settings_new</i>Keluar
                                    </div>'); ?>
                    <button type="button" class="btn btn-simple" data-dismiss="modal">Cancel</button> </div>
            </div>
        </div>
    </div>
    <!-- END -->