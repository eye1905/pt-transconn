<?php
class Disposisi_model extends CI_Model
{
	private $t_dpsssuratmasuk = "dpss_surat_masuk";
	private $t_detdpss = "det_dpss";
	private $t_detperintah = "det_perintah";
	private $t_respondpss = "respon_dpss";
	private $t_outbox = "t_outbox";
	private $t_notif = "t_notif";


	public function rules()
	{
		return [

			[
				'field' => 'waktupenye',
				'label' => 'Batas waktu penyelesaian',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],


			[
				'field' => 'catatan',
				'label' => 'Catatan',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'ditujukan[]',
				'label' => 'Tujuan Disposisi',
				'rules' => 'required',
				'errors' => [
					'required' => 'Silahkan pilih salah satu {field}'
				]
			],

			[
				'field' => 'perintah[]',
				'label' => 'Perintah Disposisi',
				'rules' => 'required',
				'errors' => [
					'required' => 'Silahkan pilih salah satu {field}'
				]
			],


		];
	}

	//C
	public function save_dpss($id_sm, $derajat_surat, $waktu_penyelesaian, $nomor_agenda, $catatan)
	{
		//selanjutnya
		$save_dpss = array(
			'id_suratmasuk' => $id_sm,
			'derajat_surat' => $derajat_surat,
			'batas_waktu_penyelesaian' => $waktu_penyelesaian,
			'no_agenda' => $nomor_agenda,
			'catatan' => $catatan,
			'date_created' => date('Y-m-d H:i:s'),

		);
		return $this->db->insert($this->t_dpsssuratmasuk, $save_dpss);
	}

	public function save_ditujukanjabatan($id, $jabatan)
	{
		//selanjutnya
		$z = str_replace('[', '', $jabatan);
		$y = str_replace(']', '', $z);
		$jabatanexplode = explode(",", $y);
		$st = 1;


		foreach ($jabatanexplode as $key => $val) {
			$detjabatan = array(
				'id_disposisi' => $id,
				'id_pegawai' => $val,
				'id_stats' => $st
			);

			$this->db->insert($this->t_detdpss, $detjabatan);
		}
		foreach ($jabatanexplode as $key => $val) {
			$this->db->select('pg.id_pegawai, pg.fcm_id');
			$this->db->from('pegawai pg');
			$this->db->where('pg.id_pegawai', $val);
			$q = $this->db->get()->result_array();

			$notif = array(
				'id_pegawai' => $q[0]['id_pegawai'],
				'title' => 'SIDIMAS',
				'body'	=> 'Disposisi baru diterima.',
				'route' => 'disposisi',
				'id_data' => $id,
				'waktu_input' => date('Y-m-d H:i:s')
			);

			$this->db->insert($this->t_notif, $notif);
		}
	}

	public function save_pegawaistaff($id, $arr_peg)
	{
		//selanjutnya
		$a = str_replace('[', '', $arr_peg);
		$b = str_replace(']', '', $a);
		$posteing = explode(",", $b);
		$st = 1;

		foreach ($posteing as $key => $vals) {
			$pegawai = array(
				'id_disposisi' => $id,
				'id_pegawai' => $vals,
				'id_stats' => $st,
			);
			$this->db->insert($this->t_detdpss, $pegawai);
		}
		foreach ($posteing as $key => $vals) {
			$this->db->select('pg.id_pegawai, pg.fcm_id');
			$this->db->from('pegawai pg');
			$this->db->where('pg.id_pegawai', $vals);
			$q = $this->db->get()->result_array();

			$notif = array(
				'id_pegawai' => $q[0]['id_pegawai'],
				'title' => 'SIDIMAS',
				'body'	=> 'Disposisi baru diterima.',
				'route' => 'disposisi',
				'id_data' => $id,
				'waktu_input' => date('Y-m-d H:i:s')
			);

			$this->db->insert($this->t_notif, $notif);
		}
	}

	public function save_perintah($id, $perintah)
	{

		//selanjutnya
		$c = str_replace('[', '', $perintah);
		$d = str_replace(']', '', $c);
		$perintahxplode = explode(",", $d);

		$st = 1;
		foreach ($perintahxplode as $keyper => $valper) {
			$per = array(
				'id_disposisi' => $id,
				'id_perintah' => $valper
			);
			$this->db->insert($this->t_detperintah, $per);
		}
	}



