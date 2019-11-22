    <!-- start: page -->
    <header class="page-header">
        <h2>Urun Ekleme Paneli</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Yeni Urun Ekle</h2>
                </header>
                <div class="panel-body">
                    <div id="urunEkleAlert"></div>
                    <form id="urunEkleForm" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Urun Resmi</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="urun_resim">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Urun Kategorisi</label>
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
                            <label class="col-md-3 control-label" for="inputDefault">Urun Baslik</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Urun Aciklama</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="urun_desc" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Urun Meta Baslik</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Urun Meta Aciklama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_desc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Meta Anahtar Kelimeler</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_meta_keyw" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Firma Adi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firma_isim">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Urun Fiyat</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="urun_fiyat" onkeyup="javascript:this.value=ParaFormat(this.value)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Urun Sira</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="urun_sira">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <div id="urunEkleBtn" class="btn btn-primary btn-lg pull-right">Ekle</div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>