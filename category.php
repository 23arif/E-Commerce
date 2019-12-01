<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <!--catregory-->
                    <?php include_once 'moduller/leftSideMenu-category.php' ?>
                    <!--/catregory-->

                    <!--brands_products-->
                    <?php include_once 'moduller/leftSideMenu-brands.php' ?>
                    <!--/brands_products-->

                    <!--shipping-->
                    <?php include_once 'moduller/leftSideMenu-shipping.php' ?>
                    <!--/shipping-->

                </div>
            </div>
            <?php
            $c = g('c');
            $veri = $db->prepare("SELECT *FROM urunler where urun_kategori=? ");
            $veri->execute(array($c));
            $v = $veri->fetchALL(PDO::FETCH_ASSOC);
            ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <?php
                    $kat = $db->prepare("SELECT kategori_title FROM kategoriler where kategori_id=?");
                    $kat->execute(array($c));
                    $category = $kat->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <h2 class="title text-center"><span style="text-decoration: underline"><?php echo $category['kategori_title'] ?></span> Category Products</h2>
                    <?php
                    foreach ($v as $urun) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $urun['urun_resim'] ?>" alt=""/>
                                        <h2><?php echo parayaz($urun['urun_fiyat']) ?></h2>
                                        <p><?php echo $urun['urun_title'] ?></p>
                                        <button product-id="<?php echo $urun['urun_id'] ?>"
                                                class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Add
                                            to cart
                                        </button>
                                        <a href="?islem=pDetails&urun_id=<?php echo $urun['urun_id'] ?>"
                                           class="btn btn-default read-more"><i class="fa fa-external-link"></i> Read
                                            More</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!--features_items-->
                <ul class="pagination" >
                    <li class="active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
