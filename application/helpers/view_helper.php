<?php

use Jenssegers\Blade\Blade;

if (!function_exists('view')) {
    function view($view, $data = []) {
        $path = APPPATH.'views';
        $blade = new Blade($path, $path . '/cache');

        echo $blade->make($view, $data);
    }
}

if (!function_exists('dd')) {
    function dd($data) {
        if(is_array($data)){
            echo "<pre>";
            print_r($data);
        }elseif(is_object($data)){
            echo "<pre>";
            print_r($data);
        }else{
            echo $data;
        }
        die();
    }
}

if (!function_exists('inc_dropdown')) {
    function inc_dropdown($id) {
        $baseurl = base_url();
        $url = $baseurl.get_instance()->uri->segment(1);
        $delete = "'".$url."/delete/".$id."'";
        $html = '<center>
        <div class="dropdown">
        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
        </button>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="'.$url."/edit/".$id.'"><label style="padding-right:3px"><i class="fa fa-edit"></i></label> Edit</a>
        <a class="dropdown-item" href="#" onclick="CheckDelete('.$delete.')"><label style="padding-right:3px"><i class="fa fa-times"></i></label> Delete</a>
        </div>
        </div>
        </center>';

        return $html;
    }
}

if (!function_exists('toJson')) {
    function toJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

if (!function_exists('getAction')) {
    function getAction($url = null) {
        $full_url = get_instance()->uri->segment(1);
        $method = get_instance()->uri->segment(2);
        $params = get_instance()->uri->segment(3);

        if($url != null){
            $full_url = $url;
        }
        
        if($method=="edit"){

            $full_url.="/update/".$params;

        }else{
            $full_url.="/store";
        }

        return base_url().$full_url;

    }
}

if (!function_exists('full_url')) {
    function full_url() {
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        return $url;
    }
}

if (!function_exists('params_url')) {
    function params_url() {
        $params   = $_SERVER['QUERY_STRING'];
        
        return $params;
    }
}

if (!function_exists('redirect_back')) {
    function redirect_back() {
        $url = $_SERVER['HTTP_REFERER'];
        $base = base_url();
        $url = str_replace($base,"",$url);
        return $url;
    }
}

if (!function_exists('dateindo')) {
    function dateindo($tanggal)
    {   
        $date = date("d-m-Y", strtotime($tanggal));
        
        $bulan = array (
            1 =>   'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Jul',
            8 => 'Ags',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des'
        );
        
        $pecahkan = explode('-', $date);
        
        return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
    }
}

if (!function_exists('daydate')) {
    function daydate($tanggal)
    {   
        $date = strtolower(date_format(date_create($tanggal), "D"));

        $hari = "";
        if($date=="sun"){
            $hari = "Minggu";
        }elseif($date=="mon"){
            $hari = "Senin";
        }elseif($date=="tue"){
            $hari = "Selasa";
        }elseif($date=="wed"){
            $hari = "Rabu";
        }elseif($date=="thu"){
            $hari = "Kamis";
        }elseif($date=="fri"){
            $hari = "Jum'at";
        }elseif($date=="sat"){
            $hari = "Sabtu";
        }else{
            $hari = "tidak valid";
        }
        
        return $hari;
    }
}

if (!function_exists('terbilang')) {

    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }

    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }

}

if (!function_exists('tonumber')) {
    function tonumber($data){

        $data = number_format($data, 0, ',', '.');
        return $data;

    }
}

if (!function_exists('tonumberround')) {
    function tonumberround($data){

        $data = number_format($data, 2, ',', '.');
        return $data;

    }
}

if (!function_exists('toMinutes')) {
    function toMinutes($str) {
        $jam = (Double)date("H", strtotime($str))*60;
        $minute = (Double)date("i", strtotime($str));
        $second = (Double)date("s", strtotime($str))/60;

        $total = $jam+$minute+$second;

        return $total;
    }
}

if (!function_exists('curlUrl')) {
    function curlUrl($url, $data) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        
        return $response;
    }
}

if (!function_exists('random_string')) {
    function random_string($length = 6) {
        $permitted_chars = '0123456789';

        $input_length = strlen($permitted_chars);
        $random_string = '';

        for ($i = 0; $i < $length; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}