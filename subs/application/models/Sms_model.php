<?php
class Sms_model extends CI_Model
{
    private $_table = "t_outbox";
    // private $apikey = "jP6YN95UH5KhHqgPAE8Z8OfMlyRmQX8TMKKCS8U6kvLkrSDUWu";


    // GET T_OUTBOT
    // public function getout()
    // {
    //     $this->db->select('tb.id_outbox, tb.id_pegawai, pg.nomor_hp, tb.pesan');
    //     $this->db->from('t_outbox tb');
    //     $this->db->join('pegawai pg', 'tb.id_pegawai = pg.id_pegawai');
    //     $this->db->where('tb.id_status = 0 AND tb.id_pegawai !=0');        
    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

    // public function updatesttssending($idoutbox)
    // {
    //     $updstts2dpss = "UPDATE t_outbox SET id_status = '1', sendsms_time='".date("Y-m-d H:i:s")."' WHERE id_outbox = " . $idoutbox;
    //     $this->db->query($updstts2dpss);
    // }

    // MISC
    // public function smsfunction($nomor, $isi = '')
    // {

    //     $userkey = "4967ad62f7ec";
    //     $passkey = "df5a804bf0985172c1c0da1e";
    //     $telepon = $nomor;
    //     $message = $isi;
    //     $url = "https://app.whatspie.com/api/messages";

    //     $curlHandle = curl_init();
    //     curl_setopt($curlHandle, CURLOPT_URL, $url);
    //     curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    //     curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
    //     curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
    //     curl_setopt($curlHandle, CURLOPT_POST, 1);
    //     curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
    //         'userkey' => $userkey,
    //         'passkey' => $passkey,
    //         'to' => $telepon,
    //         'message' => $message
    //     ));
    //     $results = json_decode(curl_exec($curlHandle), true);
    //     curl_close($curlHandle);

    //     if ($results["status"] == 1)
    //         return true;
    //     else
    //         return false;
    // }

    public function sendsms2wa($nomor, $isi = "")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.whatspie.com/api/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'receiver=' . $nomor . '&device=' . $this->config->item('device') . '&message=' . $isi . '&type=chat',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $this->config->item('api_key')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        // var_dump($response);
        // die;
    }

    public function sendsms2wa_stt($nomor, $isi = "")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.whatspie.com/api/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'receiver=' . $nomor . '&device=' . $this->config->item('device') . '&message=' . $isi,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $this->config->item('api_key')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        // var_dump($response);
        // die;
    }
}
