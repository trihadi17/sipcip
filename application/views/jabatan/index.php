<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><?= 'Data Jabatan' ?></h4>
                        <div class="toolbar">
                        </div>
                        <?= form_error('jabatan', '<div class="alert alert-danger">
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
                                        <th>Jabatan</th>
                                        <th class="disabled-sorting ">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($jabatan as $jbtn) : ?>
                                    <tr>
                                        <td><?= $jbtn->id_jabatan ?></td>
                                        <td><?= $jbtn->jabatan ?></td>
                                        <td class="td-actions">


                                            <a data-target="#myModalEdit<?= $jbtn->id_jabatan ?>" data-toggle="modal"
                                                type="button" rel="tooltip" class="btn btn-info btn-round">
                                                <i class="material-icons">edit</i>
                                            </a>

                                            <a data-target="#smallAlertModal<?= $jbtn->id_jabatan ?>"
                                                data-toggle="modal" type="button" rel="tooltip"
                                                class="btn btn-danger btn-round">
                                                <i class="material-icons">delete</i>
                                            </a>



                                            <!-- Modal EDIT -->

                                            <div class="modal fade" id="myModalEdit<?= $jbtn->id_jabatan ?>"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Data Jabatan</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="<?php echo base_url('jabatan/update_aksi') ?>">
                                                                <div class="citis">
                                                                    <div class="citiscol-25">
                                                                        <label for="fname">Jabatan</label>
                                                                    </div>
                                                                    <div class="citiscol-75">
                                                                        <input type="hidden" name="id_jabatan"
                                                                            placeholder="Jabatan"
                                                                            value="<?= $jbtn->id_jabatan ?> ">
                                                                        <input type="text" name="jabatan"
                                                                            class="required" placeholder="Jabatan"
                                                                            value="<?= $jbtn->jabatan ?> "> </div>
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
                                            <div class="modal fade" id="smallAlertModal<?= $jbtn->id_jabatan  ?>"
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
                                                            <?php echo anchor('jabatan/delete/' . $jbtn->id_jabatan, '<div type="button" class="btn btn-danger btn-round">
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
        <form method="post" action="<?= base_url('jabatan/tambah') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Data Jabatan</h3>
                </div>
                <div class="modal-body">
                    <div class="citis">
                        <div class="citiscol-25">
                            <label for="fname">Jabatan</label>
                        </div>
                        <div class="citiscol-75">
                            <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan">
                            <small class="text-danger"><?= form_error('jabatan'); ?> </small>
                        </div>
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