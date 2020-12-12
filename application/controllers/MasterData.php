<?php
defined('BASEPATH') or exit('NO direct script accses allowed');
class MasterData extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('form_validation');
        is_logged_in();
    }

    function daftar_fakultas()
    {
        $data['title'] = "Data Fakultas";
        $config['base_url'] = site_url('MasterData/daftar_fakultas');
        $data['fakultas'] = $this->M_data->data_fakultas();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|trim|is_unique[tb_fakultas.nama_fakultas]', [
            'required' => 'Silahkan Masukan Nama Fakultas!',
            'is_unique' => 'Nama Fakuktas Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/fakultas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->save_register_fakultas($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('MasterData/daftar_fakultas');
        }
    }

    public function getUbahFakultas()
    {
        echo json_encode($this->M_data->getFakultas($_POST['id_fakultas']));
    }

    public function delete_fakultas()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_fakultas', $key);
        $query = $this->db->get('tb_fakultas');
        if ($query->num_rows() > 0) {
            $this->M_data->delete_fakultas($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('MasterData/daftar_fakultas');
    }

    public function save_update_fakultas()
    {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Fakultas!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_fakultas();
        } else {

            $this->M_data->save_update_register_fakultas($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil diubah !</div>
          </div>'
            );
            redirect('MasterData/daftar_fakultas');
        }
    }

    function daftar_jurusan()
    {
        $data['title'] = "Data Jurusan";
        $config['base_url'] = site_url('MasterData/daftar_jurusan');
        $data['jurusan'] = $this->M_data->data_jurusan();
        $data['nama_fakultas'] = $this->M_data->data_fakultas();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|trim|is_unique[tb_jurusan.nama_jurusan]', [
            'required' => 'Silahkan Masukan Nama Jurusan!',
            'is_unique' => 'Nama Jurusan Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/jurusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->save_register_jurusan($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('MasterData/daftar_jurusan');
        }
    }

    public function getUbahJurusan()
    {
        echo json_encode($this->M_data->getJurusan($_POST['id_jurusan']));
    }

    public function delete_jurusan()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_jurusan', $key);
        $query = $this->db->get('tb_jurusan');
        if ($query->num_rows() > 0) {
            $this->M_data->delete_jurusan($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('MasterData/daftar_jurusan');
    }

    public function save_update_jurusan()
    {
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Jurusan!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_jurusan();
        } else {

            $this->M_data->save_update_register_jurusan($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil diubah !</div>
          </div>'
            );
            redirect('MasterData/daftar_jurusan');
        }
    }

    function daftar_prodi()
    {
        $data['title'] = "Data Prodi";
        $config['base_url'] = site_url('MasterData/daftar_prodi');
        $data['prodi'] = $this->M_data->data_prodi();
        $data['nama_jurusan'] = $this->M_data->data_jurusan();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim|is_unique[tb_prodi.nama_prodi]', [
            'required' => 'Silahkan Masukan Nama Prodi!',
            'is_unique' => 'Nama Prodi Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->save_register_prodi($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkn!</div>
          </div>'
            );
            redirect('MasterData/daftar_prodi');
        }
    }

    public function getUbahProdi()
    {
        echo json_encode($this->M_data->getProdi($_POST['id_prodi']));
    }

    public function delete_prodi()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_prodi', $key);
        $query = $this->db->get('tb_prodi');
        if ($query->num_rows() > 0) {
            $this->M_data->delete_prodi($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('MasterData/daftar_prodi');
    }

    public function save_update_prodi()
    {
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Prodi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_prodi();
        } else {
            $this->M_data->save_update_register_prodi($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil diubah !</div>
          </div>'
            );
            redirect('MasterData/daftar_prodi');
        }
    }

    function daftar_pembimbing()
    {
        $data['title'] = "Data Pembimbing";
        $config['base_url'] = site_url('MasterData/daftar_pembimbing');
        $data['pembimbing'] = $this->M_data->data_pembimbing();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_pembimbing', 'Nama Pembimbing', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Pembimbing!'
        ]);
        $this->form_validation->set_rules('nip_pembimbing', 'NIP Pembimbing', 'required|trim|min_length[18]', [
            'required' => 'Silahkan Masukan NIP Pembimbimng !',
            'min_length' => 'NIP Pembimbimng Terlalu pendek !'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/pembimbing', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->save_register_pembimbing($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('MasterData/daftar_pembimbing');
        }
    }

    public function getUbahPembimbing()
    {
        echo json_encode($this->M_data->getPembimbing($_POST['id_pembimbing']));
    }


    public function delete_pembimbing()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_pembimbing', $key);
        $query = $this->db->get('tb_pembimbing');
        if ($query->num_rows() > 0) {
            $this->M_data->delete_pembimbing($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('MasterData/daftar_pembimbing');
    }

    public function save_update_pembimbing()
    {
        $this->form_validation->set_rules('nama_pembimbing', 'Nama Pembimbing', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Pembimbing!'
        ]);
        $this->form_validation->set_rules('nip_pembimbing', 'NIP Pembimbing', 'required|trim', [
            'required' => 'Silahkan Masukan NIP Pembimbimng !'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_pembimbing();
        } else {
            $this->M_data->save_update_register_pembimbing($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('MasterData/daftar_pembimbing');
        }
    }

    /*function daftar_mahasiswa()
    {
        $data['title'] = "Data Mahasiswa";
        $config['base_url'] = site_url('MasterData/daftar_mahasiswa');
        $data['mahasiswa'] = $this->M_data->data_mahasiswa();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('masterdata/mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function register_mahasiswa()
    {
        $data['title'] = "Register Data Mahasiswa";
        $data['nama_prodi'] = $this->M_data->data_prodi();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('masterdata/register_mahasiswa', $data);
        $this->load->view('templates/footer');
    }
    public function update_register_mahasiswa($id)
    {
        $data['title'] = "Registrasi Mahasiswa";
        $this->db->where('md5(id)', $id);
        $data['id'] = $this->db->get('tb_mahasiswa')->row_array();
        $data['nama_prodi'] = $this->M_data->data_prodi();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('masterdata/register_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function delete_mahasiswa()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id', $key);
        $query = $this->db->get('tb_mahasiswa');
        if ($query->num_rows() > 0) {
            $this->M_data->delete_mahasiswa($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('MasterData/daftar_mahasiswa');
    }

    public function save_register_mahasiswa()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|min_length[10]', [
            'required' => 'Silahkan Masukan NIM !',
            'min_length' => 'NIM Terlalu pendek !'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Silahkan Masukan Nama !'

        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->register_mahasiswa();
        } else {
            if ($_POST['id'] != '') {
                $this->M_data->save_update_register_mahasiswa($_POST);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                <div class="text-center">Data berhasil diubah !</div>
              </div>'
                );
                redirect('MasterData/daftar_mahasiswa');
            } else {
                $this->M_data->save_register_mahasiswa($_POST);
            }
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('MasterData/daftar_mahasiswa');
        }
    }*/


    function daftar_user()
    {
        $data['title'] = "Data User";
        $config['base_url'] = site_url('MasterData/daftar_user');
        $data['users'] = $this->M_data->data_user();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('masterdata/user', $data);
        $this->load->view('templates/footer');
    }
    function register_user()
    {
        $data['title'] = "Register Data User";
        $data['nama_fakultas'] = $this->M_data->data_fakultas();
        $data['role'] = $this->M_data->data_role();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('masterdata/register_user', $data);
        $this->load->view('templates/footer');
    }

    public function update_register_user($id_user)
    {
        $data['title'] = "Registrasi";
        $this->db->where('md5(id_user)', $id_user);
        $data['id_user'] = $this->db->get('user')->row_array();
        $data['nama_fakultas'] = $this->M_data->data_fakultas();
        $data['role'] = $this->M_data->data_role();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('masterdata/register_user', $data);
        $this->load->view('templates/footer');
    }

    public function delete_user()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_user', $key);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            $this->M_data->delete_user($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('MasterData/daftar_user');
    }
    public function save_register_user()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == FALSE) {
            $this->register_user();
        } else {
            if ($_POST['id'] != '') {
                $this->M_data->save_update_register_user($_POST);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                <div class="text-center">Data berhasil diubah !</div>
              </div>'
                );
                redirect('MasterData/daftar_mahasiswa');
            } else {
                $this->M_data->save_register_user($_POST);
            }
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('MasterData/daftar_user');
        }
    }
}
