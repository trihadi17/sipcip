<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><?= 'Data Jabatan' ?></h4>
                        <div class="toolbar">
                        </div>
                        <?php foreach ($jabatan as $jbtn) : ?>
                            <form method="post" action="<?php echo base_url('jabatan/update_aksi') ?>">
                                <div class="citis">
                                    <div class="citiscol-25">
                                        <label for="fname">Jabatan</label>
                                    </div>
                                    <div class="citiscol-75">
                                        <input type="hidden" name="id_jabatan" placeholder="Jabatan" value="<?= $jbtn->id_jabatan ?> ">
                                        <input type="text" name="jabatan" class="required" placeholder="Jabatan" value="<?= $jbtn->jabatan ?> "> </div>
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button class="btn btn-danger btn-simple" href="index.php">Keluar</button>
                    </div>

                </div>
                </form>
            <?php endforeach ?>



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