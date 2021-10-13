<div class="content">
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">event</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Sisa Cuti Tahunan Individu </p>
                        <?php foreach ($sisa as $a) : ?>
                        <h3 class="card-title"><?= 12 - $a->jumlahcuti ?></h3>
                        <?php endforeach ?>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">warning</i> Sisa Cuti

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Pengajuan Izin</p>
                        <?php foreach ($total as $a) : ?>
                        <h3 class="card-title"><?= $a->jumlahizin ?></h3>
                        <?php endforeach ?>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Izin
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">how_to_vote</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Cuti Yang Belum Dikonfirmasi</p>
                        <?php foreach ($konfirmasi as $a) : ?>
                        <h3 class="card-title"><?= $a->belumdikonfir ?></h3>
                        <?php endforeach ?>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Cuti
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">how_to_vote</i>
                    </div>
                    <div class="card-content">
                        <?php foreach ($konfirmasiizin as $a) : ?>
                        <p class="category">Izin Yang Belum Dikonfirmasi</p>
                        <h3 class="card-title"><?= $a->belumdikonfir ?></h3>
                        <?php endforeach ?>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Izin
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Lihat Izin Pegawai</p>
                        <?php foreach ($lihatizin as $a) : ?>
                        <h3 class="card-title"><?= $a->lihat ?></h3>
                        <?php endforeach ?>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Izin
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>