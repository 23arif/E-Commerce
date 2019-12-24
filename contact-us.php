<header><title>Contact - AlikExpress</title></header>
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <div id="gmap" class="contact-map">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div id="contactUsAlert"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required"
                                   placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required"
                                   placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"
                                      placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button id="contactUsBtn" class="btn btn-primary pull-right" type="button">Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p><span
                                    style="color:#fe980f;font-weight: bold">Alik <span
                                        style="color:#e43225;">Express</span></p>
                        <p><span class="contactInfoTxt">Address:</span> <?php echo $v['settings_location'] ?></p>
                        <p><span class="contactInfoTxt">Mobile:</span> <?php echo $v['settings_phone'] ?></p>
                        <p><span class="contactInfoTxt">Email:</span> <?php echo $v['settings_email'] ?></p>
                    </address>
                    <div class="social-networks">
                        <?php if ($v['settings_fbSwitch'] == 'on' || $v['settings_linkedinSwitch'] == 'on' || $v['settings_twitterSwitch'] == 'on') {
                            ?>
                            <h2 class="title text-center">Social Networking</h2>
                            <?php
                        } ?>
                        <ul>
                            <?php if ($v['settings_fbSwitch'] == 'on') {
                                ?>
                                <li><a href="http://<?php echo $v['settings_facebook'] ?>" target="_blank"><i
                                                class="fa fa-facebook-square"></i></a></li>
                                <?php
                            } ?>

                            <?php if ($v['settings_twitterSwitch'] == 'on') {
                                ?>
                                <li><a href="http://<?php echo $v['settings_twitter'] ?>" target="_blank"><i
                                                class="fa fa-twitter-square"></i></a></li>
                                <?php
                            } ?>
                            <?php if ($v['settings_linkedinSwitch'] == 'on') {
                                ?>
                                <li><a href="http://<?php echo $v['settings_linkedin'] ?>" target="_blank"><i
                                                class="fa fa-linkedin-square"></i></a></li>
                                <?php
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->