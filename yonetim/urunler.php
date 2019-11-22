    <!-- start: page -->
    <header class="page-header">
        <h2>Urunler</h2>
    </header>

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="urun-ekle.php"><span href="#" class="fa fa-plus">&nbsp;&nbsp;Urun Ekle</span></a>
                    </div>

                    <h2 class="panel-title">Urunler Tablosu</h2>
                </header>
                <div class="panel-body">
                    <?php include 'inc/alert.php' ?>
                    <table class="table table-bordered table-striped mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Adi</th>
                            <th>Firma</th>
                            <th>Fiyati</th>
                            <th>Islem</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $veri = $db->prepare("SELECT *FROM urunler inner join kategoriler on kategoriler.kategori_id=urunler.urun_kategori ORDER BY urun_id DESC ");
                        $veri->execute(array());
                        $v = $veri->fetchALL(PDO::FETCH_ASSOC);
                        foreach ($v as $urunler) {
                            ?>

                            <tr class="gradeX">
                                <td width="200"><img height="105px" src="../<?php echo $urunler['urun_resim'] ?>"
                                                     alt=""></td>
                                <td><?php echo $urunler['kategori_title'] ?></td>
                                <td><?php echo $urunler['urun_title'] ?></td>
                                <td><?php echo $urunler['urun_firma'] ?></td>
                                <td><?php echo parayaz($urunler['urun_fiyat']) ?></td>
                                <td>
                                    <!--Sil Butonu -->
                                    <div id="modalFullColorPrimary<?php echo $urunler['urun_id'] ?>"
                                         class="modal-block modal-full-color modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Eminmisiniz ?</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fa fa-question-circle"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4><?php echo $urunler['urun_title'] ?> urununu
                                                            siliyosunuz.</h4>
                                                        <p> <?php echo $urunler['urun_title'] ?>&nbsp;urununu silmek
                                                            istediyinize eminsinizmi ?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <a href="ayarlar/islem.php?urunSil=ok&urun_id=<?php echo $urunler['urun_id']; ?>"
                                                           class="btn btn-danger">Sil</a>
                                                        <button class="btn btn-default modal-dismiss">Imtina Et</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                    </div>
                                    <div class="btn-group">

                                    <a class="modal-basic btn btn-xs btn-danger btn-special" data-toggle="tooltip" data-placement="top" title="Sil"
                                       href="#modalFullColorPrimary<?php echo $urunler['urun_id'] ?>"><i class="fa fa-trash"></i></a>
                                    <!--/Sil Butonu-->

                                    <!--Guncelle Butonu-->
                                    <a href="index.php?do=edit_product&urun_id=<?php echo $urunler['urun_id'] ?>" data-toggle="tooltip" data-placement="top" title="Guncelle"
                                       class="btn btn-warning btn-xs btn-special"><i class="fa fa-cog"></i></a>
                                    <!--/Guncelle Butonu-->

                                    <!--Galery Butonu-->
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Galeri Olusdurucu"
                                       class="btn btn-success btn-xs btn-special"><i class="fa fa-image"></i></a>
                                    <!--/Galery Butonu-->
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
