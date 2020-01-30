<head><title>Settings | AlikExpress</title></head>
<?php
$veri = $db->prepare("SELECT *FROM settings");
$veri->execute(array());
$v = $veri->fetch(PDO::FETCH_ASSOC);
?>
<!-- start: page -->
<header class="page-header">
    <h2>Web Page Settings</h2>
</header>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <div id="settingsAlert"></div>
                <form id="settingsForm" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_name">Web Page Name</label>
                        <div class="col-md-6">
                            <div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-suitcase"></i>
															</span>
                                <input type="text" class="form-control" id="settings_name" name="settings_name"
                                       value="<?php echo $v['settings_name'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_desc">Web Page Description</label>
                        <div class="col-md-6">
                            <div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-info"></i>
															</span>
                                <textarea name="settings_desc" id="settings_desc" class="form-control" cols="30"
                                          rows="5"><?php echo $v['settings_desc'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_keyw">Web Page Keywords</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="settings_keyw" id="settings_keyw"
                                   data-role="tagsinput" data-tag-class="label label-primary"
                                   value="<?php echo $v['settings_keywords'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_phone">Web Page Phone</label>
                        <div class="col-md-6 control-label">
                            <div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-phone"></i>
															</span>
                                <input id="settings_phone" data-plugin-masked-input data-input-mask="(999) 999-9999"
                                       placeholder="(123) 123-1234" class="form-control" name="settings_phone"
                                       value="<?php echo $v['settings_phone'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_email">Web Page Email</label>
                        <div class="col-md-6">
                            <div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-envelope-o"></i>
															</span>
                                <input type="text" class="form-control" id="settings_email" name="settings_email"
                                       value="<?php echo $v['settings_email'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_location">Web Page Location</label>
                        <div class="col-md-6">
                            <div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-map-marker"></i>
															</span>
                                <input type="text" class="form-control" id="settings_location" name="settings_location"
                                       value="<?php echo $v['settings_location'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_facebook">Facebook</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-facebook-official"></i>
                                </span>
                                <span class="input-group-addon">
                                    http://
                                </span>
                                <input type="text" class="form-control" id="settings_facebook" name="settings_facebook"
                                       value="<?php echo $v['settings_facebook'] ?>">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="switch switch-sm switch-dark">
                                <input type="checkbox" name="settings_fbSwitch"
                                       data-plugin-ios-switch <?php if ($v['settings_fbSwitch'] == 'on') {
                                    echo 'checked="checked"';
                                } ?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_twitter">Twitter</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-twitter"></i>
                                </span>
                                <span class="input-group-addon">
                                    http://
                                </span>
                                <input type="text" class="form-control" id="settings_twitter" name="settings_twitter"
                                       value="<?php echo $v['settings_twitter'] ?>">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="switch switch-sm switch-dark">
                                <input type="checkbox" name="settings_twitterSwitch"
                                       data-plugin-ios-switch <?php if ($v['settings_twitterSwitch'] == 'on') {
                                    echo 'checked="checked"';
                                } ?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_linkedin">LinkedIn</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-linkedin"></i>
                                </span>
                                <span class="input-group-addon">
                                    http://
                                </span>
                                <input type="text" class="form-control" id="settings_linkedin" name="settings_linkedin"
                                       value="<?php echo $v['settings_linkedin'] ?>">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="switch switch-sm switch-dark">
                                <input type="checkbox" name="settings_linkedinSwitch"
                                       data-plugin-ios-switch <?php if ($v['settings_linkedinSwitch'] == 'on') {
                                    echo 'checked="checked"';
                                } ?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="settings_copyright">Copyright</label>
                        <div class="col-md-6">
                            <div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-copyright"></i>
															</span>
                                <input type="text" class="form-control" id="settings_copyright"
                                       name="settings_copyright"
                                       value="<?php echo $v['settings_copyright'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                        <div id="settingsBtn" class="btn btn-primary btn-lg pull-right"><i class="fa fa-cogs"></i>&nbsp;Update
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
