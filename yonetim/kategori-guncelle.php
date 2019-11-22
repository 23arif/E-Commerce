<?php
$kategori_id = g('kategori_id');
$veri = $db->prepare("SELECT * FROM kategoriler WHERE kategori_id='$kategori_id'");
$veri->execute(array());
$v = $veri->fetchAll(PDO::FETCH_ASSOC);
foreach ($v as $kategori) ;
$k_ust = $kategori['kategori_ust'];
?>
    <!-- start: page -->
    <header class="page-header">
        <h2>Kategori Guncelle</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">"<?php echo $kategori['kategori_title'] ?>" Guncelleme paneli</h2>
                </header>
                <div class="panel-body">
                    <div id="kategoriGuncelleAlert"></div>
                    <form id="kategoriGuncelleForm" class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Kategori Modeli</label>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori_ust">
                                    <option value="00">Ana Kategori</option>
                                    <?php
                                    $veri = $db->prepare('SELECT * FROM kategoriler WHERE kategori_durum="1"');
                                    $veri->execute(array());
                                    $v = $veri->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($v as $kat) {
                                        $kate_id = $kat['kategori_id'];
                                        ?>
                                        <option <?php echo $kate_id == $k_ust ? 'selected' : ''; ?>
                                                value="<?php echo $kat['kategori_id']; ?>"><?php echo $kat['kategori_title']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Kategori Baslik</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_title" value="<?php echo $kategori['kategori_title'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Kategori Aciklama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_desc" value="<?php echo $kategori['kategori_desc'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Anahtar Kelimeler</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_keyw"  value="<?php echo $kategori['kategori_keyw'] ?>" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kategori Durum</label>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori_durum">
                                    <option <?php echo $kategori['kategori_durum']==1 ? 'selected': ''; ?> value="1">Aktiv</option>
                                    <option <?php echo $kategori['kategori_durum']==0 ? 'selected': ''; ?> value="00">Passiv</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $kategori_id ?>" name="kategori_id">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="kategoriGuncelleBtn" class="btn btn-primary btn-lg pull-right">Kategori Duzenle</div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
