<?php

class Riwayatcuti extends CI_Controller
{
    //riwayat untuk melihat pengajuan cuti yang di konfirmasi
    public function riwayatindividu()
    {
        $data['title'] = 'Riwayat Cuti';

        //menampilkan tabel pengajuan sesuai nip
        $data['riwayatindividu'] = $this->db->get_where('pengajuan_cuti', ['nip' => $this->session->userdata('nip'), 'status' => 'Disetujui Sekretaris'])->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('riwayatcuti/riwayatindividu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function riwayatpegawaibidang()
    {
        $data['title'] = 'Riwayat Cuti Pegawai';
        //mengambil data berdasarkan akun yang login
        $user = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        if ($user['role_id'] == '4') {
            $data['riwayat'] = $this->db->get_where('pengajuan_cuti', ['bidang' => 'Kepegawaian', 'Status' => 'Disetujui Sekretaris'])->result();
        } elseif ($user['role_id'] == '5') {
            $data['riwayat'] = $this->db->get_where('pengajuan_cuti', ['bidang' => 'Perencanaan',  'Status' => 'Disetujui Sekretaris'])->result();
        }

        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('riwayatcuti/riwayatpegawaibidang', $data);
        $this->load->view('templates/footer', $data);
    }


    public function riwayatpegawaikeseluruhan()
    {
        $data['title'] = 'Riwayat Cuti Pegawai Keseluruhan';
        //mengambil data berdasarkan akun yang login
        $data['riwayatkp'] = $this->db->get_where('pengajuan_cuti', ['bidang' => 'Kepegawaian', 'Status' => 'Disetujui Sekretaris'])->result();
        $data['riwayatpr'] = $this->db->get_where('pengajuan_cuti', ['bidang' => 'Perencanaan',  'Status' => 'Disetujui Sekretaris'])->result();
        $data['riwayatsk'] = $this->db->get_where('pengajuan_cuti', ['bidang' => 'Sekretariat',  'Status' => 'Disetujui Sekretaris'])->result();


        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('riwayatcuti/riwayatpegawaikeseluruhan', $data);
        $this->load->view('templates/footer', $data);
    }
}