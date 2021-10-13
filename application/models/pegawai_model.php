<?php

class Pegawai_model extends CI_Model
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

    public function update_data1($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function profildata()
    {
        $this->db->select("pegawai.id_jabatan as jbtn");
        $this->db->from("user");
        $this->db->join("pegawai", "pegawai.nip = user.nip");
        $query = $this->db->get();

        return $query;
    }

    public function jumlahcuti()
    {

        $a = $this->session->userdata('nip');
        $this->db->select('sum(jumlah) as jumlahcuti');
        $this->db->from('pengajuan_cuti');
        $this->db->where("status= 'Konfirmasi Admin' AND jenis_cuti='Tahunan' AND nip=$a");
        $query = $this->db->get();

        return $query;
    }



    public function lihat_data($table, $where)
    {
        $this->db->select('pengajuan_cuti.*, pegawai.id_jabatan as jabatan, pegawai.tgl_bekerja as bekerja, pegawai.no_hp as hp, pegawai.alamat as alamat, pegawai.id_pangkat as pangkat, pegawai.id_golongan as golongan');
        $this->db->join('pegawai', 'pegawai.nip = pengajuan_cuti.nip', 'left');
        $query = $this->db->get_where($table, $where);
        return $query;
    }


    public function lihatdata($table, $where)
    {
        $this->db->select('*');
        $query = $this->db->get_where($table, $where);
        return $query;
    }

    public function lihat_dataizin($table, $where)
    {
        $this->db->select('pengajuan_izin.*, pegawai.id_jabatan as jabatan, pegawai.tgl_bekerja as bekerja, pegawai.no_hp as hp, pegawai.alamat as alamat, pegawai.id_pangkat as pangkat, pegawai.id_golongan as golongan');
        $this->db->join('pegawai', 'pegawai.nip = pengajuan_izin.nip', 'left');
        $query = $this->db->get_where($table, $where);
        return $query;
    }
}
