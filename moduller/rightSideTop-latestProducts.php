<?php
$veri = $db->prepare("SELECT *FROM urunler ORDER BY  urun_ekleme_tarihi DESC limit 3");
$veri->execute(array());
$v = $veri->fetchALL(PDO::FETCH_ASSOC);

?>
<div class="features_items">
    <h2 class="title text-center">Latest Products</h2>
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
                        <?php if (@$_SESSION) {
                            ?>
                            <button product-id="<?php echo $urun['urun_id'] ?>" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to
                                cart
                            </button>
                        <?php } ?>
                        <a href="index.php?islem=pDetails&urun_id=<?php echo $urun['urun_id'] ?>"
                           class="btn btn-default read-more"><i class="fa fa-external-link"></i> Read more</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <p><?php echo substr($urun['urun_desc'], 0, 200) ?> ...</p>
                            <h2><?php echo parayaz($urun['urun_fiyat']) ?></h2>
                            <p><?php echo $urun['urun_title'] ?></p>
                            <?php if (@$_SESSION) {
                                ?>
                                <button product-id="<?php echo $urun['urun_id'] ?>" class="btn btn-default add-to-cart">
                                    <i
                                            class="fa fa-shopping-cart"></i>Add to
                                    cart
                                </button>
                            <?php } ?>
                            <a href="index.php?islem=pDetails&urun_id=<?php echo $urun['urun_id'] ?>"
                               class="btn btn-default read-more"><i class="fa fa-external-link"></i> Read more</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
    ?>


</div>