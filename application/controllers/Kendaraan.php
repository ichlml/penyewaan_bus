<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_kendaraan','kendaraan');

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10048;
        $this->load->library('upload', $config);
    }

    public function addKendaraan()
    {
        if($this->upload->do_upload('foto'))
        {
            $data = $this->input->post();
            $foto = $this->upload->data('file_name');
            $add = $this->kendaraan->addKendaraan($foto, $data);
            if($add)
            {
                $this->session->set_flashdata('success', 'Tambah Kendaraan Berhasil');
                redirect('admin/data_kendaraan');
            }else{
                $this->session->set_flashdata('failed', 'Tambah Kendaraan Gagal');
                redirect('admin/data_kendaraan');
            }
        }
    }

    public function editKendaraan()
    {
        if($this->upload->do_upload('foto'))
        {
            $post = $this->input->post();
            $foto = $this->upload->data('file_name');
            $add = $this->kendaraan->editKendaraan($foto, $post);
            if($add)
            {
                $this->session->set_flashdata('success', 'Ubah Kendaraan Berhasil');
                redirect('admin/data_kendaraan');
            }else{
                $this->session->set_flashdata('failed', 'Ubah Kendaraan Gagal');
                redirect('admin/data_kendaraan');
            }
        }else{
            $this->session->set_flashdata('failed', 'Ubah Kendaraan Gagal');
            redirect('admin/data_kendaraan');
        }
    }

    public function delKendaraan($id)
    {
        if($id != NULL)
        {
            $dell = $this->kendaraan->delKendaraan($id);
            if($dell)
            {
                $this->session->set_flashdata('success', 'Hapus Kendaraan Berhasil');
                redirect('admin/data_kendaraan');
            }else{
                $this->session->set_flashdata('failed', 'Hapus Kendaraan Berhasil');
                redirect('admin/data_kendaraan');
            }
        }
    }

}