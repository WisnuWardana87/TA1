<?php
class M_admin extends CI_Model
{
    function data_role()
    {
        $data = $this->db->get('user_role')->result_array();
        return $data;
    }
}
