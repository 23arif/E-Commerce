<head><title>Update Advertisement | AlikExpress</title></head>
<?php
$ads_id = g('ads_id');
$veri = $db->prepare("SELECT * FROM advertisements WHERE ads_id=? ");
$veri->execute(array($ads_id));
$v = $veri->fetch(PDO::FETCH_ASSOC);
?>
    <!-- start: page -->
    <header class="page-header">
        <h2>Advertisement Update</h2>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   <h2 class="panel-title">Update panel of &nbsp;"<?php echo $v['ads_name'] ?>" advertisement</h2>
                </header>
                <div class="panel-body">
                    <div id="adsUpdateAlert"></div>
                    <form id="adsUpdateForm" class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Advertisement Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ads_name" value="<?php echo $v['ads_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Advertisement Url</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ads_url" value="<?php echo $v['ads_url'] ?>" placeholder="Optionally">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Advertisement Status</label>
                            <div class="col-md-6">
                                <select class="form-control" name="ads_status">
                                    <option <?php echo $v['ads_status']==1 ? 'selected': ''; ?> value="1">Active</option>
                                    <option <?php echo $v['ads_status']==0 ? 'selected': ''; ?> value="00">Passiv</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $ads_id ?>" name="ads_id">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="updateAdsBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-cogs"></i> Update Advertisement</div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
