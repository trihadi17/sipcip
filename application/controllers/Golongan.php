<?php

class Golongan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Golongan';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['golongan'] = $this->golongan_model->tampil_data()->result();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('golongan/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function tambah()
    {
        $this->form_validation->set_rules('golongan', 'Golongan', 'required|trim|is_unique[golongan.golongan]', ['is_unique' => 'Data Sudah Ada', 'required' => 'Data Golongan Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'golongan' => htmlspecialchars($this->input->post('golongan', true))
            ];

            $this->golongan_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Golongan Berhasil Ditambah</div>');
            redirect('golongan/index');
        }
    }

    public function update($id)
    {
        $where = array('id_golongan' => $id);
        $data['golongan'] = $this->golongan_model->edit_data($where, 'golongan')->result();
        $data['title'] = 'Golongan';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('golongan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_aksi()
    {

        $id =  $this->input->post('id_golongan');
        $golongan =  $this->input->post('golongan');

        //ini data selain id
        $data = array(
            'golongan' => $golongan
        );
        //mengambil berdasarkan
        $where = array(
            'id_golongan' => $id

        );

        $this->golongan_model->update_data($where, $data, 'golongan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Golongan Berhasil Di Update</div>');
        redirect('golongan/index');
    }

    public function delete($id)
    {
        $where = array(
            'id_golongan' => $id
        );

        $this->golongan_model->hapus_data($where, 'golongan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Data Golongan Berhasil Di Hapus</div>');
        redirect('golongan/index');
    }
}