	//R
	function get_dpss_listAPI($limit = 10)
	{

		$this->db->select('dpss.*, sm.nomor_surat, sm.nomor_agenda, sm.tgl_surat, sm.tgl_terimasurat, sm.lampiran_surat, sm.file, sm.perihal_surat ,sfsm.nm_sifat');
		$this->db->from('dpss_surat_masuk dpss');
		$this->db->join('surat_masuk sm', 'dpss.id_suratmasuk = sm.id_surat');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->order_by('dpss.id_disposisi', 'desc');
		$this->db->limit($limit);
		return $this->db->get();
	}

	public function getperintahdpss($id_disposisi)
	{
		$this->db->select('pri.nama_perintah ');
		$this->db->from('dpss_surat_masuk dpss');
		$this->db->join('det_perintah pr', 'dpss.id_disposisi = pr.id_disposisi');
		$this->db->join('perintah pri', 'pr.id_perintah = pri.id_perintah');
		$this->db->where('dpss.id_disposisi =' . $id_disposisi);
		return $this->db->get();
	}


	public function getById($id_disposisi)
	{
		$this->db->select('dpss.*, sm.nomor_surat, sm.nomor_agenda, sm.tgl_surat, sm.tgl_terimasurat, sm.lampiran_surat, sm.file, sm.perihal_surat ,sfsm.nm_sifat');
		$this->db->from('dpss_surat_masuk dpss');
		$this->db->join('surat_masuk sm', 'dpss.id_suratmasuk = sm.id_surat');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->where('dpss.id_disposisi =' . $id_disposisi);
		return $this->db->get();
	}

	public function getdppsbyidpeg($idpegawai)
	{
		$this->db->select('dpss.*, sm.nomor_surat, sm.nomor_agenda, sm.tgl_surat, sm.tgl_terimasurat, sm.lampiran_surat, sm.file, sm.perihal_surat, det.*, sfsm.nm_sifat');
		$this->db->from('dpss_surat_masuk dpss');
		$this->db->join('det_dpss det', 'dpss.id_disposisi = det.id_disposisi');
		$this->db->join('surat_masuk sm', 'dpss.id_suratmasuk = sm.id_surat');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->where('det.id_pegawai =' . $idpegawai);
		return $this->db->get();
	}

	public function getperintahById($id_disposisi)
	{
		$this->db->select('pri.nama_perintah');
		$this->db->from('dpss_surat_masuk dpss');
		$this->db->join('det_perintah pr', 'dpss.id_disposisi = pr.id_disposisi');
		$this->db->join('perintah pri', 'pr.id_perintah = pri.id_perintah');
		$this->db->where('dpss.id_disposisi =' . $id_disposisi);
		return $this->db->get();
	}

	// ======================================== pegawai
	function getjabatan()
	{
		$not = array('1', '2');
		$this->db->select('jb.id_jabatan, jb.nama_jabatan, pg.nama_pegawai, pg.id_pegawai, pg.nomor_hp');
		$this->db->from('jabatan jb');
		$this->db->join('pegawai pg', 'jb.id_jabatan = pg.id_jabatan');
		$this->db->where_not_in('jb.id_jabatan', $not);
		$this->db->order_by('jb.position');
		return $this->db->get();
	}

	function getpegawaibiasa()
	{
		$this->db->query('SELECT pg.* FROM pegawai pg WHERE pg.id_jabatan = 1 AND pg.id_role = 1');
		return $this->db->get();
	}

	function getperintah()
	{
		$this->db->select('pr.*');
		$this->db->from('perintah pr');
		return $this->db->get();
	}
	// ============================================= pegawai


	//U
	public function update($id_disposisi)
	{

		//selanjutnya
		$post = $this->input->post();
		$update_dpss = array(
			'id_suratmasuk' => $post['id_srt'],
			'batas_waktu_penyelesaian' => $post['waktupenye'],
			'derajat_surat' => $post["derajat"],
			'no_agenda' => $post["nomor_agenda"],
			'catatan' => $post["catatan"],
			'date_created' => date('y-m-d'),
		);

		return $this->db->update($this->t_dpsssuratmasuk, $update_dpss, array('id_disposisi' => $id_disposisi));
	}

