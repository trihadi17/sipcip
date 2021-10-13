<?php

class Riwayatizin extends CI_Controller
{
    //riwayat untuk melihat pengajuan izin yang di konfirmasi
    public function riwayatindividu()
    {
        $data['title'] = 'Riwayat Izin';

        //menampilkan tabel pengajuan sesuai nip
        $data['riwayatindividu'] = $this->persetujuan_model->riwayat()->result();
        //        $data['riwayatindividu'] = $this->db->get_where('pengajuan_izin', ['nip' => $this->session->userdata('nip'), 'status' => 'Disetujui Sekretaris'])->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('riwayatizin/riwayatindividu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function riwayatpegawaibidang()
    {
        $data['title'] = 'Riwayat Izin Pegawai';
        //mengambil data berdasarkan akun yang login
        $user = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        if ($user['role_id'] == '4') {
            $data['riwayat'] = $this->db->get_where('pengajuan_izin', ['bidang' => 'Kepegawaian', 'Status' => 'Disetujui Kepala Bidang'])->result();
        } elseif ($user['role_id'] == '5') {
            $data['riwayat'] = $this->db->get_where('pengajuan_izin', ['bidang' => 'Perencanaan',  'Status' => 'Disetujui Kepala Bidang'])->result();
        }

        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('riwayatizin/riwayatpegawaibidang', $data);
        $this->load->view('templates/footer', $data);
    }


    public function riwayatpegawaikeseluruhan()
    {
        $data['title'] = 'Riwayat Izin Pegawai Keseluruhan';
        //mengambil data berdasarkan akun yang login

        $data['riwayatsk'] = $this->persetujuan_model->lihatizinkeseluruhansk()->result();
        $data['riwayatkp'] = $this->persetujuan_model->lihatizinkeseluruhankp()->result();
        $data['riwayatpr'] = $this->persetujuan_model->lihatizinkeseluruhanpr()->result();



        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('riwayatizin/riwayatpegawaikeseluruhan', $data);
        $this->load->view('templates/footer', $data);
    }
}