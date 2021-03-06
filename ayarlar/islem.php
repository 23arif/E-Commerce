<?php
require_once "baglanti.php";
require_once "function.php";

if (g('islem') == 'registration') {
    $name = p('name');
    $email = p('email');
    $pass = p('pass');
    $onay_kod = md5(rand(0, 9999));

    if (empty($name)) {
        echo '<div class="alert alert-warning text-center">Please,Fill the name blank</div>';
    } elseif (empty($email)) {
        echo '<div class="alert alert-warning text-center">Please,Fill the email blank</div>';
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
        echo '<div class="alert alert-warning text-center">Please enter a valid E-mail address</div>';
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
            $veri = $db->prepare("INSERT INTO yonetim SET yonetim_eposta=?,yonetim_isim=?,yonetim_sifre=?,yonetim_onay_kod=?");
            $ekleme = $veri->execute(array($email, $name, $pass, $onay_kod));
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

                echo '<div class="alert alert-success text-center">Login Successful.Please Wait...</div><meta http-equiv="refresh" content="3; url=index.php">';
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
//IncCount DecCount
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
//IncCount DecCount for checkout page
if (isset($_GET['p'])) {
    $islem = $_GET['p'];
    if ($islem == 'incCountCheckOut') {
        $id = $_GET['product_id'];
        if (incCount($id)) {
            header('location:index.php?islem=checkout&#pMovingCtrl');
        }
    } elseif ($islem == 'decCountCheckOut') {
        $id = $_GET['product_id'];
        if (decCount($id)) {
            header('location:index.php?islem=checkout&#pMovingCtrl');
        }
    }

}

// Contact Us
if (g('islem') == 'contactUs') {
    $name = p('name');
    $email = p('email');
    $subject = p('subject');
    $message = p('message');

    if (empty($name)) {
        echo '<div class="alert alert-warning text-center">Please, fill <strong>name</strong> blank</div>';
    } elseif (empty($email)) {
        echo '<div class="alert alert-warning text-center">Please, fill <strong>email</strong> blank</div>';
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
        echo '<div class="alert alert-warning text-center">Please enter a <strong>valid email</strong> address</div>';
    } elseif (empty($subject)) {
        echo '<div class="alert alert-warning text-center">Please, fill <strong>subject</strong> blank</div>';
    } elseif (empty($message)) {
        echo '<div class="alert alert-warning text-center">Please, fill <strong>message</strong> blank</div>';
    } else {

        $msg = $db->prepare("INSERT INTO message SET sender_name=?,sender_email=?,message_subject=?,message_content=?");
        $m = $msg->execute(array($name, $email, $subject, $message));
        if ($m) {
            echo '<div class="alert alert-success text-center">Message sended successfully.</div>';
            echo "<meta http-equiv='refresh' content='3;url=index.php?islem=contact-us'>";
        } else {
            echo '<div class="alert alert-warning text-center">Message could not be sent!</div>';
            echo "<meta http-equiv='refresh' content='3;url=index.php?islem=contact-us'>";
        }
    }
}

// Search
if (g('islem') == 'search') {
    sleep(1);
    $value = $_POST['value'];

    if (empty($value)) {
        echo '<div style="padding: 5px">You need to write what you want to search</div>';
    } else {
        $veri = $db->prepare("SELECT *FROM urunler WHERE urun_title LIKE ?");
        $veri->execute(array('%' . $value . '%'));
        $v = $veri->fetchALL(PDO::FETCH_ASSOC);
        $l = $veri->rowCount();

        if ($l) {
            foreach ($v as $g) {
                ?>
                <a href="?islem=pDetails&urun_id=<?php echo $g['urun_id'] ?>">
                    <div id="productLister"><?php echo $g['urun_title'] ?></div>
                </a>
                <?php
            }
        } else {
            echo '<div style="padding: 5px">No results found !</div>';
        }
    }
}

// Add to cart on product details page
if (g('islem') == 'check') {
    if (@!$_SESSION) {
        echo '<div class="alert alert-warning text-center"><a href="?islem=login" style="font-weight: bold;text-decoration: underline" class="text-warning">Login</a> before adding product to cart.</div>';
    }
}

// Reviews Form
if (g('islem') == 'reviews') {
    $reviewed_product = p('reviewed_product');
    $review_author = p('review_author');
    $review_email = p('review_email');
    $review_content = p('review_content');
    $review_rate = p('review_rate');

    if (empty($review_author)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>name</strong> blank.</div>';
    } elseif (empty($review_email)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>email</strong> blank.</div>';
    } elseif (filter_var($review_email, FILTER_VALIDATE_EMAIL) != true) {
        echo '<div class="alert alert-warning text-center">Please enter a <strong>valid email</strong> address.</div>';
    } elseif (empty($review_content)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>review</strong> blank.</div>';
    } else {
        $review = $db->prepare("INSERT INTO reviews SET review_author=?,review_email=?,review_content=?,review_rate=?,reviewed_product=? ");
        $review->execute(array($review_author, $review_email, $review_content, $review_rate, $reviewed_product));
        if ($review) {
            echo '<div class="alert alert-success text-center">Review added successfully.</div>';
        } else {
            echo '<div class="alert alert-danger text-center">Error while adding review.</div>';
        }
    }
}

//Checkout Submiting orders
if (g('islem') == 'submitOrders') {
    $customerFirstName = p('customerFirstName');
    $customerLastName = p('customerLastName');
    $customerEmail = p('customerEmail');
    $customerAddress1 = p('customerAddress1');
    $customerAddress2 = p('customerAddress2');
    $customerZip = p('customerZip');
    $customerCountry = p('customerCountry');
    $customerState = p('customerState');
    $customerPhone = p('customerPhone');
    $customerMobile = p('customerMobile');
    $customerNotes = p('customerNotes');
    $paymentType = p('paymentType');

    if (empty($customerFirstName) || empty($customerLastName) || empty($customerEmail) || empty($customerAddress1) || empty($customerAddress2) || empty($customerZip) || empty($customerCountry) || empty($customerState) || empty($customerPhone) || empty($customerMobile) || empty($customerNotes) || empty($paymentType)) {
        $data['status'] = 'info';
        $data['title'] = 'Attention!';
        $data['message'] = 'Please,fill in all blanks';
        echo json_encode($data);
    } elseif (filter_var($customerEmail, FILTER_VALIDATE_EMAIL) != true) {
        $data['status'] = 'info';
        $data['title'] = 'Attention!';
        $data['message'] = 'Please enter a valid e-mail address!';
        echo json_encode($data);
    } else {
        $veri = $db->prepare("INSERT INTO  orders SET order_firstname=?,order_lastname=?,order_email=?,order_ad_first=?,order_ad_second=?,order_zip=?,order_country=?,order_state=?,order_phone=?,order_mobile=?,order_notes=?,order_payment_type=?");
        $ekleme = $veri->execute(array($customerFirstName,$customerLastName,$customerEmail,$customerAddress1,$customerAddress2,$customerZip,$customerCountry,$customerState,$customerPhone,$customerMobile,$customerNotes,$paymentType));

        if($ekleme){
            $data['status'] = 'success';
            $data['title'] = 'Cangrulation!';
            $data['message'] = 'Order submitted successfully.';
            echo json_encode($data);
        }else{
            $data['status'] = 'error';
            $data['title'] = 'Error!';
            $data['message'] = 'Order could not submitted.';
            echo json_encode($data);
        }
    }
}


