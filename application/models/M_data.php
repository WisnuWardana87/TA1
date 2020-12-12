<?php
class M_data extends CI_Model
{
    function data_fakultas()
    {
        $data = $this->db->get('tb_fakultas')->result_array();
        return $data;
    }

    public function delete_fakultas($key)
    {
        $this->db->where('id_fakultas', $key);
        $this->db->delete('tb_fakultas');
    }

    function getFakultas($id_fakultas)
    {
        $this->db->where('id_fakultas=', $id_fakultas);
        $fakultas = $this->db->get('tb_fakultas')->row_array();
        return $fakultas;
    }
    public function save_register_fakultas($post)
    {
        $data = array(
            'nama_fakultas' => $post['nama_fakultas']
        );
        $this->db->insert('tb_fakultas', $data);
    }
    public function save_update_register_fakultas($post)
    {
        $data = array(
            'nama_fakultas' => $post['nama_fakultas']
        );
        $this->db->where('id_fakultas', $post['id_fakultas']);
        $this->db->update('tb_fakultas', $data);
    }

    function data_jurusan()
    {
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=tb_jurusan.id_fakultas');
        $data = $this->db->get('tb_jurusan')->result_array();
        return $data;
    }
    function getJurusan($id_jurusan)
    {
        $this->db->where('id_jurusan', $id_jurusan);
        $jurusan = $this->db->get('tb_jurusan')->row_array();
        return $jurusan;
    }
    public function delete_jurusan($key)
    {
        $this->db->where('id_jurusan', $key);
        $this->db->delete('tb_jurusan');
    }

    public function save_register_jurusan($post)
    {
        $data = array(
            'nama_jurusan' => $post['nama_jurusan'],
            'id_fakultas' => $post['id_fakultas']
        );
        $this->db->insert('tb_jurusan', $data);
    }
    public function save_update_register_jurusan($post)
    {
        $data = array(
            'nama_jurusan' => $post['nama_jurusan'],
            'id_fakultas' => $post['id_fakultas']
        );
        $this->db->where('id_jurusan', $post['id_jurusan']);
        $this->db->update('tb_jurusan', $data);
    }

    function data_prodi()
    {
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan=tb_prodi.id_jurusan');
        $data = $this->db->get('tb_prodi')->result_array();
        return $data;
    }
    function getProdi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $prodi = $this->db->get('tb_prodi')->row_array();
        return $prodi;
    }
    public function delete_prodi($key)
    {
        $this->db->where('id_prodi', $key);
        $this->db->delete('tb_prodi');
    }

    public function save_register_prodi($post)
    {
        $data = array(
            'nama_prodi' => $post['nama_prodi'],
            'id_jurusan' => $post['id_jurusan'],
            'jenjang' => $post['jenjang']
        );
        $this->db->insert('tb_prodi', $data);
    }
    public function save_update_register_prodi($post)
    {
        $data = array(
            'nama_prodi' => $post['nama_prodi'],
            'id_jurusan' => $post['id_jurusan'],
            'jenjang' => $post['jenjang']
        );
        $this->db->where('id_prodi', $post['id_prodi']);
        $this->db->update('tb_prodi', $data);
    }

    function data_pembimbing()
    {
        $data = $this->db->get('tb_pembimbing')->result_array();
        return $data;
    }

    function getPembimbing($id_pembimbing)
    {
        $this->db->where('id_pembimbing', $id_pembimbing);
        $pembimbing = $this->db->get('tb_pembimbing')->row_array();
        return $pembimbing;
    }

    public function delete_pembimbing($key)
    {
        $this->db->where('id_pembimbing', $key);
        $this->db->delete('tb_pembimbing');
    }
    public function save_register_pembimbing($post)
    {
        $data = array(
            'nip_pembimbing' => $post['nip_pembimbing'],
            'nama_pembimbing' => $post['nama_pembimbing']
        );
        $this->db->insert('tb_pembimbing', $data);
    }
    public function save_update_register_pembimbing($post)
    {
        $data = array(
            'nip_pembimbing' => $post['nip_pembimbing'],
            'nama_pembimbing' => $post['nama_pembimbing']
        );
        $this->db->where('id_pembimbing', $post['id_pembimbing']);
        $this->db->update('tb_pembimbing', $data);
    }



    /*function data_mahasiswa()
    {
        $this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
        $data = $this->db->get('tb_mahasiswa')->result_array();
        return $data;
    }

    public function delete_mahasiswa($key)
    {
        $this->db->where('id', $key);
        $this->db->delete('tb_mahasiswa');
    }
    public function save_register_mahasiswa($post)
    {
        $data = array(
            'nim' => $post['nim'],
            'nama' => $post['nama'],
            'id_prodi' => $post['id_prodi']
        );
        $this->db->insert('tb_mahasiswa', $data);
    }
    public function save_update_register_mahsiswa($post)
    {
        $data = array(
            'nim' => $post['nim'],
            'nama' => $post['nama'],
            'id_prodi' => $post['id_prodi']
        );
        $this->db->where('md5(id)', $post['id']);
        $this->db->update('tb_mahasiswa', $data);
    }*/





    function data_user()
    {
        $this->db->join('user_role', 'user_role.id=user.role_id');
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=user.id_fakultas');
        $data = $this->db->get('user')->result_array();
        return $data;
    }

    function data_role()
    {
        $data = $this->db->get('user_role')->result_array();
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
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'id_fakultas' => $post['id_fakultas'],
            'role_id' => $post['role_id'],
            'is_active' => $post['is_active'],
            'date_created' => time()
        );
        $this->db->where('md5(id_user)', $post['id_user']);
        $this->db->update('user', $data);
    }
}
