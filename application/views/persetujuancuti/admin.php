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
                        <?= form_error('persetujuancuti', '<div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">
                                            <i class="material-icons">close</i>
                                        </button>', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>



                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id Cuti</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Bidang</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Jumlah</th>
                                        <th>Konfirmasi</th>
                                        <th class="disabled-sorting ">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id Cuti</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Bidang</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Jumlah</th>
                                        <th>Konfirmasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($persetujuan as $pnjgn) : ?>
                                    <tr>
                                        <td><?= $pnjgn->id_cuti ?></td>
                                        <td><?= $pnjgn->nip ?></td>
                                        <td><?= $pnjgn->nama ?></td>
                                        <td><?= $pnjgn->bidang ?></td>
                                        <td><?= $pnjgn->jenis_cuti ?></td>
                                        <td><?= $pnjgn->tgl_mulai ?></td>
                                        <td><?= $pnjgn->tgl_selesai ?></td>
                                        <td><?= $pnjgn->jumlah ?></td>
                                        <td>
                                            <a data-target="#smallAlertModal<?= $pnjgn->id_cuti ?>" data-toggle="modal"
                                                type="button" rel="tooltip" title="Persetujuan Cuti"
                                                class="btn btn-info btn-sm">
                                                <i class="material-icons">how_to_vote</i>Persetujuan Cuti
                                            </a>
                                        </td>
                                        <td class="td-actions">

                                            <?php echo anchor('pengajuancuti/lihat/' . $pnjgn->id_cuti, '<button type="button" rel="tooltip" title="Form Permohonan Cuti" class="btn btn-warning btn-icon btn-simple btn-xs">
                                                                <i class="material-icons">dvr</i>
                                                            </button>'); ?>
                                        </td>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="smallAlertModal<?= $pnjgn->id_cuti  ?>"
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
                                                        <h5>Apakah Keputusan Anda ?</h5>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <?php echo anchor('persetujuancuti/disetujuiadmin/' . $pnjgn->id_cuti, '<div type="button" class="btn btn-success btn-round">
                                                <i class="material-icons">check_circle_outline</i>Disetujui
                                    </div>'); ?>
                                                        <?php echo anchor('persetujuancuti/ditolakadmin/' . $pnjgn->id_cuti, '<div type="button" class="btn btn-danger btn-round">
                                                <i class="material-icons">clear</i>Ditolak
                                    </div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END -->
                                    </tr> <?php endforeach ?>
                                </tbody>
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