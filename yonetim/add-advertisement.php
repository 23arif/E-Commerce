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
                    <form id="addAdsForm" class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Advertisement Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ads_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Advertisement Link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ads_link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Advertisement Status</label>
                            <div class="col-md-6">
                                <select class="form-control"name="ads_status">
                                    <option value="1">Active</option>
                                    <option value="00">Passiv</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                        <div id="addAdsBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus-circle"> Add</i></div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>
