<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <ul class="nav">
        <li class="nav-item">
            <div class="dropdown open">
                <button class="btn btn-custom dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope"></i>
                </button>
                <div class="dropdown-menu messages-dropdown">

                    <div class="messages-preview mt-3">
                        <a href="" class="hover-none py-2 px-3 d-block">
                            <div class="media">
                                <div class="float-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="pb-0 text-dark">John Smith</h6>
                                    <p class="small text-muted mb-0"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="messages-preview mt-3">
                        <a href="" class="hover-none pt-2 px-3 d-block">
                            <div class="media">
                                <div class="float-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="pb-0 text-dark">John Smith</h6>
                                    <p class="small text-muted mb-0"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="messages-preview mt-3">
                        <a href="" class="hover-none py-2 px-3 d-block">
                            <div class="media">
                                <div class="float-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="pb-0 text-dark">John Smith</h6>
                                    <p class="small text-muted mb-0"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </div>


                    <a href="" class="text-black-50 py-2 px-3">Read all Messages</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <div class="dropdown open">
                <button class="btn btn-custom dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                </button>
                <div class="dropdown-menu text-center">
                    <small class="lead">Alert &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-danger">Alert</span></small>
                    <div class="dropdown-divider"></div>
                    <small class="lead">Alert &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">Alert</span></small>
                    <div class="dropdown-divider"></div>
                    <small class="lead">Alert &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-success">Alert</span></small>
                    <div class="dropdown-divider"></div>
                    <a href="" class="text-black-50">View All</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <div class="dropdown open">
                <button class="btn btn-custom dropdown-toggle" type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> <?php echo (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : '' ; ?>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-envelope"></i>&nbsp;Inbox</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-gear"></i>&nbsp;Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/admin/logout/"><i class="fa fa-fw fa-power-off"></i>&nbsp;Log Out</a>
                </div>
            </div>
        </li>
    </ul>
    <a class="navbar-brand" href="<?php echo URLROOT ?>"><?php echo SITENAME ?></a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto side-nav">
            <li class="nav-item <?php active('admin/index'); ?>">
                <a class="nav-link" href="<?php echo URLROOT ?>/admin/index"><i class="fa fa-fw fa-dashboard"></i>&nbsp;Dashboard</a>
            </li>
            <li class="nav-item <?php active('admin/users'); ?>">
                <a class="nav-link " href="<?php echo URLROOT ?>/admin/users"><i class="fa fa-fw fa-bar-chart-o"></i>&nbsp;Users</a>
            </li>
            <li class="nav-item <?php active('admin/uploads'); ?>">
                <a class="nav-link" href="<?php echo URLROOT ?>/admin/uploads"><i class="fa fa-fw fa-table"></i>&nbsp;Uploads</a>
            </li>
            <li class="nav-item <?php active('admin/photos'); ?>">
                <a class="nav-link" href="<?php echo URLROOT ?>/admin/photos"><i class="fa fa-fw fa-table"></i>&nbsp;Photos</a>
            </li>
            <li class="nav-item <?php active('admin/comments'); ?>">
                <a class="nav-link" href="<?php echo URLROOT ?>/admin/comments"><i class="fa fa-fw fa-edit"></i>&nbsp;Comments</a>
            </li>
        </ul>
    </div>
</nav>
