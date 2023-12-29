<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kendaraan extends CI_Model {

    public function dataKendaraan()
    {
        return $this->db->get('tb_kendaraan');
    }

    public function addKendaraan($foto, $data)
    {
        $params = array(
            'nopol' => $this->input->post('nopol'),
            'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            'jenis' => $this->input->post('jenis'),
            'cc' => $this->input->post('cc'),
            'merk' => $this->input->post('merk'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => '1',
            'foto' => $foto
        );
        return $this->db->insert('tb_kendaraan',$params);
    }

    public function editKendaraan($foto, $post)
    {
        $params = array(
            'nopol' => $post['nopol'],
            'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            'jenis' => $this->input->post('jenis'),
            'cc' => $this->input->post('cc'),
            'merk' => $this->input->post('merk'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => '1',
            'foto' => $foto
        );
        $this->db->where('id_kendaraan', $post['id_kendaraan']);
        return $this->db->update('tb_kendaraan', $params);
    }

    public function delKendaraan($id)
    {
        $this->db->where('id_kendaraan', $id);
        return $this->db->delete('tb_kendaraan');
    }
}