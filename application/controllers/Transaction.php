
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transaction', 'models');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data["data"] = $this->models->getdata();
        
        return view("trans.index", $data);
    }

    public function create()
    {
        $data["data"] = [];
        
        return view("trans.create", $data);
    }

    public function edit($id)
    {
        $data["data"] = $this->models->gettransaction($id);
        $data["detail"] = $this->models->getdetails($id);

        return view("trans.edit", $data);
    }

    public function show($id)
    {
        $data["data"] = $this->models->gettransaction($id);
        $data["detail"] = $this->models->getdetails($id);

        return view("trans.edit", $data);
    }

    public function store()
    {
        $validasi = $this->form_validation;
        $validasi->set_rules($this->models->rules_validate());
        
        if (!$validasi->run()) {

            $this->session->set_flashdata('errors', 'Cek kembali data inputan anda');
            $data["data"] = [];

            return view("trans.create", $data);
        }else{
            $this->db->trans_begin();

            try {
                $trans = [];
                $trans["no_transaction"] = $this->input->post("no_transaction");
                $trans["transaction_date"] = $this->input->post("transaction_date");

                // insert transaction
                $this->db->insert('transactions', $trans);
                $last_id = $this->db->insert_id();

                $detail = [];
                // loop detail
                foreach($this->input->post("item") as $key => $value){
                    $detail[$key]["item"] = $value;
                    $detail[$key]["quantity"] = $this->input->post("qty")[$key];
                    $detail[$key]["transaction_id"] = $last_id;
                }
                // insert detail
                $this->db->insert_batch('transaction_details', $detail);

                $this->db->trans_commit();
                $this->session->set_flashdata('success', "Transaction Success");
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('error', 'Transaction failed, '.$e->getMessage());
            }

            redirect(base_url()."transaction");
        }
    }

    public function update($id)
    {
        $validasi = $this->form_validation;
        $validasi->set_rules($this->models->rules_validate());
        
        if (!$validasi->run()) {

            $this->session->set_flashdata('errors', 'Cek kembali data inputan anda');
            $data["data"] = $this->models->gettransaction($id);
            $data["detail"] = $this->models->getdetails($id);

            return view("trans.edit", $data);
        }else{
            $this->db->trans_begin();

            try {
                $trans = [];
                $trans["transaction_date"] = $this->input->post("transaction_date");

                // update transaction
                $this->db->where('id', $id);
                $this->db->update('transactions', $trans);

                // delete all detail transactions
                $this->db->delete('transaction_details', array('transaction_id' => $id));
                $detail = [];
                // loop detail
                foreach($this->input->post("item") as $key => $value){
                    $detail[$key]["item"] = $value;
                    $detail[$key]["quantity"] = $this->input->post("qty")[$key];
                    $detail[$key]["transaction_id"] = $id;
                }

                // update detail
                $this->db->insert_batch('transaction_details', $detail);

                $this->db->trans_commit();
                $this->session->set_flashdata('success', "Update Transaction Success");
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('error', 'Update Transaction failed, '.$e->getMessage());
            }

            redirect(base_url()."transaction");
        }
    }

    public function delete($id)
    {
        $this->db->trans_begin();
        try {
            $this->db->delete('transaction_details', array('transaction_id' => $id));
            $this->db->delete('transactions', array('id' => $id));

            $this->db->trans_commit();
            $this->session->set_flashdata('success', "Delete Transaction Success");
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error', 'Delete Transaction failed, '.$e->getMessage());
        }

        redirect(base_url()."transaction");
    }
}
