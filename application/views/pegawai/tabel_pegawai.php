<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><?= 'Data Pegawai' ?></h4>
                        <div class="toolbar">
                        </div>
                        <?= form_error('nip', '<div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">
                                            <i class="material-icons">close</i>
                                        </button>', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <button class="btn btn-success btn-round btn-info" data-toggle="modal" data-target="#myModal">
                            <span class="btn-label">
                                <i class="material-icons">add</i>
                            </span>
                            Tambah Data
                        </button>

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id Pegawai</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Bidang</th>
                                        <th>Tanggal Bekerja</th>
                                        <th class="disabled-sorting ">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id Pegawai</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Bidang</th>
                                        <th>Tanggal Bekerja</th>
                                        <th>Aksi </th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($pegawai as $jbtn) : ?>
                                    <tr>
                                        <td><?= $jbtn->id_pegawai ?></td>
                                        <td><?= $jbtn->nip ?></td>
                                        <td><?= $jbtn->nama ?></th>
                                        <td><?= $jbtn->id_jabatan ?></th>
                                        <td><?= $jbtn->id_bidang ?></th>
                                        <td><?= $jbtn->tgl_bekerja ?></td>
                                        <td class="td-actions">


                                            <a data-target="#myModalEdit<?= $jbtn->id_pegawai ?>" data-toggle="modal"
                                                type="button" rel="tooltip" title="Ubah Data Pegawai"
                                                class="btn btn-info btn-icon btn-simple btn-xs">
                                                <i class="material-icons">edit</i>
                                            </a>

                                            <a data-target="#smallAlertModal<?= $jbtn->id_pegawai ?>"
                                                data-toggle="modal" type="button" rel="tooltip"
                                                title="Hapus Data Pegawai"
                                                class="btn btn-danger btn-icon btn-simple btn-xs">
                                                <i class="material-icons">delete</i>
                                            </a>

                                            <?php echo anchor('pegawai/lihatdata/' . $jbtn->id_pegawai, '<button type="button" rel="tooltip" title="Lihat Data" class="btn btn-warning btn-icon btn-simple btn-xs">
                                                                <i class="material-icons">visibility</i>
                                                            </button>'); ?>





                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="smallAlertModal<?= $jbtn->id_pegawai  ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-small ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"><i
                                                                    class="material-icons">clear</i></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <h5>Apakah Kamu Mau Menghapusnya ?</h5>
                                                        </div>
                                                        <div class="modal-footer text-center">
                                                            <?php echo anchor('pegawai/delete/' . $jbtn->id_pegawai, '<div type="button" class="btn btn-danger btn-round">
                                                <i class="material-icons">delete</i>Hapus
                                    </div>'); ?>
                                                            <button type="button" class="btn btn-simple"
                                                                data-dismiss="modal">Cancel</button> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END -->


                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>










<!-- Modal ADD -->

<div class="modal fade" id="myModal" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open_multipart('pegawai/tambah'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Pegawai</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="label-control" style="color:black;">Nip :*</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="" />
                    <small class="text-danger"><?= form_error('nip'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Nama:*</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="" />
                    <small class="text-danger"><?= form_error('nama'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Tempat Lahir:*</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="" />
                    <small class="text-danger"><?= form_error('tempat_lahir'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Tanggal Lahir:*</label>
                    <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" value="" />
                    <small class=" text-danger"><?= form_error('tgl_lahir'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Email:*</label>
                    <input type="text" class="form-control" id="email" name="email" value="" />
                    <small class="text-danger"><?= form_error('email'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">No Hp:*</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="" />
                    <small class="text-danger"><?= form_error('no_hp'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" value=""> </textarea>
                    <small class="text-danger"><?= form_error('alamat'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Jabatan</label>
                    <select class="selectpicker" name="id_jabatan">
                        <option disabled selected>--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $jbtn) : ?>
                        <option value="<?= $jbtn->jabatan; ?>"><?= $jbtn->jabatan; ?></option>
                        <?php endforeach ?>
                    </select>
                    <small class="text-danger"><?= form_error('id_jabatan'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Pangkat</label>
                    <select class="selectpicker" name="id_pangkat">
                        <option disabled selected>--Pilih Pangkat--</option>
                        <?php foreach ($pangkat as $jbtn) : ?>
                        <option value="<?= $jbtn->pangkat; ?>"><?= $jbtn->pangkat; ?></option>
                        <?php endforeach ?>
                    </select>
                    <small class="text-danger"><?= form_error('id_pangkat'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Klasifikasi</label>
                    <select class="selectpicker" name="id_klasifikasi">
                        <option disabled selected>--Pilih Klasifikasi--</option>
                        <?php foreach ($klasifikasi as $jbtn) : ?>
                        <option value="<?= $jbtn->klasifikasi; ?>"><?= $jbtn->klasifikasi; ?></option>
                        <?php endforeach ?>
                    </select>
                    <small class="text-danger"><?= form_error('id_klasifikasi'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Golongan</label>
                    <select class="selectpicker" name="id_golongan">
                        <option disabled selected>--Pilih Golongan--</option>
                        <?php foreach ($golongan as $jbtn) : ?>
                        <option value="<?= $jbtn->golongan; ?>"><?= $jbtn->golongan; ?></option>
                        <?php endforeach ?>
                    </select>
                    <small class="text-danger"><?= form_error('id_golongan'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Bidang</label>
                    <select class="selectpicker" name="id_bidang">
                        <option disabled selected>--Pilih Bidang--</option>
                        <?php foreach ($bidang as $jbtn) : ?>
                        <option value="<?= $jbtn->bidang; ?>"><?= $jbtn->bidang; ?></option>
                        <?php endforeach ?>
                    </select>
                    <small class="text-danger"><?= form_error('id_bidang'); ?> </small>
                </div>


                <div class="form-group">
                    <label class="label-control" style="color:black;">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="" />
                    <small class="text-danger"><?= form_error('status'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Tanggal Bekerja</label>
                    <input type="text" class="form-control datepicker" id="tgl_bekerja" name="tgl_bekerja" value="" />
                    <small class="text-danger"><?= form_error('tgl_bekerja'); ?> </small>
                </div>


                <label class="label-control" style="color:black;">Foto</label>
                <input type="file" class="btn btn-info btn-sm" id="foto" name="foto" value="" />
                <small class="text-danger"><?= form_error('foto'); ?> </small>


                <div class="form-group">
                    <label class="label-control" style="color:black;">Password</label>
                    <input type="password" id="password" name="password" class="form-control" />
                    <small class="text-danger"><?= form_error('password'); ?> </small>
                </div>

                <div class="form-group">
                    <label class="label-control" style="color:black;">Hak Akses</label>
                    <select class="selectpicker" name="role_id">
                        <option disabled selected>--Pilih Hak Akses--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <small class="text-danger"><?= form_error('role_di'); ?> </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button class="btn btn-danger btn-simple" data-dismiss="modal">Keluar</button>
            </div>

        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<!-- end  modal -->


<!-- Modal EDIT -->
<?php foreach ($pegawai as $e) : ?>
<div class="modal fade" id="myModalEdit<?= $e->id_pegawai ?>" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Pegawai</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('pegawai/update_aksi') ?>">
                    <div class="form-group">
                        <label class="label-control" style="color:black;">Nip :*</label>
                        <input type="text" name="nip" placeholder="Nip" class="form-control" value="<?= $e->nip; ?>"
                            readonly>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Nama :*</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama"
                            value="<?= $e->nama; ?> ">
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Tempat Lahir :*</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                            value="<?= $e->tempat_lahir; ?> ">
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Tanggal Lahir :*</label>
                        <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control datepicker"
                            value="<?= $e->tgl_lahir; ?>" />
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Email :*</label>
                        <input type="text" id="email" name="email" placeholder="Email" class="form-control"
                            value="<?= $e->email; ?>">
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">No HP:*</label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="No HP"
                            value="<?= $e->no_hp; ?>">
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Alamat:*</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"
                            value="<?= $e->alamat; ?>">
                    </div>
                    <div class="form-group">
                        <label class="label-control" style="color:black;">Tanggal Bekerja:*</label>
                        <input type="text" id="tgl_bekerja" name="tgl_bekerja" class="form-control datepicker"
                            value="<?= $e->tgl_bekerja; ?>" />
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Jabatan:*</label>
                        <select name="id_jabatan" class="selectpicker">
                            <option value="" disabled selected><?= $e->id_jabatan ?>
                            </option>
                            <option disabled>--Pilih Jabatan--</option>
                            <?php foreach ($jabatan as $jbtn) : ?>
                            <option value="<?= $jbtn->jabatan; ?>">
                                <?= $jbtn->jabatan; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Pangkat:*</label>
                        <select name="id_pangkat" class="selectpicker">
                            <option value="" disabled selected><?= $e->id_pangkat ?>
                            </option>
                            <option disabled>--Pilih Pangkat--</option>
                            <?php foreach ($pangkat as $pkt) : ?>
                            <option value="<?= $pkt->pangkat; ?>">
                                <?= $pkt->pangkat; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Klasifikasi:*</label>
                        <select name="id_klasifikasi" class="selectpicker">
                            <option value="" disabled selected><?= $e->id_klasifikasi ?>
                            </option>
                            <option disabled>--Pilih Klasifikasi--</option>
                            <?php foreach ($klasifikasi as $klk) : ?>
                            <option value="<?= $klk->klasifikasi; ?>">
                                <?= $klk->klasifikasi; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-control" style="color:black;">Golongan:*</label>
                        <select name="id_golongan" class="selectpicker">
                            <option value="" disabled selected><?= $e->id_golongan ?>
                            </option>
                            <option disabled>--Pilih Golongan--</option>
                            <?php foreach ($golongan as $glg) : ?>
                            <option value="<?= $glg->golongan; ?>">
                                <?= $glg->golongan; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Bidang:*</label>
                        <select name="id_bidang" class="selectpicker">
                            <option value="" disabled selected><?= $e->id_bidang ?>
                            </option>
                            <option disabled>--Pilih Bidang--</option>
                            <?php foreach ($bidang as $bdg) : ?>
                            <option value="<?= $bdg->bidang; ?>">
                                <?= $bdg->bidang; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Status:*</label>
                        <input type="text" id="status" name="status" class="form-control" placeholder="Status"
                            value="<?= $e->status; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button class="btn btn-danger btn-simple" data-dismiss="modal">Keluar</button>
                    </div>

            </div>
            </form>
        </div>
    </div>
    <?php endforeach ?>

    <!-- end  modal -->