	public function update_tambahtujuanjabatan($id_disposisi)
	{
		//selanjutnya
		$posted = $this->input->post('ditujukan');
		$st = 1;
		// $ps = 'Disposisi surat diterima, silahkan cek website SIDIMAS BPTP untuk rincian disposisi.';
		$ps = 'SIDIMAS: Anda memiliki disposisi surat masuk yang belum dibaca. Silahkan cek diaplikasi SIDIMAS.';
		$stsid = 0;

		foreach ($posted as $key => $val) {
			$jabatan = array(
				'id_disposisi' => $id_disposisi,
				'id_pegawai' => $val,
				'id_stats' => $st

			);
			// $pesan = array(
			// 	'id_pegawai' => $val,
			// 	'pesan' => $ps
			// );
			$this->db->insert($this->t_detdpss, $jabatan);
			// $this->db->insert($this->t_outbox, $pesan);
		}
	}

	public function update_tambahtujuanstaff($id_disposisi)
	{
		//selanjutnya
		$posteing = explode(",", $this->input->post('arr_peg'));
		$st = 1;
		// $ps = 'Disposisi surat diterima, silahkan cek website SIDIMAS BPTP untuk rincian disposisi.';
		$ps = 'SIDIMAS: Anda memiliki disposisi surat masuk yang belum dibaca. Silahkan cek diaplikasi SIDIMAS.';

		foreach ($posteing as $key => $vals) {
			$pegawai = array(
				'id_disposisi' => $id_disposisi,
				'id_pegawai' => $vals,
				'id_stats' => $st,
			);
			// $pesans = array(
			// 	'id_pegawai' => $vals,
			// 	'pesan' => $ps
			// );
			$this->db->insert($this->t_detdpss, $pegawai);
			// $this->db->insert($this->t_outbox, $pesans);
		}
	}

	public function updatesave_perintah($id_disposisi)
	{
		// langkah 1
		$this->db->delete($this->t_detperintah, array("id_disposisi" => $id_disposisi));
		//selanjutnya
		$permore = $this->input->post('perintah');

		$st = 1;
		foreach ($permore as $keyper => $valper) {
			$per = array(
				'id_disposisi' => $id_disposisi,
				'id_perintah' => $valper

			);
			$this->db->insert($this->t_detperintah, $per);
		}
	}

	public function updatesttsdpss($id_disposisi, $id_pegawai)
	{
		$updstts = "UPDATE det_dpss SET id_stats='2' WHERE id_disposisi =" . $id_disposisi . " AND id_pegawai = " . $id_pegawai;
		return $this->db->query($updstts);
	}

	public function waktubacainput($id_disposisi, $id_pegawai)
	{
		$date = date('Y-m-d H:i:s');
		$updstts = "UPDATE det_dpss SET waktu_baca ='$date' WHERE id_disposisi=" . $id_disposisi . " AND id_pegawai= " . $id_pegawai;
		return $this->db->query($updstts);
	}

	public function ubah_responstsdpss($iddetdpss)
	{
		$updstts = "UPDATE det_dpss SET id_stats='3' WHERE id_detdpss=" . $iddetdpss;
		return $this->db->query($updstts);
	}



	//D
	public function deletedetdpss($iddetdpss)
	{

		$this->db->delete($this->t_respondpss, array("id_detdpss" => $iddetdpss));
		return $this->db->delete($this->t_detdpss, array("id_detdpss" => $iddetdpss));
	}

	public function CheckDeletedpss($id_disposisi)
	{
		$this->db->select('dps.*, det.id_detdpss');
		$this->db->from('dpss_surat_masuk dps');
		$this->db->join('det_dpss det', 'dps.id_disposisi = det.id_disposisi', 'left');
		$this->db->where('dps.id_disposisi = ' . $id_disposisi);
		$q = $this->db->get();
		return $q->result_array();
	}

	public function deletedpss($id_disposisi)
	{
		$this->db->delete($this->t_detperintah, array("id_disposisi" => $id_disposisi));
		return $this->db->delete($this->t_dpsssuratmasuk, array("id_disposisi" => $id_disposisi));
	}
}
