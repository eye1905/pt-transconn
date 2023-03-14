<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Auth extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', 'login');
	}


	public function index_post()
	{

		// REQUIRED INPUT
		$username  = $this->post('username');
		$password  = $this->post('sandi');
		$fcm = $this->post('fcmid');


		if ($username !== '' && $password !== '') {
			$this->db->select('usr.*, kry.nm_karyawan, kry.no_hp, rl.nama_role');
			$this->db->from("t_user usr");
			$this->db->join('t_karyawan kry', "kry.id_karyawan = usr.id_karyawan");
			$this->db->join('t_role rl', "rl.id_role = usr.id_role");
			$this->db->where('usr.username', $username);
			$userdetail = $this->db->get()->row_array();


			if (!empty($userdetail)) {
				if (password_verify($password, $userdetail['password'])) {
					$this->login->setFcm($userdetail['id_user'], $fcm);
					$this->login->setSession($userdetail['id_user']);
					// prevent null value after set/update
					$this->db->select('usr.*, kry.nm_karyawan, kry.no_hp, rl.nama_role');
					$this->db->from("t_user usr");
					$this->db->join('t_karyawan kry', "kry.id_karyawan = usr.id_karyawan");
					$this->db->join('t_role rl', "rl.id_role = usr.id_role");
					$this->db->where('usr.username', $username);
					$getuseragain = $this->db->get()->row_array();
					$conf = array(
						"alamat_perush" => $this->config->item('alamat_perush'),
						"visit_us" => $this->config->item('visit_us'),
						"nama_perush" => $this->config->item('nama_perush'),
					);
					$this->response([
						'Respon_code' => '0',
						'Respon_message' => 'success',
						'Respon_date' => date('d-M-Y h:i'),
						'Respon_data' => $getuseragain,
						'Respon_config' => $conf
					], REST_Controller::HTTP_OK);
				} else {
					$this->response([
						'Respon_code' => '0',
						'Respon_message' => 'Periksa kembali username dan password',
						'Respon_date' => date('d-M-Y h:i'),
						'Respon_data' => []
					], REST_Controller::HTTP_OK);
				}
			} else {
				$this->response([
					'Respon_code' => '0',
					'Respon_message' => 'Pengguna tidak ditemukan',
					'Respon_date' => date('d-M-Y h:i'),
					'Respon_data' => []
				], REST_Controller::HTTP_OK);
			}
		} else {
			$this->response([
				'Respon_status' => '1',
				'Respon_message' => 'Silahkan masukkan username dan password',
				'Respon_date' => date('d-M-Y h:i'),
				'Respon_data' => []
			], REST_Controller::HTTP_OK);
		}
	}


	public function index_get()
	{
		$this->response([
			'Respon_status' => '3',
			'Respon_message' => 'Jangan hack sistem saya, akutuh gakuad.',
		], REST_Controller::HTTP_FORBIDDEN);
	}
}
