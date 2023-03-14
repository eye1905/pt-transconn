<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Agenda extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('agenda_model', 'agenda');
        $this->load->model('dashboard_api_model');
        $this->load->model('booking_model');
        $this->load->model('sms_model');
    }


    public function index_post()
    {

        // REQUIRED INPUT
        $user  = $this->post('user');
        $userdetail = $this->db->get_where('t_user', ['id_karyawan' => $user])->row_array();

        if ($user != '') {

            if (!empty($userdetail)) {
                // logic disini sesuai role getnya
                if ($userdetail['id_role'] == '3') {
                    $agenda = $this->agenda->getAgendaList_sopir($userdetail['id_karyawan']);
                    $numagenda = $this->dashboard_api_model->get_numagenda_sopir($user);
                } else {
                    $agenda = $this->agenda->getAgendaList();
                    $numagenda = $this->dashboard_api_model->get_numagenda();
                }

                if (!empty($agenda)) {
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'success',
                        'Respon_date' => date('d-M-Y h:i'),
                        'Respon_data' => $agenda,
                        "Respon_jlh_agenda" => $numagenda
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'kosong',
                        'Respon_date' => date('d-M-Y h:i'),
                        'Respon_data' => []
                    ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response([
                    'Respon_status' => '2',
                    'Respon_message' => 'User tidak ditemukan',
                    'Respon_date' => date('d-M-Y h:i'),
                    'Respon_data' => []
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter dibutuhkan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    public function agendasemua_post()
    {

        // REQUIRED INPUT
        $user  = $this->post('user');
        $userdetail = $this->db->get_where('t_user', ['id_karyawan' => $user])->row_array();

        if ($user != '') {

            if (!empty($userdetail)) {
                // logic disini sesuai role getnya
                if ($userdetail['id_role'] == '3') {
                    $agenda = $this->agenda->getAgendaList_sopir_semua($userdetail['id_karyawan']);
                } else {
                    $agenda = $this->agenda->getAgendaList();
                }

                if (!empty($agenda)) {
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'success',
                        'Respon_date' => date('d-M-Y h:i'),
                        'Respon_data' => $agenda
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'kosong',
                        'Respon_date' => date('d-M-Y h:i'),
                        'Respon_data' => []
                    ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response([
                    'Respon_status' => '2',
                    'Respon_message' => 'User tidak ditemukan',
                    'Respon_date' => date('d-M-Y h:i'),
                    'Respon_data' => []
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter dibutuhkan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    public function agendadet_post()
    {

        // REQUIRED INPUT
        $agenda = $this->input->post('agenda');

        if ($agenda != '') {

            $agendadet = $this->agenda->getAgenda_byid($agenda);
            $bookonagenda = $this->agenda->getbooking_byidagenda($agenda);
            if (!empty($agendadet)) {
                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'success',
                    'Respon_date' => date('d-M-Y h:i'),
                    'Respon_agenda' => $agendadet,
                    'Respon_booking' => $bookonagenda
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'Data kosong',
                    'Respon_date' => date('d-M-Y h:i'),
                    'Respon_data' => [],
                    'Respon_booking' => []
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter username dan agenda diperlukan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    public function bookdet_post()
    {
        // REQUIRED INPUT
        $booking = $this->input->post('booking');

        if ($booking != '') {

            $bookdet = $this->booking_model->getBooking_byid($booking);
            $detstatus = $this->booking_model->getBooking_detailStatus_byId($booking);
            $detkoli = $this->booking_model->getDetailKoli($booking);
            if (!empty($bookdet)) {
                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'success',
                    'Respon_date' => date('d-M-Y h:i'),
                    'Respon_data' => ([
                        'bookingdetail' => $bookdet,
                        'detailstatus' => $detstatus,
                        'detkoli' => $detkoli
                    ])
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'Data kosong',
                    'Respon_date' => date('d-M-Y h:i'),
                    'Respon_data' => [],
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter diperlukan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    public function prosesagenda_post()
    {
        // REQUIRED INPUT
        $agenda = $this->input->post('agenda');
        $user = $this->input->post('user');

        if ($agenda != '' && $user != '') {

            $agendadet = $this->agenda->getAgenda_byid($agenda);
            $bookingbyaagenda = $this->agenda->getbooking_byidagenda($agenda);
            if (!empty($agendadet)) {
                if ($this->agenda->Update_bookingsopir_proses($agenda) && $this->agenda->Update_agenda_sopir_proses($agenda)) {
                    foreach ($bookingbyaagenda as $bookagenda) {
                        $this->booking_model->addDetailBooking($user, $bookagenda['id_bookingorder'], 5, "Pickup Proses", null);
                        // get berdasarkan order
                        if ($bookagenda['notif_pengirim'] == '1') {
                            // if notif pengirim == 1 send sms
                            $pesan = "Hi " . strtoupper($bookagenda['nama_pengirim']) . " Kode Booking Penjemputan : " . $bookagenda['kode_booking'] . " dalam proses penjemputan oleh driver kami.\n\n-" . $this->config->item('nama_perush') . "-\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                            $this->sms_model->sendsms2wa(substr_replace($bookagenda['hp_pengirim'], '62', 0, 1), $pesan);
                        }
                        if ($bookagenda['notif_penerima'] == '1') {
                            // if notif penerima == 1 send sms
                            $pesan = "Hi " . strtoupper($bookagenda['nm_penerima']) . " Kode Booking Penjemputan : " . $bookagenda['kode_booking'] . " dalam proses penjemputan oleh driver kami.\n\n-" . $this->config->item('nama_perush') . "-\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                            $this->sms_model->sendsms2wa(substr_replace($bookagenda['hp_penerima'], '62', 0, 1), $pesan);
                        }
                    }
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'success',
                        'Respon_date' => date('d-M-Y h:i')
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'gagal',
                        'Respon_date' => date('d-M-Y h:i')
                    ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'kosong',
                    'Respon_date' => date('d-M-Y h:i')
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter agenda diperlukan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    public function penjemputan_post()
    {
        $booking = $this->input->post('booking');
        $agenda = $this->input->post('agenda');
        $berat = $this->input->post('berat');
        $koli = $this->input->post('koli');
        $volume = $this->input->post('volume');
        $kgv = $this->input->post('kgv');
        $status = $this->input->post('status_jemput');
        $user = $this->input->post('user');
        $ket = $this->input->post('ket');
        $foto = $this->input->post('foto');


        $kolidet = $this->input->post('kolidet');

        if ($kolidet != '' && $kolidet != null && $kolidet != '[,,,,]' && $kolidet != '[]') {
            $a1 = str_replace('[', '', $kolidet);
            $a2 = str_replace(']', '', $a1);
            $a3 = explode(" ", $a2);

            foreach ($a3 as $a3array) {
                $a4 = explode(",", $a3array);
                $this->booking_model->Create_detail_koli($booking, $a4[0], $a4[1], $a4[2], $a4[3], $a4[4]);
            }
        }
        // && $ket != ''
        if ($booking != '' && $agenda != '' && $user != ''  && $foto != '' && $status != '') {
            if ((int)$berat <= 0 || (int)$koli <= 0 || (int)$kgv <= 0) {
                $this->response([
                    'Respon_status' => '2',
                    'Respon_message' => 'Mohon sesuaikan berat, koli, volume, kgv kembali!',
                    'Respon_date' => date('d-M-Y h:i'),
                    'Respon_data' => []
                ], REST_Controller::HTTP_OK);
            } else {
                if ((float)$volume <= 0.0) {
                    $this->response([
                        'Respon_status' => '2',
                        'Respon_message' => 'Mohon sesuaikan berat, koli, volume, kgv kembali!',
                        'Respon_date' => date('d-M-Y h:i'),
                        'Respon_data' => []
                    ], REST_Controller::HTTP_OK);
                } else {
                    $lasid_detailstatusbooking = $this->agenda->getDetailStatusBooking_lastId();
                    $lastid = (int)$lasid_detailstatusbooking->id_detailstatus + 1;
                    $rep2 = $this->agenda->keygen() . $booking . $agenda . $status . $lastid . ".jpg";;
                    $fotoname = json_encode(['foto' => [$rep2]]);
                    if ($ket == '' && $ket == null) {
                        $ket = '-';
                    }
                    if ($this->agenda->addPenjemputanBooking($booking, $fotoname, $user, $status, $ket) && $this->agenda->ubahstatusbooking($this->input->post('status_jemput'), $booking)) {

                        $this->uploadfotopenjemputan($this->input->post('foto'), $booking, $agenda, $status, $rep2);

                        // berhasil dijemput
                        if ($status == '6') {
                            $book = $this->booking_model->getBooking_byid($booking);

                            // get berdasarkan order
                            if ($book->notif_pengirim == '1') {
                                // if notif pengirim == 1 send sms
                                $pesan = "Hi " . strtoupper($book->nama_pengirim) . " Kode Booking: " . $book->kode_booking .  " BERHASIL DIJEMPUT. Lihat detailnya di " . base_url() . "rp/" . $book->uniq_resi . "\n\n-" . $this->config->item('nama_perush') . "-\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                                $this->sms_model->sendsms2wa(substr_replace($book->hp_pengirim, '62', 0, 1), $pesan);
                            }
                            if ($book->notif_penerima == '1') {
                                // if notif penerima == 1 send sms
                                $pesan = "Hi " . strtoupper($book->nm_penerima) . " Kode Booking: " . $book->kode_booking .  " BERHASIL DIJEMPUT. Lihat detailnya di " . base_url() . "rp/" . $book->uniq_resi . "\n\n-" . $this->config->item('nama_perush') . "-" . "\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                                $this->sms_model->sendsms2wa(substr_replace($book->hp_penerima, '62', 0, 1), $pesan);
                            }
                        }

                        // gagal dijemput
                        if ($status == '7') {
                            $book = $this->booking_model->getBooking_byid($booking);

                            // KETERANGAN GAGAL DIJEMPUT
                            // $detstatus = $this->booking_model->getlastBooking_detailStatus_byId($booking);
                            // var_dump($detstatus->keterangan);
                            // die;

                            // get berdasarkan order
                            if ($book->notif_pengirim == '1') {
                                // if notif pengirim == 1 send sms
                                $pesan = "Hi " . strtoupper($book->nama_pengirim) . " Kode Booking: " . $book->kode_booking .  " GAGAL DIJEMPUT dengan keterangan " . "\n\n-" . $this->config->item('nama_perush') . "-\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                                $this->sms_model->sendsms2wa(substr_replace($book->hp_pengirim, '62', 0, 1), $pesan);
                                // $this->booking_model->ubahstatus_sending_pengirim($order);
                            }
                            if ($book->notif_penerima == '1') {
                                // if notif penerima == 1 send sms
                                $pesan = "Hi " . strtoupper($book->nm_penerima) . " Kode Booking: " . $book->kode_booking .  " GAGAL DIJEMPUT dengan keterangan " . "\n\n-" . $this->config->item('nama_perush') . "-\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                                $this->sms_model->sendsms2wa(substr_replace($book->hp_penerima, '62', 0, 1), $pesan);
                                // $this->booking_model->ubahstatus_sending_penerima($order);

                            }
                        }
                        $this->response([
                            'Respon_status' => '0',
                            'Respon_message' => 'success',
                            'Respon_date' => date('d-M-Y h:i')
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'Respon_status' => '0',
                            'Respon_message' => 'gagal',
                            'Respon_date' => date('d-M-Y h:i')
                        ], REST_Controller::HTTP_OK);
                    }
                }
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter penjemputan diperlukan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    public function onwarehouse_post()
    {
        $booking = $this->input->post('booking');
        $user = $this->input->post('user');

        if ($booking != '' && $user != '') {
            if ($this->agenda->ubahstatusbooking_warehouse('8', $booking) && $this->booking_model->addDetailBooking($user, $booking, '8', "Receive in Warehouse", null)) {

                $book = $this->booking_model->getBooking_byid($booking);
                // get berdasarkan order
                if ($book->notif_pengirim == '1') {
                    // if notif pengirim == 1 send sms
                    $pesan = "Hi " . strtoupper($book->nama_pengirim) . " Kode Booking: " . $book->kode_booking .  " Telah sampai di Warehouse. " . "\n\n-" . $this->config->item('nama_perush') . "-\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                    $this->sms_model->sendsms2wa(substr_replace($book->hp_pengirim, '62', 0, 1), $pesan);
                }
                if ($book->notif_penerima == '1') {
                    // if notif penerima == 1 send sms
                    $pesan = "Hi " . strtoupper($book->nm_penerima) . " Kode Booking: " . $book->kode_booking .  " Telah sampai di Warehouse. " . "\n\n-" . $this->config->item('nama_perush') . "-\n\nInformasi detail dan layanan kami yang lain klik " . $this->config->item('visit_us') . "\n\nCustomer Support " . $this->config->item('nomor_cs') . "\n\n_Pesan ini dikirim otomatis oleh sistem_";
                    $this->sms_model->sendsms2wa(substr_replace($book->hp_penerima, '62', 0, 1), $pesan);
                }

                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'success',
                    'Respon_date' => date('d-M-Y h:i')
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'Data gagal disimpan, periksa inputan kembali.',
                    'Respon_date' => date('d-M-Y h:i')
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter penjemputan diperlukan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    public function agendaselesai_post()
    {
        $agenda = $this->input->post('agenda');

        if ($agenda != '') {
            if ($this->agenda->checkbookinginagenda($agenda) > 0) {
                $this->response([
                    'Respon_status' => '0',
                    'Respon_message' => 'Set Agenda Selesai GAGAL. Pastikan semua Booking Penjemputan sudah Check Completed',
                    'Respon_date' => date('d-M-Y h:i')
                ], REST_Controller::HTTP_OK);
            } else {
                if ($this->agenda->Update_agendaiscomplete($agenda)) {
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'success.',
                        'Respon_date' => date('d-M-Y h:i')
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'Respon_status' => '0',
                        'Respon_message' => 'Data gagal disimpan, periksa inputan kembali.',
                        'Respon_date' => date('d-M-Y h:i')
                    ], REST_Controller::HTTP_OK);
                }
            }
        } else {
            $this->response([
                'Respon_status' => '2',
                'Respon_message' => 'Parameter penjemputan diperlukan',
                'Respon_date' => date('d-M-Y h:i'),
                'Respon_data' => []
            ], REST_Controller::HTTP_OK);
        }
    }

    // FOTO SOPIR
    private function upload_files($files, $booking, $agenda, $status, $filename)
    {
        $path = FCPATH . './jemput/';
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg',
            'overwrite' => 1
        );

        $this->load->library('upload', $config);

        $images = array();

        // foreach ($files['name'] as $key => $image) {

        // }
        $_FILES['images[]']['name'] = $files['name'];
        $_FILES['images[]']['type'] = $files['type'];
        $_FILES['images[]']['tmp_name'] = $files['tmp_name'];
        $_FILES['images[]']['error'] = $files['error'];
        $_FILES['images[]']['size'] = $files['size'];

        $lasid_detailstatusbooking = $this->agenda->getDetailStatusBooking_lastId();

        $lastid = (int)$lasid_detailstatusbooking->id_detailstatus;

        // $rep1 = preg_replace('/[^a-zA-Z0-9.\']/', "_", $files['name']);
        // $rep2 = str_replace($files['name'], $this->agenda->keygen(), $rep1);
        // $rep2 = str_replace('.', "$booking$agenda$status$lastid.", $rep1);
        // $fileName = $this->agenda->keygen() . $booking . $agenda . $status . $lastid . ".jpg";

        $images[] = $filename;

        $config['file_name'] = $filename;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images[]')) {
            $this->upload->data();
        } else {
            return false;
        }

        return $images;
    }

    private function uploadfotopenjemputan($files, $booking, $agenda, $status, $filename)
    {
        file_put_contents(
            "../assets/jemput/" . $filename,
            base64_decode(
                str_replace('data:image/jpeg;base64,', '', $files)
            )
        );
    }

    public function index_get()
    {
        $this->response([
            'Respon_status' => '3',
            'Respon_message' => 'Jangan hack sistem saya, akutuh gakuad.',
        ], REST_Controller::HTTP_FORBIDDEN);
    }
}
