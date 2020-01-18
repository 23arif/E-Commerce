<!-- start: page -->
<header class="page-header">
    <h2>My Profile</h2>
</header>
<div class="row">
    <div class="col-md-4 col-lg-3">

        <section class="panel">
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="assets/images/!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo $_SESSION['isim'] . '&nbsp&nbsp&nbsp' . $_SESSION['soyisim'] ?></span>
                        <span class="thumb-info-type"><?php echo $_SESSION['yetki'] == 1 ? 'Admin' : '' ?></span>
                    </div>
                </div>

<!--                <div class="widget-toggle-expand mb-md">-->
<!--                    <div class="widget-header">-->
<!--                        <h6>Profile Completion</h6>-->
<!--                        <div class="widget-toggle">+</div>-->
<!--                    </div>-->
<!--                    <div class="widget-content-collapsed">-->
<!--                        <div class="progress progress-xs light">-->
<!--                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"-->
<!--                                 aria-valuemax="100" style="width: 60%;">-->
<!--                                60%-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="widget-content-expanded">-->
<!--                        <ul class="simple-todo-list">-->
<!--                            <li class="completed">Update Profile Picture</li>-->
<!--                            <li class="completed">Change Personal Information</li>-->
<!--                            <li>Update Social Media</li>-->
<!--                            <li>Follow Someone</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <hr class="dotted short">-->
<!---->
<!--                <h6 class="text-muted">About</h6>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vulputate quam. Interdum et-->
<!--                    malesuada</p>-->
<!--                <div class="clearfix">-->
<!--                    <a class="text-uppercase text-muted pull-right" href="#">(View All)</a>-->
<!--                </div>-->
<!---->
<!--                <hr class="dotted short">-->
<!---->
<!--                <div class="social-icons-list">-->
<!--                    <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com"-->
<!--                       data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>-->
<!--                    <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com"-->
<!--                       data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>-->
<!--                    <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com"-->
<!--                       data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>-->
<!--                </div>-->

            </div>
        </section>


<!--        <section class="panel">-->
<!--            <header class="panel-heading">-->
<!--                <div class="panel-actions">-->
<!--                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>-->
<!--                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>-->
<!--                </div>-->
<!---->
<!--                <h2 class="panel-title">-->
<!--                    <span class="label label-primary label-sm text-weight-normal va-middle mr-sm">198</span>-->
<!--                    <span class="va-middle">Friends</span>-->
<!--                </h2>-->
<!--            </header>-->
<!--            <div class="panel-body">-->
<!--                <div class="content">-->
<!--                    <ul class="simple-user-list">-->
<!--                        <li>-->
<!--                            <figure class="image rounded">-->
<!--                                <img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">-->
<!--                            </figure>-->
<!--                            <span class="title">Joseph Doe Junior</span>-->
<!--                            <span class="message truncate">Lorem ipsum dolor sit.</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <figure class="image rounded">-->
<!--                                <img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle">-->
<!--                            </figure>-->
<!--                            <span class="title">Joseph Junior</span>-->
<!--                            <span class="message truncate">Lorem ipsum dolor sit.</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <figure class="image rounded">-->
<!--                                <img src="assets/images/!sample-user.jpg" alt="Joe Junior" class="img-circle">-->
<!--                            </figure>-->
<!--                            <span class="title">Joe Junior</span>-->
<!--                            <span class="message truncate">Lorem ipsum dolor sit.</span>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <figure class="image rounded">-->
<!--                                <img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">-->
<!--                            </figure>-->
<!--                            <span class="title">Joseph Doe Junior</span>-->
<!--                            <span class="message truncate">Lorem ipsum dolor sit.</span>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <hr class="dotted short">-->
<!--                    <div class="text-right">-->
<!--                        <a class="text-uppercase text-muted" href="#">(View All)</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="panel-footer">-->
<!--                <div class="input-group input-search">-->
<!--                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">-->
<!--                    <span class="input-group-btn">-->
<!--											<button class="btn btn-default" type="submit"><i class="fa fa-search"></i>-->
<!--											</button>-->
<!--										</span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->

