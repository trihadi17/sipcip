<?php

class Persetujuancuti extends CI_Controller
{
    //kabid
    public function index()
    {
        $data['title'] = 'Persetujuan Cuti';
        //mengambil data berdasarkan akun yang login
        $user = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        if ($user['role_id'] == '4') {
            $data['persetujuan'] = $this->db->get_where('pengajuan_cuti', ['bidang' => 'Kepegawaian', 'Status' => 'Tunggu Persetujuan Kepala Bidang'])->result();
        } elseif ($user['role_id'] == '5') {
            $data['persetujuan'] = $this->db->get_where('pengajuan_cuti', ['bidang' => 'Perencanaan',  'Status' => 'Tunggu Persetujuan Kepala Bidang'])->result();
        }

        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persetujuancuti/kabid', $data);
        $this->load->view('templates/footer', $data);
    }

    //admin 
    public function indexadmin()
    {
        $data['title'] = 'Persetujuan Cuti';
        //mengambil data berdasarkan akun yang login
        $data['persetujuan'] = $this->db->get_where('pengajuan_cuti', ['status' => 'Tunggu Persetujuan Admin'])->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persetujuancuti/admin', $data);
        $this->load->view('templates/footer', $data);
    }

    //sekretaris
    public function indexsekretaris()
    {
        $data['title'] = 'Persetujuan Cuti';
        //mengambil data berdasarkan akun yang login
        $data['persetujuan'] = $this->db->get_where('pengajuan_cuti', ['status' => 'Tunggu Persetujuan Sekretaris'])->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persetujuancuti/sekretaris', $data);
        $this->load->view('templates/footer', $data);
    }

    //kabid
    public function disetujui($id)
    {
        $data = array(
            'status' => 'Tunggu Persetujuan Admin'
        );
        $where = array(
            'id_cuti' => $id

        );

        $this->persetujuan_model->disetujui($where, $data,  'pengajuan_cuti');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Pengajuan Cuti Disetujui</div>');
        redirect('persetujuancuti/index');
    }

    //kabid
    public function ditolak($id)
    {
        $data = array(
            'status' => 'Ditolak Kepala Bidang'
        );
        $where = array(
            'id_cuti' => $id

        );

        $this->persetujuan_model->ditolak($where, $data,  'pengajuan_cuti');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Pengajuan Cuti Di Tolak</div>');
        redirect('persetujuancuti/index');
    }


    //admin
    public function disetujuiadmin($id)
    {
        $data = array(
            'status' => 'Tunggu Persetujuan Sekretaris'
        );
        $where = array(
            'id_cuti' => $id

        );

        $this->persetujuan_model->disetujui($where, $data,  'pengajuan_cuti');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Pengajuan Cuti Disetujui</div>');
        redirect('persetujuancuti/indexadmin');
    }

    //admin
    public function ditolakadmin($id)
    {
        $data = array(
            'status' => 'Ditolak Admin'
        );
        $where = array(
            'id_cuti' => $id

        );

        $this->persetujuan_model->ditolak($where, $data,  'pengajuan_cuti');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Pengajuan Cuti Di Tolak</div>');
        redirect('persetujuancuti/indexadmin');
    }

    //sekretaris
    public function disetujuisekretaris($id)
    {
        $data = array(
            'status' => 'Disetujui Sekretaris'
        );
        $where = array(
            'id_cuti' => $id

        );

        $this->persetujuan_model->disetujui($where, $data,  'pengajuan_cuti');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
             "role="alert">Pengajuan Cuti Disetujui</div>');
        redirect('persetujuancuti/indexsekretaris');
    }

    //sekretaris
    public function ditolaksekretaris($id)
    {
        $data = array(
            'status' => 'Ditolak Sekretaris'
        );
        $where = array(
            'id_cuti' => $id

        );

        $this->persetujuan_model->ditolak($where, $data,  'pengajuan_cuti');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
             "role="alert">Pengajuan Cuti Di Tolak</div>');
        redirect('persetujuancuti/indexsekretaris');
    }
}
