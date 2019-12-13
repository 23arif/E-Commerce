    <!-- start: page -->
    <header class="page-header">
        <h2>Add New Product</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   <h2 class="panel-title">Add New Product</h2>
                </header>
                <div class="panel-body">
                    <div id="urunEkleAlert"></div>
                    <form id="urunEkleForm" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image</label>
                            <div class="col-md-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
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
                                    $veri = $db->prepare('SELECT * FROM kategoriler WHERE kategori_durum="1" ORDER BY kategori_id ASC');
                                    $veri->execute(array());
                                    $v = $veri->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($v as $kat) {
                                        ?>
                                        <option value="<?php echo $kat['kategori_id'] ?>"><?php echo $kat['kategori_title'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="urun_desc" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Meta Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Meta Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_desc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Meta Keywords</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_keyw" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Firm Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firma_isim">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_fiyat" onkeyup="javascript:this.value=ParaFormat(this.value)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Product Queue</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="urun_sira">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <div id="urunEkleBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus-circle"></i> Add</div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
