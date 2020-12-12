<?php
defined('BASEPATH') or exit('NO direct script accses allowed');
class Mahasiswa extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_mahasiswa');
        $this->load->library('form_validation');
        is_logged_in();
    }
    function daftar_prestasi()
    {
        $data['title'] = "Data Prestasi Mahasiswa";
        $config['base_url'] = site_url('Prestasi/daftar_prestasi');
        $data['prestasi'] = $this->M_mahasiswa->data_prestasi();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/prestasi', $data);
        $this->load->view('templates/footer');
    }
    function detail($id_prestasi)
    {
        $data['title'] = "Detail Data Prestasi";
        $data['detail_prestasi'] = $this->M_mahasiswa->detail($id_prestasi);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/detail_prestasi', $data);
        $this->load->view('templates/footer');
    }
    public function search_prestasi()
    {

        $keyword = $this->input->post('keyword');
        $data['prestasi'] = $this->M_mahasiswa->search_prestasi($keyword);
        $data['title'] = "Data Prestasi Mahasiswa";
        $data['tahun'] = $this->M_mahasiswa->data_prestasi();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/prestasi', $data);
        $this->load->view('templates/footer');
    }
    function register_prestasi()
    {
        $data['title'] = "Register Data Prestasi";
        $data['nama_jenis'] = $this->M_mahasiswa->data_jenis();
        $data['nama_tingkat'] = $this->M_mahasiswa->data_tingkat();
        $data['nama_jenis_juara'] = $this->M_mahasiswa->data_jenis_juara();
        $data['nama_pembimbing'] = $this->M_mahasiswa->data_pembimbing();
        $data['nama'] = $this->M_mahasiswa->data_user();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/register_prestasi', $data);
        $this->load->view('templates/footer');
    }

    public function update_register_prestasi($id_prestasi)
    {
        $data['title'] = "Registrasi";
        $this->db->where('md5(id_prestasi)', $id_prestasi);
        $data['id_prestasi'] = $this->db->get('tb_prestasi')->row_array();
        $data['nama_jenis'] = $this->M_mahasiswa->data_jenis();
        $data['nama_tingkat'] = $this->M_mahasiswa->data_tingkat();
        $data['nama_jenis_juara'] = $this->M_mahasiswa->data_jenis_juara();
        $data['nama_pembimbing'] = $this->M_mahasiswa->data_pembimbing();
        $data['nama'] = $this->M_mahasiswa->data_user();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/register_prestasi', $data);
        $this->load->view('templates/footer');
    }

    public function delete_prestasi()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_prestasi', $key);
        $query = $this->db->get('tb_prestasi');
        if ($query->num_rows() > 0) {
            $this->M_mahasiswa->delete_prestasi($key);
        }
        redirect('Mahasiswa/daftar_prestasi');
    }
    public function save_register_prestasi()
    {
        if ($_POST['id_prestasi'] != '') {
            $this->M_mahasiswa->save_update_register_prestasi($_POST);
        } else {
            $this->M_mahasiswa->save_register_prestasi($_POST);
        }
        redirect('Mahasiswa/daftar_prestasi');
    }
}
