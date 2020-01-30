<head><title>Add New Category | AlikExpress</title></head>
    <!-- start: page -->
    <header class="page-header">
        <h2>Add New Category</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Add New Category</h2>
                </header>
                <div class="panel-body">
                    <div id="kategoriEkleAlert"></div>
                    <form id="kategoriEkleForm" class="form-horizontal form-bordered">
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
                                        ?>
                                        <option value="<?php echo $kat['kategori_id'] ?>"><?php echo $kat['kategori_title'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Category Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Category Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_desc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Keywords</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_keyw" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category Status</label>
                            <div class="col-md-6">
                                <select class="form-control"name="kategori_durum">
                                    <option value="1">Active</option>
                                    <option value="00">Passiv</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                        <div id="kategoriEkleBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus-circle" style="font-weight: 400"> Add</i></div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
