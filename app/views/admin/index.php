<?php require APPROOT . '/views/inc/header.php'?>
    <style>
        @media (min-width: 768px){
            .navbar-expand-lg .navbar-nav {
                -ms-flex-direction: column;
                flex-direction: column;
            }
        }
    </style>
    <body class="admin-body-color ">
<?php require APPROOT . '/views/inc/admin_nav.php'?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col padd-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard</li>
                        </ol>
                    </nav>
                    <h1>Admin <small>Subheading</small></h1>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mt-4">
                            <div class="card">
                                <div class="card-body bg-primary">
                                    <div class="card-title text-white d-flex justify-content-between">
                                        <i class="fa fa-users icon-size" aria-hidden="true"></i>
                                        <div class="text-right">
                                            <h1>4</h1>
                                            <p>New views</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="hover-none text-primary" href="<?php echo URLROOT ?>/admin/index">Page View From Gallery<br>View Details  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-chevron-circle-right "></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mt-4">
                            <div class="card">
                                <div class="card-body bg-success">
                                    <div class="card-title text-white d-flex justify-content-between">
                                        <i class="fa fa-picture-o icon-size" aria-hidden="true"></i>
                                        <div class="text-right">
                                            <h1><?php echo $data[1]->photosC; ?></h1>
                                            <p>Photos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="hover-none text-success" href="<?php echo URLROOT ?>/admin/photos">Total Photos From Gallery<br>View Details  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-chevron-circle-right "></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mt-4">
                            <div class="card">
                                <div class="card-body bg-danger">
                                    <div class="card-title text-white d-flex justify-content-between">
                                        <i class="fa fa-user icon-size" aria-hidden="true"></i>
                                        <div class="text-right">
                                            <h1><?php echo $data[0]->usersC; ?></h1>
                                            <p>Users</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="hover-none text-danger" href="<?php echo URLROOT ?>/admin/users">Total Users<br>View Details  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-chevron-circle-right "></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mt-4">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-title text-white d-flex justify-content-between">
                                        <i class="fa fa-comments icon-size" aria-hidden="true"></i>
                                        <div class="text-right">
                                            <h1><?php echo $data[2]->commentsC; ?></h1>
                                            <p>Comments</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="hover-none text-info" href="<?php echo URLROOT ?>/admin/comments">Total Comments<br>View Details  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-chevron-circle-right "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php require APPROOT . '/views/inc/footer.php'?>