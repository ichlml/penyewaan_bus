<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function addAdmin($post)
    {
        $params = [
            'nama_admin'=> $post['nama_admin'],
            'jkel'=>$post['jkel'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
            'alamat' => $post['alamat'],
            'user' => $post['user'],
            'pass' => $post['pass']
        ];

        
        return $this->db->insert('tb_admin', $params);
    }

    public function editAdmin($post)
    {
        $params = [
            'nama_admin'=> $post['nama_admin'],
            'jkel'=>$post['jkel'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
            'alamat' => $post['alamat'],
            'user' => $post['user'],
            'pass' => $post['pass']
        ];

        $this->db->where('id_admin',$post['id_admin']);
        return $this->db->update('tb_admin',$params);
    }

    public function delAdmin($id)
    {
        $this->db->where('id_admin',$id);
        return $this->db->delete('tb_admin');
    }

    public function addUser($ktp, $post)
    {
        $params = [
            'nik'=> $this->input->post('nik'),
            'nama_user'=> $this->input->post('nama_user'),
            'jkel'=>$this->input->post('jkel'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'foto_ktp' => $ktp,
            'user' => $this->input->post('user'),
            'pass' => $this->input->post('pass'),
            'level' => 'user',
            'p1' => $post['p1'],
            'p2' => $post['p2'],
            'p3' => $post['p3']
        ];

        // print_r($params['nik']);
        // exit;
        return $this->db->insert('tb_user', $params);
    }

    public function addBiro($post)
    {
        $params = [
            'nama_user'=> $post['nama_user'],
            'no_hp' => $post['no_hp'],
            'alamat' => $post['alamat'],
            'user' => $post['user'],
            'pass' => $post['pass'],
            'p1' => $post['p1'],
            'p2' => $post['p2'],
            'p3' => $post['p3'],
            'level' => 'biro'
        ];
        return $this->db->insert('tb_user', $params);
    }

    public function editUser($post)
    {
        $params = [
            'nama_user'=> $post['nama_user'],
            'jkel'=>$post['jkel'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
            'no_hp' => $post['no_hp'],
            'alamat' => $post['alamat'],
            'user' => $post['user'],
            'pass' => $post['pass']
        ];
        
        $this->db->where('id_user', $post['id_user']);
        return $this->db->update('tb_user', $params);
    }

    public function editBiro($post)
    {
        $params = [
            'nama_user'=> $post['nama_user'],
            'no_hp' => $post['no_hp'],
            'alamat' => $post['alamat'],
            'user' => $post['user'],
            'pass' => $post['pass']
        ];
        
        $this->db->where('id_user', $post['id_user']);
        return $this->db->update('tb_user', $params);
    }

    public function delUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('tb_user');
    }

    public function addPengemudi($post)
    {
        $params = [
            'nama_pengemudi'=> $post['nama_pengemudi'],
            'jkel'=>$post['jkel'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
            'alamat' => $post['alamat'],
            'status_kawin' => $post['status_kawin']
        ];

        return $this->db->insert('tb_pengemudi', $params);
    }

    public function editPengemudi($post)
    {
        $params = [
            'nama_pengemudi'=> $post['nama_pengemudi'],
            'jkel'=>$post['jkel'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
            'alamat' => $post['alamat'],
            'status_kawin' => $post['status_kawin']
        ];

        $this->db->where('id_pengemudi', $post['id_pengemudi']);
        return $this->db->update('tb_pengemudi', $params);
    }

    public function delPengemudi($id)
    {
        $this->db->where('id_pengemudi', $id);
        return $this->db->delete('tb_pengemudi');
    }

    public function getUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_user');
    }
}