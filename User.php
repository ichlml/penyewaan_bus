<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_user', 'user');
        $this->load->model('m_laporan', 'laporan');

        $config['upload_path'] = './images/ktp/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10048;
        $this->load->library('upload', $config);
    }

    public function addAdmin()
    {
        $post = $this->input->post();
        $tambah = $this->user->addAdmin($post);
        if($tambah)
        {
            $this->session->set_flashdata('success', 'Tambah Admin Berhasil');
            redirect('admin/data_admin');
        }
        else
        {
            $this->session->set_flashdata('failed', 'Tambah Admin Gagal');
            redirect('admin/data_admin');
        }
    }

    public function editAdmin()
    {
        $post = $this->input->post();
        $update = $this->user->editAdmin($post);
        if($update)
        {
            $this->session->set_flashdata('success', 'Ubah Admin Berhasil');
            redirect('admin/data_admin');
        }else{
            $this->session->set_flashdata('failed', 'Ubah Admin Gagal');
            redirect('admin/data_admin');
        }
    }

    public function delAdmin($id)
    {
        if($id != null){
            $del = $this->user->delAdmin($id);

            if($del)
            {
                $this->session->set_flashdata('success', 'Hapus Admin Berhasil');
                redirect('admin/data_admin');
            }else{
                $this->session->set_flashdata('failed', 'Hapus Admin Gagal');
                redirect('admin/data_admin');
            }
        }
    }

    public function addUser()
    {
        if($this->upload->do_upload('ktp'))
        {
            $post = $this->input->post();
            $ktp = $this->upload->data('file_name');
            $add = $this->user->addUser($ktp, $post);
            // var_dump($add);
            // exit;
            if($add)
            {
                $this->session->set_flashdata('success', 'Tambah User Berhasil');
                redirect('admin/data_user');
            }else{
                $this->session->set_flashdata('failed', 'Tambah User Gagal');
                redirect('admin/data_user');
            }
        }
    }

    public function editUser()
    {
        $post = $this->input->post();
        $update = $this->user->editUser($post);
        if($update)
        {
            $this->session->set_flashdata('success', 'Ubah Biro Berhasil');
            redirect('admin/data_user');
        }else{
            $this->session->set_flashdata('failed', 'Ubah Biro Gagal');
            redirect('admin/data_user');
        }
    }

    public function editBiro()
    {
        $post = $this->input->post();
        $update = $this->user->editBiro($post);
        if($update)
        {
            $this->session->set_flashdata('success', 'Ubah User Berhasil');
            redirect('admin/data_biro');
        }else{
            $this->session->set_flashdata('failed', 'Ubah User Gagal');
            redirect('admin/data_biro');
        }
    }

    public function delUser($id)
    {
        if($id != null){
            $del = $this->user->delUser($id);
            if($del)
            {
                $this->session->set_flashdata('success', 'Hapus User Berhasil');
                redirect('admin/data_user');
            }else{
                $this->session->set_flashdata('failed', 'Hapus User Berhasil');
                redirect('admin/data_user');
            }
        }
    }

    public function delBiro($id)
    {
        if($id != null){
            $del = $this->user->delUser($id);
            if($del)
            {
                $this->session->set_flashdata('success', 'Hapus User Berhasil');
                redirect('admin/data_biro');
            }else{
                $this->session->set_flashdata('failed', 'Hapus User Berhasil');
                redirect('admin/data_biro');
            }
        }
    }

    public function addPengemudi()
    {
        $post = $this->input->post();
        $add = $this->user->addPengemudi($post);
        if($add)
        {
            $this->session->set_flashdata('success', 'Tambah Pengemudi Berhasil');
            redirect('admin/data_pengemudi');
        }else{
            $this->session->set_flashdata('failed', 'Tambah Pengemudi Gagal');
            redirect('admin/data_pengemudi');
        }
    }

    public function editPengemudi()
    {
        $post = $this->input->post();
        $update = $this->user->editPengemudi($post);
        if($update)
        {
            $this->session->set_flashdata('success', 'Ubah Pengemudi Berhasil');
            redirect('admin/data_pengemudi');
        }else{
            $this->session->set_flashdata('failed', 'Ubah Pengemudi Gagal');
            redirect('admin/data_pengemudi');
        }
    }

    public function delPengemudi($id)
    {
        if($id != NULL)
        {
            $del = $this->user->delPengemudi($id);
            if($del)
            {
                $this->session->set_flashdata('success', 'Hapus Pengemudi Berhasil');
                redirect('admin/data_pengemudi');
            }else{
                $this->session->set_flashdata('failed', 'Hapus Pengemudi Gagal');
                redirect('admin/data_pengemudi');
            }
        }
    }

    public function surat($id)
    {
        $invoice = [
            'data'=> $this->laporan->surat($id)->row()
        ];

        // echo '<pre>';
        // print_r($invoice['data']);
        // exit;
        // echo '</pre>';
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Surat Pernyataan".$id.".pdf";
        $this->pdf->load_view('admin/user/surat', $invoice);
    }
}