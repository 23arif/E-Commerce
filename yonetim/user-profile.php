<!-- start: page -->
<header class="page-header">
    <h2>My Profile</h2>
</header>
<div class="row">
    <div class="col-md-4 col-lg-3">

        <section class="panel">
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="../<?php echo yonetimData('yonetim_image') ?>" class="rounded img-responsive">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo $_SESSION['isim'] . '&nbsp&nbsp&nbsp' . $_SESSION['soyisim'] ?></span>
                        <span class="thumb-info-type"><?php echo $_SESSION['yetki'] == 1 ? 'Admin' : '' ?></span>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <div class="col-md-8 col-lg-8">

        <div class="tabs">
            <ul class="nav nav-tabs tabs-primary">
                <li class="active">
                    <a href="#edit" data-toggle="tab">Edit</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="edit" class="tab-pane active">

                    <!--                    Profile File Upload-->

                    <form class="form-horizontal" id="profilePhotoForm">
                        <h4 class="mb-xlg">Profile Photo</h4>
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-3 control-label">File Upload</label>
                                <div class="col-md-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_image"/>
															</span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                               data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-3 ">
                                    <button type="button" id="profilePhotoBtn"
                                            class="mt-sm mb-sm btn btn-block btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!--                    Profile Info Form-->
                    <form class="form-horizontal" id="profileInfoForm">
                        <h4 class="mb-xlg pt-lg">Personal Information</h4>
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">First Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="profileFirstName"
                                           name="profileFirstName"
                                           value="<?php echo $_SESSION['isim'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileLastName">Last Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="profileLastName" name="profileLastName"
                                           value="<?php echo $_SESSION['soyisim'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileEmail">E-mail</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="profileEmail" name="profileEmail"
                                           value="<?php echo $_SESSION['eposta'] ?>">
                                </div>
                            </div>
                        </fieldset>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="button" id="profileBtn"
                                            class="mt-sm mb-sm btn btn-primary">
                                        Update
                                    </button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--                    Password Form-->
                    <form class="form-horizontal" id="profilePassForm">
                        <h4 class="mb-xlg pt-lg">Change Password</h4>
                        <fieldset class="mb-xl">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="profileNewPassword"
                                           name="profileNewPassword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New
                                    Password</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="profileNewPasswordRepeat"
                                           name="profileNewPasswordRepeat">
                                </div>
                            </div>
                        </fieldset>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="button" id="profilePassBtn"
                                            class="mt-sm mb-sm btn btn-primary">
                                        Update
                                    </button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: page -->
