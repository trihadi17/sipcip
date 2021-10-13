<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><?= $title ?></h4>
                        <div class="toolbar">
                        </div>
                        <?= form_error('pengajuanizin', '<div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">
                                            <i class="material-icons">close</i>
                                        </button>', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>

                        <p>Pengajuan Izin : <button class="btn btn-rose btn-sm"> <?php date_default_timezone_get("Asia/Jakarta");
                                                                                    echo date('j F Y'); ?> </button>
                        </p>
                        <button class="btn btn-success btn-round btn-info" data-toggle="modal" data-target="#myModal">
                            <span class="btn-label">
                                <i class="material-icons">add</i>
                            </span>
                            Tambah Pengajuan
                        </button>


                        <p><?= $this->session->userdata('nip') ?></p>


                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id Izin</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Bidang</th>
                                        <th>Jenis Izin</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Status</th>
                                        <th>Tgl Pengajuan</th>
                                        <th class="disabled-sorting ">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id Izin</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Bidang</th>
                                        <th>Jenis Izin</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Status</th>
                                        <th>Tgl Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($pengajuan_tabel as $izin) : ?>
                                    <tr>
                                        <td><?= $izin->id_izin ?></td>
                                        <td><?= $izin->nip ?></td>
                                        <td><?= $izin->nama ?></td>
                                        <td><?= $izin->bidang ?></td>
                                        <td><?= $izin->jenis_izin ?></td>
                                        <td><?= $izin->jam_mulai ?></td>
                                        <td><?= $izin->jam_selesai ?></td>


                                        <?php if ($izin->status == 'Tunggu Persetujuan Sekretaris') : ?>
                                        <td class="btn btn-warning btn-sm"><?= $izin->status ?></td>
                                        <?php elseif ($izin->status == 'Ditolak Sekretaris') : ?>
                                        <td class="btn btn-danger btn-sm"><?= $izin->status ?></td>
                                        <?php else : ?>
                                        <td class="btn btn-success btn-sm"><?= $izin->status ?></td>
                                        <?php endif ?>
                                        <td><?= $izin->tgl_pengajuan ?></td>
                                        <td class="td-actions">

                                            <?php echo anchor('pengajuanizin/lihat/' . $izin->id_izin, '<button type="button" rel="tooltip" title="Form Permohonan Izin" class="btn btn-warning btn-icon btn-simple btn-xs">
                                                                <i class="material-icons">dvr</i>
                                                            </button>'); ?>
                                            <?php if ($izin->status == "Disetujui Sekretaris") : ?>
                                            <?php echo anchor('pengajuanizin/oke/' . $izin->id_izin, '<button type="button" rel="tooltip" title="Surat Izin" class="btn btn-danger btn-icon btn-simple btn-xs">
                                                                <i class="material-icons">print</i>
                                                            </button>'); ?>
                                            <?php endif ?>

                                        </td>

                                    </tr> <?php endforeach ?> </tbody>
                            </table>
                        </div>

                    </div> <!-- end content-->
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
        <form method="post" action="<?= base_url('pengajuanizin/tambahhsekabid') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Pengajuan Izin</h3>

                </div>
                <div class="modal-body">



                    <div class="form-group">
                        <label class="label-control" style="color:black;">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $info['nip']; ?>"
                            readonly />

                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $info['nama']; ?>"
                            readonly />

                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Bidang</label>
                        <input type="text" class="form-control" id="bidang" name="bidang"
                            value="<?= $info['id_bidang']; ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Jenis Izin</label>
                        <select class="selectpicker" name="jenis_izin">
                            <option disabled selected>-- Pilih Jenis Izin --</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Keperluan Dinas">Keperluan Dinas</option>
                            <option value="Alasan Lain">Alasan Lain</option>
                        </select>
                        <small class="text-danger"><?= form_error('jenis_izin'); ?> </small>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Jam Mulai</label>
                        <input type="text" class="form-control timepicker" id="jam_mulai" name="jam_mulai" value="" />
                        <small class=" text-danger"><?= form_error('jam_mulai'); ?> </small>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Jam Selesai</label>
                        <input type="text" class="form-control timepicker" id="jam_selesai" name="jam_selesai"
                            value="" />
                        <small class=" text-danger"><?= form_error('jam_selesai'); ?> </small>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Perihal</label>
                        <textarea type="text" class="form-control" id="perihal" name="perihal" value=""> </textarea>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Tanggal Pengajuan</label>
                        <input type="text" class="form-control datepicker" id="tgl_pengajuan" name="tgl_pengajuan"
                            value="<?= date('Y-m-d') ?>" readonly />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button class="btn btn-danger btn-simple" data-dismiss="modal">Keluar</button>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- end  modal -->


<!-- Modal EDIT -->

<!-- end  modal -->