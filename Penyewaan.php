<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login_p();
        $this->load->model('m_penyewaan','sewa');

        $config['upload_path'] = './images/invoice';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10048;
        $this->load->library('upload', $config);
    }

    public function addPenyewaan()
    {
        $post = $this->input->post();
        $id_kenda = $this->input->post('id_kendaraan');
        $id_user = $this->session->id_user; 

        $add = $this->sewa->tambahSewa($post, $id_user);
        if($add)
            {
                $update = $this->sewa->upStatus($id_kenda);
                $this->session->set_flashdata('success', 'Berhasil. Menunggu Pembayaran');
                redirect('Pengguna');
            }else{
                $this->session->set_flashdata('failed', 'Gagal. Silahkan Refresh Halaman dan Ulangi');
                redirect('Pengguna');
            }
    }

    public function hapusCart($id, $kenda)
    {
        // print_r($kenda);
        // exit;
        if($id != null AND $kenda != null){
            $hapus = $this->sewa->hapusCart($id);
            if($hapus)
            {
                $this->sewa->upStts($kenda);
                $this->session->set_flashdata('success', 'Hapus Berhasil');
                redirect('Pengguna/keranjang');
            }else{
                $this->session->set_flashdata('failed', 'Hapus Gagal');
                redirect('Pengguna/keranjang');
            }
        }
    }

    public function buktiPembayaran()
    {
        // print_r($post);
        // exit;   
        if($this->upload->do_upload('foto')){
            $post = $this->input->post();
            $foto = $this->upload->data('file_name');
            $add = $this->sewa->uploadBukti($foto, $post);
            if ($add) {
                $this->session->set_flashdata('success', 'Upload Bukti Pembayaran Berhasil');
                redirect('Pengguna/keranjang');
            }else{
                $this->session->set_flashdata('failed', 'Upload Bukti Pembayaran Gagal');
                redirect('Pengguna/keranjang');
            }
        }
    }

}