<!-- start: page -->
<header class="page-header">
    <h2>Categories</h2>
</header>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="?do=add_category"><span href="#"
                                                      class="fa fa-plus">&nbsp;&nbsp;Add New Category</span></a>
                </div>

                <h2 class="panel-title">Category Table</h2>
            </header>
            <div class="panel-body">
                <?php include 'inc/alert.php' ?>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Category Status</th>
                        <th>Process</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    function kategori($k_id = 0, $st = 0)
                    {

                        Global $db;
                        $veri = $db->prepare("SELECT * FROM kategoriler WHERE kategori_ust='$k_id' ORDER BY kategori_id ASC");
                        $veri->execute(array());
                        $v = $veri->fetchAll(PDO::FETCH_ASSOC);
                        $say = $veri->rowCount();

                        if ($say) {

                            foreach ($v as $tumkategoriler) {
                                ?>
                                <tr class="gradeX">
                                    <td><?php echo str_repeat("<span class='fa fa-arrow-right'></span>", $st) . $tumkategoriler['kategori_title']; ?></td>
                                    <td><?php echo $tumkategoriler['kategori_desc']; ?></td>
                                    <td>
                                        <?php
                                        echo $tumkategoriler['kategori_durum'] == 1 ? '<div class="label label-success">Active</div>' : '<div class="label label-danger ">Passiv</div>';
                                        ?>
                                    </td>
                                    <td>
                                        <!--Sil Butonu -->
                                        <div id="modalFullColorPrimary<?php echo $tumkategoriler['kategori_id'] ?>"
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
                                                            <h4><?php echo $tumkategoriler['kategori_title'] ?></h4>
                                                            <p>Do you really want to delete "<?php echo $tumkategoriler['kategori_title'] ?>" category ?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <footer class="panel-footer">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <a href="ayarlar/islem.php?kategoriSil=ok&kategori_id=<?php echo $tumkategoriler['kategori_id'] ?>"
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
                                               href="#modalFullColorPrimary<?php echo $tumkategoriler['kategori_id'] ?>"
                                               data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            <!--/Sil Butonu-->

                                            <!--Guncelle Butonu-->
                                            <a href="index.php?do=edit_category&kategori_id=<?php echo $tumkategoriler['kategori_id'] ?>"
                                               class="btn btn-warning btn-xs btn-special" data-toggle="tooltip"
                                               data-placement="top" title="Update"><i class="fa fa-cog"></i></a>
                                            <!--/Guncelle Butonu-->
                                        </div>
                                    </td>
                                </tr>
                                <?php kategori($tumkategoriler['kategori_id'], $st + 1); ?>
                                <?php
                            }

                        }
                    } ?>
                    <?php kategori(); ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</div>
