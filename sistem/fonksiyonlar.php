<?php


function kullanici () {
    global $pdo;
    $auth = isset($_SESSION['login']) ? $pdo->query('SELECT * FROM admin WHERE id = "'.$_SESSION['login'].'"')->fetch(PDO::FETCH_OBJ) : null;
    return $auth;
}

function location ($time,$url) {
    return header("refresh: ".$time."; url=".$url);
}


function seflink($string) {
     $turkce = array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
    $duzgun = array("s", "s", "i", "u", "u", "o", "o", "c", "c", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u");
    $string = str_replace($turkce, $duzgun, $string);
    return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}

function turkcetarih($f, $zt = 'now'){  
    $z = date("$f", strtotime($zt));  
    $donustur = array(  
        'Monday'    => 'Pazartesi',  
        'Tuesday'   => 'Salı',  
        'Wednesday' => 'Çarşamba',  
        'Thursday'  => 'Perşembe',  
        'Friday'    => 'Cuma',  
        'Saturday'  => 'Cumartesi',  
        'Sunday'    => 'Pazar',  
        'January'   => 'Ocak',  
        'February'  => 'Şubat',  
        'March'     => 'Mart',  
        'April'     => 'Nisan',  
        'May'       => 'Mayıs',  
        'June'      => 'Haziran',  
        'July'      => 'Temmuz',  
        'August'    => 'Ağustos',  
        'September' => 'Eylül',  
        'October'   => 'Ekim',  
        'November'  => 'Kasım',  
        'December'  => 'Aralık',  
        'Mon'       => 'Pts',  
        'Tue'       => 'Sal',  
        'Wed'       => 'Çar',  
        'Thu'       => 'Per',  
        'Fri'       => 'Cum',  
        'Sat'       => 'Cts',  
        'Sun'       => 'Paz',  
        'Jan'       => 'Oca',  
        'Feb'       => 'Şub',  
        'Mar'       => 'Mar',  
        'Apr'       => 'Nis',  
        'Jun'       => 'Haz',  
        'Jul'       => 'Tem',  
        'Aug'       => 'Ağu',  
        'Sep'       => 'Eyl',  
        'Oct'       => 'Eki',  
        'Nov'       => 'Kas',  
        'Dec'       => 'Ara',  
    );  
    foreach($donustur as $en => $tr){  
        $z = str_replace($en, $tr, $z);  
    }  
    if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);  
    return $z;  
}
function uzantibulma($dosya)
{
    $d = pathinfo($dosya);
    return $d['extension'];
}

function adlandir($bolge)
{
	if($bolge == "sagkule")
	{
		$return = "Sağ Kule Sabit (120 x 600 px)";
	}
	elseif($bolge == "solkule")
	{
		$return = "Sol Kule Sabit (120 x 600 px)";
	}
	elseif($bolge == "acilis")
	{
		$return = "Açılış Reklamı(600x480 px)";
	}elseif($bolge == "logoyani"){
	$return = "Logo yanı(680 x 80 px)";
	 	
	}elseif($bolge == "menualti"){
	$return = "Menü Alt(960 x 80 px)";
	 	
	}elseif($bolge == "mansetalti"){
	$return = "Manşet Üstü(960 x 80 px)";
	 	
	}elseif($bolge == "mansetustu"){
	$return = "Manşet Alt(960 x 80 px)";
	 	
	}
	elseif($bolge=="haberdetayicreklam"){
	$return = "Haber detay reklam (640 x 80 px)";	
	}
	 
	return $return;
}  
function banner2($bolge)
{
	global $pdo;
	$reklamlar = $pdo->query("SELECT * FROM reklamlar WHERE yer = '".$bolge."' AND durum = '1' ORDER BY rand() LIMIT 0,1");
	$reklamalani = $reklamlar->rowCount();
	$reklam = $pdo->query("SELECT * FROM reklamlar WHERE yer = '".$bolge."' AND durum = '1' ORDER BY rand() LIMIT 0,1")->fetch(PDO::FETCH_OBJ);
	if ($reklamalani > 0){
		
		if ($reklam->yer == 'sagkule')
		{
			 $gen = "160";
			$yuk = "600";
		}
		elseif ($reklam->yer == 'solkule')
		{
			 $gen = "160";
			$yuk = "600";
		}
		elseif ($reklam->yer == "acilis")
		{
			$gen = "600";
			$yuk = "480";
		}
		elseif($reklam->yer == "logoyani")
		{
			$gen = "650";
			$yuk = "80";
		}
		elseif($reklam->yer == "menualti"){
			$gen = "960";
			$yuk = "80";
			
		}elseif($reklam->yer == "mansetalti"){
		$gen = "1140";
			$yuk = "";
			
		}elseif($reklam->yer == "mansetustu"){
		$gen = "1140";
			$yuk = "";
			
		}
		elseif($reklam->yer=="haberdetayicreklam"){
			$gen = "640";
			$yuk = "80";
	}
		
		if ($reklam->tur == '1'){
			$bann = $reklam->kod;
		}else{
			if ($reklam->tur == ".swf"){
				$bann = "<embed wmode=\"opaque\" style=\"width: ".$gen."px; height: ".$yuk."px;\" type=\"application/x-shockwave-flash\" src=\"".SITEURL."/upload/reklamlar/".$reklam->id.".swf\" quality=\"best\"></embed>";
			}else{
				$bann = "<a rel=\"reklam\" href=\"".$reklam->link."\"   target=\"_blank\"><img src=\"".SITEURL."/upload/reklamlar/".$reklam->id.".".$reklam->uzanti."\" width=\"".$gen."\" height=\"".$yuk."\" alt=\"\" border=\"0\" /></a>";
			}
		}
	
	}else{
		$bann = "";
	}
	$query = $pdo->prepare("UPDATE reklamlar SET
							hit = :hit
						WHERE id = :id");
						$updatedefault = $query->execute(array(
								 "hit" => $reklam->hit + 1,
								 "id" => $reklam->id
						));

	return $bann;
}
