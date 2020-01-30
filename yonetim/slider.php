<head><title>Sliders | AlikExpress</title></head>
<?php
$cog = $db->prepare("SELECT settings_slider FROM settings");
$cog->execute(array());
$sl = $cog->fetch(PDO::FETCH_ASSOC);
?>
<header class="page-header">
    <h2>Slider Images</h2>
</header>
<!-- start: page -->

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <?php
                    if ($sl['settings_slider'] == 1) {
                        ?>
                        <a href="?do=add_slide"><span href="#"
                                                      class="fa fa-plus">&nbsp;&nbsp;Add New Slider Image</span></a>
                        <?php
                    }
                    ?>
                </div>

                <h2 class="panel-title">Slider Images Table &nbsp;
                    <div class="switch switch-sm switch-dark">
                        <form id="slideToggleForm" class="form-horizontal form-bordered">
                            <input type="checkbox" name="slide_toggle" id="slide_toggle"
                                   data-plugin-ios-switch <?php if ($sl['settings_slider'] == '1') {
                                echo 'checked="checked"';
                            } ?> />
                        </form>
                    </div>
                </h2>
            </header>
            <div class="panel-body">
                <div id="slideToggleAlert"></div>
                <?php include 'inc/alert.php' ?>
                <?php
                if ($sl['settings_slider'] == 1) {
                    ?>
                    <table class="table table-bordered table-striped mb-none">
                        <thead>
                        <tr>
                            <th>#id</th>
                            <th>Slide Img</th>
                            <th>Slide Name</th>
                            <th>Slide Path</th>
                            <th>Slide Queue</th>
                            <th>Slide Url</th>
                            <th>Process</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $veri = $db->prepare("SELECT *FROM slider ORDER BY slider_queue ASC");
                        $veri->execute(array());
                        $v = $veri->fetchALL(PDO::FETCH_ASSOC);
                        foreach ($v as $slide) {
                            ?>
                            <tr class="gradeX">

                                <td><?php echo $slide['slider_id']; ?></td>
                                <td style="width: 300px;height: 150px"><img
                                            src="../<?php echo $slide['slider_path']; ?>"
                                            style="max-width: 100%;height: 100%"></td>
                                <td><?php echo $slide['slider_name']; ?></td>
                                <td><?php echo $slide['slider_path']; ?></td>
                                <td><?php echo $slide['slider_queue']; ?></td>
                                <td><?php echo $slide['slider_url']; ?></td>
                                <td>
                                    <!--Sil Butonu -->
                                    <div id="modalFullColorPrimary<?php echo $slide['slider_id'] ?>"
                                         class="modal-block modal-full-color modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Are you sure ?</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fa fa-question-circle"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4><?php echo $slide['slider_name'] ?></h4>
                                                        <p>Do you really want to delete
                                                            "<?php echo $slide['slider_name'] ?>" slide ?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <a href="ayarlar/islem.php?deleteSlide=ok&slide_id=<?php echo $slide['slider_id'] ?>"
                                                           class="btn btn-danger">Delete</a>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>
                                    <div class="btn-group">
                                        <!--Sil Butonu-->
                                        <a class="modal-basic btn btn-xs btn-danger btn-special"
                                           href="#modalFullColorPrimary<?php echo $slide['slider_id'] ?>"
                                           data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        <!--/Sil Butonu-->

                                        <!--Guncelle Butonu-->
                                        <a href="index.php?do=update_slide&slide_id=<?php echo $slide['slider_id'] ?>"
                                           class="btn btn-warning btn-xs btn-special" data-toggle="tooltip"
                                           data-placement="top" title="Update"><i class="fa fa-cog"></i></a>
                                        <!--/Guncelle Butonu-->
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo '<div class="alert alert-info text-center">Slider deactivated.For activating slider again switch button on.</div>';
                }
                ?>

            </div>
        </section>

    </div>

</div>
