<?php
include_once 'baglanti.php';
//Cart Section
function addToCart($product_item){

}
function removeFromCart($product_id){

}
function incCount($product_id){

}
function decCount($product_id){

}
if(isset($_POST['p'])){
    $islem = $_POST['p'];
    if($islem == 'addToCart'){
        $id = $_POST['product_id'];
        $product = $db->prepare("SELECT *FROM urunler where urun_id=?");
        $product->execute(array($id));
        $products = $product->fetchALL(PDO::FETCH_ASSOC);
        print_r($products);
    }elseif ($islem == 'removeFromCart'){

    }
}