<!--        <section class="panel">-->
<!--            <header class="panel-heading">-->
<!--                <div class="panel-actions">-->
<!--                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>-->
<!--                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>-->
<!--                </div>-->
<!---->
<!--                <h2 class="panel-title">Popular Posts</h2>-->
<!--            </header>-->
<!--            <div class="panel-body">-->
<!--                <ul class="simple-post-list">-->
<!--                    <li>-->
<!--                        <div class="post-image">-->
<!--                            <div class="img-thumbnail">-->
<!--                                <a href="#">-->
<!--                                    <img src="assets/images/post-thumb-1.jpg" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="post-info">-->
<!--                            <a href="#">Nullam Vitae Nibh Un Odiosters</a>-->
<!--                            <div class="post-meta">-->
<!--                                Jan 10, 2013-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <div class="post-image">-->
<!--                            <div class="img-thumbnail">-->
<!--                                <a href="#">-->
<!--                                    <img src="assets/images/post-thumb-2.jpg" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="post-info">-->
<!--                            <a href="#">Vitae Nibh Un Odiosters</a>-->
<!--                            <div class="post-meta">-->
<!--                                Jan 10, 2013-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <div class="post-image">-->
<!--                            <div class="img-thumbnail">-->
<!--                                <a href="#">-->
<!--                                    <img src="assets/images/post-thumb-3.jpg" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="post-info">-->
<!--                            <a href="#">Odiosters Nullam Vitae</a>-->
<!--                            <div class="post-meta">-->
<!--                                Jan 10, 2013-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </section>-->

    </div>
    <div class="col-md-8 col-lg-6">

        <div class="tabs">
            <ul class="nav nav-tabs tabs-primary">
                <li class="active">
                    <a href="#edit" data-toggle="tab">Edit</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="edit" class="tab-pane active">

                    <form class="form-horizontal" id="profileForm">
                        <h4 class="mb-xlg">Personal Information</h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileFirstName">First Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="profileFirstName" name="profileFirstName"
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
                        <hr class="dotted tall">
                        <h4 class="mb-xlg">Change Password</h4>
                        <fieldset class="mb-xl">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="profileNewPassword" name="profileNewPassword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New
                                    Password</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="profileNewPasswordRepeat" name="profileNewPasswordRepeat">
                                </div>
                            </div>
                        </fieldset>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="button" id="profileBtn"  class="mt-sm mb-sm btn btn-primary">
                                        Update
                                    </button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <input type="hidden" id="default-success"/>
                                    <input type="hidden" id="default-notice"/>
                                    <input type="hidden" id="default-invalidEmailNotice"/>
                                    <input type="hidden" id="default-invalidPassNotice"/>


                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
<!--    <div class="col-md-12 col-lg-3">-->
<!---->
<!--        <h4 class="mb-md">Sale Stats</h4>-->
<!--        <ul class="simple-card-list mb-xlg">-->
<!--            <li class="primary">-->
<!--                <h3>488</h3>-->
<!--                <p>Nullam quris ris.</p>-->
<!--            </li>-->
<!--            <li class="primary">-->
<!--                <h3>$ 189,000.00</h3>-->
<!--                <p>Nullam quris ris.</p>-->
<!--            </li>-->
<!--            <li class="primary">-->
<!--                <h3>16</h3>-->
<!--                <p>Nullam quris ris.</p>-->
<!--            </li>-->
<!--        </ul>-->
<!---->
<!--        <h4 class="mb-md">Projects</h4>-->
<!--        <ul class="simple-bullet-list mb-xlg">-->
<!--            <li class="red">-->
<!--                <span class="title">Porto Template</span>-->
<!--                <span class="description truncate">Lorem ipsom dolor sit.</span>-->
<!--            </li>-->
<!--            <li class="green">-->
<!--                <span class="title">Tucson HTML5 Template</span>-->
<!--                <span class="description truncate">Lorem ipsom dolor sit amet</span>-->
<!--            </li>-->
<!--            <li class="blue">-->
<!--                <span class="title">Porto HTML5 Template</span>-->
<!--                <span class="description truncate">Lorem ipsom dolor sit.</span>-->
<!--            </li>-->
<!--            <li class="orange">-->
<!--                <span class="title">Tucson Template</span>-->
<!--                <span class="description truncate">Lorem ipsom dolor sit.</span>-->
<!--            </li>-->
<!--        </ul>-->
<!---->
<!--        <h4 class="mb-md">Messages</h4>-->
<!--        <ul class="simple-user-list mb-xlg">-->
<!--            <li>-->
<!--                <figure class="image rounded">-->
<!--                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">-->
<!--                </figure>-->
<!--                <span class="title">Joseph Doe Junior</span>-->
<!--                <span class="message">Lorem ipsum dolor sit.</span>-->
<!--            </li>-->
<!--            <li>-->
<!--                <figure class="image rounded">-->
<!--                    <img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle">-->
<!--                </figure>-->
<!--                <span class="title">Joseph Junior</span>-->
<!--                <span class="message">Lorem ipsum dolor sit.</span>-->
<!--            </li>-->
<!--            <li>-->
<!--                <figure class="image rounded">-->
<!--                    <img src="assets/images/!sample-user.jpg" alt="Joe Junior" class="img-circle">-->
<!--                </figure>-->
<!--                <span class="title">Joe Junior</span>-->
<!--                <span class="message">Lorem ipsum dolor sit.</span>-->
<!--            </li>-->
<!--            <li>-->
<!--                <figure class="image rounded">-->
<!--                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle">-->
<!--                </figure>-->
<!--                <span class="title">Joseph Doe Junior</span>-->
<!--                <span class="message">Lorem ipsum dolor sit.</span>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->

</div>
<!-- end: page -->