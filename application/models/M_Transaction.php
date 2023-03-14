<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaction extends CI_Model
{
    public function getData()
    {
        $sql = "select t.*,count(d.id) as total,sum(d.quantity) as qty from transactions t
        left join transaction_details d on t.id = d.transaction_id GROUP BY t.id order by t.transaction_date asc";

        $data = $this->db->query($sql)->result();

        return $data;
    }

    public function rules_validate()
    {
        if(get_instance()->uri->segment(2)=="update"){
            return [
                [
                    'field' => 'transaction_date',
                    'label' => 'Date Transactions',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus di isi'
                    ]
                ],
            ];
        }else{
            return [
                [
                    'field' => 'no_transaction',
                    'label' => 'No Transactions',
                    'rules' => 'required|is_unique[transactions.no_transaction]',
                    'errors' => [
                        'required' => 'Kolom {field} harus di isi',
                        'is_unique' => '{field} sudah tidak boleh sama'
                    ]
                ],
                [
                    'field' => 'transaction_date',
                    'label' => 'Date Transactions',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus di isi'
                    ]
                ],
            ];
        }
    }

    public function gettransaction($id)
    {
        $this->db->where('id', $id);
        $q = $this->db->get('transactions')->row();

        return $q;
    }

    public function getdetails($id)
    {
        $this->db->where('transaction_id', $id);
        $q = $this->db->get('transaction_details')->result();

        return $q;
    }
}
