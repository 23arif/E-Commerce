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

function parayaz($para)
{
    $para = number_format($para, 2, ',', '.') . " $";
    return $para;
}

function parayaz2($para)
{
    $para = "$ " . number_format($para, 2, ',', '.');
    return $para;
}

function veriUrunler($par)
{
    Global $db;
    $veri = $db->prepare("SELECT *FROM $par");
    $veri->execute(array());
    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
}

// ZIYARETCI TAKIP ISLEMLERI
function takip()
{

    /*
 *  $_SERVER['SERVER_NAME'] // Gecerli site adresini almak icin kullanilir
 *  $_SERVER['REQUEST_URI'] //Site adresinden sonraki dosya yolunu ve GET degerleri ile beraber alir
 *  $_SERVER['HTTP_REFERER'] //Bir onceki sayfa adresi
 *  $_SERVER['HTTP_USER_AGENT'] //Sayfaya erisen kullanici tarayici bilgisi
 *  $_SERVER['HTTP_ACCEPT_LANGUAGE'] //Sayfaya erisen kullanicinin tarayici dil bilgisi
 *  $_SERVER['REMOTE_ADDR'] // Sayfaya eisen kullanici Ip adresi
 * */

    global $db;
    $gecerliAdress = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (@$_SERVER['HTTP_REFERER']) {
        $birOncekiDizin = @$_SERVER['HTTP_REFERER'];
    } else {
        $birOncekiDizin = 'BOS';
    }
    $kullaniciDil = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $kullaniciIp = $_SERVER['REMOTE_ADDR'];

    $veri = $db->prepare("INSERT INTO ziyaretcitakip set ziyaretci_ip=?,ziyaretci_bulundugu=?,ziyaretci_geldigi=?,ziyaretci_dil=?");
    $ekleme = $veri->execute(array($kullaniciIp, $gecerliAdress, $birOncekiDizin, $kullaniciDil));

}

//Cart islemleri
function addToCart($product_item)
{
    if (isset($_SESSION['shoppingCart'])) {
        $shoppingCart = $_SESSION['shoppingCart'];
        $products = $shoppingCart['products'];
    } else {
        $products = array();
    }

//    PRODUCT CONTROL

    if (array_key_exists($product_item->urun_id, $products)) {
        $products[$product_item->urun_id]->count++;
    } else {
        $products[$product_item->urun_id] = $product_item;
    }
    // Calculating Cart
    $total_price = 0.0;
    $total_count = 0;
    foreach ($products as $product) {

        $product->total_price = $product->count * $product->urun_fiyat;
        $total_price = $total_price + $product->total_price;
        $total_count += $product->count;
    }
    $summary['total_price'] = $total_price;
    $summary['total_count'] = $total_count;

    $_SESSION['shoppingCart']['products'] = $products;
    $_SESSION['shoppingCart']['summary'] = $summary;

    return $total_count;
}

function removeFromCart($product_id)
{
    if (isset($_SESSION['shoppingCart'])) {
        $shoppingCart = $_SESSION['shoppingCart'];
        $products = $shoppingCart['products'];

        // Delete Product from Cart
        if (array_key_exists($product_id, $products)) {
            unset($products[$product_id]);
        }

        //Counting Cart
        $total_price = 0.0;
        $total_count = 0;
        foreach ($products as $product) {

            $product->total_price = $product->count * $product->urun_fiyat;
            $total_price = $total_price + $product->total_price;
            $total_count += $product->count;
        }
        $summary['total_price'] = $total_price;
        $summary['total_count'] = $total_count;

        $_SESSION['shoppingCart']['products'] = $products;
        $_SESSION['shoppingCart']['summary'] = $summary;

        return true;

    }
}

function incCount($product_id)
{
    if (isset($_SESSION['shoppingCart'])) {
        $shoppingCart = $_SESSION['shoppingCart'];
        $products = $shoppingCart['products'];


//    PRODUCT CONTROL
        if (array_key_exists($product_id, $products)) {
            $products[$product_id]->count++;
        }
        // Calculating Cart
        $total_price = 0.0;
        $total_count = 0;
        foreach ($products as $product) {

            $product->total_price = $product->count * $product->urun_fiyat;
            $total_price = $total_price + $product->total_price;
            $total_count += $product->count;
        }
        $summary['total_price'] = $total_price;
        $summary['total_count'] = $total_count;

        $_SESSION['shoppingCart']['products'] = $products;
        $_SESSION['shoppingCart']['summary'] = $summary;

        return true;
    }

}

function decCount($product_id)
{
    if (isset($_SESSION['shoppingCart'])) {
        $shoppingCart = $_SESSION['shoppingCart'];
        $products = $shoppingCart['products'];


//    PRODUCT CONTROL
        if (array_key_exists($product_id, $products)) {
            $products[$product_id]->count--;
            if ($products[$product_id]->count == 0) {
                unset($products[$product_id]);
            }
        }
        // Counting Cart
        $total_price = 0.0;
        $total_count = 0;
        foreach ($products as $product) {

            $product->total_price = $product->count * $product->urun_fiyat;
            $total_price = $total_price + $product->total_price;
            $total_count += $product->count;
        }
        $summary['total_price'] = $total_price;
        $summary['total_count'] = $total_count;

        $_SESSION['shoppingCart']['products'] = $products;
        $_SESSION['shoppingCart']['summary'] = $summary;

        return true;
    }
}

// Advertisements
function advertisements($n){
    GLOBAL $db;
    $ads = $db->prepare("SELECT *FROM advertisements WHERE ads_id=?");
    $ads->execute(array($n));
    $v = $ads->fetch(PDO::FETCH_ASSOC);
    echo $v['ads_code'];
}

