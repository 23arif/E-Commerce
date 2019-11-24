<?php
require_once "baglanti.php";
require_once "function.php";

if (g('islem') == 'registration') {
    $name = p('name');
    $email = p('email');
    $pass = p('pass');
    if (empty($name)) {
        echo '<div class="alert alert-warning text-center">Please,Fill the name blank</div>';
    } elseif (empty($email)) {
        echo '<div class="alert alert-warning text-center">Please,Fill the email blank</div>';
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
        echo '<div class="alert alert-warning text-center">Lutfen Gecerli Eposta adresi girin</div>';
    } elseif (empty($pass)) {
        echo '<div class="alert alert-warning  text-center">Please,Fill the password blank</div>';
    } else {
        $dublicate = $db->prepare("select *from yonetim where yonetim_isim=? or yonetim_eposta=?");
        $dublicate->execute(array($name, $email));
        $same = $dublicate->fetchAll(PDO::FETCH_ASSOC);
        $sameaccount = $dublicate->rowCount();
        if ($sameaccount > 0) {
            echo '
            <div class="alert alert-warning text-center" role="alert">Mail or Username is already existing! Redirecting...</div>';
            $url = $_SERVER['HTTP_REFERER'];  // hangi sayfadan gelindigi degerini verir.
            echo '<meta http-equiv="refresh" content="3;URL=".$url."">';
        } else {
            $veri = $db->prepare("INSERT INTO yonetim SET yonetim_eposta=?,yonetim_isim=?,yonetim_sifre=?");
            $ekleme = $veri->execute(array($email, $name, $pass));
            if ($ekleme) {
                echo "<div class='alert alert-success text-center'>Account Created Successfully! Redirecting...</div>";
                $url = $_SERVER['HTTP_REFERER'];  // hangi sayfadan gelindigi degerini verir.
                echo '<meta http-equiv="refresh" content="3;URL=".$url."">';
            } else {
                echo "<div class='alert alert-danger text-center'>There is some problems with Creating new Account! Redirecting...</div>";
                $url = $_SERVER['HTTP_REFERER'];  // hangi sayfadan gelindigi degerini verir.
                echo '<meta http-equiv="refresh" content="3;URL=".$url."">';
            }
        }
    }
}
if (g('islem') == 'signIn') {
    $username = p('username');
    $userpass = p('userpass');
    if (empty($username)) {
        echo '<div class="alert alert-warning text-center">Please, fill <strong>name</strong> blank</div>';
    } elseif (empty($userpass)) {
        echo '<div class="alert alert-warning text-center">Please, fill <strong>password</strong> blank</div>';
    } else {
        $veri = $db->prepare("SELECT *FROM yonetim where yonetim_isim=? and yonetim_sifre=? and yonetim_durum");
        $veri->execute(array($username, $userpass));
        $v = $veri->fetchALL(PDO::FETCH_ASSOC);
        $p = $veri->rowCount();
        foreach ($v as $pull) ;
        if ($p) {
            if ($pull['yonetim_durum'] != 1) {
                echo '<div class="alert alert-warning text-center">User is not confirmed !</div><meta http-equiv="refresh" content="3;url=index.php?islem=login">';
            } else {
                $_SESSION['id'] = $pull['yonetim_id'];
                $_SESSION['isim'] = $pull['yonetim_isim'];
                $_SESSION['soyisim'] = $pull['yonetim_soyisim'];
                $_SESSION['eposta'] = $pull['yonetim_eposta'];
                $_SESSION['yetki'] = $pull['yonetim_yetki'];

                echo '<div class="alert alert-success text-center">Login Completed Successfully. Redirecting...</div><meta http-equiv="refresh" content="3; url=index.php">';
            }
        } else {
            echo '<div class="alert alert-warning text-center">No such user !</div>';
        }

    }
}

//Cart Proccess
if (isset($_POST['p'])) {
    $islem = $_POST['p'];
    if ($islem == 'addToCart') {
        $id = $_POST['product_id'];
        $products = $db->prepare("SELECT *FROM urunler where urun_id=?");
        $products->execute(array($id));
        $product = $products->fetch(PDO::FETCH_OBJ);
        $product->count = 1;
        echo addToCart($product);
    } elseif ($islem == 'removeFromCart') {
        $id = $_POST['product_id'];
        echo removeFromCart($id);

    }

}
// Cart Section Total Price and Total Count
if (isset($_SESSION['shoppingCart'])) {
    $shoppingCart = $_SESSION['shoppingCart'];
    $total_count = $shoppingCart['summary']['total_count'];
    $total_price = $shoppingCart['summary']['total_price'];
    $shopping_products = $shoppingCart['products'];
} else {
    $total_count = 0;
    $total_price = 0.0;
}
if (isset($_GET['p'])) {
    $islem = $_GET['p'];
    if ($islem == 'incCount') {
        $id = $_GET['product_id'];
        if (incCount($id)) {
            header('location:index.php?islem=cart');
        }
    } elseif ($islem == 'decCount') {
        $id = $_GET['product_id'];
        if (decCount($id)) {
            header('location:index.php?islem=cart');
        }
    }

}
