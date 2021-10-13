<?php

class Persetujuanizin extends CI_Controller
{
    //kabid
    public function index()
    {
        $data['title'] = 'Persetujuan Izin';
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        //mengambil data berdasarkan akun yang login
        $user = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        if ($user['role_id'] == '4') {
            $data['persetujuan'] = $this->db->get_where('pengajuan_izin', ['bidang' => 'Kepegawaian', 'Status' => 'Tunggu Persetujuan Kepala Bidang', 'tgl_pengajuan' => $b])->result();
        } elseif ($user['role_id'] == '5') {
            $data['persetujuan'] = $this->db->get_where('pengajuan_izin', ['bidang' => 'Perencanaan',  'Status' => 'Tunggu Persetujuan Kepala Bidang', 'tgl_pengajuan' => $b])->result();
        }

        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persetujuanizin/kabid', $data);
        $this->load->view('templates/footer', $data);
    }

    //sekretaris
    public function indexsekretaris()
    {
        $data['title'] = 'Persetujuan Izin';
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        //mengambil data berdasarkan akun yang login
        $data['persetujuan'] = $this->db->get_where('pengajuan_izin', ['status' => 'Tunggu Persetujuan Sekretaris', 'tgl_pengajuan' => $b])->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persetujuanizin/sekretaris', $data);
        $this->load->view('templates/footer', $data);
    }

    //kabid
    public function disetujui($id)
    {
        $data = array(
            'status' => 'Disetujui Kepala Bidang'
        );
        $where = array(
            'id_izin' => $id

        );

        $this->persetujuan_model->disetujui($where, $data,  'pengajuan_izin');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Pengajuan Izin Disetujui</div>');
        redirect('persetujuanizin/index');
    }

    //kabid
    public function ditolak($id)
    {
        $data = array(
            'status' => 'Ditolak Kepala Bidang'
        );
        $where = array(
            'id_izin' => $id

        );

        $this->persetujuan_model->ditolak($where, $data,  'pengajuan_izin');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Pengajuan Izin Di Tolak</div>');
        redirect('persetujuanizin/index');
    }


    //sekretaris
    public function disetujuisekretaris($id)
    {
        $data = array(
            'status' => 'Disetujui Sekretaris'
        );
        $where = array(
            'id_izin' => $id

        );

        $this->persetujuan_model->disetujui($where, $data,  'pengajuan_izin');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
             "role="alert">Pengajuan Izin Disetujui</div>');
        redirect('persetujuanizin/indexsekretaris');
    }

    //sekretaris
    public function ditolaksekretaris($id)
    {
        $data = array(
            'status' => 'Ditolak Sekretaris'
        );
        $where = array(
            'id_izin' => $id

        );

        $this->persetujuan_model->ditolak($where, $data,  'pengajuan_izin');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
             "role="alert">Pengajuan Izin Di Tolak</div>');
        redirect('persetujuanizin/indexsekretaris');
    }


    //kabid
    public function lihatizin()
    {
        $data['title'] = 'Lihat Izin Pegawai';
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        //mengambil data berdasarkan akun yang login
        $user = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        if ($user['role_id'] == '4') {
            $data['persetujuan'] = $this->db->get_where('pengajuan_izin', ['bidang' => 'Kepegawaian', 'Status' => 'Disetujui Kepala Bidang', 'tgl_pengajuan' => $b])->result();
        } elseif ($user['role_id'] == '5') {
            $data['persetujuan'] = $this->db->get_where('pengajuan_izin', ['bidang' => 'Perencanaan',  'Status' => 'Disetujui Kepala Bidang', 'tgl_pengajuan' => $b])->result();
        }

        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persetujuanizin/lihatizinkabid', $data);
        $this->load->view('templates/footer', $data);
    }

    public function lihatizinpegawai()
    {
        $data['title'] = 'Lihat Izin Pegawai';
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        //mengambil data berdasarkan akun yang login

        $data['persetujuan'] = $this->persetujuan_model->lihatizina()->result();

        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persetujuanizin/lihatizinadminsekre', $data);
        $this->load->view('templates/footer', $data);
    }
}