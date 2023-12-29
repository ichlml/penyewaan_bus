<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk', 'produk');
        $this->load->model('m_penyewaan', 'sewa');
        $this->load->model('m_user', 'user');
        $this->load->model('m_laporan', 'laporan');


        
        $config['upload_path'] = './images/ktp/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10048;
        $this->load->library('upload', $config);
    }
    public function index()
    {
        $data = [
            'produk' => $this->produk->tampilProduk()->result(),
            'countPesan' => $this->produk->countPesanan()
        ];
        // print_r($data['countPesan']);
        // exit;
        $this->template->load('dashboard_p','pengguna/dasbor', $data);
    }

    public function settUser()
    {
        $id= $this->session->id_user;
        $data = [
            'data' =>$this->user->getUser($id)->row(),
            'countPesan' => $this->produk->countPesanan()
        ];
        // print_r($data['countPesan']);
        // exit;
        $this->template->load('dashboard_p','pengguna/setting', $data);
    }

    public function keranjang()
    {
        $id = $this->session->id_user;
        $data = [
            'pesanan' => $this->sewa->cart()->result(),
            'countPesan' => $this->produk->countPesanan()
            // 'cekBukti' => $this->sewa->cekBukti($id)->num_rows()
        ];
        // echo '<pre>';
        // print_r($data['pesanan']);
        // exit;
        // echo '</pre>';
        $this->template->load('dashboard_p','pengguna/cart', $data);
    }

    public function pembayaran($id)
    {
        $data = [
            'countPesan' => $this->produk->countPesanan(),
            'data' => $this->sewa->pembayaran($id)->row(),
            'cekBukti' => $this->sewa->cekBukti($id)->num_rows()
        ];

        // print_r($data['data']);
        // exit;
        $this->template->load('dashboard_p','pengguna/pembayaran', $data);
    }

    public function login()
    {
        $this->load->view('login');
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
                redirect('pengguna/login');
            }else{
                $this->session->set_flashdata('failed', 'Tambah User Gagal');
                redirect('pengguna/login');
            }
        }
    }

    public function addBiro()
    {
        $post = $this->input->post();
        // print_r($post);
        // exit;
        $add = $this->user->addBiro($post);
        if($add)
        {
            $this->session->set_flashdata('success', 'Pendaftaran Biro Berhasil');
            redirect('pengguna/login');
        }else{
            $this->session->set_flashdata('failed', 'Pendaftaran Biro Gagal');
            redirect('pengguna/login');
        }
    }

    public function ketentuan()
    {
        $data = [
            'countPesan' => $this->produk->countPesanan()
        ];
        $this->template->load('dashboard_p','pengguna/bantuan', $data);
    }

    public function invoice($id)
    {
        $invoice = [
            'data'=> $this->laporan->invoice($id)->row()
        ];

        // echo '<pre>';
        // print_r($invoice['data']);
        // exit;
        // echo '</pre>';
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Invoice No Sewa".$id.".pdf";
        $this->pdf->load_view('pengguna/invoice', $invoice);
    }

    public function surat()
    {
        $id = $this->session->id_user;
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

    public function editUser()
    {
        $post = $this->input->post();
        $update = $this->user->editUser($post);
        if($update)
        {
            $this->session->set_flashdata('success', 'Ubah User Berhasil');
            redirect('pengguna/settUser');
        }else{
            $this->session->set_flashdata('failed', 'Ubah User Gagal');
            redirect('pengguna/settUser');
        }
    }
}