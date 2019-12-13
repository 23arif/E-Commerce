<!-- start: page -->
<header class="page-header">
    <h2>Add Advertisement</h2>
</header>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Add New Advertisement</h2>
            </header>
            <div class="panel-body">
                <div id="addAdsAlert"></div>
                <form id="addAdsForm" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Advertisement Image</label>
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
																<input type="file" name="ads_img"/>
															</span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Advertisement Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="ads_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Advertisement Url</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="ads_url"  placeholder="Optionally">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Advertisement Status</label>
                        <div class="col-md-6">
                            <select class="form-control" name="ads_status">
                                <option value="1">Active</option>
                                <option value="00">Passiv</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3">
                        <div id="addAdsBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus-circle">
                                Add</i></div>
                    </div>

                </form>
            </div>
        </section>

    </div>
</div>
