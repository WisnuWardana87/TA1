<?php
defined('BASEPATH') or exit('NO direct script accses allowed');
class Prestasi extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_prestasi');
        $this->load->library('form_validation');
        is_logged_in();
    }

    function daftar_bidang()
    {
        $data['title'] = "Data Bidang Prestasi";
        $config['base_url'] = site_url('Prestasi/daftar_bidang');
        $data['bidang'] = $this->M_prestasi->data_bidang();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required|trim|is_unique[tb_bidang.nama_bidang]', [
            'required' => 'Silahkan Masukan Nama Bidang!',
            'is_unique' => 'Nama Bidang Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/bidang', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->save_register_bidang($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('Prestasi/daftar_bidang');
        }
    }
    public function getUbahBidang()
    {
        echo json_encode($this->M_prestasi->getBidang($_POST['id_bidang']));
    }
    public function delete_bidang()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_bidang', $key);
        $query = $this->db->get('tb_bidang');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->delete_bidang($key);
        }
        redirect('Prestasi/daftar_bidang');
    }
    public function save_update_bidang()
    {
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Bidang!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_bidang();
        } else {
            $this->M_prestasi->save_update_register_bidang($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil diubah !</div>
          </div>'
            );
            redirect('Prestasi/daftar_bidang');
        }
    }

    function daftar_jenis()
    {
        $data['title'] = "Data Jenis Prestasi";
        $config['base_url'] = site_url('Prestasi/daftar_jenis');
        $data['jenis'] = $this->M_prestasi->data_jenis();
        $data['nama_bidang'] = $this->M_prestasi->data_bidang();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim|is_unique[tb_jenis_prestasi.nama_jenis]', [
            'required' => 'Silahkan Masukan Nama Jenis!',
            'is_unique' => 'Nama Jenis Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/jenis', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->save_register_jenis($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('Prestasi/daftar_jenis');
        }
    }
    public function getUbahJenis()
    {
        echo json_encode($this->M_prestasi->getJenis($_POST['id_jenis']));
    }

    public function delete_jenis()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_jenis', $key);
        $query = $this->db->get('tb_jenis_prestasi');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->delete_jenis($key);
        }
        redirect('Prestasi/daftar_jenis');
    }

    public function save_update_jenis()
    {
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Jenis!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_jenis();
        } else {
            $this->M_prestasi->save_update_register_jenis($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil diubah !</div>
          </div>'
            );
            redirect('Prestasi/daftar_jenis');
        }
    }

    function daftar_tingkat()
    {
        $data['title'] = "Data Tingkat Prestasi";
        $config['base_url'] = site_url('Prestasi/daftar_tingkat');
        $data['tingkat'] = $this->M_prestasi->data_tingkat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_tingkat', 'Nama Tingkat', 'required|trim|is_unique[tb_tingkat.nama_tingkat]', [
            'required' => 'Silahkan Masukan Nama Tingkat!',
            'is_unique' => 'Nama Tingkat Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/tingkat', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->save_register_tingkat($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('Prestasi/daftar_tingkat');
        }
    }

    public function getUbahTingkat()
    {
        echo json_encode($this->M_prestasi->getTingkat($_POST['id_tingkat']));
    }


    public function delete_tingkat()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_tingkat', $key);
        $query = $this->db->get('tb_tingkat');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->delete_tingkat($key);
        }
        redirect('Prestasi/daftar_tingkat');
    }
    public function save_update_tingkat()
    {
        $this->form_validation->set_rules('nama_tingkat', 'Nama Tingkat', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Tingkat!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_tingkat();
        } else {
            $this->M_prestasi->save_update_register_tingkat($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil diubah !</div>
          </div>'
            );
            redirect('Prestasi/daftar_tingkat');
        }
    }

    function daftar_jenis_juara()
    {
        $data['title'] = "Data Jenis Juara";
        $config['base_url'] = site_url('Prestasi/daftar_jenis_juara');
        $data['jenis_juara'] = $this->M_prestasi->data_jenis_juara();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_jenis_juara', 'Nama Jenis Juara', 'required|trim|is_unique[tb_jenis_juara.nama_jenis_juara]', [
            'required' => 'Silahkan Masukan Nama Jenis Juara!',
            'is_unique' => 'Nama Jenis Juara Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/jenis_juara', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->save_register_jenis_juara($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('Prestasi/daftar_jenis_juara');
        }
    }


    public function getUbahJuara()
    {
        echo json_encode($this->M_prestasi->getJuara($_POST['id_jenis_juara']));
    }

    public function delete_jenis_juara()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_jenis_juara', $key);
        $query = $this->db->get('tb_jenis_juara');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->delete_jenis_juara($key);
        }
        redirect('Prestasi/daftar_jenis_juara');
    }
    public function save_update_jenis_juara()
    {
        $this->form_validation->set_rules('nama_jenis_juara', 'Nama Jenis Juara', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Jenis Juara!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_jenis_juara();
        } else {
            $this->M_prestasi->save_update_register_jenis_juara($_POST);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            <div class="text-center">Data berhasil ditambahkan !</div>
          </div>'
            );
            redirect('Prestasi/daftar_jenis_juara');
        }
    }

    function daftar_prestasi()
    {
        $data['title'] = "Data Prestasi Mahasiswa";
        $config['base_url'] = site_url('Prestasi/daftar_prestasi');
        $data['prestasi'] = $this->M_prestasi->data_prestasi();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prestasi/prestasi', $data);
        $this->load->view('templates/footer');
    }
    function detail($id_prestasi)
    {
        $data['title'] = "Detail Data Prestasi";
        $data['detail_prestasi'] = $this->M_prestasi->detail($id_prestasi);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prestasi/detail_prestasi', $data);
        $this->load->view('templates/footer');
    }
    public function search_prestasi()
    {

        $keyword = $this->input->post('keyword');
        $data['prestasi'] = $this->M_prestasi->search_prestasi($keyword);
        $data['title'] = "Data Prestasi Mahasiswa";
        $data['tahun'] = $this->M_prestasi->data_prestasi();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prestasi/prestasi', $data);
        $this->load->view('templates/footer');
    }
    function register_prestasi()
    {
        $data['title'] = "Register Data Prestasi";
        $data['nama_jenis'] = $this->M_prestasi->data_jenis();
        $data['nama_tingkat'] = $this->M_prestasi->data_tingkat();
        $data['nama_jenis_juara'] = $this->M_prestasi->data_jenis_juara();
        $data['name'] = $this->M_prestasi->data_user();
        $data['nama_pembimbing'] = $this->M_prestasi->data_pembimbing();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prestasi/register_prestasi', $data);
        $this->load->view('templates/footer');
    }

    public function update_register_prestasi($id_prestasi)
    {
        $data['title'] = "Registrasi";
        $this->db->where('md5(id_prestasi)', $id_prestasi);
        $data['id_prestasi'] = $this->db->get('tb_prestasi')->row_array();
        $data['nama_jenis'] = $this->M_prestasi->data_jenis();
        $data['nama_tingkat'] = $this->M_prestasi->data_tingkat();
        $data['nama_jenis_juara'] = $this->M_prestasi->data_jenis_juara();
        $data['name'] = $this->M_prestasi->data_user();
        $data['nama_pembimbing'] = $this->M_prestasi->data_pembimbing();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prestasi/register_prestasi', $data);
        $this->load->view('templates/footer');
    }

    public function delete_prestasi()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_prestasi', $key);
        $query = $this->db->get('tb_prestasi');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->delete_prestasi($key);
        }
        redirect('Prestasi/daftar_prestasi');
    }
    public function save_register_prestasi()
    {
        if ($_POST['id_prestasi'] != '') {
            $this->M_prestasi->save_update_register_prestasi($_POST);
        } else {
            $this->M_prestasi->save_register_prestasi($_POST);
        }
        redirect('Prestasi/daftar_prestasi');
    }


    /*public function export()
    {
        $export = $this->input->post('export');
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';


        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Prestasi Mahasiswa')
            ->setLastModifiedBy('Prestasi Mahasiswa')
            ->setTitle("Data Prestasi Mahsiswa")
            ->setSubject("Prestasi Mahasiswa")
            ->setDescription("Laporan Semua Data Prestasi Mahasiswa")
            ->setKeywords("Data Mahasiswa");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PRESTASI MAHASISWA UNDIKSHA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Mahasiswa"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "Jenis Prestasi"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "Tingkat Prestasi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jenis Juara"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Tanggal Mulai"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "Tanggal Selesai"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "Nama Kegiatan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "Kota"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jumlah Dana"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "Nama Pembimbing"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "Tahun"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $prestasi = $this->M_prestasi->export($export);
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($prestasi as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->name);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nama_jenis);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama_tingkat);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_jenis_juara);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->tgl_mulai);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->tgl_selesai);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->nama_kegiatan);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->kota);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->jml_dana);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->nama_pembimbing);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->tahun);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Prestasi Mahasiswa");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Prestasi Mahasiswa.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        $write->save('php://output');
    }*/
    public function export()
    {
        $data['title'] = "Laporan Data Prestasi Mahasiswa";
        $data['exportdata']  = $this->M_prestasi->export();
        $this->load->view('prestasi/export', $data);
    }
}
