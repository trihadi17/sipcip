<?php

class Golongan_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('golongan');
    }

    public function tambah($data)
    {
        $this->db->insert('golongan', $data);
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
}