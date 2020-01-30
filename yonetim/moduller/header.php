<header class="header">
    <div class="logo-container">
        <a href="../" class="logo">
            <img src="assets/images/logo.png" height="35" alt="Porto Admin"/>
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
             data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <ul class="notifications">
<!--            <li>-->
<!--                <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">-->
<!--                    <i class="fa fa-tasks"></i>-->
<!--                    <span class="badge">3</span>-->
<!--                </a>-->
<!---->
<!--                <div class="dropdown-menu notification-menu large">-->
<!--                    <div class="notification-title">-->
<!--                        <span class="pull-right label label-default">3</span>-->
<!--                        Tasks-->
<!--                    </div>-->
<!---->
<!--                    <div class="content">-->
<!--                        <ul>-->
<!--                            <li>-->
<!--                                <p class="clearfix mb-xs">-->
<!--                                    <span class="message pull-left">Generating Sales Report</span>-->
<!--                                    <span class="message pull-right text-dark">60%</span>-->
<!--                                </p>-->
<!--                                <div class="progress progress-xs light">-->
<!--                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"-->
<!--                                         aria-valuemax="100" style="width: 60%;"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!---->
<!--                            <li>-->
<!--                                <p class="clearfix mb-xs">-->
<!--                                    <span class="message pull-left">Importing Contacts</span>-->
<!--                                    <span class="message pull-right text-dark">98%</span>-->
<!--                                </p>-->
<!--                                <div class="progress progress-xs light">-->
<!--                                    <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0"-->
<!--                                         aria-valuemax="100" style="width: 98%;"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!---->
<!--                            <li>-->
<!--                                <p class="clearfix mb-xs">-->
<!--                                    <span class="message pull-left">Uploading something big</span>-->
<!--                                    <span class="message pull-right text-dark">33%</span>-->
<!--                                </p>-->
<!--                                <div class="progress progress-xs light mb-xs">-->
<!--                                    <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0"-->
<!--                                         aria-valuemax="100" style="width: 33%;"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->

            <?php
           $veri = $db->prepare("SELECT *FROM message ORDER BY message_time DESC LIMIT 10");
            $veri->execute(array());
            $v = $veri->fetchALL(PDO::FETCH_ASSOC);
            $k = $veri->rowCount();
            ?>

            <li>
                <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                    <i class="fa fa-envelope"></i>
                    <span class="badge"><?php echo $k ?></span>
                </a>

                <div class="dropdown-menu notification-menu">
                    <div class="notification-title">
                        <span class="pull-right label label-default"><?php echo $k ?></span>
                        Messages
                    </div>

                    <div class="content">
                        <ul>
                            <?php
                            foreach ($v as $m) {
                                ?>
                                <li>
                                    <a href="?do=fstMsg&id=<?php echo $m['id'] ?>" class="clearfix">
                                        <figure class="image">
                                            <img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior"
                                                 class="img-circle"/>
                                        </figure>
                                        <span class="title"><?php echo $m['sender_name'] ?></span>
                                        <span class="message"><?php

                                           if(strlen($m['message_content'])>45){
                                               echo substr($m['message_content'],0,45).'...';
                                           }else{
                                               echo $m['message_content'];
                                           }

                                            ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>

                        <hr/>

                        <div class="text-right">
                            <a href="?do=messages" class="view-more">View All</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="../<?php echo yonetimData('yonetim_image') ?>" class="img-circle"/>
                </figure>
                <div class="profile-info" >
                    <span class="name"><?php echo s("isim") . " " . s('soyisim'); ?></span>
                    <span class="role"><?php echo s('yetki') == 1 ? 'Admin' : ''; ?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="?do=profile"><i class="fa fa-user"></i> My
                            Profile</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="ayarlar/islem.php?islem=siteyiGoruntule"><i
                                    class="fa fa-eye"></i> View Site</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="ayarlar/islem.php?islem=cikis"><i
                                    class="fa fa-power-off"></i> Exit</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>