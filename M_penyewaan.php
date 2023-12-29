<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyewaan extends CI_Model {

    public function tambahSewa($post, $id_user)
    {
        $params = [
            'id_user' => $id_user,
            'id_kendaraan' => $post['id_kendaraan'],
            'harga' => $post['harga'],
            'tgl_pinjam' => $post['tgl_pinjam'],
            'tgl_selesai' => $post['tgl_selesai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'tujuan' => $post['tujuan'],
            'jam' => $post['jam'],
            'lama_pinjam' => $post['lama'],
            'total_harga' => $post['total_harga'],
            'total_harga' => $post['total_harga'],
            'status_sewa' => 'pending'
        ];

        return $this->db->insert('tb_penyewaan', $params);
    }

    public function upStatus($id_kenda)
    {
        $this->db->set('status','0');
        $this->db->where('id_kendaraan', $id_kenda);
        return $this->db->update('tb_kendaraan');
    }

    public function upStts($kenda)
    {
        $this->db->set('status','1');
        $this->db->where('id_kendaraan', $kenda);
        return $this->db->update('tb_kendaraan');
    }

    public function cart()
    {
        $id = $this->session->id_user;
        $this->db->select('*, tb_penyewaan.harga as total_harga');
        $this->db->from('tb_kendaraan');
        $this->db->join('tb_penyewaan','id_kendaraan');
        $this->db->join('tb_user','id_user');
        $this->db->where('tb_user.id_user', $id);
        $this->db->order_by('id_penyewaan','DESC');
        return $this->db->get();
    }

    public function pembayaran($id)
    {
        $this->db->where('id_penyewaan',$id);
        return $this->db->get('tb_penyewaan');
    }

    public function cekBukti($id)
    {
        $this->db->where('id_penyewaan',$id);
        $this->db->where('status_pembayaran', '1');
        return $this->db->get('tb_pembayaran');
    }

    public function hapusCart($id)
    {
        $this->db->where('id_penyewaan', $id);
        return $this->db->delete('tb_penyewaan');
    }

    public function uploadBukti($foto, $post)
    {
        // print_r($post);
        // exit;
        $params = [
            'id_penyewaan' => $post['id_penyewaan'],
            'id_user' => $post['id_user'],
            'total_harga' => $post['total_harga'],
            'foto_bukti' => $foto
        ];

        return $this->db->insert('tb_pembayaran', $params);
    }

    // ADMIN

    public function dataPenyewaan()
    {
        $this->db->select('*, tb_penyewaan.harga as total_harga');
        $this->db->from('tb_user');
        $this->db->join('tb_pembayaran','id_user');
        $this->db->join('tb_penyewaan','id_penyewaan');
        $this->db->join('tb_kendaraan','id_kendaraan');
        $this->db->where('status_sewa', 'pending');
        $this->db->order_by('tb_penyewaan.id_penyewaan','DESC');
        return $this->db->get();
    }

    public function dataKembali()
    {
        $this->db->select('*, tb_penyewaan.harga as total_harga');
        $this->db->from('tb_user');
        $this->db->join('tb_pembayaran','id_user');
        $this->db->join('tb_penyewaan','id_penyewaan');
        $this->db->join('tb_kendaraan','id_kendaraan');
        $this->db->where('status_sewa', 'pinjam');
        $this->db->or_where('status_sewa', 'selesai');
        $this->db->order_by('tb_penyewaan.id_penyewaan','DESC');
        return $this->db->get();
    }

    public function dataPembayaran()
    {
        $this->db->select('*, tb_penyewaan.harga as total_harga');
        $this->db->from('tb_user');
        $this->db->join('tb_pembayaran','id_user');
        $this->db->join('tb_penyewaan','id_penyewaan');
        $this->db->join('tb_kendaraan','id_kendaraan');
        $this->db->order_by('tb_pembayaran.id_pembayaran','DESC');
        return $this->db->get();
    }

    public function accSewa($id)
    {
        $this->db->set('status_sewa','pinjam');
        $this->db->where('id_penyewaan',$id);
        return $this->db->update('tb_penyewaan');
    }

    public function unAcc($id)
    {
        $this->db->set('status_sewa','ditolak');
        $this->db->where('id_penyewaan',$id);
        return $this->db->update('tb_penyewaan');
    }

    public function updKenda($kenda)
    {
        $this->db->set('status','1');
        $this->db->where('id_kendaraan', $kenda);
        return $this->db->update('tb_kendaraan');
    }

    public function accKembali($id, $post)
    {
        $this->db->set('tgl_kembali', $post['tgl_kembali']);
        $this->db->set('terlambat', $post['terlambat']);
        $this->db->set('denda', $post['denda']);
        $this->db->set('status_sewa','selesai');
        $this->db->where('id_penyewaan',$id);
        return $this->db->update('tb_penyewaan');
    }
}