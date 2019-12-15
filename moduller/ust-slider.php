<?php
$veri = $db->prepare("SELECT *FROM slider ORDER BY slider_queue ASC");
$veri->execute(array());
$v = $veri->fetchALL(PDO::FETCH_ASSOC);

$toogle = $db->prepare("SELECT settings_slider FROM settings WHERE settings_id='1'");
$toogle->execute(array());
$t = $toogle->fetch(PDO::FETCH_ASSOC);
if($t['settings_slider']==1){
   ?>
    <section id="slider">
        <div class="container">
            <div class="row col-sm-12">
                <div class="col-sm-7">
                    <h1><b><span style="color:#f39313">Alik</span><span style="color:#e43326">Express</span></b></h1>
                    <p style="font-size: 25px;font-weight: bolder">Shopping never had been exciting like now!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. </p>
                    <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="col-sm-5" style="margin: 0!important;padding: 0!important;">
                    <div class="owl-carousel owl-theme">
                        <?php foreach ($v as $slide) { ?>
                            <div><img src="<?php echo $slide['slider_path']?>" class="sekil"></div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
   <?php
}
?>

