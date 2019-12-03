<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Menu
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Category Processes</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="index.php?do=categories">
                                    Categories
                                </a>
                            </li>
                            <li>
                                <a href="index.php?do=add_category">
                                    Add New Category
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Product Processes</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="index.php?do=products">
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="index.php?do=add_product">
                                    Add New Product
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?do=user_spy">
                            <i class="fa fa-rss"  aria-hidden="true"></i>
                            <span>User Control</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?do=messages">
                            <i class="fa fa-comments"  aria-hidden="true"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <hr class="separator" />

            <div class="sidebar-widget widget-tasks hidden">
                <div class="widget-header">
                    <h6>Projects</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul class="list-unstyled m-none">
                        <li><a href="#">Porto HTML5 Template</a></li>
                        <li><a href="#">Tucson Template</a></li>
                        <li><a href="#">Porto Admin</a></li>
                    </ul>
                </div>
            </div>

            <hr class="separator" />

            <div class="sidebar-widget widget-stats hidden">
                <div class="widget-header">
                    <h6>Company Stats</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul>
                        <li>
                            <span class="stats-title">Stat 1</span>
                            <span class="stats-complete">85%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                    <span class="sr-only">85% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 2</span>
                            <span class="stats-complete">70%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 3</span>
                            <span class="stats-complete">2%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">2% Complete</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</aside>