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
                        <?= form_error('pengajuancuti', '<div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">
                                            <i class="material-icons">close</i>
                                        </button>', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>

                        <button class="btn btn-success btn-round btn-info" data-toggle="modal" data-target="#myModal">
                            <span class="btn-label">
                                <i class="material-icons">add</i>
                            </span>
                            Tambah Pengajuan
                        </button>


                        <p><?= $this->session->userdata('nip') ?></p>

                        <?php foreach ($tahunan as $saya) : ?>
                        <table>
                            <tr>
                                <td>Cuti Tahunan Sudah Dipakai
                                </td>
                                <td>:</td>
                                <?php foreach ($besar as $aa) : ?>
                                <?php if ($aa->jumlahcuti > 0) : ?>
                                <td class="btn btn-rose btn-xs"><?= 12 ?></td>
                                <?php else : ?>
                                <td class="btn btn-rose btn-xs"><?= 0 + $saya->jumlahcuti ?></td>
                                <?php endif ?>
                                <?php endforeach ?>
                            </tr>
                            <tr>
                                <td>Sisa Cuti Tahunan
                                </td>
                                <td>:</td>
                                <?php foreach ($besar as $aa) : ?>
                                <?php if ($aa->jumlahcuti > 0) : ?>
                                <td class="btn btn-rose btn-xs"><?= 0 ?></td>
                                <?php else : ?>
                                <td class="btn btn-rose btn-xs"><?= 12 - $saya->jumlahcuti  ?></td>
                                <?php endif ?>
                                <?php endforeach ?>
                            </tr>
                        </table>
                        <?php endforeach ?>

                        <?php foreach ($besar as $ok) : ?>
                        <div>
                            <p class="btn btn-rose btn-xs">Cuti Besar : <?= 0 + $ok->jumlahcuti ?></p>
                            <p class="btn btn-rose btn-xs">Batas Cuti Besar : <?= 90 - $ok->jumlahcuti  ?></p>
                        </div>
                        <?php endforeach ?>

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id Cuti</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th class="disabled-sorting ">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id Cuti</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($pengajuan_tabel as $pnjgn) : ?>
                                    <tr>
                                        <td><?= $pnjgn->id_cuti ?></td>
                                        <td><?= $pnjgn->nip ?></td>
                                        <td><?= $pnjgn->nama ?></td>
                                        <td><?= $pnjgn->jenis_cuti ?></td>
                                        <td><?= $pnjgn->tgl_mulai ?></td>
                                        <td><?= $pnjgn->tgl_selesai ?></td>
                                        <td><?= $pnjgn->jumlah ?></td>

                                        <?php if ($pnjgn->status == 'Tunggu Persetujuan Kepala Bidang' | $pnjgn->status == 'Tunggu Persetujuan Admin' | $pnjgn->status == 'Tunggu Persetujuan Sekretaris') : ?>
                                        <td class="btn btn-warning btn-sm"><?= $pnjgn->status ?></td>
                                        <?php elseif ($pnjgn->status == 'Ditolak Kepala Bidang' | $pnjgn->status == 'Ditolak Admin' | $pnjgn->status == 'Ditolak Sekretaris') : ?>
                                        <td class="btn btn-danger btn-sm"><?= $pnjgn->status ?></td>
                                        <?php else : ?>
                                        <td class="btn btn-success btn-sm"><?= $pnjgn->status ?></td>
                                        <?php endif ?>
                                        <td class="td-actions">

                                            <?php echo anchor('pengajuancuti/lihat/' . $pnjgn->id_cuti, '<button type="button" rel="tooltip" title="Form Permohonan Cuti" class="btn btn-warning btn-icon btn-simple btn-xs">
                                                                <i class="material-icons">dvr</i>
                                                            </button>'); ?>
                                            <?php if ($pnjgn->status == "Disetujui Sekretaris") : ?>
                                            <?php echo anchor('pengajuancuti/oke/' . $pnjgn->id_cuti, '<button type="button" rel="tooltip" title="Surat Cuti" class="btn btn-danger btn-icon btn-simple btn-xs">
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
        <form method="post" action="<?= base_url('pengajuancuti/tambah') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Pengajuan Cuti</h3>

                </div>
                <div class="modal-body">



                    <div class="form-group">
                        <label class="label-control" style="color:black;">Nip :*</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $info['nip']; ?>" />

                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Nama:*</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $info['nama']; ?>" />

                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Bidang</label>
                        <input type="text" class="form-control" id="bidang" name="bidang"
                            value="<?= $info['id_bidang']; ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Jenis Cuti</label>
                        <select class="selectpicker" name="jenis_cuti">
                            <option disabled selected>-- Pilih Jenis Cuti --</option>
                            <option value="Tahunan">Tahunan</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Melahirkan">Melahirkan</option>
                            <option value="Alasan Penting">Alasan Penting</option>
                            <option value="Besar">Besar</option>
                            <option value="Diluar Tanggungan Negara">Diluar Tanggungan Negara</option>
                        </select>
                        <small class="text-danger"><?= form_error('jenis_cuti'); ?> </small>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Tanggal Mulai</label>
                        <input type="text" class="form-control datepicker" id="tgl_mulai" name="tgl_mulai" value="" />
                        <small class=" text-danger"><?= form_error('tgl_mulai'); ?> </small>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Tanggal Selesai</label>
                        <input type="text" class="form-control datepicker" id="tgl_selesai" name="tgl_selesai"
                            value="" />
                        <small class=" text-danger"><?= form_error('tgl_selesai'); ?> </small>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Alasan</label>
                        <textarea type="text" class="form-control" id="alasan" name="alasan" value=""> </textarea>
                    </div>


                    <div class="form-group">
                        <label class="label-control" style="color:black;">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?= $info['alamat']; ?>" readonly />
                    </div>


                    <div class="form-group">
                        <label class="label-control" style="color:black;">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $info['no_hp']; ?>"
                            readonly />
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Tanggal Bekerja</label>
                        <input type="text" class="form-control" id="tgl_bekerja" name="tgl_bekerja"
                            value="<?= $info['tgl_bekerja']; ?>" readonly />
                    </div>
                    <input type="hidden" class="form-control" id="jtahun" name="jtahun"
                        value="<?= $saya->jumlahcuti ?>" />
                    <input type="hidden" class="form-control" id="jbesar" name="jbesar"
                        value="<?= $ok->jumlahcuti ?>" />
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