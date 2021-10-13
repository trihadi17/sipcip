<title><?= $title ?></title>
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.line-title {
    border: 0;
    border-style: inset;
    border-top: 1px solid #000;
}
</style>
</head>

<img src="assets/img/logoriau.jpg" style="position: absolute; margin-left:5px; width: 85px; height: auto;">
<table style="width: 100%;">
    <tr>
        <td align="center">
            <span style="line-height: 1;font-size:20px;">
                PEMERINTAH PROVINSI RIAU
            </span> <br>
            <span style="line-height: 1;font-size:30px;font-weight:bold;">
                DINAS SOSIAL PROVINSI RIAU
            </span> <br>
            <span style="line-height: 1;font-size:15px;">
                Jl. Jendral Sudirman No. 239 Telepon : 21593 Fax. 37690
            </span> <br>
            <span style="line-height: 1;font-size:17px;">
                P E K A N B A R U
            </span> <br>
            <span style="font-size:15px;text-align:right;">
                Kode Pos : 28116
            </span> <br>
        </td>
    </tr>
</table>

<hr class="line-title">

<?php $no = 1;
foreach ($pengajuan_izin as $row) : ?>

<p align="right" style="margin-right:20px;"> Pekanbaru, <?php date_default_timezone_get('Asia/Jakarta');
                                                                echo date('j F Y', strtotime($row->tgl_pengajuan)) ?>
</p>
<p align="center" style="font:17px;margin-top:30px;">
    <b><u> SURAT IZIN KELUAR KANTOR</u></b> <br>
    <span style="font:px"> NOMOR:851/Dinsos/<?= $row->id_izin ?> </span>
</p>


<p style="margin-left:84px;margin-top:50px">Yang bertanda tangan dibawah ini, memberikan izin kepada :</p>
<table style="margin-left: 60px">
    <tr>
        <td width="50px"> Nama </td>
        <td width="10px">:</td>
        <td><?= $row->nama ?></td>
    </tr>
    <tr>
        <td> NIP </td>
        <td>:</td>
        <td><?= $row->nip ?></td>
    </tr>
    <tr>
        <td width="100px">Pangkat/Gol.Ruang </td>
        <td>:</td>
        <td><?= $row->pangkat ?> (<?= $row->golongan ?>)</td>
    </tr>
    <tr>
        <td> Jabatan</td>
        <td>:</td>
        <td><?= $row->jabatan ?></td>
    </tr>

    <tr>
        <td> Satuan Organisasi</td>
        <td>:</td>
        <td>Dinas Sosial Provinsi Riau</td>
    </tr>
</table>

<p style="margin-left:84px;">Untuk melakukan keperluan Dinas yaitu
    <?= $row->perihal ?> dari pukul <?php date_default_timezone_get('Asia/Jakarta');
                                            echo date('H:i', strtotime($row->jam_mulai));
                                            ?> sampai dengan <?php date_default_timezone_get('Asia/Jakarta');
                                                                    echo date('H:i', strtotime($row->jam_selesai));
                                                                    ?> </p>

<p style="margin-left:84px;margin-top:20px">Demikian disampaikan untuk dapat dipergunakan sebagaimana mestinya.</p>


<?php foreach ($ambil as $a) : ?>
<?php if ($a->role_id == '3' | $a->role_id == '4' | $a->role_id == '5') : ?>
<div>
    <p style="text-align:right;margin-top:10px;font-size:15px;">a.n, KEPALA DINAS SOSIAL PROVINSI RIAU</p>
    <p style="text-align:right;margin-right:120px;"> Sekretaris, </p> <br><br>
    <table align="right">
        <tr>
            <td>
                <p style="margin-right:40px;"> <b> Suratno, S.Sos, M.Si </b> <br> Pembina Tk I <br> NIP
                    19630912 198503 1 023 </p>
            </td>
        </tr>
    </table>
</div>
<?php elseif ($row->bidang == 'Kepegawaian') : ?>
<div>
    <p style="text-align:right;margin-right:50px;margin-top:10px;font-size:15px;">a.n, KEPALA SEKSI/SUB BAGIAN</p>
    <br><br>
    <table align="right">
        <tr>
            <td>
                <p style="margin-right:40px;"> <b> T. Hevi Ikhwansyah, S.H., M.H </b> <br> Pembina Tk I <br>
                    NIP
                    19630912 198503 1 023 </p>
            </td>
        </tr>
    </table>
</div>

<?php elseif ($row->bidang == 'Perencanaan') : ?>
<div>
    <p style="text-align:right;margin-right:50px;margin-top:10px;font-size:15px;">a.n, KEPALA SEKSI/SUB BAGIAN</p>
    <br><br>
    <table align="right">
        <tr>
            <td>
                <p style="margin-right:40px;"> <b> Helda, S.H </b> <br> Pembina Tk I <br>
                    NIP
                    19630912 198503 1 023 </p>
            </td>
        </tr>
    </table>
</div>

<?php endif ?>
<?php endforeach ?>
<?php endforeach ?>