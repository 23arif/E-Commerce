<head><title>Update Slide | AlikExpress</title></head>
<?php
$slide_id = g('slide_id');
$veri = $db->prepare("SELECT *FROM slider where slider_id=?");
$veri->execute(array($slide_id));
$v = $veri->fetch(PDO::FETCH_ASSOC);
?>
<!-- start: page -->
<header class="page-header">
    <h2>Slider Guncelleme Paneli</h2>
</header>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Updateing panel of &nbsp;"<?php echo $v['slider_name'] ?>" slide</h2>
            </header>
            <div class="panel-body">
                <div id="slideUpdateAlert"></div>
                <form id="slideUpdateForm" class="form-horizontal form-bordered" method="post"
                      enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Slide Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slider_name"
                                   value="<?php echo $v['slider_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Slide Url</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slider_url"
                                   value="<?php echo $v['slider_url'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Slide Queue</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="slider_queue"
                                   value="<?php echo $v['slider_queue'] ?>">
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $slide_id; ?>" name="slider_id">
                    <div class="col-md-6 col-md-offset-3">
                        <div id="slideUpdateBtn" class="btn btn-primary btn-lg pull-right">Guncelle</div>
                    </div>

                </form>
            </div>
        </section>

    </div>
</div>
