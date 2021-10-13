<div class="content">
    <div class="container-fluid">
        <div class="col-md-12" style="margin-top:5px;">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Profil</h4>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="<?= base_url('assets/img/profil/') . $bidang['foto']; ?>" />
                                </a>
                            </div>

                            <div class="card-content">
                                <h6 class="category text-gray"><?= $bidang['id_jabatan']; ?></h6>

                                <h4 class="card-title"><?= $bidang['nama']; ?></h4>



                            </div>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Nama </p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $bidang['nama'] ?>" readonly>
                        </div>
                    </div>


                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Lahir </p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $bidang['tempat_lahir'] ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Tgl<br> Lahir</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?= $bidang['tgl_lahir'] ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Email</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" value="<?= $bidang['email'] ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Nomor<br> Hp</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">No Hp</label>
                            <input type="text" class="form-control" value="<?= $bidang['no_hp'] ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Alamat</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Alamat</label>
                            <input type="text" class="form-control" value="<?= $bidang['alamat'] ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Jabatan</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Jabatan</label>
                            <input type="text" class="form-control" value="<?= $bidang['id_jabatan'] ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Pangkat</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Pangkat</label>
                            <input type="text" class="form-control" value="<?= $bidang['id_pangkat'] ?>" readonly>
                        </div>
                    </div>

                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Klasifikasi</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Klasifikasi</label>
                            <input type="text" class="form-control" value="<?= $bidang['id_klasifikasi'] ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Golongan</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Golongan</label>
                            <input type="text" class="form-control" value="<?= $bidang['id_golongan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Bidang</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Bidang</label>
                            <input type="text" class="form-control" value="<?= $bidang['id_bidang'] ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Status</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Status</label>
                            <input type="text" class="form-control" value="<?= $bidang['status'] ?>" readonly>
                        </div>
                    </div>
                    <div class="input-group" style="margin-bottom:0px;">
                        <span class="input-group-addon">
                            <p style="margin-top:20px;">Tgl <br> Bekerja</p>
                        </span>
                        <div class="form-group label-floating">
                            <label class="control-label">Tanggal Bekerja</label>
                            <input type="text" class="form-control" value="<?= $bidang['tgl_bekerja'] ?>" readonly>
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