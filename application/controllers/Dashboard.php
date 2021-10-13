<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

    public function admin()
    {
        $data['title'] = 'Dashboard';

        //count jumlah pegawai
        $data['pegawai'] = $this->dashboard_model->pegawai()->result();
        //cek jumlah cuti yang belum di konfirmasi
        $data['konfirmasi'] = $this->dashboard_model->belumkonfirmasi()->result();
        $data['lihatizin'] = $this->dashboard_model->lihatizin()->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/admin', $data);
        $this->load->view('templates/footer', $data);
    }

    public function sekretaris()
    {
        $data['title'] = 'Dashboard';

        $data['sisa'] = $this->dashboard_model->sisacuti()->result();
        $data['total'] = $this->dashboard_model->totalizin()->result();
        $data['konfirmasi'] = $this->dashboard_model->belumkonfirmasisek()->result();
        $data['konfirmasiizin'] = $this->dashboard_model->belumkonfirmasiizinsek()->result();
        $data['lihatizin'] = $this->dashboard_model->lihatizin()->result();


        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/sekretaris', $data);
        $this->load->view('templates/footer', $data);
    }


    public function perencanaan()
    {
        $data['title'] = 'Dashboard';

        $data['sisa'] = $this->dashboard_model->sisacuti()->result();
        $data['total'] = $this->dashboard_model->totalizin()->result();
        $data['konfirmasi'] = $this->dashboard_model->belumkonfirmasipr()->result();
        $data['konfirmasiizin'] = $this->dashboard_model->belumkonfirmasiizinpr()->result();
        $data['lihatizin'] = $this->dashboard_model->lihatizinpr()->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/perencanaan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kepegawaian()
    {
        $data['title'] = 'Dashboard';
        $data['sisa'] = $this->dashboard_model->sisacuti()->result();
        $data['total'] = $this->dashboard_model->totalizin()->result();
        $data['konfirmasi'] = $this->dashboard_model->belumkonfirmasikp()->result();
        $data['konfirmasiizin'] = $this->dashboard_model->belumkonfirmasiizinkp()->result();
        $data['lihatizin'] = $this->dashboard_model->lihatizinkp()->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/kepegawaian', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pegawai()
    {
        $data['title'] = 'Dashboard';
        $data['sisa'] = $this->dashboard_model->sisacuti()->result();
        $data['total'] = $this->dashboard_model->totalizinpegawai()->result();
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/pegawai', $data);
        $this->load->view('templates/footer', $data);
    }
}