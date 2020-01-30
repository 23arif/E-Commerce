<head><title>Update Category | AlikExpress</title></head>
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
        <h2>Category Update</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   <h2 class="panel-title">Update panel of &nbsp;"<?php echo $kategori['kategori_title'] ?>" category</h2>
                </header>
                <div class="panel-body">
                    <div id="kategoriGuncelleAlert"></div>
                    <form id="kategoriGuncelleForm" class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Category Model</label>
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
                            <label class="col-md-3 control-label" for="inputDefault">Category Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_title" value="<?php echo $kategori['kategori_title'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Category Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_desc" value="<?php echo $kategori['kategori_desc'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Keywords</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_keyw"  value="<?php echo $kategori['kategori_keyw'] ?>" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category Status</label>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori_durum">
                                    <option <?php echo $kategori['kategori_durum']==1 ? 'selected': ''; ?> value="1">Active</option>
                                    <option <?php echo $kategori['kategori_durum']==0 ? 'selected': ''; ?> value="00">Passiv</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $kategori_id ?>" name="kategori_id">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="kategoriGuncelleBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-cogs"></i> Update Category</div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
