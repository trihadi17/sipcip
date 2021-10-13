<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><?= 'Data Pangkat' ?></h4>
                        <div class="toolbar">
                        </div>
                        <?= form_error('pangkat', '<div class="alert alert-danger">
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
                                        <th>Id</th>
                                        <th>Pangkat</th>
                                        <th class="disabled-sorting ">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Pangkat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($pangkat as $jbtn) : ?>
                                    <tr>
                                        <td><?= $jbtn->id_pangkat ?></td>
                                        <td><?= $jbtn->pangkat ?></td>




                                        <td class="td-actions">

                                            <a data-target="#myModalEdit<?= $jbtn->id_pangkat ?>" data-toggle="modal"
                                                type="button" rel="tooltip" class="btn btn-info btn-round">
                                                <i class="material-icons">edit</i>
                                            </a>

                                            <a data-target="#smallAlertModal<?= $jbtn->id_pangkat ?>"
                                                data-toggle="modal" type="button" rel="tooltip"
                                                class="btn btn-danger btn-round">
                                                <i class="material-icons">delete</i>
                                            </a>



                                            <!-- Modal EDIT -->

                                            <div class="modal fade" id="myModalEdit<?= $jbtn->id_pangkat ?>"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Data Pangkat</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="<?php echo base_url('pangkat/update_aksi') ?>">
                                                                <div class="citis">
                                                                    <div class="citiscol-25">
                                                                        <label for="fname">Pangkat</label>
                                                                    </div>
                                                                    <div class="citiscol-75">
                                                                        <input type="hidden" name="id_pangkat"
                                                                            placeholder="Pangkat"
                                                                            value="<?= $jbtn->id_pangkat ?> ">
                                                                        <input type="text" name="pangkat"
                                                                            class="required" placeholder="Pangkat"
                                                                            value="<?= $jbtn->pangkat ?> "> </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-success">Simpan</button>
                                                            <button class="btn btn-danger btn-simple"
                                                                data-dismiss="modal">Keluar</button>
                                                        </div>

                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- end  modal -->



                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="smallAlertModal<?= $jbtn->id_pangkat  ?>"
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
                                                            <?php echo anchor('pangkat/delete/' . $jbtn->id_pangkat, '<div type="button" class="btn btn-danger btn-round">
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
                                    <?php endforeach ?>
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
        <form method="post" action="<?= base_url('pangkat/tambah') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Data Pangkat</h3>
                </div>
                <div class="modal-body">
                    <div class="citis">
                        <div class="citiscol-25">
                            <label for="fname">Pangkat</label>
                        </div>
                        <div class="citiscol-75">
                            <input type="text" id="pangkat" name="pangkat" placeholder="Pangkat">
                            <small class="text-danger"><?= form_error('pangkat'); ?> </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Jam Mulai</label>
                        <input type="text" class="form-control timepicker" id="jammulai" name="jammulai" value="" />
                    </div>

                    <div class="form-group">
                        <label class="label-control" style="color:black;">Jam Selesai</label>
                        <input type="text" class="form-control timepicker" id="jamselesai" name="jamselesai" value="" />
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