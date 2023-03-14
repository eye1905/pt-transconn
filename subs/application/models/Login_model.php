<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function getJabatan()
	{
		$query = " SELECT jabatan.*, pegawai.nama_pegawai
                    FROM jabatan JOIN pegawai
                    ON jabatan.id_jabatan = pegawai.id_jabatan
                    ";
		return $this->db->query($query);
	}

	public function setFcm($id, $fcm = '')
	{
		$updatefcm = "UPDATE t_user SET fcmid = '$fcm' WHERE id_user = " . $id;
		$this->db->query($updatefcm);
	}

	public function setSession($id)
	{
		$end = date('Y', strtotime('+2 years'));
		$updatefcm = "UPDATE t_user SET session_exp = '$end' WHERE id_user = " . $id;
		$this->db->query($updatefcm);
	}
}
