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

                        <p>Pengajuan Izin : <button class="btn btn-rose btn-sm"> <?php date_default_timezone_get("Asia/Jakarta");
                                                                                    echo date('j F Y'); ?> </button>
                        </p>


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
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($persetujuan as $pnjgn) : ?>
                                    <tr>
                                        <td><?= $pnjgn->id_izin ?></td>
                                        <td><?= $pnjgn->nip ?></td>
                                        <td><?= $pnjgn->nama ?></td>
                                        <td><?= $pnjgn->bidang ?></td>
                                        <td><?= $pnjgn->jenis_izin ?></td>
                                        <td><?= $pnjgn->jam_mulai ?></td>
                                        <td><?= $pnjgn->jam_selesai ?></td>
                                        <td class="td-actions">

                                            <?php echo anchor('pengajuanizin/lihat/' . $pnjgn->id_izin, '<button type="button" rel="tooltip" title="Form Permohonan Izin" class="btn btn-warning btn-icon btn-simple btn-xs">
                                                                <i class="material-icons">dvr</i>
                                                            </button>'); ?>
                                        </td>
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