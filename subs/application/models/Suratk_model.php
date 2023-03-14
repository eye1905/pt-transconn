<?php
class Suratk_model extends CI_Model
{
	private $t_suratkeluar = "surat_keluar";


	public function rules()
	{
		return [
			[
				'field' => 'nomor_suratk',
				'label' => 'Nomor Surat',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'tgl_suratditerima',
				'label' => 'Tanggal Surat Diterima',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],

			[
				'field' => 'tgl_suratk',
				'label' => 'Tanggal Surat Keluar',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],


			[
				'field' => 'asal_suratk',
				'label' => 'Asal Surat',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			],


			[
				'field' => 'perihal_suratk',
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
				'field' => 'ekspedisi',
				'label' => 'Ekspedisi',
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
				'field' => 'lampiran_suratk',
				'label' => 'Lampiran',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom {field} harus di isi'
				]
			]
		];
	}

	//C
	public function save($filename, $nomorsuratk)
	{
		$post = $this->input->post();
		$save = array(
			'nomor_suratk' => $nomorsuratk,
			'tgl_suratditerima' => $post['tgl_suratditerima'],
			'file' => $filename,
			'tgl_suratk' => $post['tgl_suratk'],
			'asal_suratk' => $post["asal_suratk"],
			'lampiran_suratk' => $post["lampiran_suratk"],
			'perihal_suratk' => $post["perihal_suratk"],
			'nomor_agenda' => $post["nomor_agenda"],
			'sifat_surat' => $post["sifat"],
			'ekspedisi' => $post["ekspedisi"],
			'date_created' => date('Y-m-d H:i:s'),
		);

		return $this->db->insert($this->t_suratkeluar, $save);
	}

	//R
	function get_suratk_listAPI($limit = 5)
	{
		$this->db->select('sk.*, sfsk.nm_sifat');
		$this->db->from('surat_keluar sk');
		$this->db->join('sifat_surat sfsk', 'sk.sifat_surat = sfsk.id_sifat');
		$this->db->order_by('sk.id_suratk', 'desc');
		$this->db->limit($limit);
		return $this->db->get();
	}

	function get_suratk_byid($id_suratk)
	{
		$this->db->select('sk.*, sfsk.nm_sifat');
		$this->db->from('surat_keluar sk');
		$this->db->join('sifat_surat sfsk', 'sk.sifat_surat = sfsk.id_sifat');
		$this->db->where('sk.id_suratk = ' . $id_suratk);
		return $this->db->get();
	}

	function get_suratk_list($limit, $start)
	{
		$this->db->select('sk.*, sfsk.nm_sifat');
		$this->db->from('surat_keluar sk');
		$this->db->join('sifat_surat sfsk', 'sk.sifat_surat = sfsk.id_sifat');
		$this->db->order_by('sk.id_suratk', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_suratk_listprint()
	{
		$this->db->select('sk.*, sfsk.nm_sifat');
		$this->db->from('surat_keluar sk');
		$this->db->join('sifat_surat sfsk', 'sk.sifat_surat = sfsk.id_sifat');
		$this->db->order_by('sk.id_suratk', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getById($id_suratk)
	{
		return $this->db->get_where($this->t_suratkeluar, ["id_suratk" => $id_suratk])->row();
	}


	// R FILTER
	function get_suratk_listfilter($nosurat, $noagenda, $tglsurat, $tglterima, $sifatsurat)
	{
		return $this->db->query("SELECT sk.*, sfsk.nm_sifat FROM surat_keluar sk JOIN sifat_surat sfsk ON sk.sifat_surat = sfsk.id_sifat WHERE sk.nomor_suratk = '$nosurat' OR sk.nomor_agenda = '$noagenda' OR sk.tgl_suratk = '$tglsurat' OR sk.tgl_suratditerima = '$tglterima' OR sk.sifat_surat = '$sifatsurat'");
	}


	//U
	public function update($filenew, $nomor_suratk)
	{
		$post = $this->input->post();
		$updatesk = array(
			'nomor_suratk' => $nomor_suratk,
			'tgl_suratditerima' => $post['tgl_suratditerima'],
			'file' => $filenew,
			'tgl_suratk' => $post['tgl_suratk'],
			'asal_suratk' => $post["asal_suratk"],
			'lampiran_suratk' => $post["lampiran_suratk"],
			'perihal_suratk' => $post["perihal_suratk"],
			'nomor_agenda' => $post["nomor_agenda"],
			'sifat_surat' => $post["sifatsurat"],
			'ekspedisi' => $post["ekspedisi"],
		);

		$this->db->update($this->t_suratkeluar, $updatesk, array('id_suratk' => $this->input->post('id_suratk')));
	}

	//D
	public function CheckDelete($id_suratk)
	{
		$this->db->select('sk.*');
		$this->db->from('surat_keluar sk');
		$this->db->where('sk.id_suratk =' . $id_suratk);
		$q = $this->db->get();
		return $q->result_array();
	}

	public function delete($id_suratk)
	{

		return $this->db->delete($this->t_suratkeluar, array("id_suratk" => $id_suratk));
	}
}
