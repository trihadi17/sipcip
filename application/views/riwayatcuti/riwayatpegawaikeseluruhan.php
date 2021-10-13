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
                        <ul class="nav nav-pills nav-pills-rose">
                            <li class="active">
                                <a href="#pill1" data-toggle="tab">Sekretariat</a>
                            </li>
                            <li>
                                <a href="#pill2" data-toggle="tab">Kepegawaian</a>
                            </li>
                            <li>
                                <a href="#pill3" data-toggle="tab">Perencanaan</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="pill1">
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
                                                <th>Status</th>
                                                <th>Aksi</th>
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
                                                <th>Status</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($riwayatsk as $pnjgn) : ?>
                                            <tr>
                                                <td><?= $pnjgn->id_cuti ?></td>
                                                <td><?= $pnjgn->nip ?></td>
                                                <td><?= $pnjgn->nama ?></td>
                                                <td><?= $pnjgn->bidang ?></td>
                                                <td><?= $pnjgn->jenis_cuti ?></td>
                                                <td><?= $pnjgn->tgl_mulai ?></td>
                                                <td><?= $pnjgn->tgl_selesai ?></td>

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
                                                </td>
                                            </tr> <?php endforeach ?> </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill2">
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
                                                <th>Status</th>
                                                <th>Aksi</th>
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
                                                <th>Status</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($riwayatkp as $pnjgn) : ?>
                                            <tr>
                                                <td><?= $pnjgn->id_cuti ?></td>
                                                <td><?= $pnjgn->nip ?></td>
                                                <td><?= $pnjgn->nama ?></td>
                                                <td><?= $pnjgn->bidang ?></td>
                                                <td><?= $pnjgn->jenis_cuti ?></td>
                                                <td><?= $pnjgn->tgl_mulai ?></td>
                                                <td><?= $pnjgn->tgl_selesai ?></td>

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
                                                </td>
                                            </tr> <?php endforeach ?> </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill3">
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
                                                <th>Status</th>
                                                <th>Aksi</th>
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
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($riwayatpr as $pnjgn) : ?>
                                            <tr>
                                                <td><?= $pnjgn->id_cuti ?></td>
                                                <td><?= $pnjgn->nip ?></td>
                                                <td><?= $pnjgn->nama ?></td>
                                                <td><?= $pnjgn->bidang ?></td>
                                                <td><?= $pnjgn->jenis_cuti ?></td>
                                                <td><?= $pnjgn->tgl_mulai ?></td>
                                                <td><?= $pnjgn->tgl_selesai ?></td>

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
                                                </td>
                                            </tr> <?php endforeach ?> </tbody>
                                    </table>
                                </div>
                            </div>
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