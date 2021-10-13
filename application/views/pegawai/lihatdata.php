<div class="content">
    <div class="container-fluid">
        <div class="col-md-12" style="margin-top:5px;">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">library_books</i>
                </div>
                <?php foreach ($pegawai as $a) : ?>
                <div class="card-content">
                    <h4 class="card-title">Profil</h4>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="<?= base_url('assets/img/profil/') . $a->foto ?>" />
                                </a>
                            </div>

                            <div class="card-content">
                                <h6 class="category text-gray"><?= $a->id_jabatan ?></h6>

                                <h4 class="card-title"><?= $a->nama ?></h4>



                            </div>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">NIP </p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->nip ?>" readonly>
                        </div>
                    </div>


                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Lahir </p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->tempat_lahir ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Tgl<br> Lahir</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->tgl_lahir ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Email</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->email ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Nomor<br> Hp</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->no_hp ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Alamat</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->alamat ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Jabatan</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->id_jabatan ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Pangkat</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->id_pangkat ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Klasifikasi</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->id_klasifikasi ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Golongan</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->id_golongan ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Bidang</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->id_bidang ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Status</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->status ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Tgl <br> Bekerja</p>
                        </span>
                        <div class="form-group label-floating">
                            <input type="text" class="form-control" value="<?= $a->tgl_bekerja ?>" readonly>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Datetime Picker</h4>
                    <div class="form-group">
                        <label class="label-control">Date Picker</label>
                        <input type="text" class="form-control timepicker" value="<?php date_default_timezone_get('Asia/Jakarta');
                                                                                        echo date('m-d-Y'); ?>" />
                </div>
            </div>
        </div>
    </div>
</div> -->

    </div>


</div>
<?php endforeach  ?>