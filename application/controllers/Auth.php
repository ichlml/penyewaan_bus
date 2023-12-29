<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin','admin');
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        $cek_login = $this->admin->auth($post);
        if($cek_login->num_rows() == 1)
        {
            $row = $cek_login->row();
            $params = array(
                'id_admin' => $row->id_admin,
                'nama_admin' => $row->nama_admin,
                'user' => $row->user
            );
            // print_r($params['nama_admin']);
            // exit;
            $this->session->set_userdata($params);
            redirect('admin');
        }else{
            $this->session->set_flashdata('failed', 'Username atau Password Salah');
            redirect('admin/login');
        }
    }

    public function proses_p()
    {
        $post = $this->input->post(null, TRUE);
        $cek_login = $this->admin->auth_p($post);
        if($cek_login->num_rows() == 1){
            $row = $cek_login->row();
            if($row->level == 'user'){
                $data = array(
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'user' => $row->user,
                    'level' => 'user'
                );

                $this->session->set_userdata($data);
                redirect('pengguna');
            }elseif ($row->level == 'biro') {
                $data = array(
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'user' => $row->user,
                    'level' => 'biro'
                );

                $this->session->set_userdata($data);
                redirect('pengguna');
            }
        }else{
            $this->session->set_flashdata('failed', 'Username atau Password Salah');
            redirect('pengguna/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect('admin/login');
    }

    public function logout_p()
    {
        $this->session->sess_destroy();
		redirect('pengguna');
    }
}