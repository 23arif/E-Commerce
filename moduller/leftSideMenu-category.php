<?php
$veri = $db->prepare("SELECT * FROM kategoriler ORDER BY kategori_id ASC");
$veri->execute(array());
$v = $veri->fetchAll(PDO::FETCH_ASSOC);
$say = $veri->rowCount();
?>
<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">

                <?php
                foreach ($v as $kat) {
                    echo '<a href="" style="display:block">' . $kat['kategori_title'] . '</a><br>';
                }
                ?>
            </h4>
        </div>
    </div>

</div>