<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    //hak akses
    public function __construct()
    {
        parent::__construct();
        //mengecek apakah dia sudah login/belum (gunanya biar supaya tidak bisa masuk tampilan admin ketika belum login)
        if (!$this->session->userdata('nip')) {
            redirect('auth');
        }
    }


    public function index()
    {

        $data['title'] = 'Profil';
        $data['bidang'] = $this->db->get_where('pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        //$data['saya'] = $this->pegawai_model->profildata()->result();
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function tabel_pegawai()
    {
        $data['title'] = 'Pegawai';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['pegawai'] = $this->pegawai_model->tampil_data('pegawai')->result();
        $data['jabatan'] = $this->pegawai_model->tampil_data('jabatan')->result();
        $data['pangkat'] = $this->pegawai_model->tampil_data('pangkat')->result();
        $data['klasifikasi'] = $this->pegawai_model->tampil_data('klasifikasi')->result();
        $data['golongan'] = $this->pegawai_model->tampil_data('golongan')->result();
        $data['bidang'] = $this->pegawai_model->tampil_data('bidang')->result();

        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/tabel_pegawai', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[pegawai.nip]', ['is_unique' => 'Data Sudah Ada', 'required' => 'Data Tidak Boleh Kosong']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim', ['required' => 'Tempat Lahir Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required|trim', ['required' => 'Tanggal Lahir Tidak Boleh Kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', ['required' => 'Email Tidak Boleh Kosong']);
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim', ['required' => 'No Hp Tidak Boleh Kosong']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_bekerja', 'Tgl_bekerja', 'required|trim', ['required' => 'Tanggal Bekerja Tidak Boleh Kosong']);
        $this->form_validation->set_rules('id_jabatan', 'Id_jabatan', 'required|trim', ['required' => 'Jabatan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('id_pangkat', 'Id_pangkat', 'required|trim', ['required' => 'Pangkat Tidak Boleh Kosong']);
        $this->form_validation->set_rules('id_klasifikasi', 'Id_klasifikasi', 'required|trim', ['required' => 'Klasifikasi Tidak Boleh Kosong']);
        $this->form_validation->set_rules('id_golongan', 'Id_golongan', 'required|trim', ['required' => 'Golongan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('id_bidang', 'Id_bidang', 'required|trim', ['required' => 'Bidang Tidak Boleh Kosong']);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => 'Status Tidak Boleh Kosong']);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]', ['min_length' => 'Password Terlalu Pendek', 'required' => 'Status Tidak Boleh Kosong']);
        $this->form_validation->set_rules('role_id', 'role_id', 'required|trim', ['required' => 'Status Tidak Boleh Kosong']);


        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/img/profil';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload gagal";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        if ($this->form_validation->run() == false) {
            $this->tabel_pegawai();
        } else {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tgl_bekerja' => htmlspecialchars($this->input->post('tgl_bekerja', true)),
                'id_jabatan' => htmlspecialchars($this->input->post('id_jabatan', true)),
                'id_pangkat' => htmlspecialchars($this->input->post('id_pangkat', true)),
                'id_klasifikasi' => htmlspecialchars($this->input->post('id_klasifikasi', true)),
                'id_golongan' => htmlspecialchars($this->input->post('id_golongan', true)),
                'id_bidang' => htmlspecialchars($this->input->post('id_bidang', true)),
                'status' => htmlspecialchars($this->input->post('status', true)),
                'foto' => $foto


            ];

            $data1 = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => $foto,
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 1

            ];

            $this->pegawai_model->tambah($data);
            $this->db->insert('user', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Pegawai Berhasil Ditambah</div>');
            redirect('pegawai/tabel_pegawai');
        }
    }

    public function update_aksi()
    {

        $nip =  $this->input->post('nip');
        $nama =  $this->input->post('nama');
        $tempat =  $this->input->post('tempat_lahir');
        $tgl =  $this->input->post('tgl_lahir');
        $email =  $this->input->post('email');
        $hp =  $this->input->post('no_hp');
        $alamat =  $this->input->post('alamat');
        $jabatan =  $this->input->post('id_jabatan');
        $pangkat =  $this->input->post('id_pangkat');
        $klasifikasi =  $this->input->post('id_klasifikasi');
        $golongan =  $this->input->post('id_golongan');
        $bidang =  $this->input->post('id_bidang');
        $status =  $this->input->post('status');
        $tglbekerja =  $this->input->post('tgl_bekerja');

        //ini data selain id
        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'tempat_lahir' => $tempat,
            'tgl_lahir' => $tgl,
            'email' => $email,
            'no_hp' => $hp,
            'alamat' => $alamat,
            'id_jabatan' => $jabatan,
            'id_pangkat' => $pangkat,
            'id_klasifikasi' => $klasifikasi,
            'id_golongan' => $golongan,
            'id_bidang' => $bidang,
            'status' => $status,
            'tgl_bekerja' => $tglbekerja
        );
        $data1 = array(
            'nip' => $nip,
            'nama' => $nama
        );
        //mengambil berdasarkan
        $where = array(
            'nip' => $nip

        );

        $this->pegawai_model->update_data($where, $data, 'pegawai');
        $this->pegawai_model->update_data($where, $data1, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Data Pegawai Berhasil Di Update</div>');
        redirect('pegawai/tabel_pegawai');
    }

    public function delete($id)
    {
        $where = array(
            'id_pegawai' => $id
        );

        $this->pangkat_model->hapus_data($where, 'pegawai');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Data Pegawai Berhasil Di Hapus</div>');
        redirect('pegawai/tabel_pegawai');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['title'] = 'Pegawai';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['pegawai'] = $this->pegawai_model->tampil_data('pegawai')->result();
        $data['jabatan'] = $this->pegawai_model->tampil_data('jabatan')->result();
        $data['pangkat'] = $this->pegawai_model->tampil_data('pangkat')->result();
        $data['klasifikasi'] = $this->pegawai_model->tampil_data('klasifikasi')->result();
        $data['golongan'] = $this->pegawai_model->tampil_data('golongan')->result();
        $data['bidang'] = $this->pegawai_model->tampil_data('bidang')->result();

        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajuancuti/laporan_pegawai', $data);
        $this->load->view('templates/footer', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_pegawai.pdf", array('Attachment' => 0));
    }

    public function lihatdata($id)
    {
        $data['title'] = 'Lihat Data Pegawai';

        $where = array('id_pegawai' => $id);
        $data['pegawai'] = $this->pegawai_model->lihatdata('pegawai', $where)->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/lihatdata', $data);
        $this->load->view('templates/footer', $data);
    }
}