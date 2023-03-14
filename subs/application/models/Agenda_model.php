<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'tgl_jemput',
                'label' => 'Tanggal Agenda Penjemputan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'vendor',
                'label' => 'Vendor Penjemputan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'sopir',
                'label' => 'Nama Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    public function rules_edit()
    {
        return [
            [
                'field' => 'vendor',
                'label' => 'Tanggal Penjemputan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'sopir',
                'label' => 'Nama Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    public function rules_jemput()
    {
        return [
            [
                'field' => 'ket_jemput',
                'label' => 'Keterangan Penjemputan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    public function rules_check()
    {
        return [
            [
                'field' => 'berat',
                'label' => 'Berat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'koli',
                'label' => 'Koli',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'volume',
                'label' => 'Volume',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'ket_check',
                'label' => 'Keterangan Check',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    public function rules_reskejul()
    {
        return [
            [
                'field' => 'tgl_jemput',
                'label' => 'Tanggal Penjemputan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'ket_jemput',
                'label' => 'Keterangan Penjemputan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    // READ
    public function getAgendaList($tgljemput = null, $vendor = null, $sopir = null, $pembuat = null, $stts = null)
    {
        $this->db->select('jemput.* ,cr.nm_karyawan as pembuat, sp.nm_karyawan as sopir, vn.nama_vendor');
        $this->db->from('t_agendajemput jemput');
        // $this->db->join('t_bookingorder ord', 'jemput.id_agenda = ord.id_agenda');
        $this->db->join('t_karyawan cr', 'jemput.create_by = cr.id_karyawan');
        $this->db->join('t_karyawan sp', 'jemput.id_sopir = sp.id_karyawan');
        $this->db->join('t_vendorjemput vn', 'jemput.id_vendor = vn.id_vendor');
        if ($tgljemput != null) $this->db->where('jemput.tgl_agenda', $tgljemput);
        if ($vendor != null) $this->db->where('jemput.id_vendor', $vendor);
        if ($sopir != null) $this->db->where('jemput.id_sopir', $sopir);
        if ($pembuat != null) $this->db->where('jemput.create_by', $pembuat);
        if ($stts != null) $this->db->where('jemput.is_sopirproses', $stts);
        $this->db->order_by('tgl_agenda', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        // echo '<pre>';
        // var_dump($this->db->get()->result_array());
        // die;
        return $this->db->get()->result_array();
    }

    public function getAgendaList_sopir($sopir, $tgljemput = null, $vendor = null, $pembuat = null, $stts = null)
    {
        $this->db->select('jemput.*, cr.nm_karyawan as pembuat, sp.nm_karyawan as sopir, vn.nama_vendor');
        $this->db->from('t_agendajemput jemput');
        $this->db->join('t_karyawan cr', 'jemput.create_by = cr.id_karyawan');
        $this->db->join('t_karyawan sp', 'jemput.id_sopir = sp.id_karyawan');
        $this->db->join('t_vendorjemput vn', 'jemput.id_vendor = vn.id_vendor');
        // if ($tgljemput != null) $this->db->where('jemput.tgl_agenda', $tgljemput);
        // if ($vendor != null) $this->db->where('jemput.id_vendor', $vendor);
        // if ($pembuat != null) $this->db->where('jemput.create_by', $pembuat);
        // if ($stts != null) $this->db->where('jemput.is_sopirproses', $stts);
        $where = "jemput.id_sopir = '$sopir' and jemput.is_sopirproses = 0 or jemput.is_sopirproses = 1";
        $this->db->where($where);
        $this->db->order_by('tgl_agenda', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getAgendaList_sopir_semua($sopir, $tgljemput = null, $vendor = null, $pembuat = null, $stts = null)
    {
        $this->db->select('jemput.*, cr.nm_karyawan as pembuat, sp.nm_karyawan as sopir, vn.nama_vendor');
        $this->db->from('t_agendajemput jemput');
        $this->db->join('t_karyawan cr', 'jemput.create_by = cr.id_karyawan');
        $this->db->join('t_karyawan sp', 'jemput.id_sopir = sp.id_karyawan');
        $this->db->join('t_vendorjemput vn', 'jemput.id_vendor = vn.id_vendor');
        if ($tgljemput != null) $this->db->where('jemput.tgl_agenda', $tgljemput);
        if ($vendor != null) $this->db->where('jemput.id_vendor', $vendor);
        if ($pembuat != null) $this->db->where('jemput.create_by', $pembuat);
        if ($stts != null) $this->db->where('jemput.is_sopirproses', $stts);
        $this->db->where('id_sopir', $sopir);
        $this->db->order_by('tgl_agenda', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getAgenda_byid($agenda)
    {
        $this->db->select('jemput.*, kry.nm_karyawan, vendor.nama_vendor');
        $this->db->from('t_agendajemput jemput');
        $this->db->join('t_karyawan kry', 'jemput.id_sopir = kry.id_karyawan');
        $this->db->join('t_vendorjemput vendor', 'vendor.id_vendor = jemput.id_vendor');
        $this->db->where('id_agenda', $agenda);
        return $this->db->get()->row();
    }

    public function getagendaonbooking($agenda)
    {
        $this->db->select('*');
        $this->db->from('t_bookingorder');
        $this->db->where('id_agenda', $agenda);
        return $this->db->get()->num_rows();
    }

    public function getbooking_byidagenda($agenda)
    {
        $this->db->select('ord.*, stts.nama_status, kry.nm_karyawan, lay.nama_layanan,kec_pengirim.id_wil as kec_pengirim_id, kec_pengirim.nama_wil as nama_kec_pengirim,  kec_penerima.id_wil as kec_penerima_id, kec_penerima.nama_wil as nama_kec_penerima, kab_pengirim.id_wil as kab_pengirim_id, kab_pengirim.nama_wil as nama_kab_pengirim, kab_penerima.id_wil as kab_penerima_id, kab_penerima.nama_wil as nama_kab_penerima, prov_pengirim.id_wil as prov_pengirim_id, prov_pengirim.nama_wil as nama_prov_pengirim, prov_penerima.id_wil as prov_penerima_id, prov_penerima.nama_wil as nama_prov_penerima');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_bookingstatus stts', 'ord.id_bookingstatus = stts.id_bookingstatus');
        $this->db->join('t_layanan lay', 'lay.id_layanan = ord.id_layanan');
        $this->db->join('t_karyawan kry', 'ord.id_marketing = kry.id_karyawan');
        $this->db->join('t_wilayah kec_pengirim', 'ord.id_region_pengirim = kec_pengirim.id_wil');
        $this->db->join('t_wilayah kab_pengirim', 'kec_pengirim.kab_id = kab_pengirim.id_wil');
        $this->db->join('t_wilayah prov_pengirim', 'kab_pengirim.prov_id = prov_pengirim.id_wil');
        $this->db->join('t_wilayah kec_penerima', 'ord.id_region_penerima = kec_penerima.id_wil');
        $this->db->join('t_wilayah kab_penerima', 'kec_penerima.kab_id = kab_penerima.id_wil');
        $this->db->join('t_wilayah prov_penerima', 'kab_penerima.prov_id = prov_penerima.id_wil');
        $this->db->where('id_agenda', $agenda);
        return $this->db->get()->result_array();
    }

    public function getbookingnum_byidagenda($agenda)
    {
        $this->db->select('ord.*');
        $this->db->from('t_bookingorder ord');
        $this->db->where('id_agenda', $agenda);
        return $this->db->get()->num_rows();
    }

    public function getbookingnumsuksesjemput_byidagenda($agenda)
    {
        $this->db->select('ord.*');
        $this->db->from('t_bookingorder ord');
        $this->db->where('id_bookingstatus = 6');
        $this->db->where('id_agenda', $agenda);
        return $this->db->get()->num_rows();
    }

    public function getAgenda_lastId()
    {
        $this->db->select_max('id_agenda');
        $this->db->from('t_agendajemput');
        return $this->db->get()->row();
    }

    public function getDetailStatusBooking_lastId()
    {
        $this->db->select_max('id_detailstatus');
        $this->db->from('t_detailstatusbooking');
        return $this->db->get()->row();
    }

    public function getBooking_bytglagenda($tgl)
    {
        $this->db->select('ord.*, stts.nama_status');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_bookingstatus stts', 'ord.id_bookingstatus = stts.id_bookingstatus');
        $this->db->where('tgl_jemput', $tgl);
        $where = 'ord.id_bookingstatus = 2 OR ord.id_bookingstatus = 4';
        $this->db->where($where);

        return $this->db->get()->result_array();
    }

    public function get_vendor()
    {
        $this->db->select('*');
        $this->db->from('t_vendorjemput');
        return $this->db->get()->result_array();
    }

    public function get_sopir()
    {
        $this->db->select('user.*, kry.nm_karyawan');
        $this->db->from('t_user user');
        $this->db->join('t_karyawan kry', 'user.id_karyawan = kry.id_karyawan');
        $this->db->where('user.id_role = 3');
        return $this->db->get()->result_array();
    }

    public function get_detailjemput($booking)
    {
        $this->db->select('det.*, book.kode_booking, stts.nama_status');
        $this->db->from('t_detailstatusbooking det');
        $this->db->join('t_bookingorder book', 'det.id_bookingorder = book.id_bookingorder');
        $this->db->join('t_bookingstatus stts', 'det.id_bookingstatus = stts.id_bookingstatus');
        $this->db->where('det.id_bookingorder', $booking);
        $this->db->where('det.id_bookingstatus != 7');
        $this->db->where('det.id_bookingstatus != 8');
        return $this->db->get()->result_array();
    }

    public function get_detailcek($booking)
    {
        $this->db->select('det.*, book.kode_booking, stts.nama_status');
        $this->db->from('t_detailstatusbooking det');
        $this->db->join('t_bookingorder book', 'det.id_bookingorder = book.id_bookingorder');
        $this->db->join('t_bookingstatus stts', 'det.id_bookingstatus = stts.id_bookingstatus');
        $this->db->where('det.id_bookingorder', $booking);
        $this->db->where('det.id_bookingstatus != 4');
        $this->db->where('det.id_bookingstatus != 5');
        return $this->db->get()->result_array();
    }


    public function Create()
    {
        if ($this->session->userdata('user') != null) {
            $user = $this->session->userdata('user');
        } else {
            $user = null;
        }

        $post = $this->input->post();
        $save = array(
            'tgl_agenda' => $post['tgl_jemput'],
            'id_vendor' => $post['vendor'],
            'id_sopir' => $post['sopir'],
            'create_by' => $user
        );


        return $this->db->insert('t_agendajemput', $save);
    }

    public function addbookingtoagenda($status = '3')
    {
        $booking = $this->input->post('booking');
        $agenda = $this->input->post('agenda');

        $data = [
            'id_agenda' => $agenda,
            'id_bookingstatus' => $status,
        ];
        return $this->db->update('t_bookingorder', $data, array('id_bookingorder' => $booking));
    }

    public function addPenjemputanBooking($booking, $fotoname, $user, $status, $ket)
    {
        $post = $this->input->post();
        $save = array(
            'id_bookingorder' => $booking,
            'id_bookingstatus' => $status,
            'foto' => $fotoname,
            'keterangan' => $ket,
            'create_by' => $user
        );


        return $this->db->insert('t_detailstatusbooking', $save);
    }

    public function addCheckerBooking($booking, $fotocheck)
    {
        if ($this->session->userdata('user') != null) {
            $user = $this->session->userdata('user');
        } else {
            $user = null;
        }

        $post = $this->input->post();
        $save = array(
            'id_bookingorder' => $booking,
            'id_bookingstatus' => $post['status_cek'],
            'foto' => $fotocheck,
            'keterangan' => $post['ket_check'],
            'create_by' => $user
        );


        return $this->db->insert('t_detailstatusbooking', $save);
    }

    public function Update($agenda)
    {
        $post = $this->input->post();

        $upd = array(
            'id_vendor' => $post['vendor'],
            'id_sopir' => $post['sopir'],
        );


        return $this->db->update('t_agendajemput', $upd, array("id_agenda" => $agenda));
    }
    public function Update_agenda_sopir_proses($agenda)
    {

        $upd = array(
            'is_sopirproses' => 1
        );


        return $this->db->update('t_agendajemput', $upd, array("id_agenda" => $agenda));
    }

    public function Update_bookingcs($agenda, $booking)
    {

        $upd = array(
            'id_agenda' => $agenda,
            'id_bookingstatus' => 3
        );


        $this->db->update('t_bookingorder', $upd, array("id_bookingorder" => $booking));
    }

    public function Update_bookingchecker($booking, $status)
    {

        if ($status == '9') {
            $complete = 1;
        } else {
            $complete = null;
        }

        $post = $this->input->post();
        $upd_check = array(
            'est_berat' => $post['berat'],
            'est_koli' => $post['koli'],
            'est_volume' => $post['volume'],
            'id_bookingstatus' => $status,
            'is_complete' => $complete
        );


        return $this->db->update('t_bookingorder', $upd_check, array("id_bookingorder" => $booking));
    }


    public function Update_bookingsopir_proses($agenda)
    {
        $update = array(
            'id_bookingstatus' => 5
        );
        return $this->db->update('t_bookingorder', $update, array('id_agenda' => $agenda));
    }

    public function checkbookinginagenda($agenda)
    {
        $this->db->select('*');
        $this->db->from('t_bookingorder');
        $this->db->where('id_agenda', $agenda);
        $this->db->where_not_in('id_bookingstatus', array(4, 9));
        return $this->db->get()->num_rows();
    }

    public function Update_agendaiscomplete($agenda)
    {
        $update = array(
            'is_sopirproses' => 2
        );
        return $this->db->update('t_agendajemput', $update, array('id_agenda' => $agenda));
    }


    public function ubahstatusbooking($status, $order)
    {

        $kdresi = $this->config->item('kode_perush') . $this->keygen();
        if ($status == '6') {
            $resi = $kdresi;
        } else {
            $resi = null;
        }
        $post = $this->input->post();
        $update = array(
            'est_berat' => $post['berat'],
            'est_koli' => $post['koli'],
            'est_volume' => $post['volume'],
            'id_bookingstatus' => $status,
            'uniq_resi' => $resi
        );
        return $this->db->update('t_bookingorder', $update, array('id_bookingorder' => $order));
    }

    public function ubahstatusbooking_warehouse($status, $order)
    {

        $post = $this->input->post();
        $update = array(
            'id_bookingstatus' => $status,
        );
        return $this->db->update('t_bookingorder', $update, array('id_bookingorder' => $order));
    }

    public function reskejulbooking($order)
    {
        $post = $this->input->post();
        $update = array(
            'tgl_jemput' => $post['tgl_jemput'],
            'id_bookingstatus' => 4
        );
        return $this->db->update('t_bookingorder', $update, array('id_bookingorder' => $order));
    }

    // delete
    public function Deleteagenda_frombooking($booking)
    {
        $update = array(
            'id_agenda' => null,
            'id_bookingstatus' => '2'
        );
        return $this->db->update('t_bookingorder', $update, array('id_bookingorder' => $booking));
    }

    public function Delete($agenda)
    {
        return $this->db->delete('t_agendajemput', array('id_agenda' => $agenda));
    }

    function keygen()
    {
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $chars .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chars .= "0123456789";
        while (1) {
            $key = '';
            srand((float) microtime() * 1000000);
            for ($i = 0; $i < 8; $i++) {
                $key .= substr($chars, (rand() % (strlen($chars))), 1);
            }
            break;
        }
        return $key;
    }
}
