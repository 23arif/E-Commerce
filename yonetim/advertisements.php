<!-- start: page -->
<header class="page-header">
    <h2>Advertisements</h2>
</header>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="?do=add_ads"><span href="#"
                                                      class="fa fa-plus">&nbsp;&nbsp;Add Advertisement</span></a>
                </div>

                <h2 class="panel-title">Advertisements Table</h2>
            </header>
            <div class="panel-body">
                <?php include 'inc/alert.php' ?>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                    <tr>
                        <th>Advertisement Name</th>
                        <th>Advertisement Date</th>
                        <th>Advertisement Status</th>
                        <th>Process</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $veri = $db->prepare("SELECT *FROM advertisements");
                    $veri->execute(array());
                    $v = $veri->fetchALL(PDO::FETCH_ASSOC);
                    foreach($v as $ads){
                    ?>
                    <tr class="gradeX">
                        <td><?php echo $ads['ads_name'] ?></td>
                        <td><?php echo $ads['ads_date']; ?></td>
                        <td>
                            <?php
                            echo $ads['ads_status'] == 1 ? '<div class="label label-success">Aktiv</div>' : '<div class="label label-danger ">Passiv</div>';
                            ?>
                        </td>
                        <td>
                            <!--Sil Butonu -->
                            <div id="modalFullColorPrimary<?php echo $ads['ads_id'] ?>"
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
                                                <h4><?php echo $ads['ads_name'] ?></h4>
                                                <p>Do you really want to delete "<?php echo $ads['ads_name'] ?>" advertisement</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <a href="ayarlar/islem.php?deleteAds=ok&ads_id=<?php echo $ads['ads_id'] ?>"
                                                   class="btn btn-danger">Delete</a>
                                                <button class="btn btn-default modal-dismiss">Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </footer>
                                </section>
                            </div>
                            <div class="btn-group">
                                <!--Sil Butonu-->
                                <a class="modal-basic btn btn-xs btn-danger btn-special"
                                   href="#modalFullColorPrimary<?php echo $ads['ads_id'] ?>"
                                   data-toggle="tooltip" data-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></a>
                                <!--/Sil Butonu-->

                                <!--Guncelle Butonu-->
                                <a href="index.php?do=edit_advertisement&kategori_id=<?php echo $ads['ads_id'] ?>"
                                   class="btn btn-warning btn-xs btn-special" data-toggle="tooltip"
                                   data-placement="top" title="Update"><i class="fa fa-cog"></i></a>
                                <!--/Guncelle Butonu-->
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</div>
