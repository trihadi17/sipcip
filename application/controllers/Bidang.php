<?php
class Bidang extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Bidang';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['bidang'] = $this->bidang_model->tampil_data()->result();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bidang/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function tambah()
    {
        $this->form_validation->set_rules('bidang', 'Bidang', 'required|trim|is_unique[bidang.bidang]', ['is_unique' => 'Data Sudah Ada', 'required' => 'Data Bidang Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'bidang' => htmlspecialchars($this->input->post('bidang', true))
            ];

            $this->bidang_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Bidang Berhasil Ditambah</div>');
            redirect('bidang/index');
        }
    }


    public function update($id)
    {
        $where = array('id_bidang' => $id);
        $data['bidang'] = $this->bidang_model->edit_data($where, 'bidang')->result();
        $data['title'] = 'Bidang';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bidang/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function update_aksi()
    {
        $id =  $this->input->post('id_bidang');
        $bidang =  $this->input->post('bidang');

        //ini data selain id
        $data = array(
            'bidang' => $bidang
        );
        //mengambil berdasarkan
        $where = array(
            'id_bidang' => $id

        );

        $this->bidang_model->update_data($where, $data, 'bidang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Bidang Berhasil Di Update</div>');
        redirect('bidang/index');
    }

    public function delete($id)
    {
        $where = array(
            'id_bidang' => $id
        );

        $this->bidang_model->hapus_data($where, 'bidang');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Data Bidang Berhasil Di Hapus</div>');
        redirect('bidang/index');
    }
}
