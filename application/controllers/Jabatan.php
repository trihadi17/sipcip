<?php

class Jabatan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Jabatan';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jabatan'] = $this->jabatan_model->tampil_data()->result();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jabatan/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function tambah()
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[jabatan.jabatan]', ['is_unique' => 'Data Sudah Ada', 'required' => 'Data Jabatan Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true))
            ];

            $this->jabatan_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Jabatan Berhasil Ditambah</div>');
            redirect('jabatan/index');
        }
    }

    public function update($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->jabatan_model->edit_data($where, 'jabatan')->result();
        $data['title'] = 'Jabatan';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jabatan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_aksi()
    {

        $id =  $this->input->post('id_jabatan');
        $jabatan =  $this->input->post('jabatan');

        //ini data selain id
        $data = array(
            'jabatan' => $jabatan
        );
        //mengambil berdasarkan
        $where = array(
            'id_jabatan' => $id

        );

        $this->jabatan_model->update_data($where, $data, 'jabatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Jabatan Berhasil Di Update</div>');
        redirect('jabatan/index');
    }

    public function delete($id)
    {
        $where = array(
            'id_jabatan' => $id
        );

        $this->jabatan_model->hapus_data($where, 'jabatan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Data Jabatan Berhasil Di Hapus</div>');
        redirect('jabatan/index');
    }
}