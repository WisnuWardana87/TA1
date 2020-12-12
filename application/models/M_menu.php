<?php
class M_menu extends CI_Model
{
    function data_menu()
    {
        $data = $this->db->get('user_menu')->result_array();
        return $data;
    }
    public function delete_menu($key)
    {
        $this->db->where('id', $key);
        $this->db->delete('user_menu');
    }
    public function save_register_menu($post)
    {
        $data = array(
            'menu' => $post['menu']
        );
        $this->db->insert('user_menu', $data);
    }
    public function save_update_register_menu($post)
    {
        $data = array(
            'menu' => $post['menu']
        );
        $this->db->where('md5(id)', $post['id']);
        $this->db->update('user_menu', $data);
    }

    function data_submenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function delete_submenu($key)
    {
        $this->db->where('id', $key);
        $this->db->delete('user_sub_menu');
    }

    public function save_register_submenu($post)
    {
        $data = array(
            'title' => $post['title'],
            'menu_id' => $post['menu_id'],
            'url' => $post['url'],
            'icon' => $post['icon'],
            'is_active' => $post['is_active']

        );
        $this->db->insert('user_sub_menu', $data);
    }
    public function save_update_register_submenu($post)
    {
        $data = array(
            'title' => $post['title'],
            'menu_id' => $post['menu_id'],
            'url' => $post['url'],
            'icon' => $post['icon'],
            'is_active' => $post['is_active']
        );
        $this->db->where('md5(id)', $post['id']);
        $this->db->update('user_sub_menu', $data);
    }
}
