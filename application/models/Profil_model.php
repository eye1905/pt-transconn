<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
	public function get_profil($karyawanid)
	{
		$this->db->select('usr.id_role, role.nama_role,kr.*');
		$this->db->from('t_user usr');
		$this->db->join('t_karyawan kr', 'usr.id_karyawan = kr.id_karyawan');
		$this->db->join('t_role role', 'role.id_role = usr.id_role');
		$this->db->where('usr.id_user =' . $karyawanid);
		return $this->db->get()->row_array();
	}
}
