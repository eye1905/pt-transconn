<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		if($this->session->userdata('role') != null){
			$this->session->set_flashdata('errors', 'Anda masih login aplikasi, silahkan logout terlebih dahulu');
			redirect(base_url() . 'bookings');
		}

		$this->form_validation->set_rules('username', 'Pengguna', 'trim|required', [
			"required" => "Username Tidak Valid"
		]);

		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required', [
			"required" => "Password Tidak Valid"
		]);

		if ($this->form_validation->run() == false) {
			return view('metronic.login');
		} else {
			$this->_login();
		}
	}
	
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('t_user', ['username' => $username])->row_array();

		if (!empty($user)) {

			if($user["is_aktif"]=="nonaktif"){
				$this->session->set_flashdata('errors', 'Pengguna tidak aktif');
				redirect('auth');
				exit();
			}
			
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'role' => $user['id_role'],
					'user' => $user['id_user'],
					'karyawan' => $user['id_karyawan'],
				];
				
				$this->session->set_userdata($data);

				$this->session->set_flashdata('success', 'Selamat datang di aplikasi booking');
				redirect(base_url() . 'dashboards');
			} else {
				$this->session->set_flashdata('errors', 'Pengguna tidak ditemukan');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('errors', 'Pengguna tidak ditemukan');
			redirect('auth');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('user');

		$this->session->set_flashdata('success', 'Anda berhasil keluar dari sistem');
		redirect('auth');
	}
	
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
