<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan','laporan');
    }
    public function lapBulan()
    {
        $post = $this->input->post();
        $cetak = [
            'cetak' => $this->laporan->cetakBulan($post)->result(),
            'row' => $this->laporan->cekBulan($post)->row()
        ];

        $this->load->view('admin/laporan/cetak', $cetak);

    }

}