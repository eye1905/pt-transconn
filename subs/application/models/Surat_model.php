<?php
class Surat_model extends CI_Model
{
	private $t_suratmasuk = "surat_masuk";


	public function rules()
	{
		return [
			[
				'field' => 'nomor_surat',
				'label' => 'Nomor Surat',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'tgl_terimasurat',
				'label' => 'Tanggal Surat Diterima',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'tgl_surat',
				'label' => 'Tanggal Surat Masuk',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],


			[
				'field' => 'asal_surat',
				'label' => 'Asal Surat',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'perihal_surat',
				'label' => 'Perihal',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'sifat',
				'label' => 'Sifat Surat',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'nomor_agenda',
				'label' => 'Nomor Agenda',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'lampiran_surat',
				'label' => 'Lampiran',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			]
		];
	}

	//C
	public function save($filename, $nomorsurat)
	{
		$post = $this->input->post();
		$save = array(
			'nomor_surat' => $nomorsurat,
			'tgl_terimasurat' => $post["tgl_terimasurat"],
			'file' => $filename,
			'tgl_surat' => $post['tgl_surat'],
			'asal_surat' => $post["asal_surat"],
			'lampiran_surat' => $post["lampiran_surat"],
			'perihal_surat' => $post["perihal_surat"],
			'sifat_surat' => $post["sifat"],
			'nomor_agenda' => $post["nomor_agenda"],
			'id_status' => $post['id_status'],
			'date_created' => date('Y-m-d H:i:s')
		);
		return $this->db->insert($this->t_suratmasuk, $save);
	}


	//R
	function get_surat_listapifull($limit = 5)
	{
		$this->db->select('sm.*, stsm.nm_status, sfsm.nm_sifat');
		$this->db->from('surat_masuk sm');
		$this->db->join('status_sm stsm', 'sm.id_status = stsm.id_status');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->order_by('sm.id_surat', 'desc');
		$this->db->limit($limit);
		return $this->db->get();
	}

	function get_surat_listapinonpending($limit = 5)
	{
		$this->db->select('sm.*, stsm.nm_status, sfsm.nm_sifat');
		$this->db->from('surat_masuk sm');
		$this->db->join('status_sm stsm', 'sm.id_status = stsm.id_status');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->where('sm.id_status != 1 AND sm.is_notif != 0');
		$this->db->order_by('sm.id_surat', 'desc');
		$this->db->limit($limit);
		return $this->db->get();
	}

	function get_surat_byid($id_surat)
	{
		$this->db->select('sm.*, stsm.nm_status, sfsm.nm_sifat');
		$this->db->from('surat_masuk sm');
		$this->db->join('status_sm stsm', 'sm.id_status = stsm.id_status');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->where('sm.id_surat = ' . $id_surat);
		return $this->db->get();
	}

