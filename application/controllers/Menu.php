<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_menu');

        is_logged_in();
    }
    function daftar_menu()
    {
        $data['title'] = "Menu Management";
        $config['base_url'] = site_url('Menu/daftar_menu');
        $data['menu'] = $this->M_menu->data_menu();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/menu', $data);
        $this->load->view('templates/footer');
    }

    function register_menu()
    {
        $data['title'] = "Register Data Menu";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/register_menu', $data);
        $this->load->view('templates/footer');
    }

    public function update_register_menu($id)
    {
        $data['title'] = "Registrasi";
        $this->db->where('md5(id)', $id);
        $data['id'] = $this->db->get('user_menu')->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/register_menu', $data);
        $this->load->view('templates/footer');
    }


    public function delete_menu()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id', $key);
        $query = $this->db->get('user_menu');
        if ($query->num_rows() > 0) {
            $this->M_menu->delete_menu($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('menu/daftar_menu');
    }

    public function save_register_menu()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim|is_unique[user_menu.menu]', [
            'required' => 'Silahkan Masukan Nama!',
            'is_unique' => 'Menu Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->register_menu();
        } else {
            if ($_POST['id'] != '') {
                $this->M_menu->save_update_register_menu($_POST);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                <div class="text-center">Data berhasil diubah !</div>
              </div>'
                );
                redirect('Menu/daftar_menu');
            } else {
                $this->M_menu->save_register_menu($_POST);
            }
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('Menu/daftar_menu');
        }
    }

    public function submenu()
    {
        $data['title'] = "Submenu Management";
        $config['base_url'] = site_url('Menu/submenu');
        $data['submenu'] = $this->M_menu->data_submenu();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    function register_submenu()
    {
        $data['title'] = "Register Submenu Management";
        $data['menu'] = $this->M_menu->data_menu();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/register_submenu', $data);
        $this->load->view('templates/footer');
    }

    public function update_register_submenu($id)
    {
        $data['title'] = "Registrasi";
        $this->db->where('md5(id)', $id);
        $data['id'] = $this->db->get('user_sub_menu')->row_array();
        $data['menu'] = $this->M_menu->data_menu();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/register_submenu', $data);
        $this->load->view('templates/footer');
    }

    public function delete_submenu()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id', $key);
        $query = $this->db->get('user_sub_menu');
        if ($query->num_rows() > 0) {
            $this->M_menu->delete_submenu($key);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
        <div class="text-center">Data berhasil dihapus !</div>
      </div>'
        );
        redirect('menu/submenu');
    }

    public function save_register_submenu()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim', [
            'required' => 'Silahkan Masukan Title!'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required|trim', [
            'required' => 'Silahkan Masukan Url!'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            'required' => 'Silahkan Masukan Icon!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->register_submenu();
        } else {
            if ($_POST['id'] != '') {
                $this->M_menu->save_update_register_submenu($_POST);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                <div class="text-center">Data berhasil diubah !</div>
              </div>'
                );
                redirect('Menu/submenu');
            } else {
                $this->M_menu->save_register_submenu($_POST);
            }
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('Menu/submenu');
        }
    }
}
