<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <p style="text-align:right;margin-right:245px;margin-top:20px;padding-top:10px;"> Pekanbaru, Oktober
                        2019
                    </p>

                    <p style="text-align:right;margin-right:100px;">Kepada Yth,
                        Sekretaris
                        Dinas Sosial
                        Provinsi Riau
                    </p>

                    <p style="text-align:right;margin-right:313px;margin-bottom:70px;padding:0px;">di - Pekanbaru
                    </p>
                    <?php foreach ($pengajuan_cuti as $penga) : ?>
                    <h4 align="center">Form Permohonan Cuti</h4>
                    <table border="1" align="center" style="width:90%;height:100%;margin-bottom:100px;">
                        <tr>
                            <td colspan="6"><strong style="margin-left:10px;">I. DATA PEGAWAI </strong></td>
                        </tr>
                        <tr>
                            <td>
                                <strong style="margin-left:5px;">Nama<b>
                            </td>
                            <td colspan="2">
                                <strong style="margin-left:10px;"><?= $penga->nama ?></strong>
                            </td>
                            <td>
                                <strong style="margin-left:5px;">NIP<b>
                            </td>
                            <td colspan="2"><strong style="margin-left:10px;"><?= $penga->nip ?> </strong></td>
                        </tr>
                        <tr>
                            <td>
                                <strong style="margin-left:5px;">Jabatan<b>
                            </td>
                            <td colspan="2">
                                <strong style="margin-left:10px;"><?= $penga->jabatan ?> </strong>
                            </td>
                            <td>
                                <strong style="margin-left:5px;">Masa Kerja <b>
                            </td>
                            <td colspan="2"><strong style="margin-left:10px;">
                                    <?php
                                            $t1 = new DateTime($penga->bekerja);
                                            $t2 = new DateTime('now');
                                            echo $t3 = $t1->diff($t2)->y;
                                            ?> Tahun,

                                    <?php
                                            $t1 = new DateTime($penga->bekerja);
                                            $t2 = new DateTime('now');
                                            echo $t3 = $t1->diff($t2)->m;
                                            ?> Bulan
                                </strong></td>
                        </tr>

                        <tr>
                            <td colspan="6"><strong style="margin-left:10px;">II. JENIS CUTI YANG DIAMBIL </strong></td>
                        </tr>

                        <tr>
                            <td colspan="6"><strong style="margin-left:10px;"><?= $penga->jenis_cuti ?> </strong></td>
                        </tr>
                        <tr>

                        <tr>
                            <td colspan="6"><strong style="margin-left:10px;">III. ALASAN CUTI </strong></td>
                        </tr>

                        <tr>
                            <td colspan="6"><strong style="margin-left:10px;"><?= $penga->alasan ?>
                                </strong></td>
                        </tr>

                        <tr>
                            <td colspan="6"><strong style="margin-left:10px;">IV. LAMANYA CUTI </strong></td>
                        </tr>

                        <tr>
                            <td><strong style="margin-left:10px;"> Selama </strong></td>
                            <td><strong style="margin-left:10px;"> <?= $penga->jumlah ?> (hari) Kerja </strong></td>
                            <td><strong style="margin-left:10px;"> Mulai Tanggal </strong></td>
                            <td><strong style="margin-left:10px;"> <?php date_default_timezone_get('Asia/Jakarta');
                                                                            echo date('j F Y', strtotime($penga->tgl_mulai));
                                                                            ?></strong></td>
                            <td><strong style="margin-left:10px;"> s/d </strong></td>
                            <td><strong style="margin-left:10px;"> <?php date_default_timezone_get('Asia/Jakarta');
                                                                            echo date('j F Y', strtotime($penga->tgl_selesai));
                                                                            ?> </strong></td>
                        </tr>

                        <tr>
                            <td colspan="6"><strong style="margin-left:10px;">V. ALAMAT SELAMA CUTI </strong></td>
                        </tr>

                        <tr>
                            <td colspan="4"><strong style="margin-left:10px;"></strong></td>
                            <td colspan="1"><strong style="margin-left:10px;">TELP</strong></td>
                            <td><strong style="margin-left:10px;"><?= $penga->no_hp ?></strong></td>
                        </tr>

                        <tr>
                            <td colspan="4"><strong style="margin-left:10px;"> <?= $penga->alamat ?></strong></td>
                            <td colspan="2">
                                <p style="text-align:center;"> Hormat Saya </p> <br><br>
                                <p style="text-align:center;margin-top:10px;font-weight:bold;"> <?= $penga->nama ?> </p>
                                <p style="text-align:center;margin-top:10px;"> NIP . <?= $penga->nip ?> </p>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php endforeach; ?>
            </div>

        </div> <!-- end content-->
    </div>
    <!--  end card  -->
</div>