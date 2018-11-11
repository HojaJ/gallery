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
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"></i> Photos</li>
                        </ol>
                    </nav>
                    <h1>Comments</h1>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Photo Id</th>
                            <th>Author</th>
                            <th>Body</th>
                            <th class="d-none d-lg-block">Commented At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($data)):?>
                        <?php foreach ($data as $comment): ?>
                        <tr>
                            <td><?php echo $comment->id; ?></td>
                            <th scope="row"><?php echo $comment->photo_id; ?></th>
                            <td><?php echo $comment->author; ?></td>
                            <td><?php echo $comment->body; ?></td>
                            <td class="d-none d-lg-block"><?php echo $comment->created_at; ?></td>
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