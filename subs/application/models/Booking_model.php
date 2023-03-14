<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    public function pub_rules()
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
                'field' => 'ket_tambahan',
                'label' => 'Keterangan Tambahan Pengiriman',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nm_pengirim',
                'label' => 'Nama Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nohp_pengirim',
                'label' => 'Nomor HP Pengirim',
                'rules' => 'required|trim|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'min_length' => 'Nomor HP minimal 11 digit',
                    'max_length' => 'Nomor HP Maksimal 13 digit',
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'kec_pengirim',
                'label' => 'Kecamatan Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'almt_pengirim',
                'label' => 'Alamat Rinci Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nm_penerima',
                'label' => 'Nama Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nohp_penerima',
                'label' => 'Nomor HP Penerima',
                'rules' => 'required|trim|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'min_length' => 'Nomor HP minimal 11 digit',
                    'max_length' => 'Nomor HP Maksimal 13 digit',
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'kec_penerima',
                'label' => 'Kecamatan Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'almt_penerima',
                'label' => 'Alamat Rinci Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'jns_barang',
                'label' => 'Jenis Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'berat',
                'label' => 'Estimasi Berat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'koli',
                'label' => 'Estimasi Koli',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'volume',
                'label' => 'Estimasi Volume',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'jns_layanan',
                'label' => 'Jenis Layanan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    public function rules()
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
                'field' => 'ket_tambahan',
                'label' => 'Keterangan Tambahan Pengiriman',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nm_pengirim',
                'label' => 'Nama Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nohp_pengirim',
                'label' => 'Nomor HP Pengirim',
                'rules' => 'required|trim|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'min_length' => 'Nomor HP minimal 11 digit',
                    'max_length' => 'Nomor HP Maksimal 13 digit',
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'kec_pengirim',
                'label' => 'Kecamatan Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'almt_pengirim',
                'label' => 'Alamat Rinci Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nm_penerima',
                'label' => 'Nama Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nohp_penerima',
                'label' => 'Nomor HP Penerima',
                'rules' => 'required|trim|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'min_length' => 'Nomor HP minimal 11 digit',
                    'max_length' => 'Nomor HP Maksimal 13 digit',
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'kec_penerima',
                'label' => 'Kecamatan Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'almt_penerima',
                'label' => 'Alamat Rinci Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'jns_barang',
                'label' => 'Jenis Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'jns_harga',
                'label' => 'Jenis Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'berat',
                'label' => 'Estimasi Berat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'koli',
                'label' => 'Estimasi Koli',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'volume',
                'label' => 'Estimasi Volume',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'jns_layanan',
                'label' => 'Jenis Layanan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    public function name($value='')
    {
        
    }

    public function rules_update()
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
                'field' => 'ket_tambahan',
                'label' => 'Keterangan Tambahan Pengiriman',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nm_pengirim',
                'label' => 'Nama Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nohp_pengirim',
                'label' => 'Nomor HP Pengirim',
                'rules' => 'required|trim|numeric|min_length[6]|max_length[13]',
                'errors' => [
                    'min_length' => 'Nomor HP minimal 6 digit',
                    'max_length' => 'Nomor HP Maksimal 13 digit',
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'kec_pengirim',
                'label' => 'Kecamatan Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'almt_pengirim',
                'label' => 'Alamat Rinci Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nm_penerima',
                'label' => 'Nama Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'nohp_penerima',
                'label' => 'Nomor HP Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'kec_penerima',
                'label' => 'Kecamatan Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'almt_penerima',
                'label' => 'Alamat Rinci Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'jns_barang',
                'label' => 'Jenis Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'berat',
                'label' => 'Estimasi Berat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'koli',
                'label' => 'Estimasi Koli',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'volume',
                'label' => 'Estimasi Volume',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ],
            [
                'field' => 'jns_layanan',
                'label' => 'Jenis Layanan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus di isi'
                ]
            ]
        ];
    }

    // READ
    public function getBookingList($pengirim = null, $kdbooking = null, $tgl_jemput = null, $marketing = null, $status = null, $layanan = null)
    {
        $this->db->select('ord.*, stts.nama_status, kry.nm_karyawan, lay.nama_layanan, kec_pengirim.id_wil as kec_pengirim_id, kec_pengirim.nama_wil as nama_kec_pengirim,  kec_penerima.id_wil as kec_penerima_id, kec_penerima.nama_wil as nama_kec_penerima, kab_pengirim.id_wil as kab_pengirim_id, kab_pengirim.nama_wil as nama_kab_pengirim, kab_penerima.id_wil as kab_penerima_id, kab_penerima.nama_wil as nama_kab_penerima');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_bookingstatus stts', 'ord.id_bookingstatus = stts.id_bookingstatus');
        $this->db->join('t_wilayah kec_pengirim', 'ord.id_region_pengirim = kec_pengirim.id_wil');
        $this->db->join('t_wilayah kab_pengirim', 'kec_pengirim.kab_id = kab_pengirim.id_wil');
        $this->db->join('t_wilayah kec_penerima', 'ord.id_region_penerima = kec_penerima.id_wil');
        $this->db->join('t_wilayah kab_penerima', 'kec_penerima.kab_id = kab_penerima.id_wil');
        $this->db->join('t_layanan lay', 'lay.id_layanan = ord.id_layanan');
        $this->db->join('t_karyawan kry', 'kry.id_karyawan = ord.id_marketing', 'left');
        if ($pengirim != null) $this->db->where('ord.nama_pengirim', $pengirim);
        if ($kdbooking != null) $this->db->where('ord.kode_booking', $kdbooking);
        if ($tgl_jemput != null) $this->db->where('ord.tgl_jemput', $tgl_jemput);
        if ($marketing != null) $this->db->where('ord.id_marketing', $marketing);
        if ($status != null) $this->db->where('ord.id_bookingstatus', $status);
        if ($layanan != null) $this->db->where('ord.id_layanan', $layanan);
        $this->db->order_by('ord.id_bookingorder', 'DESC');
        $this->db->order_by('ord.tgl_jemput', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getDetailKoli($booking)
    {
        $this->db->select('*');
        $this->db->from('t_detail_koli');
        $this->db->where('id_bookingorder', $booking);
        return $this->db->get()->result_array();
    }

    public function get_provinsi()
    {
        $this->db->select('*');
        $this->db->from('t_wilayah');
        $this->db->where('level_wil = 1');
        $this->db->order_by('nama_wil', 'asc');
        return $this->db->get()->result_array();
    }

    public function get_kabbyprov($prov)
    {
        $this->db->select('*');
        $this->db->from('t_wilayah');
        $this->db->where('level_wil = 2');
        $this->db->where('prov_id', $prov);
        $this->db->order_by('nama_wil', 'asc');
        return $this->db->get()->result_array();
    }

    public function get_kecbykab($kab)
    {
        $this->db->select('*');
        $this->db->from('t_wilayah');
        $this->db->where('level_wil = 3');
        $this->db->where('kab_id', $kab);
        $this->db->order_by('nama_wil', 'asc');
        return $this->db->get()->result_array();
    }

    public function get_layanan()
    {
        $this->db->select('*');
        $this->db->from('t_layanan');
        return $this->db->get()->result_array();
    }

    public function getBooking_byid($booking)
    {
        $this->db->select('ord.*, stts.nama_status, kry.nm_karyawan,kec_pengirim.id_wil as kec_pengirim_id, kec_pengirim.nama_wil as nama_kec_pengirim,  kec_penerima.id_wil as kec_penerima_id, kec_penerima.nama_wil as nama_kec_penerima, kab_pengirim.id_wil as kab_pengirim_id, kab_pengirim.nama_wil as nama_kab_pengirim, kab_penerima.id_wil as kab_penerima_id, kab_penerima.nama_wil as nama_kab_penerima, prov_pengirim.id_wil as prov_pengirim_id, prov_pengirim.nama_wil as nama_prov_pengirim, prov_penerima.id_wil as prov_penerima_id, prov_penerima.nama_wil as nama_prov_penerima');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_bookingstatus stts', 'ord.id_bookingstatus = stts.id_bookingstatus');
        $this->db->join('t_karyawan kry', 'ord.id_marketing = kry.id_karyawan');
        $this->db->join('t_wilayah kec_pengirim', 'ord.id_region_pengirim = kec_pengirim.id_wil');
        $this->db->join('t_wilayah kab_pengirim', 'kec_pengirim.kab_id = kab_pengirim.id_wil');
        $this->db->join('t_wilayah prov_pengirim', 'kab_pengirim.prov_id = prov_pengirim.id_wil');
        $this->db->join('t_wilayah kec_penerima', 'ord.id_region_penerima = kec_penerima.id_wil');
        $this->db->join('t_wilayah kab_penerima', 'kec_penerima.kab_id = kab_penerima.id_wil');
        $this->db->join('t_wilayah prov_penerima', 'kab_penerima.prov_id = prov_penerima.id_wil');
        $this->db->where('id_bookingorder', $booking);
        return $this->db->get()->row();
    }


    public function getBooking_byuniqresi($uniq)
    {
        $this->db->select('ord.*, stts.nama_status, sopir.nm_karyawan as sopir, kec_pengirim.id_wil as kec_pengirim_id, kec_pengirim.nama_wil as nama_kec_pengirim,  kec_penerima.id_wil as kec_penerima_id, kec_penerima.nama_wil as nama_kec_penerima, kab_pengirim.id_wil as kab_pengirim_id, kab_pengirim.nama_wil as nama_kab_pengirim, kab_penerima.id_wil as kab_penerima_id, kab_penerima.nama_wil as nama_kab_penerima');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_bookingstatus stts', 'ord.id_bookingstatus = stts.id_bookingstatus');
        $this->db->join('t_agendajemput jemput', 'jemput.id_agenda = ord.id_agenda');
        $this->db->join('t_karyawan sopir', 'sopir.id_karyawan = jemput.id_sopir');
        $this->db->join('t_wilayah kec_pengirim', 'ord.id_region_pengirim = kec_pengirim.id_wil');
        $this->db->join('t_wilayah kab_pengirim', 'kec_pengirim.kab_id = kab_pengirim.id_wil');
        $this->db->join('t_wilayah kec_penerima', 'ord.id_region_penerima = kec_penerima.id_wil');
        $this->db->join('t_wilayah kab_penerima', 'kec_penerima.kab_id = kab_penerima.id_wil');
        $this->db->where('uniq_resi', $uniq);
        return $this->db->get()->row();
    }

    public function getBooking_bybook($booking)
    {
        $this->db->select('ord.*, stts.nama_status, sopir.nm_karyawan as sopir');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_bookingstatus stts', 'ord.id_bookingstatus = stts.id_bookingstatus');
        $this->db->join('t_agendajemput jemput', 'jemput.id_agenda = ord.id_agenda');
        $this->db->join('t_karyawan sopir', 'sopir.id_karyawan = jemput.id_sopir');
        $this->db->where('kode_booking', $booking);
        return $this->db->get()->row();
    }

    public function getBooking_byid_nonmarketing($booking)
    {
        $this->db->select('ord.*, lay.nama_layanan, stts.nama_status, kry.nm_karyawan, kec_pengirim.id_wil as kec_pengirim_id, kec_pengirim.nama_wil as nama_kec_pengirim,  kec_penerima.id_wil as kec_penerima_id, kec_penerima.nama_wil as nama_kec_penerima, kab_pengirim.id_wil as kab_pengirim_id, kab_pengirim.nama_wil as nama_kab_pengirim, kab_penerima.id_wil as kab_penerima_id, kab_penerima.nama_wil as nama_kab_penerima, prov_pengirim.id_wil as prov_pengirim_id, prov_pengirim.nama_wil as nama_prov_pengirim, prov_penerima.id_wil as prov_penerima_id, prov_penerima.nama_wil as nama_prov_penerima');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_layanan lay', 'lay.id_layanan = ord.id_layanan');
        $this->db->join('t_wilayah kec_pengirim', 'ord.id_region_pengirim = kec_pengirim.id_wil');
        $this->db->join('t_wilayah kab_pengirim', 'kec_pengirim.kab_id = kab_pengirim.id_wil');
        $this->db->join('t_wilayah prov_pengirim', 'kab_pengirim.prov_id = prov_pengirim.id_wil');
        $this->db->join('t_wilayah kec_penerima', 'ord.id_region_penerima = kec_penerima.id_wil');
        $this->db->join('t_wilayah kab_penerima', 'kec_penerima.kab_id = kab_penerima.id_wil');
        $this->db->join('t_wilayah prov_penerima', 'kab_penerima.prov_id = prov_penerima.id_wil');
        $this->db->join('t_bookingstatus stts', 'ord.id_bookingstatus = stts.id_bookingstatus');
        $this->db->join('t_karyawan kry', 'ord.id_marketing = kry.id_karyawan');
        $this->db->where('id_bookingorder', $booking);
        return $this->db->get()->row();
    }

    public function getBooking_detailStatus_byId($booking)
    {
        $this->db->select('det.*, ord.kode_booking, sts.nama_status, kry.nm_karyawan');
        $this->db->from('t_detailstatusbooking det');
        $this->db->join('t_bookingorder ord', 'ord.id_bookingorder = det.id_bookingorder');
        $this->db->join('t_bookingstatus sts', 'sts.id_bookingstatus = det.id_bookingstatus');
        $this->db->join('t_karyawan kry', 'det.create_by = kry.id_karyawan');
        $this->db->where('det.id_bookingorder', $booking);
        $this->db->order_by('det.id_detailstatus', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getlastBooking_detailStatus_byId($booking)
    {
        $this->db->select('det.*, ord.kode_booking, sts.nama_status, kry.nm_karyawan');
        $this->db->from('t_detailstatusbooking det');
        $this->db->join('t_bookingorder ord', 'ord.id_bookingorder = det.id_bookingorder');
        $this->db->join('t_bookingstatus sts', 'sts.id_bookingstatus = det.id_bookingstatus');
        $this->db->join('t_karyawan kry', 'det.create_by = kry.id_karyawan');
        $this->db->where('det.id_bookingorder', $booking);
        $this->db->order_by('det.id_detailstatus', 'DESC');
        return $this->db->get()->first_row();
    }

    public function getBookingwil_byid($kec)
    {
        $this->db->select('prov.id_wil as prov_id, prov.nama_wil AS prov_wil, kabkot.id_wil as kab_id, kabkot.nama_wil as kab_wil, kec.kec_id, kec.nama_wil as kec_wil');
        $this->db->from('t_wilayah prov');
        $this->db->join('t_wilayah kabkot', 'prov.id_wil = kabkot.prov_id');
        $this->db->join('t_wilayah kec', 'kabkot.id_wil = kec.kab_id');
        $this->db->where('kec.kec_id', $kec);
        return $this->db->get()->row();
    }

    public function getBookingwil_pengirim($booking)
    {
        $this->db->select('ord.alamat_pengirim, kec_pengirim.id_wil as kec_pengirim_id, kec_pengirim.nama_wil as nama_kec_pengirim,  kec_penerima.id_wil as kec_penerima_id, kec_penerima.nama_wil as nama_kec_penerima, kab_pengirim.id_wil as kab_pengirim_id, kab_pengirim.nama_wil as nama_kab_pengirim, kab_penerima.id_wil as kab_penerima_id, kab_penerima.nama_wil as nama_kab_penerima, prov_pengirim.id_wil as prov_pengirim_id, prov_pengirim.nama_wil as nama_prov_pengirim');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_wilayah kec_pengirim', 'ord.id_region_pengirim = kec_pengirim.id_wil');
        $this->db->join('t_wilayah kab_pengirim', 'kec_pengirim.kab_id = kab_pengirim.id_wil');
        $this->db->join('t_wilayah prov_pengirim', 'kab_pengirim.prov_id = prov_pengirim.id_wil');
        $this->db->join('t_wilayah kec_penerima', 'ord.id_region_penerima = kec_penerima.id_wil');
        $this->db->join('t_wilayah kab_penerima', 'kec_penerima.kab_id = kab_penerima.id_wil');
        $this->db->join('t_wilayah prov_penerima', 'kab_penerima.prov_id = prov_penerima.id_wil');
        $this->db->where('ord.id_bookingorder', $booking);
        return $this->db->get()->row();
    }

    public function getBookingwil_penerima($booking)
    {
        $this->db->select('ord.alamat_penerima, kec_pengirim.id_wil as kec_pengirim_id, kec_pengirim.nama_wil as nama_kec_pengirim,  kec_penerima.id_wil as kec_penerima_id, kec_penerima.nama_wil as nama_kec_penerima, kab_pengirim.id_wil as kab_pengirim_id, kab_pengirim.nama_wil as nama_kab_pengirim, kab_penerima.id_wil as kab_penerima_id, kab_penerima.nama_wil as nama_kab_penerima, prov_pengirim.id_wil as prov_pengirim_id, prov_pengirim.nama_wil as nama_prov_pengirim, prov_penerima.id_wil as prov_penerima_id, prov_penerima.nama_wil as nama_prov_penerima');
        $this->db->from('t_bookingorder ord');
        $this->db->join('t_wilayah kec_pengirim', 'ord.id_region_pengirim = kec_pengirim.id_wil');
        $this->db->join('t_wilayah kab_pengirim', 'kec_pengirim.kab_id = kab_pengirim.id_wil');
        $this->db->join('t_wilayah prov_pengirim', 'kab_pengirim.prov_id = prov_pengirim.id_wil');
        $this->db->join('t_wilayah kec_penerima', 'ord.id_region_penerima = kec_penerima.id_wil');
        $this->db->join('t_wilayah kab_penerima', 'kec_penerima.kab_id = kab_penerima.id_wil');
        $this->db->join('t_wilayah prov_penerima', 'kab_penerima.prov_id = prov_penerima.id_wil');
        $this->db->where('ord.id_bookingorder', $booking);
        return $this->db->get()->row();
    }

    public function getBooking_status()
    {
        $this->db->select('*');
        $this->db->from('t_bookingstatus');
        return $this->db->get()->result_array();
    }


    public function Create()
    {
        if ($this->session->userdata('user') != null) {
            $user = $this->session->userdata('user');
            $status = '2';
        } else {
            $user = null;
            $status = '1';
        }

        $post = $this->input->post();
        $jenis = $this->input->post('jns_harga');
        if ($jenis == '2') {
            $total = (int)$this->input->post('harga') * (float)$this->input->post('volume');
        } else {
            $total = (int)$this->input->post('harga') * (float)$this->input->post('berat');
        }


        // kode booking
        // 2 digit kode perusahaan
        // 2 digit kode layanan
        // 1 digit kode generate booking atau tidak (1 booking, 0 tidak booking)
        // 7 digit kode unik generate dari sistem (di wa)
        $kdbooking = $this->config->item('kode_perush') . str_pad($post['jns_layanan'], 2, '0', STR_PAD_LEFT) . '1' .  substr(crc32(uniqid()), -7);

        // var_dump($kdbooking);
        // die;
        if ($post['chkpengirim'] != null) {
            $pengirim = $post['chkpengirim'];
        } else {
            $pengirim = 0;
        }
        if ($post['chkpenerima'] != null) {
            $penerima = $post['chkpenerima'];
        } else {
            $penerima = 0;
        }


        $save = array(
            'kode_booking' => $kdbooking,
            'tgl_jemput' => $post['tgl_jemput'],
            'nama_pengirim' => $post['nm_pengirim'],
            'hp_pengirim' => $post['nohp_pengirim'],
            'id_region_pengirim' => $post['kec_pengirim'],
            'alamat_pengirim' => $post['almt_pengirim'],
            'nm_penerima' => $post['nm_penerima'],
            'hp_penerima' => $post['nohp_penerima'],
            'id_region_penerima' => $post['kec_penerima'],
            'alamat_penerima' => $post['almt_penerima'],
            'jenis_barang' => $post['jns_barang'],
            'jenis_harga' => $jenis,
            'est_berat' => $post['berat'],
            'est_koli' => $post['koli'],
            'est_volume' => $post['volume'],
            'harga' => $post['harga'],
            'total_harga' => $total,
            'id_bookingstatus' => $status,
            'id_marketing' => $user,
            'is_complete' => 0,
            'id_agenda' => null,
            'create_by' => $user,
            'id_layanan' => $post['jns_layanan'],
            'ket_tambahan' => $post['ket_tambahan'],
            'notif_pengirim' => $pengirim,
            'notif_penerima' => $penerima
        );


        return $this->db->insert('t_bookingorder', $save);
    }

    public function Create_detail_koli($booking, $jlh, $panjang, $lebar, $tinggi, $berat)
    {

        $post = $this->input->post();

        $save = array(
            'jml_koli' => $jlh,
            'panjang' => $panjang,
            'lebar' => $lebar,
            'tinggi' => $tinggi,
            'berat' => $berat,
            'id_bookingorder' => $booking
        );

        return $this->db->insert('t_detail_koli', $save);
    }

    public function Pub_create()
    {

        $post = $this->input->post();

        // kode booking
        // 2 digit kode perusahaan
        // 2 digit kode layanan
        // 1 digit kode generate booking atau tidak (1 booking, 0 tidak booking)
        // 7 digit kode unik generate dari sistem (di wa)
        $kdbooking = $this->config->item('kode_perush') . str_pad($post['jns_layanan'], 2, '0', STR_PAD_LEFT) . '1' .  substr(crc32(uniqid()), -7);

        // var_dump($kdbooking);
        // die;

        if ($post['chkpengirim'] != null) {
            $pengirim = $post['chkpengirim'];
        } else {
            $pengirim = 0;
        }
        if ($post['chkpenerima'] != null) {
            $penerima = $post['chkpenerima'];
        } else {
            $penerima = 0;
        }

        $save = array(
            'kode_booking' => $kdbooking,
            'tgl_jemput' => $post['tgl_jemput'],
            'nama_pengirim' => $post['nm_pengirim'],
            'hp_pengirim' => $post['nohp_pengirim'],
            'id_region_pengirim' => $post['kec_pengirim'],
            'alamat_pengirim' => $post['almt_pengirim'],
            'nm_penerima' => $post['nm_penerima'],
            'hp_penerima' => $post['nohp_penerima'],
            'id_region_penerima' => $post['kec_penerima'],
            'alamat_penerima' => $post['almt_penerima'],
            'jenis_barang' => $post['jns_barang'],
            'jenis_harga' => null,
            'est_berat' => $post['berat'],
            'est_koli' => $post['koli'],
            'est_volume' => $post['volume'],
            'harga' => null,
            'total_harga' => null,
            'id_bookingstatus' => 1,
            'id_marketing' => null,
            'is_complete' => 0,
            'id_agenda' => null,
            'create_by' => null,
            'id_layanan' => $post['jns_layanan'],
            'ket_tambahan' => $post['ket_tambahan'],
            'notif_pengirim' => $pengirim,
            'notif_penerima' => $penerima
        );


        return $this->db->insert('t_bookingorder', $save);
    }

    public function addDetailBooking($user, $booking, $status, $ket, $fotoname = null)
    {
        $save = array(
            'id_bookingorder' => $booking,
            'id_bookingstatus' => $status,
            'foto' => $fotoname,
            'keterangan' => $ket,
            'create_by' => $user
        );


        return $this->db->insert('t_detailstatusbooking', $save);
    }

    public function Update($booking)
    {

        $post = $this->input->post();
        $jenis = $this->input->post('jns_harga');
        if ($jenis == '1') {
            $total = (int)$this->input->post('harga') * (float)$this->input->post('berat');
        } else {
            $total = (int)$this->input->post('harga') * (float)$this->input->post('volume');
        }

        // kode booking
        // 2 digit kode perusahaan
        // 2 digit kode layanan
        // 1 digit kode generate booking atau tidak (1 booking, 0 tidak booking)
        // 7 digit kode unik generate dari sistem (di wa)
        // $kdbooking = "55" . str_pad($post['jns_layanan'], 2, '0', STR_PAD_LEFT) . '1' .  substr(crc32(uniqid()), -7);

        if ($post['chkpengirim'] != null) {
            $pengirim = $post['chkpengirim'];
        } else {
            $pengirim = 0;
        }
        if ($post['chkpenerima'] != null) {
            $penerima = $post['chkpenerima'];
        } else {
            $penerima = 0;
        }

        $rolelogin = $this->session->userdata('role');
        if ($rolelogin == '2') {
            $upd = array(
                'tgl_jemput' => $post['tgl_jemput'],
                'nama_pengirim' => $post['nm_pengirim'],
                'hp_pengirim' => $post['nohp_pengirim'],
                'alamat_pengirim' => $post['almt_pengirim'],
                'nm_penerima' => $post['nm_penerima'],
                'hp_penerima' => $post['nohp_penerima'],
                'alamat_penerima' => $post['almt_penerima'],
                'ket_tambahan' => $post['ket_tambahan'],
                'notif_pengirim' => $pengirim,
                'notif_penerima' => $penerima
            );
        } else {
            $upd = array(
                'tgl_jemput' => $post['tgl_jemput'],
                'nama_pengirim' => $post['nm_pengirim'],
                'hp_pengirim' => $post['nohp_pengirim'],
                'id_region_pengirim' => $post['kec_pengirim'],
                'alamat_pengirim' => $post['almt_pengirim'],
                'nm_penerima' => $post['nm_penerima'],
                'hp_penerima' => $post['nohp_penerima'],
                'id_region_penerima' => $post['kec_penerima'],
                'alamat_penerima' => $post['almt_penerima'],
                'jenis_barang' => $post['jns_barang'],
                'jenis_harga' => $jenis,
                'est_berat' => $post['berat'],
                'est_koli' => $post['koli'],
                'est_volume' => $post['volume'],
                'harga' => $post['harga'],
                'total_harga' => $total,
                'id_layanan' => $post['jns_layanan'],
                'ket_tambahan' => $post['ket_tambahan'],
                'notif_pengirim' => $pengirim,
                'notif_penerima' => $penerima
            );
        }

        return $this->db->update('t_bookingorder', $upd, array("id_bookingorder" => $booking));
    }

    public function update_sttname($booking, $filename, $sttname)
    {

        $upd = array(
            'nama_file_pdf' => $filename,
            'no_stt' => $sttname
        );

        return $this->db->update('t_bookingorder', $upd, array("id_bookingorder" => $booking));
    }

    public function ubahstatusbooking($status, $order)
    {
        if ($this->session->userdata('user') != null) {
            $user = $this->session->userdata('user');
        }
        $update = array(
            'id_bookingstatus' => $status,
            'id_marketing' => $user,
            'create_by' => $user
        );
        return $this->db->update('t_bookingorder', $update, array('id_bookingorder' => $order));
    }
    public function ubahstatus_sending_pengirim($order)
    {
        $update = array(
            'is_send_pengirim' => 1
        );
        return $this->db->update('t_bookingorder', $update, array('id_bookingorder' => $order));
    }
    public function ubahstatus_sending_penerima($order)
    {
        $update = array(
            'is_send_penerima' => 1
        );
        return $this->db->update('t_bookingorder', $update, array('id_bookingorder' => $order));
    }

    // delete
    public function Delete($booking)
    {
        return $this->db->delete('t_bookingorder', array('id_bookingorder' => $booking));
    }
}
