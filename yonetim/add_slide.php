<head><title>Add New Slide | AlikExpress</title></head>
<!-- start: page -->
<header class="page-header">
    <h2>Add New Slide</h2>
</header>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Add New Slide</h2>
            </header>
            <div class="panel-body">
                <div id="addSlideAlert"></div>
                <form id="addSlideForm" class="form-horizontal form-bordered" method="post"
                      enctype="multipart/form-data">
                    <form id="urunEkleForm" class="form-horizontal form-bordered" method="post"
                          enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider Image</label>
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
																<input type="file" name="slide_img"/>
															</span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Slide Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="slide_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Slide Url</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="slide_url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Slide Queue</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="slide_queue">
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-3">
                            <div id="addSlideBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus-circle"
                                                                                               style="font-weight: 400">
                                    Add</i></div>
                        </div>

                    </form>
            </div>
        </section>

    </div>
</div>
