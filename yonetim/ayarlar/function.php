<?php

function temiz($text)
{
    $text = strip_tags($text);
    $text = preg_replace('/<a\s+.*?href="([^")]+)"[^>]*>([^<]+)<\/a>/is', '\2 (\1)', $text);
    $text = preg_replace('/<!--.+?-->/', '', $text);
    $text = preg_replace('/{.+?}/', '', $text);
    $text = preg_replace('/&nbsp;/', ' ', $text);
    $text = preg_replace('/&amp;/', ' ', $text);
    $text = preg_replace('/&quot;/', ' ', $text);
    $text = htmlspecialchars($text);
    $text = addslashes($text);
    return $text;
}

function g($par)
{
    $par = temiz(@$_GET[$par]);
    return $par;
}

function p($par)
{
    $par = htmlspecialchars((trim($_POST[$par])));
    return $par;
}

function git($par)
{
    header("location:{$par}");
}

function s($par)
{
    $par = $_SESSION[$par];
    return $par;
}

function yoneticikontrol()
{
    if (!$_SESSION || !$_SESSION['yetki'] == 1) {
        if($_SESSION){}
//        echo "<meta http-equiv='refresh' content='0;url=giris.php'>";  EGER SERVERDE XETA VERERSE 'HEADER' BU SETRI ISTIFADE ET
        header('location:giris.php');
    }
}

//RANDOM HERIF FUNCTION
function rastgeleharf($kackarakter)
{
    $s = '';
    $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($k = 1; $k <= $kackarakter; $k++) ;
    return $s;
}

// FILE UZANTISINI ALMA FUNCTION
function uzanti($dosya)
{
    $uzanti = pathinfo($dosya);
    $uzanti = $uzanti['extension'];
    return $uzanti;
}

// RESIM ADI GENERATOR
function resimadi()
{
    $rn = rand(1000, 9999);
    $rn .= rastgeleharf(1);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(2);
    $rn .= rastgeleharf(2);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(1);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(2);
    $rn .= rastgeleharf(2);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(1);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(2);
    $rn .= rastgeleharf(2);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(1);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(2);
    $rn .= rastgeleharf(2);
    $rn .= rand(1000, 9999);
    $rn .= rastgeleharf(1);
    return $rn;
}

function resimyukle($postisim, $yeniisim, $yol)
{
    // Verot resim yukleme
    $foo = new \Verot\Upload\Upload($_FILES[$postisim]);
    if ($foo->uploaded) {
        $foo->allowed = array('image/*');
        $foo->file_new_name_body = $yeniisim;
        $foo->image_resize = true;
        $foo->image_x = 200;
        $foo->image_ratio_y = false;
        $foo->Process($yol);
        if ($foo->processed) {
            $foo->clean();
            return true;
        } else {
            return false;

        }
    }
    // Verot resim yukleme
}
function resimyukle2($postisim, $yeniisim, $yol)
{
    // Verot resim yukleme advertisementsler ve sliderler ucun
    $foo = new \Verot\Upload\Upload($_FILES[$postisim]);
    if ($foo->uploaded) {
        $foo->allowed = array('image/*');
        $foo->file_new_name_body = $yeniisim;
        $foo->image_ratio_y = false;
        $foo->Process($yol);
        if ($foo->processed) {
            $foo->clean();
            return true;
        } else {
            return false;

        }
    }
    // Verot resim yukleme
}

// para Funtion tablolarda gostermek ucun
function parayaz($para)
{
    $para = number_format($para, 2, ',', '.') . " $";
    return $para;
}
function parayaz2($para){
    $para = number_format($para, 2, ',', '.');
    return $para;
}

// Paralarda Noktalari silerek database-e yazmaq qepikleri gostermek ucun 4.999,25
function noktasil($s)
{
    $tr = array('.', ',');
    $eng = array('', '.');
    $s = str_replace($tr, $eng, $s);
    return $s;
}

function urungetir($par){
    Global $db;
    $veri = $db->prepare("SELECT *FROM urunler WHERE urun_id=$par");
    $veri->execute(array());
    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
    return $v;
}
function urunresimgetir($id){
    Global $db;
    $veri = $db->prepare("SELECT urun_resim FROM urunler WHERE urun_id='$id'");
    $veri->execute(array());
    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
    foreach($v as $ur);
    return $ur['urun_resim'];
}

// ZIYARETCI ISLEMLERI

function onlinemi($ip){
    global $db;
    date_default_timezone_set('Asia/Baku');
    setlocale(LC_ALL,'tr_TR.UTF-8','tr_TR','tr','turkish');
    $zaman = date('Y-m-d H:i:s',time()-300);
    $veri = $db->prepare("SELECT *FROM ziyaretcitakip where ziyaretci_ip ='$ip' AND ziyaretci_zaman > '$zaman'");
    $veri->execute(array());
    $v = $veri->rowCount();
    if($v >0){
        return 1;
    }else{
        return 0;
    }
}
// ------ZIYARETCI ISLEMLERI


//Urun Eklerken Meta Title ve Meta Desc Convertor
function metawords($string){
    $string = strtolower(preg_replace('/\s+/', '-', $string));
    return $string;
}
//----Urun Eklerken Meta Title ve Meta Desc Convertor
