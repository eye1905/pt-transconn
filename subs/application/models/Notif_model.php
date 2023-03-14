<?php
class Notif_model extends CI_Model
{
	private $_table = "t_notif";

	// list notif
	public function getNotif($pegawai)
	{
		return $this->db->query("SELECT * FROM t_notif WHERE id_pegawai = '$pegawai' AND is_notif = 1 AND is_click = 0 ORDER BY id_notif DESC");
	}

	// GET T_OUtnOT
	public function getout()
	{
		$this->db->select('tn.*, pg.fcm_id');
		$this->db->from('t_notif tn');
		$this->db->join('pegawai pg', 'tn.id_pegawai = pg.id_pegawai');
		$this->db->where('tn.is_notif = 0 AND tn.id_pegawai != 0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function updatesttssending($idnotif)
	{
		$datenow = date('Y-m-d H:i:s');
		$updstts2dpss = "UPDATE t_notif SET is_notif = '1' WHERE id_notif = " . $idnotif;
		$updatewaktu = "UPDATE t_notif SET waktu_notif = '$datenow' WHERE id_notif = " . $idnotif;
		$this->db->query($updstts2dpss);
		$this->db->query($updatewaktu);
	}

	public function updateClicked($idnotif)
	{
		return $this->db->query("UPDATE t_notif SET is_click = '1' WHERE id_notif = " . $idnotif);
	}


	public function notification_android($body, $title, $click_action, $id_data, $to)
	{
		$msg = array(
			"body"          => $body,
			"title"         => $title,
			"icon"          => "ic_launcher",
			"click_action"  => $click_action
		);
		$data = array(
			"body"          => $body,
			"title"         => $title,
			"id_data"       => $id_data,
			"route"  => $click_action
		);
		$fields = array(
			'to'        => $to,
			'notification'  => $msg,
			'data'  => $data
		);


		$headers = array(
			'Authorization: key=AAAAyO5wl7Y:APA91bHiyFM18TKvK83GcFH6caYSuF83crmv70p_w4LfejEtj9E3Qw8LlDSItV48Z0GG5GlvIwvzSwEtDWOzSYaUXRbwHsO57jcbzjrjKh5lAqCXz3DbHtxXO2VNJBXM3zlfHOHVUXPA',
			'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);

		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$ret = array('result' => $result, 'http_code' => $http_code);
		curl_close($ch);
		return $ret;
	}
}
