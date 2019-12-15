<?php
require_once "baglanti.php";
require_once 'class.upload.php';
require_once "function.php";
//Settings
if (g('islem') == 'settings') {
    $settings_name = p('settings_name');
    $settings_desc = p('settings_desc');
    $settings_keyw = p('settings_keyw');
    $settings_phone = p('settings_phone');
    $settings_email = p('settings_email');
    $settings_location = p('settings_location');
    $settings_copyright = p('settings_copyright');
    $settings_facebook = p('settings_facebook');
    $settings_twitter = p('settings_twitter');
    $settings_fbSwitch = p('settings_fbSwitch');
    $settings_twitterSwitch = p('settings_twitterSwitch');
    $settings_linkedin = p('settings_linkedin');
    $settings_linkedinSwitch = p('settings_linkedinSwitch');

    if (empty($settings_name)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Web Page Name</strong> blank</div>";
    } elseif (empty($settings_desc)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Web Page Description</strong> blank</div>";
    } elseif (empty($settings_keyw)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Web Page Keyword</strong> blank</div>";
    } elseif (empty($settings_phone)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Web Page Phone</strong> blank</div>";
    } elseif (empty($settings_email)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Web Page Email</strong> blank</div>";
    } elseif (filter_var($settings_email, FILTER_VALIDATE_EMAIL) != true) {
        echo '<div class="alert alert-warning text-center">Please enter a <strong>valid email</strong> address</div>';
    } elseif (empty($settings_location)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Web Page Location</strong> blank</div>";
    } elseif (empty($settings_copyright)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Copyright</strong> blank</div>";
    } else {
        if (empty($settings_facebook)) {
            $settings_fbSwitch = 'off';
        } else {
            if (empty($settings_fbSwitch)) {
                $settings_fbSwitch = 'off';
            } else {
                $settings_fbSwitch = 'on';
            }
        }
        if (empty($settings_twitter)) {
            $settings_twitterSwitch = 'off';
        } else {
            if (empty($settings_twitterSwitch)) {
                $settings_twitterSwitch = 'off';
            } else {
                $settings_twitterSwitch = 'on';
            }
        }
        if (empty($settings_linkedin)) {
            $settings_linkedinSwitch = 'off';
        } else {
            if (empty($settings_linkedinSwitch)) {
                $settings_linkedinSwitch = 'off';
            } else {
                $settings_linkedinSwitch = 'on';
            }
        }


        $veri = $db->prepare("UPDATE settings SET settings_name=?,settings_desc=?,settings_keywords=?,settings_phone=?,settings_email=?,settings_location=?,settings_copyright=?,settings_facebook=?,settings_fbSwitch=?,settings_twitter=?,settings_twitterSwitch=?,settings_linkedin=?,settings_linkedinSwitch=? WHERE settings_id=1");
        $veri->execute(array($settings_name, $settings_desc, $settings_keyw, $settings_phone, $settings_email, $settings_location, $settings_copyright, $settings_facebook, $settings_fbSwitch, $settings_twitter, $settings_twitterSwitch, $settings_linkedin, $settings_linkedinSwitch));
        if ($veri) {
            echo "<div class='alert alert-success text-center'>Settings updated successfully.</div><meta http-equiv='refresh' content='1;url=index.php?do=settings'>";
        } else {
            echo "<div class='alert alert-success text-center'>Error while updating.</div><meta http-equiv='refresh' content='1;url=index.php?do=settings'>";
        }
    }
}
// kategori islemleri
if (g('islem') == 'kategoriEkle') {
    $kategori_ust = p('kategori_ust');
    $kategori_title = p('kategori_title');
    $kategori_desc = p('kategori_desc');
    $kategori_keyw = p('kategori_keyw');
    $kategori_durum = p('kategori_durum');

    if (empty($kategori_ust)) {
        echo "<div class='alert alert-warning text-center'>Please,choose <strong>Category Model</strong></div>";
    } elseif (empty($kategori_title)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category title</strong> blank</div>";
    } elseif (empty($kategori_desc)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category Description</strong> blank</div>";
    } elseif (empty($kategori_keyw)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category Keyword</strong> blank</div>";
    } elseif (empty($kategori_durum)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category Status</strong> blank</div>";
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
            echo "<div class='alert alert-success'>Adding category completed successfully.</div><meta http-equiv='refresh' content='1;url=index.php?do=categories&ekle=ok'>";

        } else {
            echo '<div class="alert alert-danger text-center">Error while adding category!</div>';
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
        echo "<div class='alert alert-warning text-center'>Please,choose <strong>Category model</strong></div>";
    } elseif (empty($kategori_title)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category title</strong> blank</div>";
    } elseif (empty($kategori_desc)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category Description</strong> blank</div>";
    } elseif (empty($kategori_keyw)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category Keyword</strong> blank</div>";
    } elseif (empty($kategori_durum)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>Category Status</strong> blank</div>";
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
        $veri->execute(array($eposta, md5($sifre)));
        $v = $veri->fetchAll(PDO::FETCH_ASSOC);
        $say = $veri->rowCount();
        foreach ($v as $yonetim) ;
        if ($say) {
            if ($yonetim['yonetim_yetki'] != '1') {
                echo '<div class="alert alert-warning text-center">You are not authorized to login</div>';
            } else {
                $_SESSION['id'] = $yonetim['yonetim_id'];
                $_SESSION['isim'] = $yonetim['yonetim_isim'];
                $_SESSION['soyisim'] = $yonetim['yonetim_soyisim'];
                $_SESSION['eposta'] = $yonetim['yonetim_eposta'];
                $_SESSION['yetki'] = $yonetim['yonetim_yetki'];

                echo '<div class="alert alert-success text-center">Login Successful.Please Wait.</div><meta http-equiv="refresh" content="2;url=index.php">';
            }
        } else {
            echo '<div class="alert alert-warning text-center">No such Admin</div>';
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
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product title</strong> blank</div>";
    } elseif (empty($urun_desc)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product description</strong> blank</div>";
    } elseif (empty($urun_meta_title)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product meta title</strong> blank</div>";
    } elseif (empty($urun_meta_desc)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product meat description</strong> blank</div>";
    } elseif (empty($urun_meta_keyw)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product meta keyword</strong> blank</div>";
    } elseif (empty($urun_firma)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product firm name</strong> blank</div>";
    } elseif (empty($urun_fiyat)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product price</strong> blank</div>";
    } elseif (empty($urun_sira)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product queue</strong> blank</div>";
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
                $ekleme = $ekle->execute(array($vtyol, $urun_title, $urun_desc, metaWords($urun_meta_desc), metaWords($urun_meta_title), $urun_meta_keyw, $urun_firma, noktasil($urun_fiyat), $urun_kategori, $urun_sira));
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
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product category</strong> blank</div>";
    } elseif (empty($urun_title)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product title</strong> blank</div>";
    } elseif (empty($urun_desc)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product description</strong> blank</div>";
    } elseif (empty($urun_meta_title)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product meta title</strong> blank</div>";
    } elseif (empty($urun_meta_desc)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product meta description</strong> blank</div>";
    } elseif (empty($urun_meta_keyw)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product meta keyword</strong> blank</div>";
    } elseif (empty($urun_fiyat)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product price</strong> blank</div>";
    } elseif (empty($urun_sira)) {
        echo "<div class='alert alert-warning text-center'>Please,fill <strong>product queue</strong> blank</div>";
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

//Siteyi Goster
if (g('islem') == 'siteyiGoruntule') {
    header('Location:../../index.php');
}

// Advertisement
if (g('islem') == 'addAds') {
    $ads_name = p('ads_name');
    $ads_url = p('ads_url');
    $ads_status = p('ads_status');

    if (empty($ads_name)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>name</strong> blank</div>';
    } elseif (empty($ads_status)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>status</strong> blank</div>';
    } else {
        @$name = $_FILES['ads_img']['name'];
        $yol = '../../uploads/elan';
        $rn = resimadi();
        $uzanti = uzanti($name);
        $vtyol = "uploads/elan/$rn.$uzanti";

        if ($_FILES['ads_img']["size"] > 1024 * 1024) {
            echo '<div class="alert alert-warning text-center">Image size doesn\'t get bigger than 1mb</div>';
        } else {

            $resimyukleme = resimyukle2('ads_img', $rn, $yol);
            if ($resimyukleme) {
                $veri = $db->prepare("INSERT INTO advertisements SET ads_name=?, ads_code=?,ads_url=?, ads_status=?");
                $veri->execute(array($ads_name, $vtyol, $ads_url, $ads_status));
                if ($veri) {
                    echo '<div class="alert alert-success text-center">Advertisements added successfully</div><meta http-equiv="refresh" content="3;url=?do=advertisements">';
                } else {
                    echo '<div class="alert alert-danger text-center">Error while adding!</div><meta http-equiv="refresh" content="3;url=?do=advertisements">';
                }
            } else {
                echo '<div class="alert alert-warning text-center">Error while uploading advertisement image! Please,control again.</div>';
            }
        }
    }
}
if (g('deleteAds') == 'ok') {
    $ads_id = g('ads_id');
    $veri = $db->prepare("SELECT *FROM advertisements WHERE ads_id=?");
    $veri->execute(array($ads_id));
    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
    foreach ($v as $ads) ;
    $eskiresim = '../../' . $ads['ads_code'];

    $sil = $db->prepare("DELETE FROM advertisements WHERE ads_id=?");
    $silme = $sil->execute(array($ads_id));
    if ($silme) {
        unlink($eskiresim);
        git("../index.php?do=advertisements&silme=ok");
    } else {
        git("../index.php?do=advertisements&silme=no");
    }
}
if (g('islem') == 'updateAds') {
    $ads_name = p('ads_name');
    $ads_url = p('ads_url');
    $ads_status = p('ads_status');
    $ads_id = p('ads_id');

    if (empty($ads_name)) {
        echo "<div class='alert alert-warning text-center'>Please, fill <strong>name</strong> blank</div>";
    } elseif (empty($ads_status)) {
        echo "<div class='alert alert-warning text-center'>Please, fill <strong>status</strong> blank</div>";
    } else {
        $veri = $db->prepare("UPDATE advertisements SET ads_name=?,ads_url=?, ads_status=? WHERE ads_id='$ads_id'");
        $veri->execute(array($ads_name, $ads_url, $ads_status));
        if ($veri) {
            echo '<div class="alert alert-success text-center">Advertisement updated successfully</div><meta http-equiv="refresh" content="3;url=index.php?do=advertisements&guncelle=ok">';
        } else {
            echo '<div class="alert alert-danger text-center">Advertisement could not updating</div><meta http-equiv="refresh" content="3;url=index.php?do=advertisements">';
        }
    }
}

//Slide
if (g('islem') == 'addSlide') {
    $slide_name = p('slide_name');
    $slide_url = p('slide_url');
    $slide_queue = p('slide_queue');

    if (empty($slide_name)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>name</strong> blank</div>';
    } elseif (empty($slide_url)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>url</strong> blank</div>';
    } elseif (empty($slide_queue)) {
        echo '<div class="alert alert-warning text-center">Please,fill <strong>queue</strong> blank</div>';
    } else {

        $query = $db->prepare("SELECT slider_queue FROM slider WHERE  slider_queue=?");
        $query->execute(array($slide_queue));
        $v = $query->fetchALL(PDO::FETCH_ASSOC);
        $s = $query->rowCount();
        if ($s) {
            ?>
            <div class="alert alert-warning text-center">
                "<strong><?php echo $slide_queue ?></strong>" queue number is already existed . Please, change <strong>queue</strong>
                number.
            </div>
            <?php
        } else {
            @$name = $_FILES['slide_img']['name'];
            $yol = '../../uploads/slide';
            $rn = resimadi();
            $uzanti = uzanti($name);
            $vtyol = "uploads/slide/$rn.$uzanti";

            if ($_FILES['slide_img']["size"] > 1024 * 1024) {
                echo '<div class="alert alert-warning text-center">Image size doesn\'t get bigger than 1mb</div>';
            } else {

                $resimyukleme = resimyukle2('slide_img', $rn, $yol);
                if ($resimyukleme) {
                    $veri = $db->prepare("INSERT INTO slider SET slider_name=?, slider_path=?, slider_url=?,slider_queue=?");
                    $veri->execute(array($slide_name, $vtyol, $slide_url, $slide_queue));
                    if ($veri) {
                        echo '<div class="alert alert-success text-center">Slide added successfully</div><meta http-equiv="refresh" content="3;url=?do=slider">';
                    } else {
                        echo '<div class="alert alert-danger text-center">Error while adding!</div><meta http-equiv="refresh" content="3;url=?do=slider">';
                    }
                } else {
                    echo '<div class="alert alert-warning text-center">Error while uploading slide image! Please,control again.</div>';
                }
            }
        }
    }
}
if (g('deleteSlide') == 'ok') {
    $slide_id = g('slide_id');
    $veri = $db->prepare("SELECT *FROM slider WHERE slider_id=?");
    $veri->execute(array($slide_id));
    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
    foreach ($v as $slide) ;
    $eskiresim = '../../' . $slide['slider_path'];

    $sil = $db->prepare("DELETE FROM slider WHERE slider_id=?");
    $silme = $sil->execute(array($slide_id));
    if ($silme) {
        unlink($eskiresim);
        git("../index.php?do=slider&silme=ok");
    } else {
        git("../index.php?do=slider&silme=no");
    }
}
if (g('islem') == 'updateSlide') {

    $slider_id = p('slider_id');
    $slider_name = p('slider_name');
    $slider_url = p('slider_url');
    $slider_queue = p('slider_queue');

    if (empty($slider_name)) {
        echo "<div class='alert alert-warning text-center'>Please, fill <strong>name</strong> blank</div>";
    } elseif (empty($slider_url)) {
        echo "<div class='alert alert-warning text-center'>Please, fill <strong>url</strong> blank</div>";
    } elseif (empty($slider_queue)) {
        echo "<div class='alert alert-warning text-center'>Please, fill <strong>queue</strong> blank</div>";
    } else {
        $veri = $db->prepare("UPDATE slider  SET slider_name=?,slider_url=?,slider_queue=? WHERE slider_id='$slider_id'");
        $veri->execute(array($slider_name, $slider_url, $slider_queue));
        if ($veri) {
            echo '<div class="alert alert-success text-center">Slide Image updated successfully</div><meta http-equiv="refresh" content="3;url=index.php?do=slider&guncelle=ok">';
        } else {
            echo '<div class="alert alert-danger text-center">Slider Image could not updating</div><meta http-equiv="refresh" content="3;url=index.php?do=slider">';
        }
    }
}

//Slide Toggle
if (g('islem') == 'slideToggle') {
    $slide_toggle = p('slide_toggle');
    if (empty($slide_toggle)) {
        $veri = $db->prepare("UPDATE settings SET settings_slider='0'  WHERE settings_id='1'");
        $veri->execute(array());
        if ($veri) {
            echo '<meta http-equiv="refresh" content="0;url=?do=slider&deactivatingSlider=ok">';
        }else{
            echo '<div class="alert alert-danger">Error while deactivating slider</div><meta http-equiv="refresh" content="3;url=?do=slider">';
        }
    } else {
        $veri = $db->prepare("UPDATE settings SET settings_slider='1'  WHERE settings_id='1'");
        $veri->execute(array());
        if ($veri) {
            echo '<meta http-equiv="refresh" content="0;url=?do=slider&activatingSlider=ok">';
        }else{
            echo '<div class="alert alert-danger">Error while activating slider</div><meta http-equiv="refresh" content="3;url=?do=slider">';
        }
    }
}