<?php
class M_prestasi extends CI_Model
{


    //data bidang (tb_bidang)
    function data_bidang()
    {
        $data = $this->db->get('tb_bidang')->result_array();
        return $data;
    }

    function getBidang($id_bidang)
    {
        $this->db->where('id_bidang', $id_bidang);
        $bidang = $this->db->get('tb_bidang')->row_array();
        return $bidang;
    }
    public function delete_bidang($key)
    {
        $this->db->where('id_bidang', $key);
        $this->db->delete('tb_bidang');
    }
    public function save_register_bidang($post)
    {
        $data = array(
            'nama_bidang' => $post['nama_bidang'],
            'ket_bidang' => $post['ket_bidang']

        );
        $this->db->insert('tb_bidang', $data);
    }
    public function save_update_register_bidang($post)
    {
        $data = array(
            'nama_bidang' => $post['nama_bidang'],
            'ket_bidang' => $post['ket_bidang']
        );
        $this->db->where('id_bidang', $post['id_bidang']);
        $this->db->update('tb_bidang', $data);
    }

    //data jenis (tb_jenis_prestasi)
    function data_jenis()
    {
        $this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_jenis_prestasi.id_bidang');
        $data = $this->db->get('tb_jenis_prestasi')->result_array();
        return $data;
    }
    function getJenis($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        $jenis = $this->db->get('tb_jenis_prestasi')->row_array();
        return $jenis;
    }
    public function delete_jenis($key)
    {
        $this->db->where('id_jenis', $key);
        $this->db->delete('tb_jenis_prestasi');
    }

    public function save_register_jenis($post)
    {
        $data = array(
            'nama_jenis' => $post['nama_jenis'],
            'id_bidang' => $post['id_bidang'],
            'ket_jenis' => $post['ket_jenis']

        );
        $this->db->insert('tb_jenis_prestasi', $data);
    }
    public function save_update_register_jenis($post)
    {
        $data = array(
            'nama_jenis' => $post['nama_jenis'],
            'id_bidang' => $post['id_bidang'],
            'ket_jenis' => $post['ket_jenis']
        );
        $this->db->where('id_jenis', $post['id_jenis']);
        $this->db->update('tb_jenis_prestasi', $data);
    }


    //data tingkat (tb_tingkat)
    function data_tingkat()
    {
        $data = $this->db->get('tb_tingkat')->result_array();
        return $data;
    }
    function getTingkat($id_tingkat)
    {
        $this->db->where('id_tingkat', $id_tingkat);
        $tingkat = $this->db->get('tb_tingkat')->row_array();
        return $tingkat;
    }
    public function delete_tingkat($key)
    {
        $this->db->where('id_tingkat', $key);
        $this->db->delete('tb_tingkat');
    }
    public function save_register_tingkat($post)
    {
        $data = array(
            'nama_tingkat' => $post['nama_tingkat'],
            'ket_tingkat' => $post['ket_tingkat']

        );
        $this->db->insert('tb_tingkat', $data);
    }
    public function save_update_register_tingkat($post)
    {
        $data = array(
            'nama_tingkat' => $post['nama_tingkat'],
            'ket_tingkat' => $post['ket_tingkat']
        );
        $this->db->where('id_tingkat', $post['id_tingkat']);
        $this->db->update('tb_tingkat', $data);
    }



    //data jenis juara (tb_jenis juara)
    function data_jenis_juara()
    {
        $data = $this->db->get('tb_jenis_juara')->result_array();
        return $data;
    }
    function getJuara($id_jenis_juara)
    {
        $this->db->where('id_jenis_juara', $id_jenis_juara);
        $juara = $this->db->get('tb_jenis_juara')->row_array();
        return $juara;
    }
    public function delete_jenis_juara($key)
    {
        $this->db->where('id_jenis_juara', $key);
        $this->db->delete('tb_jenis_juara');
    }
    public function save_register_jenis_juara($post)
    {
        $data = array(
            'nama_jenis_juara' => $post['nama_jenis_juara'],
            'ket_jenis_juara' => $post['ket_jenis_juara']

        );
        $this->db->insert('tb_jenis_juara', $data);
    }
    public function save_update_register_jenis_juara($post)
    {
        $data = array(
            'nama_jenis_juara' => $post['nama_jenis_juara'],
            'ket_jenis_juara' => $post['ket_jenis_juara']

        );
        $this->db->where('id_jenis_juara', $post['id_jenis_juara']);
        $this->db->update('tb_jenis_juara', $data);
    }


    //data prestasi (tb_prestasi)
    function data_prestasi()
    {
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_pembimbing.id_pembimbing');
        $this->db->join('user', 'user.name=tb_prestasi.name');
        $data = $this->db->get('tb_prestasi')->result_array();
        return $data;
    }

    function detail($id_prestasi)
    {
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_prestasi.id_pembimbing');
        $this->db->join('user', 'user.name=tb_prestasi.name');
        $this->db->where('id_prestasi', $id_prestasi);
        $data = $this->db->get('tb_prestasi')->result_array();
        return $data;
    }

    function data_pembimbing()
    {
        $data = $this->db->get('tb_pembimbing')->result_array();
        return $data;
    }

    function data_mahasiswa()
    {
        $data = $this->db->get('tb_mahasiswa')->result_array();
        return $data;
    }

    function data_user()
    {
        $data = $this->db->get('user')->result_array();
        return $data;
    }

    public function delete_prestasi($key)
    {
        $this->db->where('id_prestasi', $key);
        $this->db->delete('tb_prestasi');
    }
    public function search_prestasi($keyword)
    {
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_pembimbing.id_pembimbing');
        $this->db->join('user', 'user.name=tb_prestasi.name');
        $this->db->from('tb_prestasi');
        $this->db->like('tahun', $keyword);
        $this->db->or_like('kota', $keyword);
        return $this->db->get()->result_array();
    }
    function save_register_prestasi($post)
    {
        $konfigurasi = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('file_prestasi');
        $data = array(
            'id_jenis' => $post['id_jenis'],
            'id_tingkat' => $post['id_tingkat'],
            'id_jenis_juara' => $post['id_jenis_juara'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'nama_kegiatan' => $post['nama_kegiatan'],
            'kota' => $post['kota'],
            'jml_dana' => $post['jml_dana'],
            'name' => $post['name'],
            'ket_prestasi' => $post['ket_prestasi'],
            'file_prestasi' => $_FILES['file_prestasi']['name'],
            'id_pembimbing' => $post['id_pembimbing'],
            'tahun' => $post['tahun']
        );
        $this->db->insert('tb_prestasi', $data);
    }

    public function save_update_register_prestasi($post)
    {
        $konfigurasi = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('file_prestasi');
        $data = array(
            'id_jenis' => $post['id_jenis'],
            'id_tingkat' => $post['id_tingkat'],
            'id_jenis_juara' => $post['id_jenis_juara'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'nama_kegiatan' => $post['nama_kegiatan'],
            'kota' => $post['kota'],
            'jml_dana' => $post['jml_dana'],
            'name' => $post['name'],
            'ket_prestasi' => $post['ket_prestasi'],
            'file_prestasi' => $_FILES['file_prestasi']['name'],
            'id_pembimbing' => $post['id_pembimbing'],
            'tahun' => $post['tahun']

        );
        $this->db->where('md5(id_prestasi)', $post['id_prestasi']);
        $this->db->update('tb_prestasi', $data);
    }
    function export()
    {
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_pembimbing.id_pembimbing');
        $this->db->join('user', 'user.name=tb_prestasi.name');
        $data = $this->db->get('tb_prestasi')->result();
        return $data;
    }
}
