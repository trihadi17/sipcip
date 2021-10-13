<?php

class Klasifikasi extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Klasifikasi';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['klasifikasi'] = $this->klasifikasi_model->tampil_data()->result();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('klasifikasi/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function tambah()
    {
        $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim|is_unique[klasifikasi.klasifikasi]', ['is_unique' => 'Data Sudah Ada', 'required' => 'Data Klasifikasi Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'klasifikasi' => htmlspecialchars($this->input->post('klasifikasi', true))
            ];

            $this->klasifikasi_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Klasifikasi Berhasil Ditambah</div>');
            redirect('klasifikasi/index');
        }
    }

    public function update($id)
    {
        $where = array('id_klasifikasi' => $id);
        $data['klasifikasi'] = $this->klasifikasi_model->edit_data($where, 'klasifikasi')->result();
        $data['title'] = 'Klasifikasi';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('klasifikasi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_aksi()
    {

        $id =  $this->input->post('id_klasifikasi');
        $klasifikasi =  $this->input->post('klasifikasi');

        //ini data selain id
        $data = array(
            'klasifikasi' => $klasifikasi
        );
        //mengambil berdasarkan
        $where = array(
            'id_klasifikasi' => $id

        );

        $this->klasifikasi_model->update_data($where, $data, 'klasifikasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Klasifikasi Berhasil Di Update</div>');
        redirect('klasifikasi/index');
    }

    public function delete($id)
    {
        $where = array(
            'id_klasifikasi' => $id
        );

        $this->klasifikasi_model->hapus_data($where, 'klasifikasi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Data Klasifikasi Berhasil Di Hapus</div>');
        redirect('klasifikasi/index');
    }
}