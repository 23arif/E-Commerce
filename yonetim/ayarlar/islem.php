<?php
require_once "baglanti.php";
require_once 'class.upload.php';
require_once "function.php";

// kategori islemleri
if (g('islem') == 'kategoriEkle') {
    $kategori_ust = p('kategori_ust');
    $kategori_title = p('kategori_title');
    $kategori_desc = p('kategori_desc');
    $kategori_keyw = p('kategori_keyw');
    $kategori_durum = p('kategori_durum');

    if (empty($kategori_ust)) {
        echo '<div class="alert alert-warning">Lutfen Kategori Modelinizi seciniz</div>';
    } elseif (empty($kategori_title)) {
        echo '<div class="alert alert-warning">Lutfen Kategorinize isim belirleyin</div>';
    } elseif (empty($kategori_desc)) {
        echo '<div class="alert alert-warning">Lutfen Kategorinize aciklama belirleyin</div>';
    } elseif (empty($kategori_keyw)) {
        echo '<div class="alert alert-warning">Lutfen Kategorinize anahtar kelime belirleyin</div>';
    } elseif (empty($kategori_durum)) {
        echo '<div class="alert alert-warning">Lutfen Kategorinize durum belirleyin</div>';
    } else {
        $key = rand(99, 999);
        $key .= rand(99, 999);
        $key .= rand(99, 999);
        $key .= rand(99, 999);
        $key .= rand(99, 999);
        $key .= rand(99, 999);

        $ekle = $db->prepare("INSERT INTO kategoriler SET kategori_key=?, kategori_title=? , kategori_desc=?, kategori_keyw=?, kategori_ust=? , kategori_durum = ?");
        $ekleme = $ekle->execute(array($key, $kategori_title, $kategori_desc, $kategori_keyw, $kategori_ust, $kategori_durum));
        if ($ekleme) {
            echo "<div class='alert alert-success'>Kategori Ekleme Isleminiz Basarila Gerceklesdi.</div><meta http-equiv='refresh' content='1;url=index.php?do=categories&ekle=ok'>";

        } else {
            echo "<div class='alert alert-danger'>Kategori Ekleme Islemi Sirasinda Hata Meydana Geldi!</div>";
        }
    }
}
if (g('kategoriSil') == 'ok') {
    $sil = $db->prepare("DELETE FROM kategoriler WHERE kategori_id=?");
    $silme = $sil->execute(array(g("kategori_id")));
    if ($silme) {
        git("../index.php?do=categories&silme=ok");
    } else {
        git("../index.php?do=categories&silme=no");
    }

}
if (g('islem') == 'kategoriGuncelle') {
    $kategori_ust = p('kategori_ust');
    $kategori_title = p('kategori_title');
    $kategori_keyw = p('kategori_keyw');
    $kategori_desc = p('kategori_desc');
    $kategori_durum = p('kategori_durum');
    $kategori_id = p('kategori_id');

    if (empty($kategori_ust)) {
        echo "<div class='alert alert-warning'>Lutfen Kategori modeli secin</div>";
    } elseif (empty($kategori_title)) {
        echo "<div class='alert alert-warning'>Lutfen Kategori Ismi belirleyin</div>";
    } elseif (empty($kategori_desc)) {
        echo "<div class='alert alert-warning'>Lutfen Kategori Aciklamasi belirleyin</div>";
    } elseif (empty($kategori_keyw)) {
        echo "<div class='alert alert-warning'>Lutfen Kategori Anahtar kelimesi belirleyin</div>";
    } elseif (empty($kategori_durum)) {
        echo "<div class='alert alert-warning'>Lutfen Kategori Durumu secin</div>";
    } else {
        $guncelle = $db->prepare("UPDATE kategoriler set kategori_title=?, kategori_desc=?, kategori_keyw=?, kategori_ust=?, kategori_durum=? where kategori_id='$kategori_id'");
        $guncelleme = $guncelle->execute(array($kategori_title, $kategori_desc, $kategori_keyw, $kategori_ust, $kategori_durum));
        if ($guncelleme) {
            echo '<div class="alert alert-success">Kategori Basariyla Guncellendi.</div><meta http-equiv="refresh" content="2;url=index.php?do=categories&guncelle=ok">';
        } else {
            echo "<div class='alert alert-danger'>Kategori Guncellenerken xeta bas verdi</div>";
        }
    }
}
//session islemleri
if (g('islem') == 'yGiris') {
    $eposta = p('yeposta');
    $sifre = p('ysifre');
    $toplam = p('toplam');
    $dkodu = p('dkodu');

    if (empty($eposta)) {
        echo '<div class="alert alert-warning">Lutfen Eposta adresinizi girin</div>';
    } elseif (filter_var($eposta, FILTER_VALIDATE_EMAIL) != true) {
        echo '<div class="alert alert-warning">Lutfen Gecerli Eposta adresi girin</div>';
    } elseif (empty($sifre)) {
        echo '<div class="alert alert-warning">Lutfen Sifrenizi girin</div>';
    } elseif (empty($dkodu)) {
        echo '<div class="alert alert-warning">Lutfen Dogrulama kodu girin</div>';
    } elseif (md5($dkodu) != $toplam) {
        echo '<div class="alert alert-warning">Dogrulama kodunuz hatali</div>';
    } else {
        $veri = $db->prepare("SELECT *FROM yonetim WHERE yonetim_eposta=? AND yonetim_sifre=?");
        $veri->execute(array($eposta, $sifre));
        $v = $veri->fetchAll(PDO::FETCH_ASSOC);
        $say = $veri->rowCount();
        foreach ($v as $yonetim) ;
        if ($say) {
            if ($yonetim['yonetim_yetki'] != '1') {
                echo '<div class="alert alert-warning">Giris Yetkiniz Bulunmamakdadir</div>';
            } else {
                $_SESSION['id'] = $yonetim['yonetim_id'];
                $_SESSION['isim'] = $yonetim['yonetim_isim'];
                $_SESSION['soyisim'] = $yonetim['yonetim_soyisim'];
                $_SESSION['eposta'] = $yonetim['yonetim_eposta'];
                $_SESSION['yetki'] = $yonetim['yonetim_yetki'];

                echo '<div class="alert alert-success">Giris Basarili.Lutfen Bekleyin</div><meta http-equiv="refresh" content="2;url=index.php">';
            }
        } else {
            echo '<div class="alert alert-warning">Boyle bir Yonetici bulunmadi</div>';
        }
    }

}
if (g('islem') == 'cikis') {
    session_destroy();
    header('Location:../giris.php');
}
//Urun Islemleri
if (g('islem') == 'urunEkle') {

    $urun_kategori = p('urun_kategori');
    $urun_title = p('urun_title');
    $urun_desc = p('urun_desc');
    $urun_meta_title = p('urun_meta_title');
    $urun_meta_desc = p('urun_meta_desc');
    $urun_meta_keyw = p('urun_meta_keyw');
    $urun_firma = p('firma_isim');
    $urun_fiyat = p('urun_fiyat');
    $urun_sira = p('urun_sira');

    if (empty($urun_title)) {
        echo '<div class="alert alert-warning">Lutfen Urun Basligi girin</div>';
    } elseif (empty($urun_desc)) {
        echo '<div class="alert alert-warning">Lutfen Urun Aciklamasi girin</div>';
    } elseif (empty($urun_meta_title)) {
        echo '<div class="alert alert-warning">Lutfen Urun Meta Basligi girin</div>';
    } elseif (empty($urun_meta_desc)) {
        echo '<div class="alert alert-warning">Lutfen Urun Meta Aciklamasi girin</div>';
    } elseif (empty($urun_meta_keyw)) {
        echo '<div class="alert alert-warning">Lutfen Urun Meta Anahatar Kelimesi girin</div>';
    }elseif (empty($urun_firma)) {
        echo '<div class="alert alert-warning">Lutfen Firma Adi girin</div>';
    } elseif (empty($urun_fiyat)) {
        echo '<div class="alert alert-warning">Lutfen Urun Fiyati girin</div>';
    } elseif (empty($urun_sira)) {
        echo '<div class="alert alert-warning">Lutfen Urun Sirasi girin</div>';
    } else {

        @$name = $_FILES['urun_resim']['name'];
        $yol = '../../resimler';
        $rn = resimadi();
        $uzanti = uzanti($name);
        $vtyol = "resimler/$rn.$uzanti";

        if ($_FILES['urun_resim']["size"] > 1024 * 1024) {
            echo 'Resim boyutu 1mb-dan buyuk olamaz';
        } else {

            $resimyukleme = resimyukle('urun_resim', $rn, $yol);
            if ($resimyukleme) {


                $ekle = $db->prepare("INSERT INTO urunler SET urun_resim=?,urun_title=?,urun_desc=?,urun_meta_desc=?,urun_meta_title=?,urun_meta_keyw=?,urun_firma=?,urun_fiyat=?,urun_kategori=?,urun_sira=?");
                $ekleme = $ekle->execute(array($vtyol, $urun_title, $urun_desc, $urun_meta_desc, $urun_meta_title, $urun_meta_keyw,$urun_firma,noktasil($urun_fiyat), $urun_kategori, $urun_sira));
                if ($ekleme) {
                    echo '<div class="alert alert-success">Urun ekleme isleminiz basariyla gerceklesdirildi.Yonlendirilirsiz...</div><meta http-equiv="refresh" content="2;url=index.php?do=products">';
                } else {
                    echo '<div class="alert alert-danger">Urun ekleme islemi sirasinda xeta bas verdi.Lutfen tekrar kontol edin ve yeniden deneyin</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Urun resmi yuklenirken xeta bas verdi.Lutfen yeniden kontrol edin</div>';
            }

        }
    }
}
if (g('urunSil') == 'ok') {
    $u = urungetir(g('urun_id'));
    foreach ($u as $urun) ;
    $eskiresim = '../../' . $urun['urun_resim'];

    $sil = $db->prepare("DELETE FROM urunler WHERE urun_id=?");
    $silme = $sil->execute(array(g("urun_id")));
    if ($silme) {
        unlink($eskiresim);
        git("../index.php?do=products&silme=ok");
    } else {
        git("../index.php?do=products&silme=no");
    }

}
if (g('islem') == 'urunGuncelle') {

    $urun_id = p('urun_id');
    $urun_kategori = p('urun_kategori');
    $urun_title = p('urun_title');
    $urun_desc = p('urun_desc');
    $urun_meta_title = p('urun_meta_title');
    $urun_meta_desc = p('urun_meta_desc');
    $urun_meta_keyw = p('urun_meta_keyw');
    $urun_fiyat = noktasil(p('urun_fiyat'));
    $urun_sira = p('urun_sira');
    $urunEskiResim = urunresimgetir($urun_id);

    if (empty($urun_kategori)) {
        echo "<div class='alert alert-warning'>Urun Kategori Secin</div>";
    } elseif (empty($urun_title)) {
        echo "<div class='alert alert-warning'>Urun Basligi Yazin</div>";
    } elseif (empty($urun_desc)) {
        echo "<div class='alert alert-warning'>Urun Aciklamasi Yazin</div>";
    } elseif (empty($urun_meta_title)) {
        echo "<div class='alert alert-warning'>Urun Meta Basligi Yazin</div>";
    } elseif (empty($urun_meta_desc)) {
        echo "<div class='alert alert-warning'>Urun Meta Aciklama Yazin</div>";
    } elseif (empty($urun_meta_keyw)) {
        echo "<div class='alert alert-warning'>Urun Meta Anahtar Kelime Yazin</div>";
    } elseif (empty($urun_fiyat)) {
        echo "<div class='alert alert-warning'>Urun Fiyati Yazin</div>";
    } elseif (empty($urun_sira)) {
        echo "<div class='alert alert-warning'>Urun Sirasi Yazin</div>";
    } else {
        if ($_FILES["urun_resim"]["size"] == 0) {
            $guncelle = $db->prepare("UPDATE urunler SET urun_resim=?,urun_title=?,urun_desc=?,urun_meta_desc=?,urun_meta_title=?,urun_meta_keyw=?,urun_fiyat=?,urun_kategori=?,urun_sira=? WHERE urun_id='$urun_id'");
            $guncelleme = $guncelle->execute(array($urunEskiResim, $urun_title, $urun_desc, $urun_meta_desc, $urun_meta_title, $urun_meta_keyw, $urun_fiyat, $urun_kategori, $urun_sira));
            if ($guncelleme) {
                echo "<div class='alert alert-success'>Urun Guncelleme Islemi Ugurla bitdi</div><meta http-equiv='refresh' content='1;url=index.php?do=products&guncelle=ok'>";
            } else {
                echo "<div class='alert alert-warning'>Urun Guncelleme Islemi Sirasinda Hata Bulundu</div>";
            }
        } elseif ($_FILES["urun_resim"]["size"] > 1024 * 1024) {
            echo 'Resim boyutu 1mb-dan buyuk olamaz';
        } else {

            @$name = $_FILES['urun_resim']['name'];
            $yol = '../../resimler';
            $rn = resimadi();
            $uzanti = uzanti($name);
            $vtyol = "resimler/$rn.$uzanti";
            $resimyukleme = resimyukle('urun_resim', $rn, $yol);

            if ($resimyukleme) {
                $guncelle = $db->prepare("UPDATE urunler SET urun_resim=?,urun_title=?,urun_desc=?,urun_meta_desc=?,urun_meta_title=?,urun_meta_keyw=?,urun_fiyat=?,urun_kategori=?,urun_sira=? WHERE urun_id='$urun_id'");
                $guncelleme = $guncelle->execute(array($vtyol, $urun_title, $urun_desc, $urun_meta_desc, $urun_meta_title, $urun_meta_keyw, $urun_fiyat, $urun_kategori, $urun_sira));
                if ($guncelleme) {
                    echo "<div class='alert alert-success'>Urun Guncelleme Islemi Ugurla bitdi</div><meta http-equiv='refresh' content='1;url=index.php?do=products&guncelle=ok'>";
                    unlink("../../$urunEskiResim");
                } else {
                    echo "<div class='alert alert-warning'>Urun Guncelleme Islemi Sirasinda Hata Bulundu</div>";
                }
            }

        }

    }
}
if(g('islem') == 'siteyiGoruntule'){
    session_destroy();
    header('Location:../../index.php');

}