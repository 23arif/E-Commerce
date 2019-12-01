<?php
$veri = $db->prepare("SELECT urun_firma,COUNT(*) FROM urunler group by urun_firma ORDER BY COUNT(*) DESC");
$veri->execute(array());
$v = $veri->fetchALL(PDO::FETCH_ASSOC);
?>
<div class="brands_products">
    <h2>Brands</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            <?php
            foreach ($v as $brand) {
                ?>
                <li><a href="?islem=brands&b=<?php echo $brand['urun_firma'] ?>"> <span class="pull-right">(<?php echo $brand['COUNT(*)'] ?>)</span><?php echo $brand['urun_firma'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>