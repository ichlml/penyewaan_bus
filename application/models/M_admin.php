<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function dataAdmin()
    {
        return $this->db->get('tb_admin');
    }

    public function dataUser()
    {
        $this->db->where('level','user');
        return $this->db->get('tb_user');
    }

    public function dataBiro()
    {
        $this->db->where('level','biro');
        return $this->db->get('tb_user');
    }

    public function auth($post)
    {
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->where('user', $post['email']);
        $this->db->where('pass', $post['pass']);
        return $this->db->get();
    }

    public function auth_p($post)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('user', $post['email']);
        $this->db->where('pass', $post['pass']);
        return $this->db->get();
    }

    public function countUser()
    {
       return $this->db->count_all_results('tb_user');
    }

    public function countKendaraan()
    {
        return $this->db->count_all_results('tb_kendaraan');
    }

    public function countPesanan()
    {
        return $this->db->count_all_results('tb_kendaraan');
    }
    public function countPembayaran()
    {
        return $this->db->count_all_results('tb_kendaraan');
    }
}