	function get_surat_list($limit, $start)
	{
		$this->db->select('sm.*, stsm.nm_status, sfsm.nm_sifat');
		$this->db->from('surat_masuk sm');
		$this->db->join('status_sm stsm', 'sm.id_status = stsm.id_status');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->order_by('sm.id_surat', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		// $query = $this->db->get('surat_masuk', $limit, $start);
		return $query->result_array();
	}

	function get_surat_listprint()
	{
		$this->db->select('sm.*, stsm.nm_status, sfsm.nm_sifat');
		$this->db->from('surat_masuk sm');
		$this->db->join('status_sm stsm', 'sm.id_status = stsm.id_status');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->order_by('sm.id_surat', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_surat_listforkabalai($limit, $start)
	{
		$this->db->select('sm.*, stsm.nm_status, sfsm.nm_sifat');
		$this->db->from('surat_masuk sm');
		$this->db->join('status_sm stsm', 'sm.id_status = stsm.id_status');
		$this->db->join('sifat_surat sfsm', 'sm.sifat_surat = sfsm.id_sifat');
		$this->db->where('sm.id_status != 1 AND sm.is_notif != 0');
		$this->db->order_by('sm.id_surat', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		// $query = $this->db->get('surat_masuk', $limit, $start);
		return $query->result_array();
	}

	public function get_idstatussurat($id_surat)
	{
		$this->db->select('sm.id_status');
		$this->db->from('surat_masuk sm');
		$this->db->where('sm.id_surat = ' . $id_surat);
		return $this->db->get()->row_array();
	}

	// R filtering
	function get_surat_listfilter($nosurat, $noagenda, $tglsurat, $tglterima, $sifatsurat)
	{
		return $this->db->query("SELECT sm.*, stsm.nm_status, sfsm.nm_sifat FROM surat_masuk sm JOIN status_sm stsm ON sm.id_status = stsm.id_status JOIN sifat_surat sfsm ON sm.sifat_surat = sfsm.id_sifat WHERE sm.nomor_surat = '$nosurat' OR sm.nomor_agenda = '$noagenda' OR sm.tgl_surat = '$tglsurat' OR sm.tgl_terimasurat = '$tglterima' OR sm.sifat_surat = '$sifatsurat'");
	}

	public function get_surat_listforkabalaifilter($nosurat, $noagenda, $tglsurat, $tglterima, $sifatsurat)
	{
		$query = $this->db->query("SELECT sm.*, stsm.nm_status, sfsm.nm_sifat FROM surat_masuk sm JOIN status_sm stsm ON sm.id_status = stsm.id_status JOIN sifat_surat sfsm ON sm.sifat_surat = sfsm.id_sifat WHERE sm.id_status != 1 AND sm.is_notif != 0 AND sm.nomor_surat = '$nosurat' OR sm.nomor_agenda = '$noagenda' OR sm.tgl_surat = '$tglsurat' OR sm.tgl_terimasurat = '$tglterima' OR sm.sifat_surat = '$sifatsurat'")->result_array();
		return $query;
	}

	public function getById($id_disposisi)
	{
		return $this->db->get_where($this->t_suratmasuk, ["id_surat" => $id_disposisi])->row();
	}

	function getjbchk($arrayjabatanex)
	{
		$not = array('1', '2',);
		$not2 =  $arrayjabatanex;
		$this->db->select('jb.id_jabatan, jb.nama_jabatan, pg.nama_pegawai, pg.id_pegawai, pg.nomor_hp');
		$this->db->from('jabatan jb');
		$this->db->join('pegawai pg', 'jb.id_jabatan = pg.id_jabatan');
		$this->db->where_not_in('jb.id_jabatan', $not);
		$this->db->where_not_in('jb.id_jabatan', $not2);
		$this->db->order_by('jb.position');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getpgother($arraystaffex)
	{
		$in = $arraystaffex;
		$this->db->select('pg.*');
		$this->db->from('pegawai pg');
		$this->db->where('pg.id_jabatan = 1');
		$this->db->where_not_in('pg.id_pegawai', $in);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getjbchkdetailsm()
	{
		$not = array('1', '2');
		$this->db->select('jb.id_jabatan, jb.nama_jabatan, pg.nama_pegawai, pg.id_pegawai, pg.nomor_hp');
		$this->db->from('jabatan jb');
		$this->db->join('pegawai pg', 'jb.id_jabatan = pg.id_jabatan');
		$this->db->where_not_in('jb.id_jabatan', $not);
		$this->db->order_by('jb.position');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getpgotherdetailsm()
	{
		$this->db->select('pg.*');
		$this->db->from('pegawai pg');
		$this->db->where('pg.id_jabatan = 1');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getperintah()
	{
		$this->db->select('pr.*');
		$this->db->from('perintah pr');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getnokabalai()
	{
		$this->db->select('pg.nomor_hp');
		$this->db->from('pegawai pg');
		$this->db->where('id_jabatan = 2');
		$query = $this->db->get();
		return $query->row_array();
	}




	//U
	public function update($filenew, $nomorsurat)
	{

		$post = $this->input->post();
		$update = array(
			'nomor_surat' => $nomorsurat,
			'tgl_terimasurat' =>  $post["tgl_terimasurat"],
			'nomor_agenda' => $post["nomor_agenda"],
			'sifat_surat' => $post["sifatsurat"],
			'tgl_surat' => $post['tgl_surat'],
			'file' => $filenew,
			'asal_surat' => $post["asal_surat"],
			'lampiran_surat' => $post["lampiran_surat"],
			'perihal_surat' => $post["perihal_surat"],
			'id_status' => $post["id_status"],
			'date_created' => date('y-m-d'),
		);

		$this->db->update($this->t_suratmasuk, $update, array('id_surat' => $post['id_surat']));
	}

	public function updatestts($id_surat, $status)
	{
		$updstts = "UPDATE surat_masuk SET id_status = '$status' WHERE id_surat = " . $id_surat;
		$this->db->query($updstts);
	}

	public function updatesttstodpss($id_surat)
	{
		$updstts2dpss = "UPDATE surat_masuk SET id_status='4' WHERE id_surat=" . $id_surat;
		$this->db->query($updstts2dpss);
	}

	public function kirimsuratnotif($id_surat)
	{
		$kirim = "UPDATE surat_masuk SET is_notif='1', id_status='2' WHERE is_notif=0 AND id_surat=" . $id_surat;

		return $this->db->query($kirim);
	}

	//D
	public function CheckDelete($id_surat)
	{
		$this->db->select('sm.*, dps.id_disposisi');
		$this->db->from('surat_masuk sm');
		$this->db->join('dpss_surat_masuk dps', 'sm.id_surat = dps.id_suratmasuk', 'left');
		$this->db->where('sm.id_surat =' . $id_surat);
		$q = $this->db->get();
		return $q->result_array();
	}
	public function delete($id_surat)
	{

		return $this->db->delete($this->t_suratmasuk, array("id_surat" => $id_surat));
	}
}
