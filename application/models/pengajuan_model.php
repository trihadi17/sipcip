<?php

class Pengajuan_model extends CI_Model
{
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function tampil_data_profil()
    {
        return $this->db->get('user');
    }

    public function tambah($data)
    {
        $this->db->insert('pegawai', $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function jumlahcuti()
    {

        $a = $this->session->userdata('nip');
        $b = new DateTime('now');
        $c = $b->format('Y');
        $this->db->select('sum(jumlah) as jumlahcuti');
        $this->db->from('pengajuan_cuti');
        $this->db->where("tahun='$c' AND status= 'Disetujui Sekretaris' AND jenis_cuti='Tahunan' AND nip=$a");
        $query = $this->db->get();

        return $query;
    }


    public function jumlahcutibesar()
    {

        $a = $this->session->userdata('nip');
        $b = new DateTime('now');
        $c = $b->format('Y');
        $this->db->select('sum(jumlah) as jumlahcuti');
        $this->db->from('pengajuan_cuti');
        $this->db->where("tahun='$c' AND status= 'Disetujui Sekretaris' AND jenis_cuti='Besar' AND nip=$a");
        $query = $this->db->get();

        return $query;
    }



    public function lihat_data($table, $where)
    {
        $this->db->select('pengajuan_cuti.*, pegawai.id_jabatan as jabatan, pegawai.id_pangkat as pangkat ');
        $this->db->join('pegawai', 'pegawai.nip = pengajuan_cuti.nip', 'left');
        $query = $this->db->get_where($table, $where);
        return $query;
    }
}