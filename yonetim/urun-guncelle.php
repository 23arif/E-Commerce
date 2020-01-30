<head><title>Update Products | AlikExpress</title></head>
<?php
$urun_id = g('urun_id');
foreach (urungetir($urun_id) as $urun);
?>
    <!-- start: page -->
    <header class="page-header">
        <h2>Product Update Panel</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>

                    <h2 class="panel-title">
                        Update panel of &nbsp;<strong>" <?php echo $urun['urun_title'] ?> "&nbsp;</strong> product.
                    </h2>
                </header>
                <div class="panel-body">
                    <div id="urunGuncelleAlert"></div>
                    <form id="urunGuncelleForm" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image</label>
                            <div class="col-md-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"><?php echo $urun['urun_resim'] ?></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="urun_resim"/>
															</span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Category</label>
                            <div class="col-md-6">
                                <select class="form-control" name="urun_kategori">
                                    <?php
                                    $veri = $db->prepare('SELECT * FROM kategoriler WHERE kategori_durum="1"');
                                    $veri->execute(array());
                                    $v = $veri->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($v as $kat) {
                                        ?>
                                        <option <?php echo $kat["kategori_id"] == $urun["urun_kategori"] ? "selected" : "";  ?> value="<?php echo $kat['kategori_id'] ?>"><?php echo $kat['kategori_title'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_title" value="<?php echo $urun['urun_title'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="urun_desc" rows="5" ><?php echo $urun['urun_desc'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Meta Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_title" value="<?php echo $urun['urun_meta_title'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Meta Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_desc" value="<?php echo $urun['urun_meta_desc'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Meta Keywords</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_keyw" value="<?php echo $urun['urun_meta_keyw'] ?>" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Firm Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firma_isim" VALUE="<?php echo $urun['urun_firma'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_fiyat" value="<?php echo parayaz2($urun['urun_fiyat'])?>" onkeyup="javascript:this.value=ParaFormat(this.value)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Queue</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="urun_sira" value="<?php echo $urun['urun_sira'] ?>">
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $urun_id; ?>" name="urun_id">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="urunGuncelleBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-cogs"></i>&nbsp;Update</div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
