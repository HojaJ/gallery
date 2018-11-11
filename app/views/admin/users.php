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
                            <li class="breadcrumb-item"><a href="<?php echo URLROOT ?>/admin">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"></i> Users</li>
                        </ol>
                    </nav>
                    <h1>Users</h1>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="d-none d-lg-block">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($data)):?>
                        <?php foreach ($data as $user): ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <th scope="row"><?php echo $user->name; ?></th>
                            <td><?php echo $user->email; ?></td>
                            <td class="d-none d-lg-block"><?php echo $user->created_at; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




<?php require APPROOT . '/views/inc/footer.php'?>