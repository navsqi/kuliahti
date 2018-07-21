<?php 

// base url
define("BASE_URL", "http://localhost/kuliahti/");

// format tanggal indonesia
function tanggal_indonesia($date)
{
    $hari  = array(
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu"
    );
    $bulan = array(
        "Januari",
        "Februari",
        "Mart",
        "April",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    $thn   = substr($date, 0, 4);
    $bln   = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $waktu = substr($date, 11, 5);
    $hr    = date("w", strtotime($date));
    
    $result = $hari[$hr] . ", " . $tgl . " " . $bulan[(int) $bln - 1] . ' ' . $thn . ' ' . $waktu . ' WIB';
    return $result;
}

// slug url
function slugify($str) 
{
    $search = array('Ș', 'Ț', 'ş', 'ţ', 'Ş', 'Ţ', 'ș', 'ț', 'î', 'â', 'ă', 'Î', 'Â', 'Ă', 'ë', 'Ë');
    $replace = array('s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E');
    $str = str_ireplace($search, $replace, strtolower(trim($str)));
    $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
    $str = str_replace(' ', '-', $str);
    if(substr(preg_replace('/\-{2,}/', '-', $str), -1) == "-"){
    	return substr(preg_replace('/\-{2,}/', '-', $str), 0,-1);
    }else{
    	return preg_replace('/\-{2,}/', '-', $str);
    }
    
}

// huruf dan angka acak
function random_string($length)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  		$pos = rand(0, strlen($karakter)-1);
  		$string .= $karakter{$pos};
    }
    
    return $string;
}

 ?>