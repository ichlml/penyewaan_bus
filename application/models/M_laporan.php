<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function tahun()
    {
        $this->db->select('YEAR(tgl_pinjam) as tahun');
        $this->db->group_by('YEAR(tgl_pinjam)');
        return $this->db->get('tb_penyewaan');
    }

    public function cetakBulan($post)
    {
        $this->db->select('*, tb_penyewaan.harga as total_harga,MONTH(tgl_pinjam) as bulan, YEAR(tgl_pinjam) as tahun');
        $this->db->from('tb_user');
        $this->db->join('tb_pembayaran','id_user');
        $this->db->join('tb_penyewaan','id_penyewaan');
        $this->db->join('tb_kendaraan','id_kendaraan');
        $this->db->where('status_sewa', 'selesai');
        $this->db->where('MONTH(tgl_pinjam)', $post['bulan']);
        $this->db->where('YEAR(tgl_pinjam)', $post['tahun']);
        $this->db->order_by('tb_penyewaan.id_penyewaan', 'asc');
        return $this->db->get();
    }

    public function cekBulan($post)
    {
        $this->db->select('*, tb_penyewaan.harga as total_harga,MONTH(tgl_pinjam) as bulan, MONTHNAME(tgl_pinjam) as namabul, YEAR(tgl_pinjam) as tahun, sum(tb_penyewaan.harga) as total, sum(denda) as totdenda, sum(lama_pinjam) as lama_pinjam, sum(terlambat) as lama_terlambat');
        $this->db->from('tb_user');
        $this->db->join('tb_pembayaran','id_user');
        $this->db->join('tb_penyewaan','id_penyewaan');
        $this->db->join('tb_kendaraan','id_kendaraan');
        $this->db->where('status_sewa', 'selesai');
        $this->db->where('MONTH(tgl_pinjam)', $post['bulan']);
        $this->db->where('YEAR(tgl_pinjam)', $post['tahun']);
        $this->db->order_by('tb_penyewaan.id_penyewaan', 'asc');
        return $this->db->get();
    }

    public function invoice($id)
    {
        $user = $this->session->id_user;
        $this->db->select('*, tb_penyewaan.harga as total_harga1');
        $this->db->from('tb_kendaraan');
        $this->db->join('tb_penyewaan','id_kendaraan');
        $this->db->join('tb_user','id_user');
        $this->db->where('tb_user.id_user', $user);
        $this->db->where('tb_penyewaan.id_penyewaan', $id);
        $this->db->order_by('id_penyewaan','DESC');
        return $this->db->get();
    }

    public function surat($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_user');
    }
}