<?php

class Pangkat extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Pangkat';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['pangkat'] = $this->pangkat_model->tampil_data()->result();

        //mengambil tabel  berdasarkan role_id
        //$user = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //if ($user['role_id'] == '1') {
        //  $data['pangkat'] = $this->db->get_where('pangkat', ['pangkat' => 'juru'])->result();
        //}

        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pangkat/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function tambah()
    {
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required|trim|is_unique[pangkat.pangkat]', ['is_unique' => 'Data Sudah Ada', 'required' => 'Data Pangkat Tidak Boleh Kosong']);


        $a = new DateTime($this->input->post('jammulai'));
        $b = new DateTime($this->input->post('jamselesai'));
        $c = $a->diff($b)->h;


        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
                'jammulai' => $this->input->post('jammulai'),
                'jamselesai' => $this->input->post('jamselesai'),
                'jumlah' => $c
            ];

            $this->pangkat_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Pangkat Berhasil Ditambah</div>');
            redirect('pangkat/index');
        }
    }


    public function update_aksi()
    {

        $id =  $this->input->post('id_pangkat');
        $pangkat =  $this->input->post('pangkat');

        //ini data selain id
        $data = array(
            'pangkat' => $pangkat
        );
        //mengambil berdasarkan
        $where = array(
            'id_pangkat' => $id

        );

        $this->pangkat_model->update_data($where, $data, 'pangkat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Pangkat Berhasil Di Update</div>');
        redirect('pangkat/index');
    }

    public function cek($id)
    {



        $data = array(
            'pangkat' => 'Konfirmasi'
        );
        $where = array(
            'id_pangkat' => $id

        );

        $this->pangkat_model->konfirmasi($where, $data,  'pangkat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Pangkat Berhasil Di Konfirmasi</div>');
        redirect('pangkat/index');
    }

    public function cektolak($id)
    {
        $data = array(
            'pangkat' => 'Ditolak'
        );
        $where = array(
            'id_pangkat' => $id

        );

        $this->pangkat_model->konfirmasitolak($where, $data,  'pangkat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Data Pangkat Berhasil Di Tolak</div>');
        redirect('pangkat/index');
    }


    public function delete($id)
    {
        $where = array(
            'id_pangkat' => $id
        );

        $this->pangkat_model->hapus_data($where, 'pangkat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Data Pangkat Berhasil Di Hapus</div>');
        redirect('pangkat/index');
    }
}