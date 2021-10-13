<?php

class Persetujuan_model extends CI_Model
{


    public function disetujui($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ditolak($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function lihatizina()
    {
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        $this->db->select('pengajuan_izin.*');
        $this->db->from('pengajuan_izin');
        $this->db->where("tgl_pengajuan = '$b' AND status='Disetujui Sekretaris'");
        $this->db->or_where("tgl_pengajuan = '$b' AND status='Disetujui Kepala Bidang'");
        $query = $this->db->get();
        return $query;
    }


    public function lihatizinkeseluruhansk()
    {
        $this->db->select('pengajuan_izin.*');
        $this->db->from('pengajuan_izin');
        $this->db->where("status= 'Disetujui Sekretaris' AND bidang='sekretariat'");
        $this->db->or_where("status='Disetujui Kepala Bidang' AND bidang='sekretariat'");
        $query = $this->db->get();
        return $query;
    }

    public function lihatizinkeseluruhankp()
    {
        $this->db->select('pengajuan_izin.*');
        $this->db->from('pengajuan_izin');
        $this->db->where("status= 'Disetujui Sekretaris' AND bidang='kepegawaian'");
        $this->db->or_where("status='Disetujui Kepala Bidang' AND bidang='kepegawaian'");
        $query = $this->db->get();
        return $query;
    }


    public function lihatizinkeseluruhanpr()
    {
        $this->db->select('pengajuan_izin.*');
        $this->db->from('pengajuan_izin');
        $this->db->where("status= 'Disetujui Sekretaris' AND bidang='perencanaan'");
        $this->db->or_where("status='Disetujui Kepala Bidang' AND bidang='perencanaan'");
        $query = $this->db->get();
        return $query;
    }

    public function riwayat()
    {
        $a = $this->session->userdata('nip');

        $this->db->select('');
        $this->db->from('pengajuan_izin');
        $this->db->where("status= 'Disetujui Kepala Bidang' AND nip=$a");
        $this->db->or_where("status= 'Disetujui Sekretaris' AND nip=$a");
        $query = $this->db->get();

        return $query;
    }
}