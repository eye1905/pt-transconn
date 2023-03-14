<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_api_model extends CI_Model
{
    public function get_numkaryawan()
    {
        $this->db->select('*');
        $this->db->from('t_karyawan');
        return $this->db->get()->num_rows();
    }
    public function get_numpengguna()
    {
        $this->db->select('*');
        $this->db->from('t_user');
        return $this->db->get()->num_rows();
    }
    public function get_numbookingorder()
    {
        $this->db->select('*');
        $this->db->from('t_bookingorder');
        return $this->db->get()->num_rows();
    }

    public function get_numagenda()
    {
        $this->db->select('*');
        $this->db->from('t_agendajemput');
        return $this->db->get()->num_rows();
    }

    public function get_numagenda_sopir($sopir)
    {
        $this->db->select('*');
        $this->db->from('t_agendajemput');
        $this->db->where('id_sopir', $sopir);
        $this->db->where('tgl_agenda', date('Y-m-d'));
        return $this->db->get()->num_rows();
    }

    public function order_perstatus()
    {
        $q = "SELECT bs.*, COUNT(bo.id_bookingorder) as jlh
        FROM t_bookingstatus bs
        LEFT JOIN t_bookingorder bo on bo.id_bookingstatus = bs.id_bookingstatus
        GROUP BY bs.id_bookingstatus";

        return $this->db->query($q)->result_array();
    }

    public function order_perstatus_sopir()
    {
        $sopir = $this->session->userdata('user');
        $date = date('Y-m-d');
        $q = "SELECT bs.*, COUNT(bo.id_bookingorder) as jlh
        FROM t_bookingstatus bs
        JOIN t_bookingorder bo on bo.id_bookingstatus = bs.id_bookingstatus
				JOIN t_agendajemput jemput ON jemput.id_agenda = bo.id_agenda";
        $w = " WHERE jemput.id_sopir = '$sopir' AND jemput.tgl_agenda = DATE('$date')";
        $g = " GROUP BY bs.id_bookingstatus";
        return $this->db->query($q . $w . $g)->row_array();
    }

    public function agenda_perstatus()
    {
        $q = "SELECT jemput.is_sopirproses, COUNT(jemput.id_agenda) as jlh_agenda
        FROM t_agendajemput jemput
        GROUP BY jemput.is_sopirproses";
        return $this->db->query($q)->row_array();
    }

    public function agenda_perstatus_sopir()
    {
        $sopir = $this->session->userdata('user');
        $date = date('Y-m-d');
        $q = "SELECT jemput.is_sopirproses, COUNT(jemput.id_agenda) as jlh_agenda
        FROM t_agendajemput jemput";
        $w = " WHERE jemput.id_sopir = '$sopir' AND jemput.tgl_agenda = DATE('$date')";
        $g = " GROUP BY jemput.is_sopirproses";
        return $this->db->query($q . $w . $g)->row_array();
    }
}
