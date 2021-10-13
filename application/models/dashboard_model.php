<?php

class Dashboard_model extends CI_Model
{
    //ngitung jumlah pegawai 
    public function pegawai()
    {
        $this->db->select('count(nip) as jumlah');
        $this->db->from('pegawai');
        $query = $this->db->get();

        return $query;
    }
    //ngitung jumlah cuti belum dikonfirmasi
    public function belumkonfirmasi()
    {
        $this->db->select('count(nip) as belumdikonfir');
        $this->db->from('pengajuan_cuti');
        $this->db->where('status="Tunggu Persetujuan Admin"');
        $query = $this->db->get();

        return $query;
    }

    public function lihatizin()
    {
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        $this->db->select('count(nip) as lihat');
        $this->db->from('pengajuan_izin');
        $this->db->where("tgl_pengajuan = '$b' AND status='Disetujui Sekretaris'");
        $this->db->or_where("tgl_pengajuan = '$b' AND status='Disetujui Kepala Bidang'");
        $query = $this->db->get();
        return $query;
    }

    public function lihatizinpr()
    {
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        $this->db->select('count(nip) as lihat');
        $this->db->from('pengajuan_izin');
        $this->db->where("bidang='Perencanaan' AND status='Disetujui Kepala Bidang' AND tgl_pengajuan='$b' ");
        $query = $this->db->get();
        return $query;
    }

    public function lihatizinkp()
    {
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        $this->db->select('count(nip) as lihat');
        $this->db->from('pengajuan_izin');
        $this->db->where("bidang='Kepegawaian' AND status='Disetujui Kepala Bidang' AND tgl_pengajuan='$b' ");
        $query = $this->db->get();
        return $query;
    }

    public function sisacuti()
    {
        $a = $this->session->userdata('nip');
        $this->db->select('sum(jumlah) as jumlahcuti');
        $this->db->from('pengajuan_cuti');
        $this->db->where("status= 'Disetujui Sekretaris' AND jenis_cuti='Tahunan' AND nip=$a");
        $query = $this->db->get();

        return $query;
    }

    public function totalizin()
    {
        $a = $this->session->userdata('nip');

        $this->db->select('count(nip) as jumlahizin');
        $this->db->from('pengajuan_izin');
        $this->db->where("status= 'Disetujui Sekretaris' AND nip=$a");
        $query = $this->db->get();

        return $query;
    }

    public function totalizinpegawai()
    {
        $a = $this->session->userdata('nip');

        $this->db->select('count(nip) as jumlahizin');
        $this->db->from('pengajuan_izin');
        $this->db->where("status= 'Disetujui Kepala Bidang' AND nip=$a");
        $query = $this->db->get();

        return $query;
    }

    //ngitung jumlah cuti belumdikonfirmasi
    public function belumkonfirmasisek()
    {
        $this->db->select('count(nip) as belumdikonfir');
        $this->db->from('pengajuan_cuti');
        $this->db->where('status="Tunggu Persetujuan Sekretaris"');
        $query = $this->db->get();

        return $query;
    }

    //ngitung jumlah izin belumdikonfirmasi
    public function belumkonfirmasiizinsek()
    {
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        $this->db->select('count(nip) as belumdikonfir');
        $this->db->from('pengajuan_izin');
        $this->db->where("tgl_pengajuan = '$b' AND status='Tunggu Persetujuan Sekretaris'");
        $query = $this->db->get();

        return $query;
    }


    //ngitung jumlah cuti belumdikonfirmasi
    public function belumkonfirmasipr()
    {
        $this->db->select('count(nip) as belumdikonfir');
        $this->db->from('pengajuan_cuti');
        $this->db->where('status="Tunggu Persetujuan Kepala Bidang" AND bidang="Perencanaan"');
        $query = $this->db->get();

        return $query;
    }

    //ngitung jumlah izin belumdikonfirmasi
    public function belumkonfirmasiizinpr()
    {
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        $this->db->select('count(nip) as belumdikonfir');
        $this->db->from('pengajuan_izin');
        $this->db->where("tgl_pengajuan = '$b' AND status='Tunggu Persetujuan Kepala Bidang' AND bidang='Perencanaan'");
        $query = $this->db->get();

        return $query;
    }

    //ngitung jumlah cuti belumdikonfirmasi
    public function belumkonfirmasikp()
    {
        $this->db->select('count(nip) as belumdikonfir');
        $this->db->from('pengajuan_cuti');
        $this->db->where('status="Tunggu Persetujuan Kepala Bidang" AND bidang="Kepegawaian"');
        $query = $this->db->get();

        return $query;
    }

    //ngitung jumlah izin belumdikonfirmasi
    public function belumkonfirmasiizinkp()
    {
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        $this->db->select('count(nip) as belumdikonfir');
        $this->db->from('pengajuan_izin');
        $this->db->where("tgl_pengajuan = '$b' AND status='Tunggu Persetujuan Kepala Bidang' AND bidang='Kepegawaian'");
        $query = $this->db->get();

        return $query;
    }
}