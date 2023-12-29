<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    public function tampilProduk()
    {
        return $this->db->get('tb_kendaraan');
    }

    public function countPesanan()
    {
        $id = $this->session->id_user;
        $this->db->where('id_user', $id);
        $this->db->where('status_sewa', 'pending');
        $this->db->or_where('status_sewa', 'pinjam');
        return $this->db->count_all_results('tb_penyewaan');
    }
}