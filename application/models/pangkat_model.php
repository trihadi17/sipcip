<?php

class Pangkat_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pangkat');
    }

    public function tambah($data)
    {
        $this->db->insert('pangkat', $data);
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

    public function konfirmasi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function konfirmasitolak($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}