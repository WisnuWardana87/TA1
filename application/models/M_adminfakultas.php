<?php
class M_adminfakultas extends CI_Model
{
    function data_user()
    {
        $this->db->join('user_role', 'user_role.id=user.role_id');
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=user.id_fakultas');
        $this->db->where('nama_fakultas', 'Fakultas Teknik dan Kejuruan (FTK)');
        $data = $this->db->get('user')->result_array();
        return $data;
    }

    function data_role()
    {
        $data = $this->db->get('user_role')->result_array();
        return $data;
    }

    function data_fakultas()
    {
        $data = $this->db->get('tb_fakultas')->result_array();
        return $data;
    }
    public function delete_user($key)
    {
        $this->db->where('id_user', $key);
        $this->db->delete('user');
    }
    function save_register_user($post)
    {
        $konfigurasi = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./assets/img/profile')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('image');
        $data = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'image' => $_FILES['image']['name'],
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'id_fakultas' => $post['id_fakultas'],
            'role_id' => $post['role_id'],
            'is_active' => $post['is_active'],
            'date_created' => time()
        );
        $this->db->insert('user', $data);
    }

    public function save_update_register_user($post)
    {
        $konfigurasi = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('image');
        $data = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'image' => $_FILES['image']['name'],
            'password' => $post['password'],
            'id_fakultas' => $post['id_fakultas'],
            'role_id' => $post['role_id'],
            'is_active' => $post['is_active'],
            'date_created' => time()
        );
        $this->db->where('md5(id_user)', $post['id_user']);
        $this->db->update('user', $data);
    }
}
