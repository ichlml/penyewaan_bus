<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin','admin');
		$this->load->model('m_kendaraan','kendaraan');
		$this->load->model('m_penyewaan','sewa');
		$this->load->model('m_laporan','laporan');
	}

	public function index()
	{
		check_not_login();
		$data = array(
			'user' => $this->admin->countUser(),
			'kendaraan' => $this->admin->countKendaraan(),
			'pesanan' => $this->admin->countPesanan(),
			'pembayaran' => $this->admin->countPembayaran()
		);
		$this->template->load('dashboard_a','admin/dasbor', $data);
	}

	public function login()
	{
		check_alerdy_login();
		$this->load->view('admin/login');
	}

	public function data_admin()
	{
		check_not_login();
		$data = [
			'data' => $this->admin->dataAdmin()->result()
		];
		$this->template->load('dashboard_a','admin/admin/data', $data);
	}

	public function data_user()
	{
		check_not_login();
		$data = [
			'data' => $this->admin->dataUser()->result()
		];
		$this->template->load('dashboard_a','admin/user/data', $data);
	}

	public function data_biro()
	{
		check_not_login();
		$data = [
			'data' => $this->admin->dataBiro()->result()
		];
		$this->template->load('dashboard_a','admin/biro/data', $data);
	}

	public function data_kendaraan()
	{
		check_not_login();
		$data = [
			'data' => $this->kendaraan->dataKendaraan()->result()
		];
		$this->template->load('dashboard_a','admin/kendaraan/kendaraan', $data);
	}

	public function data_pemesanan()
	{
		check_not_login();
		$data = [
			'data' => $this->sewa->dataPenyewaan()->result()
		];

		// echo '<pre>';
		// print_r($data['data']);
		// exit;
		// echo '</pre>';
		$this->template->load('dashboard_a','admin/penyewaan/sewa', $data);
	}

	public function data_pengembalian()
	{
		check_not_login();
		$data = [
			'data' => $this->sewa->dataKembali()->result()
		];
		$this->template->load('dashboard_a','admin/penyewaan/kembali', $data);
	}

	public function data_pembayaran()
	{
		check_not_login();
		$data = [
			'data' => $this->sewa->dataPembayaran()->result()
		];
		// echo '<pre>';
		// print_r($data['data']);
		// exit;
		// echo '</pre>';
		$this->template->load('dashboard_a','admin/pembayaran/pembayaran', $data);
	}

	public function laporan()
	{
		$data = [
			'tahun' => $this->laporan->tahun()->result()
		];

		// print_r($data['tahun']);
		// exit;
		$this->template->load('dashboard_a','admin/laporan/filter', $data);
	}
}
