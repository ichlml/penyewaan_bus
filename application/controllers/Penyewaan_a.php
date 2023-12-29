<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan_a extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_penyewaan', 'sewa');
    }

    public function accSewa()
    {
        $id = $this->input->post('id_penyewaan');
        $acc = $this->sewa->accSewa($id);

        if ($acc) {
            $this->session->set_flashdata('success', 'Konfirmasi Berhasil');
                redirect('admin/data_pemesanan');
            }else{
                $this->session->set_flashdata('failed', 'Konfirmasi Gagal');
                redirect('admin/data_pemesanan');
        }
    }

    public function unAcc($id, $kenda)
    {
        $tolak = $this->sewa->unAcc($id);

        if ($tolak) {
            $this->sewa->updKenda($kenda);
            $this->session->set_flashdata('success', 'Ditolak');
                redirect('admin/data_pemesanan');
            }else{
                $this->session->set_flashdata('failed', 'Gagal');
                redirect('admin/data_pemesanan');
        }
    }

    public function unAccP($id, $kenda)
    {
        $tolak = $this->sewa->unAcc($id);

        if ($tolak) {
            // $this->sewa->updKenda($kenda);
            $this->session->set_flashdata('success', 'Ditolak');
                redirect('Pengguna/keranjang');
            }else{
                $this->session->set_flashdata('failed', 'Gagal');
                redirect('Pengguna/keranjang');
        }
    }

    public function accKembali()
    {
        $id = $this->input->post('id_penyewaan');
        // $kenda = $this->input->post('id_kendaraan');
        $post = $this->input->post();

        $accKembali = $this->sewa->accKembali($id, $post);

        if ($accKembali) {
            // $this->sewa->updKenda($kenda);
            $this->session->set_flashdata('success', 'Konfirmasi Berhasil');
                redirect('admin/data_pengembalian');
            }else{
                $this->session->set_flashdata('failed', 'Gagal');
                redirect('admin/data_pengembalian');
        }
    }
}